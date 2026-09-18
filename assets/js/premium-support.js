/* Premium support-page interactions: filter groups, case-study stepper,
 * before/after comparison, gallery lightbox navigation, article progress,
 * schedule-visit stepper, contact validation and the About story selector.
 * Each initializer no-ops when its markup is absent so this file can load
 * on every page from the shared footer include. */
(() => {
    'use strict';

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');

    /* Generic tag filter: [data-filter-bar] chips filter [data-filter-item]s
     * that share the same [data-filter-group]. */
    function initFilterGroups() {
        document.querySelectorAll('[data-filter-group]').forEach((group) => {
            const bar = group.querySelector('[data-filter-bar]');
            const items = [...group.querySelectorAll('[data-filter-item]')];
            const countEl = group.querySelector('[data-filter-count]');
            if (!bar || !items.length) return;
            const chips = [...bar.querySelectorAll('.chip')];

            const apply = (value) => {
                let shown = 0;
                items.forEach((item) => {
                    const tags = (item.dataset.category || '').split(/\s+/);
                    const match = value === 'all' || tags.includes(value);
                    item.hidden = !match;
                    if (match) shown += 1;
                });
                if (countEl) {
                    countEl.innerHTML = `Showing <strong>${shown}</strong> of ${items.length}`;
                }
            };

            chips.forEach((chip) => {
                chip.addEventListener('click', () => {
                    chips.forEach((c) => c.setAttribute('aria-pressed', String(c === chip)));
                    apply(chip.dataset.filter || 'all');
                });
            });

            const active = chips.find((c) => c.getAttribute('aria-pressed') === 'true') || chips[0];
            if (active) apply(active.dataset.filter || 'all');
        });
    }

    /* Tabbed case-study method stepper (Projects listing). */
    function initMethodStepper() {
        document.querySelectorAll('.method-stepper').forEach((stepper) => {
            const tabs = [...stepper.querySelectorAll('.method-tab')];
            const panels = [...stepper.querySelectorAll('.method-panel')];
            if (!tabs.length) return;
            const activate = (index) => {
                tabs.forEach((tab, i) => tab.setAttribute('aria-selected', String(i === index)));
                panels.forEach((panel, i) => panel.classList.toggle('is-active', i === index));
            };
            tabs.forEach((tab, i) => tab.addEventListener('click', () => activate(i)));
            activate(0);
        });
    }

    /* Before/after comparison slider. */
    function initCompareSliders() {
        document.querySelectorAll('.compare-frame').forEach((frame) => {
            const range = frame.querySelector('.compare-range');
            const after = frame.querySelector('.compare-after');
            const line = frame.querySelector('.compare-line');
            const handle = frame.querySelector('.compare-handle');
            if (!range || !after) return;
            const update = () => {
                const value = Number(range.value);
                after.style.clipPath = `inset(0 0 0 ${value}%)`;
                if (line) line.style.left = `${value}%`;
                if (handle) handle.style.left = `${value}%`;
            };
            range.addEventListener('input', update);
            update();
        });
    }

    /* Expandable execution timeline (single panel open at a time). */
    function initTimelines() {
        document.querySelectorAll('.case-timeline').forEach((timeline) => {
            const steps = [...timeline.querySelectorAll('.timeline-step')];
            const panels = [...timeline.querySelectorAll('.timeline-panel')];
            if (!steps.length) return;
            const activate = (index) => {
                steps.forEach((step, i) => step.setAttribute('aria-expanded', String(i === index)));
                panels.forEach((panel, i) => panel.classList.toggle('is-active', i === index));
            };
            steps.forEach((step, i) => step.addEventListener('click', () => activate(i)));
            activate(0);
        });
    }

    /* Related-project/article horizontal scroller with prev/next controls. */
    function initRelatedScrollers() {
        document.querySelectorAll('.related-scroller-wrap').forEach((wrap) => {
            const track = wrap.querySelector('.related-scroller');
            const prev = wrap.querySelector('[data-scroll-prev]');
            const next = wrap.querySelector('[data-scroll-next]');
            if (!track) return;
            const card = track.querySelector('.related-card');
            const step = card ? card.getBoundingClientRect().width + 16 : 300;
            const updateState = () => {
                if (prev) prev.disabled = track.scrollLeft <= 4;
                if (next) next.disabled = track.scrollLeft >= track.scrollWidth - track.clientWidth - 4;
            };
            prev?.addEventListener('click', () => track.scrollBy({ left: -step, behavior: reduced.matches ? 'auto' : 'smooth' }));
            next?.addEventListener('click', () => track.scrollBy({ left: step, behavior: reduced.matches ? 'auto' : 'smooth' }));
            track.addEventListener('scroll', updateState, { passive: true });
            updateState();
        });
    }

    /* Gallery lightbox prev/next + counter on top of the existing dialog. */
    function initGalleryLightboxNav() {
        const page = document.querySelector('.gallery-page');
        const dialog = page?.querySelector('.gallery-dialog');
        if (!page || !dialog) return;
        const tiles = [...page.querySelectorAll('[data-gallery-src]')].filter((t) => !t.hidden);
        const image = dialog.querySelector('img');
        const caption = dialog.querySelector('figcaption');
        const counter = dialog.querySelector('[data-gallery-count]');
        const prevBtn = dialog.querySelector('.gallery-dialog-nav.prev');
        const nextBtn = dialog.querySelector('.gallery-dialog-nav.next');
        let current = 0;

        const show = (index) => {
            const visible = [...page.querySelectorAll('[data-gallery-src]')].filter((t) => !t.hidden);
            if (!visible.length) return;
            current = (index + visible.length) % visible.length;
            const tile = visible[current];
            image.src = tile.dataset.gallerySrc;
            image.alt = tile.dataset.galleryAlt || '';
            caption.textContent = tile.dataset.galleryCaption || '';
            if (counter) counter.textContent = `${current + 1} / ${visible.length}`;
        };

        page.querySelectorAll('[data-gallery-src]').forEach((tile) => {
            tile.addEventListener('click', () => {
                const visible = [...page.querySelectorAll('[data-gallery-src]')].filter((t) => !t.hidden);
                show(visible.indexOf(tile));
            });
        });
        prevBtn?.addEventListener('click', () => show(current - 1));
        nextBtn?.addEventListener('click', () => show(current + 1));
        dialog.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') show(current - 1);
            if (event.key === 'ArrowRight') show(current + 1);
        });
    }

    /* Reading-progress bar for the article/case-study long-form pages. */
    function initReadingProgress() {
        const bar = document.querySelector('[data-reading-progress]');
        const body = document.querySelector('.article-body, .case-narrative');
        if (!bar || !body) return;
        let pending = false;
        const update = () => {
            const rect = body.getBoundingClientRect();
            const total = rect.height - window.innerHeight;
            const scrolled = Math.min(Math.max(-rect.top, 0), Math.max(total, 1));
            bar.style.width = `${Math.min(100, (scrolled / Math.max(total, 1)) * 100)}%`;
            pending = false;
        };
        window.addEventListener('scroll', () => {
            if (!pending) { pending = true; requestAnimationFrame(update); }
        }, { passive: true });
        window.addEventListener('resize', update, { passive: true });
        update();
    }

    /* Contact / schedule-visit: live inline validation on blur. */
    function initFieldValidation() {
        document.querySelectorAll('.support-form').forEach((form) => {
            form.querySelectorAll('.field').forEach((field) => {
                const control = field.querySelector('input, textarea, select');
                if (!control || control.type === 'hidden') return;
                let feedback = field.querySelector('.field-feedback');
                const check = () => {
                    const valid = control.checkValidity();
                    field.dataset.state = control.value.trim() === '' && !control.required ? '' : (valid ? 'valid' : 'invalid');
                    if (!valid) {
                        if (!feedback) {
                            feedback = document.createElement('p');
                            feedback.className = 'field-feedback';
                            control.insertAdjacentElement('afterend', feedback);
                        }
                        feedback.textContent = control.validationMessage;
                        control.setAttribute('aria-invalid', 'true');
                    } else {
                        control.removeAttribute('aria-invalid');
                    }
                };
                control.addEventListener('blur', check);
                control.addEventListener('input', () => { if (field.dataset.state === 'invalid') check(); });
            });
        });
    }

    /* Multi-step Schedule Site Visit form. Progressive enhancement: every
     * fieldset and the submit button already exist in the DOM and validate
     * server-side; JS only layers a guided step-by-step view on top. */
    function initVisitStepper() {
        const form = document.querySelector('[data-visit-form]');
        if (!form) return;
        const steps = [...form.querySelectorAll('.visit-step')];
        const progressItems = [...form.querySelectorAll('.visit-progress-step')];
        const reviewGrid = form.querySelector('[data-visit-review]');
        const submitRow = form.querySelector('[data-visit-submit]');
        const backBtn = form.querySelector('[data-step-back]');
        const nextBtn = form.querySelector('[data-step-next]');
        if (!steps.length) return;
        let current = 0;

        const renderReview = () => {
            if (!reviewGrid) return;
            reviewGrid.innerHTML = '';
            form.querySelectorAll('.visit-step input, .visit-step select, .visit-step textarea').forEach((control) => {
                const label = form.querySelector(`label[for="${control.id}"]`);
                if (!label || control.type === 'hidden') return;
                const value = control.value.trim();
                if (!value) return;
                const row = document.createElement('div');
                row.innerHTML = `<span>${label.textContent.replace('*', '').trim()}</span><strong></strong>`;
                row.querySelector('strong').textContent = value;
                reviewGrid.appendChild(row);
            });
        };

        const show = (index) => {
            current = Math.max(0, Math.min(index, steps.length - 1));
            steps.forEach((step, i) => { step.hidden = i !== current; });
            progressItems.forEach((item, i) => {
                item.setAttribute('aria-current', String(i === current));
                item.classList.toggle('is-done', i < current);
            });
            if (submitRow) submitRow.hidden = current !== steps.length - 1;
            if (nextBtn) nextBtn.hidden = current === steps.length - 1;
            if (backBtn) backBtn.disabled = current === 0;
            if (current === steps.length - 1) renderReview();
            const firstField = steps[current].querySelector('input, select, textarea');
            firstField?.focus({ preventScroll: true });
            form.scrollIntoView({ behavior: reduced.matches ? 'auto' : 'smooth', block: 'start' });
        };

        form.querySelectorAll('[data-step-next]').forEach((button) => {
            button.addEventListener('click', () => {
                const currentStep = steps[current];
                const controls = [...currentStep.querySelectorAll('input, select, textarea')];
                const invalid = controls.find((c) => !c.checkValidity());
                if (invalid) { invalid.reportValidity(); return; }
                show(current + 1);
            });
        });
        form.querySelectorAll('[data-step-back]').forEach((button) => {
            button.addEventListener('click', () => show(current - 1));
        });

        form.classList.add('is-stepped');
        show(0);
    }

    /* About page: interactive story selector swapping a supporting visual. */
    function initStorySelector() {
        document.querySelectorAll('.story-layout').forEach((layout) => {
            const items = [...layout.querySelectorAll('.story-item')];
            const visual = layout.querySelector('.story-visual');
            if (!items.length || !visual) return;
            const label = visual.querySelector('.story-visual-label strong');
            const eyebrow = visual.querySelector('.story-visual-label span');
            const activate = (index) => {
                items.forEach((item, i) => item.setAttribute('aria-selected', String(i === index)));
                const active = items[index];
                if (active.dataset.visual) visual.style.backgroundImage = `url('${active.dataset.visual}')`;
                if (label) label.textContent = active.dataset.label || '';
                if (eyebrow) eyebrow.textContent = active.dataset.eyebrow || '';
            };
            items.forEach((item, i) => {
                item.addEventListener('click', () => activate(i));
                item.addEventListener('focus', () => activate(i));
            });
            activate(0);
        });
    }

    /* About page: accordion-style journey timeline (single step open). */
    function initJourneyTrack() {
        document.querySelectorAll('.journey-track').forEach((track) => {
            const steps = [...track.querySelectorAll('.journey-step')];
            steps.forEach((step) => {
                const head = step.querySelector('.journey-step-head');
                head?.addEventListener('click', () => {
                    const wasOpen = step.getAttribute('aria-expanded') === 'true';
                    steps.forEach((s) => s.setAttribute('aria-expanded', 'false'));
                    step.setAttribute('aria-expanded', String(!wasOpen));
                });
            });
            if (steps[0]) steps[0].setAttribute('aria-expanded', 'true');
        });
    }

    const start = () => {
        initFilterGroups();
        initMethodStepper();
        initCompareSliders();
        initTimelines();
        initRelatedScrollers();
        initGalleryLightboxNav();
        initReadingProgress();
        initFieldValidation();
        initVisitStepper();
        initStorySelector();
        initJourneyTrack();
    };

    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start, { once: true });
    else start();
})();
