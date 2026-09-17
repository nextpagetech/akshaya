(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  if (!home) return;

  const img = (id, w = 1600) => `https://images.unsplash.com/${id}?auto=format&fit=crop&w=${w}&q=82`;

  /* Industries: insert an explicit photo layer so older client-photo CSS cannot win. */
  const industryImages = {
    'manufacturing': [img('photo-1504917595217-d4dc5ebe6122'), 'Manufacturing / production floor'],
    'pharma': [img('photo-1532187863486-abf9dbad1b69'), 'Pharmaceutical / controlled laboratory environment'],
    'food-beverage': [img('photo-1556909114-f6e7ad7d3136'), 'Food processing / production environment'],
    'electronics': [img('photo-1518770660439-4636190af475'), 'Electronics manufacturing environment'],
    'automobile': [img('photo-1487754180451-c456f719a1fc'), 'Automobile workshop / production environment'],
    'warehouses-logistics': [img('photo-1586528116311-ad8dd3c8310d'), 'Warehouse and logistics environment'],
    'hospitals-healthcare': [img('photo-1586773860418-d37222d8fce3'), 'Healthcare facility environment'],
    'data-centres': [img('photo-1558494949-ef010cbdcc31'), 'Data centre / server environment']
  };

  Object.entries(industryImages).forEach(([slug, [src, label]]) => {
    const panel = document.getElementById(`industry-${slug}`);
    const media = panel?.querySelector('.home-media');
    if (!media) return;
    media.querySelector('.industry-real-photo')?.remove();
    const layer = document.createElement('div');
    layer.className = 'industry-real-photo';
    layer.style.backgroundImage = `url("${src}")`;
    layer.setAttribute('role', 'img');
    layer.setAttribute('aria-label', label);
    layer.innerHTML = `<span class="industry-photo-motion" aria-hidden="true"></span><span class="industry-photo-label">${label}</span>`;
    media.appendChild(layer);
  });

  const createScene = (host, className) => {
    if (!host) return null;
    let scene = host.querySelector(`.${className}`);
    if (!scene) {
      scene = document.createElement('div');
      scene.className = `real-scene ${className}`;
      scene.innerHTML = '<span class="real-scene-motion" aria-hidden="true"></span><span class="real-scene-label"></span>';
      host.prepend(scene);
    }
    return scene;
  };

  const bindStateScene = ({ host, sceneClass, attribute, states }) => {
    if (!host) return;
    const scene = createScene(host, sceneClass);
    if (!scene) return;
    const label = scene.querySelector('.real-scene-label');
    const render = () => {
      const raw = Number(host.getAttribute(attribute));
      const index = Number.isFinite(raw) ? Math.max(0, Math.min(states.length - 1, raw)) : 0;
      const state = states[index];
      scene.style.backgroundImage = `url("${state.src}")`;
      scene.setAttribute('role', 'img');
      scene.setAttribute('aria-label', state.alt);
      label.textContent = state.label;
      scene.dataset.visualState = String(index);
      scene.classList.remove('is-changing');
      void scene.offsetWidth;
      scene.classList.add('is-changing');
    };
    new MutationObserver(render).observe(host, { attributes: true, attributeFilter: [attribute] });
    render();
  };

  bindStateScene({
    host: document.querySelector('.operation-scene-wrap'),
    sceneClass: 'real-scene--operation',
    attribute: 'data-operation-state',
    states: [
      { src: img('photo-1504917595217-d4dc5ebe6122'), alt: 'Active industrial production environment.', label: 'Production continues around the floor plan' },
      { src: img('photo-1503387762-592deb58ef4e'), alt: 'Construction and quality inspection activity.', label: 'Quality checks during controlled execution' },
      { src: img('photo-1504307651254-35680f356dfd'), alt: 'Trained worker in an industrial construction environment.', label: 'Trained application team on site' },
      { src: img('photo-1450101499163-c8848c66ca85'), alt: 'Service planning and project documentation.', label: 'Inspection, maintenance guidance and follow-up' }
    ]
  });

  bindStateScene({
    host: document.querySelector('.assessment-lab-stage'),
    sceneClass: 'real-scene--assessment',
    attribute: 'data-lab-state',
    states: [
      { src: img('photo-1503387762-592deb58ef4e'), alt: 'Existing industrial surface being reviewed.', label: '01 · Inspect the existing surface condition' },
      { src: img('photo-1532187863486-abf9dbad1b69'), alt: 'Technical testing in a laboratory environment.', label: '02 · Review moisture and site conditions' },
      { src: img('photo-1586528116311-ad8dd3c8310d'), alt: 'Warehouse operating environment with traffic routes.', label: '03 · Understand traffic, loads and exposure' },
      { src: img('photo-1450101499163-c8848c66ca85'), alt: 'Technical planning and specification discussion.', label: '04 · Bring findings together for system selection' },
      { src: img('photo-1504307651254-35680f356dfd'), alt: 'Professional site application work.', label: '05 · Plan controlled surface preparation and application' },
      { src: img('photo-1503387762-592deb58ef4e'), alt: 'Completed work being reviewed on site.', label: '06 · Inspect the finished work against the agreed scope' }
    ]
  });

  bindStateScene({
    host: document.querySelector('.home-work-visual'),
    sceneClass: 'real-scene--journey',
    attribute: 'data-active-stage',
    states: [
      { src: img('photo-1503387762-592deb58ef4e'), alt: 'Initial site survey in an industrial facility.', label: 'Site Survey · understand the working area first' },
      { src: img('photo-1532187863486-abf9dbad1b69'), alt: 'Technical testing and measurement.', label: 'Surface Testing · evaluate the existing floor' },
      { src: img('photo-1532187863486-abf9dbad1b69'), alt: 'Technical testing equipment in use.', label: 'Moisture Testing · check relevant site conditions' },
      { src: img('photo-1450101499163-c8848c66ca85'), alt: 'Project recommendation and technical planning.', label: 'Recommendation · agree the system approach and scope' },
      { src: img('photo-1504307651254-35680f356dfd'), alt: 'Small-area construction application and review.', label: 'Mock-up · review a sample where the project calls for it' },
      { src: img('photo-1504307651254-35680f356dfd'), alt: 'Professional installation work on site.', label: 'Installation · coordinated preparation and application' },
      { src: img('photo-1503387762-592deb58ef4e'), alt: 'Site inspection following installation.', label: 'Inspection · review completed work' },
      { src: img('photo-1450101499163-c8848c66ca85'), alt: 'Maintenance guidance and aftercare discussion.', label: 'Aftercare · warranty communication and maintenance tips' }
    ]
  });

  bindStateScene({
    host: document.querySelector('.care-stage'),
    sceneClass: 'real-scene--care',
    attribute: 'data-care-state',
    states: [
      { src: img('photo-1586773860418-d37222d8fce3'), alt: 'Clean maintained commercial facility floor.', label: 'Maintenance Guidance · care suited to the installed system' },
      { src: img('photo-1503387762-592deb58ef4e'), alt: 'Floor condition inspection on site.', label: 'Inspection Support · review the floor condition when needed' },
      { src: img('photo-1450101499163-c8848c66ca85'), alt: 'Project warranty and service documentation.', label: 'Warranty Communication · terms remain project-specific' },
      { src: img('photo-1521737604893-d14cc237f11d'), alt: 'Service team discussing ongoing facility support.', label: 'Service Support · stay connected as requirements evolve' }
    ]
  });
})();
