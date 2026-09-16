/* Cross-site interaction QA: restrained inner-page technical depth. Navigation remains owned by main.js. */
(() => {
    'use strict';

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)');

    const addPointerDepth = (element, xVar, yVar, maxX = 2.4, maxY = 3.6) => {
        if (!element || element.dataset.depthQaReady) return;
        let frame = 0;
        const reset = () => {
            cancelAnimationFrame(frame);
            element.style.setProperty(xVar, '0deg');
            element.style.setProperty(yVar, '0deg');
        };
        element.addEventListener('pointermove', (event) => {
            if (!finePointer.matches || reducedMotion.matches) return reset();
            const bounds = element.getBoundingClientRect();
            const nx = ((event.clientX - bounds.left) / bounds.width - .5) * 2;
            const ny = ((event.clientY - bounds.top) / bounds.height - .5) * 2;
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(() => {
                element.style.setProperty(xVar, `${(-ny * maxX).toFixed(2)}deg`);
                element.style.setProperty(yVar, `${(nx * maxY).toFixed(2)}deg`);
            });
        }, { passive: true });
        element.addEventListener('pointerleave', reset);
        reducedMotion.addEventListener('change', reset);
        element.dataset.depthQaReady = 'true';
    };

    const initializeServiceExperience = () => {
        const page = document.querySelector('.service-page');
        const media = page?.querySelector('.service-hero-media');
        if (!page || !media || page.dataset.serviceExperienceReady) return;
        addPointerDepth(media, '--detail-rx', '--detail-ry');
        const toggle = document.createElement('button');
        toggle.type = 'button';
        toggle.className = 'detail-layer-toggle';
        toggle.setAttribute('aria-pressed', 'false');
        toggle.textContent = 'Explore system layers';
        toggle.addEventListener('click', () => {
            const expanded = !media.classList.contains('is-exploded');
            media.classList.toggle('is-exploded', expanded);
            toggle.setAttribute('aria-pressed', String(expanded));
            toggle.textContent = expanded ? 'Collapse system layers' : 'Explore system layers';
        });
        media.append(toggle);
        [...page.querySelectorAll('.service-problem, .service-benefit, .service-assessment-step')].forEach((item, index) => {
            item.addEventListener('pointerenter', () => {
                if (!finePointer.matches) return;
                media.style.setProperty('--detail-shift', `${-(index % 4) * 4}px`);
            });
        });
        page.dataset.serviceExperienceReady = 'true';
    };

    const initializeIndustryExperience = () => {
        const page = document.querySelector('.industry-page');
        const media = page?.querySelector('.industry-hero-media');
        if (!page || !media || page.dataset.industryExperienceReady) return;
        addPointerDepth(media, '--industry-rx', '--industry-ry', 2.2, 3.2);
        media.dataset.envState = '0';
        const labels = [
            ['Surface', 'Review the existing floor condition'],
            ['Traffic', 'Understand movement and working loads'],
            ['Exposure', 'Consider cleaning and operating exposure'],
            ['Access', 'Plan around shutdown and site access'],
        ];
        const controls = document.createElement('div');
        controls.className = 'industry-visual-controls';
        controls.setAttribute('aria-label', 'Explore facility assessment factors');
        labels.forEach(([label, description], index) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = label;
            button.setAttribute('aria-pressed', String(index === 0));
            button.setAttribute('aria-label', `${label}: ${description}`);
            button.addEventListener('click', () => {
                media.dataset.envState = String(index);
                controls.querySelectorAll('button').forEach((item, i) => item.setAttribute('aria-pressed', String(i === index)));
            });
            controls.append(button);
        });
        media.append(controls);
        page.querySelectorAll('.industry-zone, .industry-solution').forEach((item, index) => {
            item.addEventListener('pointerenter', () => {
                if (!finePointer.matches) return;
                const state = index % 4;
                media.dataset.envState = String(state);
                controls.querySelectorAll('button').forEach((button, i) => button.setAttribute('aria-pressed', String(i === state)));
            });
        });
        page.dataset.industryExperienceReady = 'true';
    };

    const start = () => {
        initializeServiceExperience();
        initializeIndustryExperience();
    };
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start, { once: true });
    else start();
})();
