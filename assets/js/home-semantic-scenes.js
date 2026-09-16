(() => {
    'use strict';
    const home = document.querySelector('.home-page .home-main');
    if (!home) return;

    const labels = {
        problem: ['Crack mapping','Wear & dust zone','Coating delamination','Grounding path','Seamless hygiene zone','Moisture ingress'],
        system: ['Seamless resin finish','Resilient PU build-up','Conductive grounding network','Insulating dielectric layer','Modular PVC surface','Floor-to-wall continuity','Protected membrane layer','Dense monolithic finish'],
        operation: ['Phased work & movement route','Quality checkpoints','Application team workflow','Post-installation support'],
        lab: ['Surface condition mapping','Moisture assessment','Operating environment','System build-up','Application sequence','Final inspection'],
        work: ['Site survey','Surface testing','Moisture & condition review','System recommendation','Mock-up confirmation','Preparation & installation','Final inspection','Aftercare & support'],
        care: ['Maintenance guidance','Inspection support','Warranty communication','Service support']
    };

    const createScene = (host, target, type, attribute) => {
        if (!host || !target || target.querySelector(':scope > .semantic-scene')) return;
        const layer = document.createElement('div');
        layer.className = `semantic-scene semantic-scene--${type}`;
        layer.setAttribute('aria-hidden', 'true');
        layer.innerHTML = `
            <span class="ss-label"></span>
            <span class="ss-plane"></span>
            <span class="ss-plane2"></span>
            <span class="ss-route"></span>
            <span class="ss-node ss-node--a"></span>
            <span class="ss-node ss-node--b"></span>
            <span class="ss-node ss-node--c"></span>
            <span class="ss-tool"></span>`;
        target.appendChild(layer);

        const update = () => {
            const raw = host.getAttribute(attribute) ?? '0';
            const state = Number.parseInt(raw, 10) || 0;
            layer.dataset.semanticState = String(state);
            const label = labels[type]?.[state] || labels[type]?.[0] || '';
            layer.querySelector('.ss-label').textContent = label;
        };
        update();
        new MutationObserver((records) => {
            if (records.some((record) => record.attributeName === attribute)) update();
        }).observe(host, { attributes: true, attributeFilter: [attribute] });
    };

    createScene(home.querySelector('.diagnostic-stage'), home.querySelector('.diagnostic-floor'), 'problem', 'data-problem-state');
    createScene(home.querySelector('.system-visual'), home.querySelector('.system-scene'), 'system', 'data-system-state');
    createScene(home.querySelector('.operation-scene-wrap'), home.querySelector('.operation-scene'), 'operation', 'data-operation-state');
    createScene(home.querySelector('.assessment-lab-stage'), home.querySelector('.lab-scene'), 'lab', 'data-lab-state');
    createScene(home.querySelector('.home-work-visual'), home.querySelector('.floor-scene'), 'work', 'data-active-stage');
    createScene(home.querySelector('.care-stage'), home.querySelector('.care-scene'), 'care', 'data-care-state');
})();
