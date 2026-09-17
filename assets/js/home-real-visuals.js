(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  if (!home) return;

  const imageUrl = (id, w = 1600) => `https://images.unsplash.com/${id}?auto=format&fit=crop&w=${w}&q=82`;

  /* Industries: use the existing media box so no layout/background/card styling changes. */
  const industryImages = {
    manufacturing: [imageUrl('photo-1504917595217-d4dc5ebe6122'), 'Manufacturing / production environment'],
    pharma: [imageUrl('photo-1532187863486-abf9dbad1b69'), 'Pharmaceutical / controlled environment'],
    'food-beverage': [imageUrl('photo-1556909114-f6e7ad7d3136'), 'Food processing / production environment'],
    electronics: [imageUrl('photo-1518770660439-4636190af475'), 'Electronics manufacturing environment'],
    automobile: [imageUrl('photo-1487754180451-c456f719a1fc'), 'Automobile workshop / production environment'],
    'warehouses-logistics': [imageUrl('photo-1586528116311-ad8dd3c8310d'), 'Warehouse and logistics environment'],
    'hospitals-healthcare': [imageUrl('photo-1586773860418-d37222d8fce3'), 'Healthcare facility environment'],
    'data-centres': [imageUrl('photo-1558494949-ef010cbdcc31'), 'Data centre / server environment']
  };

  Object.entries(industryImages).forEach(([slug, [src, label]]) => {
    const media = document.querySelector(`#industry-${slug} .home-demo-media`);
    if (!media) return;
    media.style.setProperty('background-image', `url("${src}")`, 'important');
    media.setAttribute('role', 'img');
    media.setAttribute('aria-label', label);
    media.querySelectorAll('.industry-real-photo, .industry-photo-label, .industry-photo-motion').forEach((node) => node.remove());
    let caption = media.querySelector('.industry-context-label');
    if (!caption) {
      caption = document.createElement('span');
      caption.className = 'industry-context-label';
      media.appendChild(caption);
    }
    caption.textContent = label;
  });

  const mountPhoto = (target, state) => {
    if (!target || !state) return;
    target.classList.add('has-real-photo');
    let layer = target.querySelector(':scope > .real-photo-fill');
    if (!layer) {
      layer = document.createElement('div');
      layer.className = 'real-photo-fill';
      layer.innerHTML = '<span class="real-photo-scan" aria-hidden="true"></span><span class="real-photo-label"></span>';
      target.appendChild(layer);
    }
    layer.style.backgroundImage = `url("${state.src}")`;
    layer.setAttribute('role', 'img');
    layer.setAttribute('aria-label', state.alt);
    layer.querySelector('.real-photo-label').textContent = state.label;
    layer.classList.remove('is-changing');
    void layer.offsetWidth;
    layer.classList.add('is-changing');
  };

  const bind = ({ host, target, attribute, states }) => {
    if (!host || !target || !states.length) return;
    const render = () => {
      const raw = Number(host.getAttribute(attribute));
      const index = Number.isFinite(raw) ? Math.max(0, Math.min(states.length - 1, raw)) : 0;
      mountPhoto(target, states[index]);
    };
    new MutationObserver(render).observe(host, { attributes: true, attributeFilter: [attribute] });
    render();
  };

  bind({
    host: document.querySelector('.operation-scene-wrap'),
    target: document.querySelector('.operation-scene-wrap .operation-scene'),
    attribute: 'data-operation-state',
    states: [
      { src: imageUrl('photo-1504917595217-d4dc5ebe6122'), alt: 'Active industrial production environment.', label: 'Production continues around the floor plan' },
      { src: imageUrl('photo-1503387762-592deb58ef4e'), alt: 'Construction and quality inspection activity.', label: 'Quality checks during controlled execution' },
      { src: imageUrl('photo-1504307651254-35680f356dfd'), alt: 'Trained worker in an industrial construction environment.', label: 'Trained application team on site' },
      { src: imageUrl('photo-1450101499163-c8848c66ca85'), alt: 'Service planning and project documentation.', label: 'Inspection, maintenance guidance and follow-up' }
    ]
  });

  bind({
    host: document.querySelector('.assessment-lab-stage'),
    target: document.querySelector('.assessment-lab-stage .lab-scene'),
    attribute: 'data-lab-state',
    states: [
      { src: imageUrl('photo-1503387762-592deb58ef4e'), alt: 'Existing industrial surface being reviewed.', label: '01 · Inspect the existing surface condition' },
      { src: imageUrl('photo-1532187863486-abf9dbad1b69'), alt: 'Technical testing in a laboratory environment.', label: '02 · Review moisture and site conditions' },
      { src: imageUrl('photo-1586528116311-ad8dd3c8310d'), alt: 'Warehouse operating environment with traffic routes.', label: '03 · Understand traffic, loads and exposure' },
      { src: imageUrl('photo-1450101499163-c8848c66ca85'), alt: 'Technical planning and specification discussion.', label: '04 · Bring findings together for system selection' },
      { src: imageUrl('photo-1504307651254-35680f356dfd'), alt: 'Professional site application work.', label: '05 · Plan controlled preparation and application' },
      { src: imageUrl('photo-1503387762-592deb58ef4e'), alt: 'Completed work being reviewed on site.', label: '06 · Inspect the finished work against the agreed scope' }
    ]
  });

  bind({
    host: document.querySelector('.home-work-visual'),
    target: document.querySelector('.home-work-visual .floor-scene'),
    attribute: 'data-active-stage',
    states: [
      { src: imageUrl('photo-1503387762-592deb58ef4e'), alt: 'Initial site survey in an industrial facility.', label: 'Site Survey · understand the working area first' },
      { src: imageUrl('photo-1532187863486-abf9dbad1b69'), alt: 'Technical testing and measurement.', label: 'Surface Testing · evaluate the existing floor' },
      { src: imageUrl('photo-1532187863486-abf9dbad1b69'), alt: 'Technical testing equipment in use.', label: 'Moisture Testing · check relevant site conditions' },
      { src: imageUrl('photo-1450101499163-c8848c66ca85'), alt: 'Project recommendation and technical planning.', label: 'Recommendation · agree the system approach and scope' },
      { src: imageUrl('photo-1504307651254-35680f356dfd'), alt: 'Small-area construction application and review.', label: 'Mock-up · review a sample where required' },
      { src: imageUrl('photo-1504307651254-35680f356dfd'), alt: 'Professional installation work on site.', label: 'Installation · coordinated preparation and application' },
      { src: imageUrl('photo-1503387762-592deb58ef4e'), alt: 'Site inspection following installation.', label: 'Inspection · review completed work' },
      { src: imageUrl('photo-1450101499163-c8848c66ca85'), alt: 'Maintenance guidance and aftercare discussion.', label: 'Aftercare · maintenance and warranty communication' }
    ]
  });

  bind({
    host: document.querySelector('.care-stage'),
    target: document.querySelector('.care-stage .care-scene'),
    attribute: 'data-care-state',
    states: [
      { src: imageUrl('photo-1586773860418-d37222d8fce3'), alt: 'Clean maintained commercial facility floor.', label: 'Maintenance Guidance · care suited to the installed system' },
      { src: imageUrl('photo-1503387762-592deb58ef4e'), alt: 'Floor condition inspection on site.', label: 'Inspection Support · review floor condition when needed' },
      { src: imageUrl('photo-1450101499163-c8848c66ca85'), alt: 'Project warranty and service documentation.', label: 'Warranty Communication · project-specific terms' },
      { src: imageUrl('photo-1521737604893-d14cc237f11d'), alt: 'Service team discussing ongoing facility support.', label: 'Service Support · stay connected as requirements evolve' }
    ]
  });
})();
