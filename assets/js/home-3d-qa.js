(() => {
    'use strict';
    const home = document.querySelector('.home-page .home-main');
    if (!home) return;
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    const scenes = [
        ['.diagnostic-stage', 'data-problem-state'],
        ['.system-visual', 'data-system-state'],
        ['.operation-scene-wrap', 'data-operation-state'],
        ['.assessment-lab-stage', 'data-lab-state'],
        ['.care-stage', 'data-care-state'],
        ['.home-work-visual', 'data-active-stage'],
    ];

    scenes.forEach(([selector, attribute]) => {
        const scene = home.querySelector(selector);
        if (!scene) return;
        let timer = 0;
        const observer = new MutationObserver((changes) => {
            if (!changes.some((change) => change.attributeName === attribute)) return;
            if (reduced.matches) return;
            window.clearTimeout(timer);
            scene.classList.remove('is-state-changing');
            void scene.offsetWidth;
            scene.classList.add('is-state-changing');
            timer = window.setTimeout(() => scene.classList.remove('is-state-changing'), 480);
        });
        observer.observe(scene, { attributes: true, attributeFilter: [attribute] });
    });

    /* Keep the generic system layer inspection understandable when the visitor changes systems. */
    const system = home.querySelector('.system-visual');
    if (system) {
        const systemObserver = new MutationObserver((changes) => {
            if (!changes.some((change) => change.attributeName === 'data-system-state')) return;
            if (!system.classList.contains('is-exploded')) return;
            system.classList.remove('is-exploded');
            const toggle = system.querySelector('.system-layers-toggle');
            if (toggle) {
                toggle.setAttribute('aria-pressed', 'false');
                const label = toggle.querySelector('span');
                if (label) label.textContent = 'View System Layers';
            }
        });
        systemObserver.observe(system, { attributes: true, attributeFilter: ['data-system-state'] });
    }
})();
