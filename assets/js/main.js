/* Shared progressive enhancement. Only explicitly marked elements participate.
 * Content stays visible without JS, without IntersectionObserver, or on failure.
 * Shared navigation and opt-in effects; no form handling or animation library.
 */
(() => {
    'use strict';

    const initializeNavigation = () => {
        const header = document.querySelector('[data-site-header]');
        if (!header) return;

        // Keep 1200px in sync with responsive.css. Navigation uses disclosures,
        // not ARIA application-menu roles: ordinary links retain normal Tab order.
        const desktop = window.matchMedia('(min-width: 1200px)');
        const hover = window.matchMedia('(hover: hover) and (pointer: fine)');
        const entries = [...header.querySelectorAll('[data-mega-item]')].map((item) => ({
            item, trigger: item.querySelector('.mega-toggle'), panel: item.querySelector('.mega-panel'), timer: null, openedBy: null,
        }));
        const progress = header.querySelector('[data-header-progress]');
        let suppressFocusOpen = false;
        const closeMenu = (entry, restoreFocus = false) => {
            const hadPanelFocus = entry.panel.contains(document.activeElement);
            clearTimeout(entry.timer);
            entry.trigger.setAttribute('aria-expanded', 'false');
            entry.panel.hidden = true;
            entry.openedBy = null;
            if (restoreFocus || hadPanelFocus) {
                suppressFocusOpen = true;
                entry.trigger.focus();
                suppressFocusOpen = false;
            }
        };
        const closeAll = () => entries.forEach((entry) => closeMenu(entry));
        const openMenu = (entry, source = 'keyboard') => {
            if (!desktop.matches) return;
            entries.forEach((other) => { if (other !== entry) closeMenu(other); });
            clearTimeout(entry.timer);
            entry.panel.hidden = false;
            entry.trigger.setAttribute('aria-expanded', 'true');
            entry.openedBy = source;
        };
        entries.forEach((entry) => {
            entry.trigger.addEventListener('click', () => {
                if (entry.panel.hidden || entry.openedBy === 'hover') openMenu(entry, 'click');
                else closeMenu(entry);
            });
            entry.item.addEventListener('pointerenter', (event) => {
                if (event.pointerType === 'mouse' && hover.matches && entry.panel.hidden) openMenu(entry, 'hover');
            });
            entry.item.addEventListener('pointerleave', () => {
                clearTimeout(entry.timer);
                entry.timer = setTimeout(() => {
                    const active = document.activeElement;
                    if (!entry.item.contains(active) || !active.matches(':focus-visible')) closeMenu(entry);
                }, 160);
            });
            entry.item.addEventListener('focusin', (event) => {
                clearTimeout(entry.timer);
                if (!suppressFocusOpen && event.target === entry.trigger && entry.trigger.matches(':focus-visible')) openMenu(entry);
            });
            entry.item.addEventListener('focusout', () => {
                queueMicrotask(() => {
                    if (!entry.item.contains(document.activeElement)) closeMenu(entry);
                });
            });
            entry.trigger.addEventListener('keydown', (event) => {
                if (event.key !== 'ArrowDown' && event.key !== 'ArrowUp') return;
                event.preventDefault();
                openMenu(entry);
                const links = entry.panel.querySelectorAll('a');
                links[event.key === 'ArrowDown' ? 0 : links.length - 1]?.focus();
            });
        });
        document.addEventListener('pointerdown', (event) => {
            entries.forEach((entry) => { if (!entry.item.contains(event.target)) closeMenu(entry); });
        });

        const dialog = header.querySelector('.mobile-navigation');
        const toggle = header.querySelector('.mobile-menu-toggle');
        const close = header.querySelector('.mobile-menu-close');
        const accordionToggles = [...dialog.querySelectorAll('.mobile-accordion-toggle')];
        const collapse = (button) => {
            button.setAttribute('aria-expanded', 'false');
            document.getElementById(button.getAttribute('aria-controls')).hidden = true;
        };
        accordionToggles.forEach((button) => {
            button.addEventListener('click', () => {
                const expanded = button.getAttribute('aria-expanded') === 'true';
                accordionToggles.forEach(collapse);
                if (!expanded) {
                    button.setAttribute('aria-expanded', 'true');
                    document.getElementById(button.getAttribute('aria-controls')).hidden = false;
                }
            });
        });
        toggle.addEventListener('click', () => {
            if (desktop.matches || dialog.open) return;
            closeAll();
            dialog.showModal();
            document.documentElement.classList.add('mobile-nav-open');
            toggle.setAttribute('aria-expanded', 'true');
        });
        close.addEventListener('click', () => dialog.close());
        // Wrap at the edges as well as using native modal background isolation.
        dialog.addEventListener('keydown', (event) => {
            if (event.key !== 'Tab') return;
            const controls = [...dialog.querySelectorAll('a[href], button:not(:disabled)')]
                .filter((element) => element.getClientRects().length > 0);
            const first = controls[0];
            const last = controls[controls.length - 1];
            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault(); last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault(); first.focus();
            }
        });
        dialog.addEventListener('close', () => {
            document.documentElement.classList.remove('mobile-nav-open');
            toggle.setAttribute('aria-expanded', 'false');
            accordionToggles.forEach(collapse);
            (desktop.matches ? header.querySelector('.site-logo') : toggle).focus();
        });
        dialog.addEventListener('click', (event) => {
            const bounds = dialog.getBoundingClientRect();
            if (event.target === dialog && (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom)) dialog.close();
            else if (event.target.closest('a')) dialog.close();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key !== 'Escape' || dialog.open) return; // Native dialog handles Escape.
            const open = entries.find((entry) => !entry.panel.hidden);
            if (open) { event.preventDefault(); closeMenu(open, true); }
        });
        desktop.addEventListener('change', () => {
            const desktopHadFocus = header.querySelector('.desktop-navigation').contains(document.activeElement);
            closeAll();
            if (dialog.open) dialog.close();
            else if (!desktop.matches && desktopHadFocus) toggle.focus();
        });
        toggle.hidden = false;

        // CSS sticky positioning consumes only its blank top inset. No height writes,
        // fixed-position swaps, or injected spacers can shift following page content.
        let scrollPending = false;
        const updateCompact = () => {
            header.classList.toggle('is-compact', window.scrollY > 48);
            if (progress) {
                const available = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
                progress.style.transform = `scaleX(${Math.min(1, Math.max(0, window.scrollY / available))})`;
            }
            scrollPending = false;
        };
        window.addEventListener('scroll', () => {
            if (!scrollPending) { scrollPending = true; requestAnimationFrame(updateCompact); }
        }, { passive: true });
        updateCompact();
    };

    // Home Hero owns one multi-plane interaction system. Each plane keeps its
    // authored neutral transform and receives only a small depth-based offset.
    const initializeHero = () => {
        const scene = document.querySelector('[data-hero-scene]');
        if (!scene || scene.dataset.initialized) return;
        const motionAllowed = window.matchMedia('(min-width: 1101px) and (hover: hover) and (pointer: fine) and (prefers-reduced-motion: no-preference)');
        const layers = [...scene.querySelectorAll('[data-hero-layer]')];
        let frame = 0;

        const reset = () => {
            cancelAnimationFrame(frame);
            scene.style.transform = '';
            layers.forEach((layer) => { layer.style.transform = ''; });
        };
        const move = (event) => {
            if (!motionAllowed.matches) return reset();
            const bounds = scene.getBoundingClientRect();
            const x = Math.max(-1, Math.min(1, ((event.clientX - bounds.left) / bounds.width - .5) * 2));
            const y = Math.max(-1, Math.min(1, ((event.clientY - bounds.top) / bounds.height - .5) * 2));
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(() => {
                scene.style.transform = `rotateX(${(-y * 3).toFixed(2)}deg) rotateY(${(x * 5).toFixed(2)}deg)`;
                layers.forEach((layer) => {
                    if (!layer.dataset.heroBaseTransform) layer.dataset.heroBaseTransform = getComputedStyle(layer).transform === 'none' ? '' : getComputedStyle(layer).transform;
                    const depth = Number(layer.dataset.depth || 1);
                    layer.style.transform = `${layer.dataset.heroBaseTransform} translate3d(${(x * 8 * depth).toFixed(2)}px, ${(y * 6 * depth).toFixed(2)}px, 0)`;
                });
            });
        };

        scene.addEventListener('pointermove', move, { passive: true });
        scene.addEventListener('pointerleave', reset);
        motionAllowed.addEventListener('change', reset);
        scene.dataset.initialized = 'true';
    };

    // Home selectors enhance existing articles; without JS every article is visible.
    // Real buttons retain normal Tab order. Arrow keys/Home/End are an extra aid.
    const initializeHome = () => {
        const home = document.querySelector('.home-main');
        if (!home) return;
        const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)');

        // Three purpose-built visual explorers share only accessible tab behavior;
        // each scene owns a different visual state and motion language.
        const initializeVisualExplorer = ({ rootSelector, buttonSelector, panelSelector, sceneSelector, stateAttribute, readoutSelector }) => {
            const root = home.querySelector(rootSelector);
            if (!root || root.dataset.visualInitialized) return;
            const buttons = [...root.querySelectorAll(buttonSelector)];
            const panels = [...root.querySelectorAll(panelSelector)];
            const scene = root.querySelector(sceneSelector);
            const readout = root.querySelector(readoutSelector);
            if (!buttons.length || !scene) return;
            let active = 0;
            const select = (index, focus = false) => {
                if (!buttons[index]) return;
                buttons.forEach((button, i) => button.setAttribute('aria-selected', String(i === index)));
                panels.forEach((panel, i) => {
                    panel.hidden = i !== index;
                    if (i === index) { panel.classList.remove('is-switching'); void panel.offsetWidth; panel.classList.add('is-switching'); }
                });
                scene.setAttribute(stateAttribute, String(index));
                readout.textContent = String(index + 1).padStart(2, '0') + ' / ' + buttons[index].querySelector('strong').textContent;
                active = index;
                if (focus) buttons[index].focus();
            };
            buttons.forEach((button, index) => {
                button.addEventListener('click', () => select(index));
                button.addEventListener('keydown', (event) => {
                    let next;
                    if (['ArrowRight', 'ArrowDown'].includes(event.key)) next = (active + 1) % buttons.length;
                    else if (['ArrowLeft', 'ArrowUp'].includes(event.key)) next = (active - 1 + buttons.length) % buttons.length;
                    else if (event.key === 'Home') next = 0;
                    else if (event.key === 'End') next = buttons.length - 1;
                    else return;
                    event.preventDefault(); select(next, true);
                });
            });
            select(0);
            root.dataset.visualInitialized = 'true';
        };
        initializeVisualExplorer({ rootSelector: '[data-problem-explorer]', buttonSelector: '[data-problem-index]', panelSelector: '.diagnostic-panels [role="tabpanel"]', sceneSelector: '.diagnostic-stage', stateAttribute: 'data-problem-state', readoutSelector: '[data-problem-readout]' });
        initializeVisualExplorer({ rootSelector: '[data-system-explorer]', buttonSelector: '[data-system-index]', panelSelector: '.system-panels [role="tabpanel"]', sceneSelector: '.system-visual', stateAttribute: 'data-system-state', readoutSelector: '[data-system-readout]' });
        initializeVisualExplorer({ rootSelector: '[data-operation-explorer]', buttonSelector: '[data-operation-index]', panelSelector: '.operation-panels [role="tabpanel"]', sceneSelector: '.operation-scene-wrap', stateAttribute: 'data-operation-state', readoutSelector: '[data-operation-readout]' });
        initializeVisualExplorer({ rootSelector: '[data-assessment-lab]', buttonSelector: '[data-lab-index]', panelSelector: '.assessment-lab-panels [role="tabpanel"]', sceneSelector: '.assessment-lab-stage', stateAttribute: 'data-lab-state', readoutSelector: '[data-lab-readout]' });
        initializeVisualExplorer({ rootSelector: '[data-care-explorer]', buttonSelector: '[data-care-index]', panelSelector: '.care-panels [role="tabpanel"]', sceneSelector: '.care-stage', stateAttribute: 'data-care-state', readoutSelector: '[data-care-readout]' });

        const layerToggle = home.querySelector('.system-layers-toggle');
        if (layerToggle) layerToggle.addEventListener('click', () => {
            const visual = layerToggle.closest('.system-visual');
            const expanded = !visual.classList.contains('is-exploded');
            visual.classList.toggle('is-exploded', expanded);
            layerToggle.setAttribute('aria-pressed', String(expanded));
            layerToggle.querySelector('span').textContent = expanded ? 'Collapse System Layers' : 'View System Layers';
        });

        home.querySelectorAll('[data-home-selector]').forEach((selector) => {
            if (selector.dataset.initialized) return;
            const options = selector.querySelector('.home-selector-options');
            const panels = [...selector.querySelectorAll('.home-selector-panel')];
            if (!options || !panels.length) return;
            const status = document.createElement('p');
            status.className = 'visually-hidden';
            status.setAttribute('role', 'status');
            const buttons = panels.map((panel, index) => {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'home-selector-button';
                button.setAttribute('aria-controls', panel.id);
                button.setAttribute('aria-pressed', String(index === 0));
                const number = document.createElement('span');
                number.textContent = String(index + 1).padStart(2, '0');
                number.setAttribute('aria-hidden', 'true');
                const label = document.createElement('span');
                label.textContent = panel.dataset.selectorLabel;
                button.append(number, label);
                return button;
            });
            let activeIndex = 0;
            // An explicit mobile shortcut reveals the selected content without
            // unexpectedly moving the page whenever a visitor compares choices.
            const viewSelection = document.createElement('button');
            viewSelection.type = 'button';
            viewSelection.className = 'btn btn-secondary home-view-selection';
            viewSelection.textContent = 'View selected details ↓';
            viewSelection.addEventListener('click', () => {
                const panel = panels[activeIndex];
                panel.tabIndex = -1;
                panel.focus({ preventScroll: true });
                panel.scrollIntoView({ block: 'start', behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth' });
            });
            const select = (index, announce = true) => {
                if (index === activeIndex) return;
                // A pointer must never hide a panel containing keyboard focus.
                if (panels[activeIndex].contains(document.activeElement)) return;
                panels.forEach((panel, i) => { panel.hidden = i !== index; });
                panels[index].classList.remove('is-switching');
                void panels[index].offsetWidth;
                panels[index].classList.add('is-switching');
                buttons.forEach((button, i) => button.setAttribute('aria-pressed', String(i === index)));
                activeIndex = index;
                viewSelection.setAttribute('aria-controls', panels[index].id);
                if (announce) {
                    const panel = panels[index];
                    status.textContent = panel.dataset.selectorLabel + '. ' + (panel.querySelector('[data-selector-summary]') || panel.querySelector('p')).textContent;
                }
            };
            buttons.forEach((button, index) => {
                button.addEventListener('click', () => select(index));
                button.addEventListener('keydown', (event) => {
                    let next;
                    if (['ArrowRight', 'ArrowDown'].includes(event.key)) next = (index + 1) % buttons.length;
                    else if (['ArrowLeft', 'ArrowUp'].includes(event.key)) next = (index - 1 + buttons.length) % buttons.length;
                    else if (event.key === 'Home') next = 0;
                    else if (event.key === 'End') next = buttons.length - 1;
                    else return;
                    event.preventDefault();
                    buttons[next].focus();
                    select(next);
                });
                if (selector.hasAttribute('data-selector-hover')) {
                    button.addEventListener('pointerenter', (event) => {
                        if (event.pointerType === 'mouse' && finePointer.matches && !selector.contains(document.activeElement)) select(index, false);
                    });
                }
            });
            options.setAttribute('role', 'group');
            options.setAttribute('aria-label', selector.dataset.selectorLabel);
            viewSelection.setAttribute('aria-controls', panels[0].id);
            options.append(...buttons, viewSelection);
            panels.forEach((panel, i) => { panel.hidden = i !== 0; });
            selector.append(status);
            selector.classList.add('is-enhanced');
            options.hidden = false;
            selector.dataset.initialized = 'true';
        });
        // Lightweight pointer depth for selected, high-value surfaces only.
        // The event is ignored unless a desktop fine pointer and motion are allowed.
        const depthAllowed = window.matchMedia('(min-width: 992px) and (hover: hover) and (pointer: fine) and (prefers-reduced-motion: no-preference)');
        home.querySelectorAll('[data-depth-scene]').forEach((scene) => {
            let frame = 0;
            const reset = () => {
                cancelAnimationFrame(frame);
                const target = scene.querySelector('[data-depth-layer], .home-selector-panel:not([hidden])') || scene;
                target.style.transform = '';
            };
            scene.addEventListener('pointermove', (event) => {
                if (!depthAllowed.matches) return reset();
                const bounds = scene.getBoundingClientRect();
                const max = Number(scene.dataset.depthMax || 4);
                const rotateY = ((event.clientX - bounds.left) / bounds.width - .5) * max * 2;
                const rotateX = (.5 - (event.clientY - bounds.top) / bounds.height) * max * 2;
                const target = scene.querySelector('[data-depth-layer], .home-selector-panel:not([hidden])') || scene;
                cancelAnimationFrame(frame);
                frame = requestAnimationFrame(() => {
                    target.style.transform = `perspective(1100px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg)`;
                });
            });
            scene.addEventListener('pointerleave', reset);
            depthAllowed.addEventListener('change', reset);
        });

        // A natural scroll narrative updates one sticky 3D floor; buttons retain
        // complete keyboard and touch access without pinning the viewport.
        const workJourney = home.querySelector('[data-work-journey]');
        if (workJourney && !workJourney.dataset.initialized) {
            const stages = [...workJourney.querySelectorAll('[data-work-stage]')];
            const buttons = stages.map((stage) => stage.querySelector('button'));
            const visual = workJourney.querySelector('.home-work-visual');
            const readout = workJourney.querySelector('[data-work-readout]');
            const callout = workJourney.querySelector('[data-floor-callout]');
            const callouts = ['Existing surface condition', 'Surface test points', 'Moisture test locations', 'Engineered layer preview', 'Optional sample area', 'Preparation and application', 'Finished-floor inspection', 'Care and support'];
            let activeStage = -1;
            let manualStageUntil = 0;
            const activateStage = (index, focus = false, manual = false) => {
                if (index === activeStage || !stages[index]) return;
                if (manual) manualStageUntil = Date.now() + 900;
                activeStage = index;
                visual.dataset.activeStage = String(index);
                stages.forEach((stage, i) => {
                    stage.classList.toggle('is-active', i === index);
                    stage.classList.toggle('is-complete', i < index);
                    buttons[i].setAttribute('aria-pressed', String(i === index));
                });
                readout.textContent = String(index + 1).padStart(2, '0') + ' / ' + stages[index].querySelector('strong').textContent;
                callout.textContent = callouts[index];
                if (focus) buttons[index].focus();
            };
            buttons.forEach((button, index) => {
                button.addEventListener('click', () => activateStage(index, false, true));
                button.addEventListener('keydown', (event) => {
                    let next;
                    if (['ArrowDown', 'ArrowRight'].includes(event.key)) next = Math.min(buttons.length - 1, index + 1);
                    else if (['ArrowUp', 'ArrowLeft'].includes(event.key)) next = Math.max(0, index - 1);
                    else if (event.key === 'Home') next = 0;
                    else if (event.key === 'End') next = buttons.length - 1;
                    else return;
                    event.preventDefault(); activateStage(next, true, true);
                });
            });
            if ('IntersectionObserver' in window) {
                const stageObserver = new IntersectionObserver(() => {
                    if (Date.now() < manualStageUntil) return;
                    const activationLine = window.innerHeight * .4;
                    const nearest = stages.map((stage) => ({ stage, distance: Math.abs(stage.getBoundingClientRect().top - activationLine) })).sort((a, b) => a.distance - b.distance)[0];
                    if (nearest) activateStage(Number(nearest.stage.dataset.workStage));
                }, { rootMargin: '-25% 0px -45% 0px', threshold: [0, .25, .5, .75, 1] });
                stages.forEach((stage) => stageObserver.observe(stage));
            }
            activateStage(0);
            workJourney.dataset.initialized = 'true';
        }

        // Placeholder feedback behaves like the eventual approved testimonial set.
        const feedback = home.querySelector('[data-feedback-selector]');
        if (feedback) {
            const panels = [...feedback.querySelectorAll('.home-feedback-feature')];
            const buttons = [...feedback.querySelectorAll('.home-feedback-support button')];
            const feedbackStatus = document.createElement('p');
            feedbackStatus.className = 'visually-hidden';
            feedbackStatus.setAttribute('role', 'status');
            feedback.append(feedbackStatus);
            const showFeedback = (index, announce = true) => {
                panels.forEach((panel, i) => { panel.hidden = i !== index; });
                buttons.forEach((item, i) => item.setAttribute('aria-pressed', String(i === index)));
                panels[index].classList.remove('is-switching');
                void panels[index].offsetWidth;
                panels[index].classList.add('is-switching');
                if (announce) feedbackStatus.textContent = buttons[index].textContent.trim();
            };
            buttons.forEach((button, index) => {
                button.addEventListener('click', () => showFeedback(index));
                button.addEventListener('keydown', (event) => {
                    let next;
                    if (['ArrowRight', 'ArrowDown'].includes(event.key)) next = (index + 1) % buttons.length;
                    else if (['ArrowLeft', 'ArrowUp'].includes(event.key)) next = (index - 1 + buttons.length) % buttons.length;
                    else if (event.key === 'Home') next = 0;
                    else if (event.key === 'End') next = buttons.length - 1;
                    else return;
                    event.preventDefault();
                    buttons[next].focus();
                    showFeedback(next);
                });
            });
        }
    };

    const start = () => {
        initializeNavigation();
        initializeHero();
        initializeHome();
        // Internal preview chips only: demonstrate selected state, not filtering.
        document.querySelectorAll('[data-preview-chips] .chip:not(:disabled)').forEach((chip) => {
            chip.addEventListener('click', () => {
                chip.setAttribute('aria-pressed', String(chip.getAttribute('aria-pressed') !== 'true'));
            });
        });

        const elements = document.querySelectorAll('.reveal, .reveal-up, .reveal-left, .reveal-right, .scale-in, .reveal-media, .reveal-group, .js-reveal, .js-reveal-mask, .js-reveal-stagger, .js-line-draw, .js-depth-enter');
        if (!elements.length || !('IntersectionObserver' in window)) return;

        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let observer;
        const configure = () => {
            if (observer) observer.disconnect();
            if (reducedMotion.matches) {
                document.documentElement.classList.remove('motion-ready');
                elements.forEach((element) => element.classList.remove('is-revealed'));
                return;
            }
            document.documentElement.classList.add('motion-ready');
            observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-revealed');
                    observer.unobserve(entry.target);
                });
            }, { threshold: 0.01, rootMargin: '0px 0px -4% 0px' });
            elements.forEach((element) => {
                if (element.classList.contains('is-revealed')) return;
                const bounds = element.getBoundingClientRect();
                if (bounds.top < window.innerHeight && bounds.bottom > 0) element.classList.add('is-revealed');
                else observer.observe(element);
            });
        };
        configure();
        reducedMotion.addEventListener('change', configure);
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start, { once: true });
    } else {
        start();
    }
})();
