(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  if (!home) return;

  const pexels = (id, w = 1800) => `https://images.pexels.com/photos/${id}/pexels-photo-${id}.jpeg?auto=compress&cs=tinysrgb&w=${w}`;
  const unsplash = (id, w = 1800) => `https://images.unsplash.com/${id}?auto=format&fit=crop&w=${w}&q=84`;

  /* Final hero: use a real moving cleaning scene and reshape the existing hero into the approved reference composition. */
  const hero = home.querySelector('.ae-hero');
  if (hero && !hero.querySelector('.ae-hero-video-wrap')) {
    const videoWrap = document.createElement('div');
    videoWrap.className = 'ae-hero-video-wrap';
    videoWrap.setAttribute('aria-hidden', 'true');
    videoWrap.innerHTML = `
      <video class="ae-hero-video" autoplay muted loop playsinline preload="metadata">
        <source src="https://videos.pexels.com/video-files/13422071/13422071-uhd_3840_2160_30fps.mp4" type="video/mp4">
      </video>`;
    hero.prepend(videoWrap);

    const eyebrow = hero.querySelector('.ae-hero-eyebrow');
    const title = hero.querySelector('.ae-hero-title');
    const lead = hero.querySelector('.ae-hero-lead');
    const primary = hero.querySelector('.ae-hero-primary');
    const secondary = hero.querySelector('.ae-hero-secondary');

    if (eyebrow) eyebrow.textContent = 'Industrial Flooring for a Stronger Tomorrow';
    if (title) title.innerHTML = '<span>Floors That</span> <span>Power Industry</span>';
    if (lead) lead.textContent = 'High-performance industrial flooring systems for safer, cleaner and more productive spaces.';
    if (primary) primary.firstChild.textContent = 'Schedule Site Visit ';
    if (secondary) {
      secondary.href = '#flooring-solutions';
      secondary.innerHTML = 'Watch Our Story';
    }

    const side = document.createElement('div');
    side.className = 'ae-hero-side-message';
    side.innerHTML = 'Tougher<br>Cleaner<br>Safer<br>For a Brighter<br>Tomorrow';
    hero.appendChild(side);

    const benefits = document.createElement('div');
    benefits.className = 'ae-hero-benefits';
    benefits.setAttribute('aria-label', 'Flooring benefits');
    benefits.innerHTML = `
      <div class="ae-hero-benefit">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.5-2.7 7.9-7 10-4.3-2.1-7-5.5-7-10V6l7-3z"/><path d="M9 12l2 2 4-5"/></svg>
        <span>Longer<br>Life</span>
      </div>
      <div class="ae-hero-benefit">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M12 2v3m0 14v3M4.9 4.9L7 7m10 10l2.1 2.1M2 12h3m14 0h3M4.9 19.1L7 17m10-10 2.1-2.1"/></svg>
        <span>Lower<br>Maintenance</span>
      </div>
      <div class="ae-hero-benefit">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V10h4v10M10 20V6h4v14M16 20V3h4v17"/><path d="M3 7l5-3 4 2 7-4"/></svg>
        <span>Higher<br>Productivity</span>
      </div>`;
    hero.appendChild(benefits);

    const status = document.createElement('div');
    status.className = 'ae-hero-video-status';
    status.textContent = 'Floor care in motion';
    hero.appendChild(status);
  }

  /* Industries: distinct, recognisable environments. */
  const industryImages = {
    manufacturing: [unsplash('photo-1565793298595-6a879b1d9492'), 'Manufacturing production floor with active machinery'],
    pharma: [pexels(2280571), 'Pharmaceutical and laboratory controlled environment'],
    'food-beverage': [pexels(616401), 'Food production and preparation environment'],
    electronics: [unsplash('photo-1518770660439-4636190af475'), 'Electronics production and technology environment'],
    automobile: [pexels(4489732), 'Automobile workshop and production environment'],
    'warehouses-logistics': [unsplash('photo-1586528116311-ad8dd3c8310d'), 'Warehouse and logistics operating environment'],
    'hospitals-healthcare': [unsplash('photo-1586773860418-d37222d8fce3'), 'Healthcare facility and clinical environment'],
    'data-centres': [unsplash('photo-1558494949-ef010cbdcc31'), 'Data centre with server racks and controlled access']
  };

  Object.entries(industryImages).forEach(([slug, [src, label]]) => {
    const media = document.querySelector(`#industry-${slug} .home-demo-media`);
    if (!media) return;
    media.style.setProperty('background-image', `url("${src}")`, 'important');
    media.setAttribute('role', 'img');
    media.setAttribute('aria-label', label);
    let motion = media.querySelector('.industry-motion');
    if (!motion) {
      motion = document.createElement('span');
      motion.className = 'industry-motion';
      motion.setAttribute('aria-hidden', 'true');
      media.appendChild(motion);
    }
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
      layer.innerHTML = '<span class="real-photo-effect" aria-hidden="true"></span><span class="real-photo-label"></span>';
      target.appendChild(layer);
    }
    layer.style.backgroundImage = `url("${state.src}")`;
    layer.setAttribute('role', 'img');
    layer.setAttribute('aria-label', state.alt);
    const effect = layer.querySelector('.real-photo-effect');
    effect.className = `real-photo-effect ${state.effect || 'fx-scan'}`;
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
    host: home.querySelector('.operation-scene-wrap'),
    target: home.querySelector('.operation-scene-wrap .operation-scene'),
    attribute: 'data-operation-state',
    states: [
      { src: unsplash('photo-1586528116311-ad8dd3c8310d'), alt: 'Warehouse floor supporting active material movement.', label: 'Minimum disruption · keep movement routes working', effect: 'fx-route' },
      { src: pexels(3862365), alt: 'Industrial worker carrying out a controlled site activity.', label: 'Quality-controlled execution · checkpoints during the work', effect: 'fx-focus' },
      { src: unsplash('photo-1541888946425-d81bb19240f5'), alt: 'Trained construction team working together on site.', label: 'Trained application team · coordinated people on site', effect: 'fx-team' },
      { src: unsplash('photo-1521737604893-d14cc237f11d'), alt: 'Service team discussing project follow-up and support.', label: 'Support beyond installation · inspection and follow-up', effect: 'fx-support' }
    ]
  });

  bind({
    host: home.querySelector('.assessment-lab-stage'),
    target: home.querySelector('.assessment-lab-stage .lab-scene'),
    attribute: 'data-lab-state',
    states: [
      { src: unsplash('photo-1586528116311-ad8dd3c8310d'), alt: 'Industrial floor surface being reviewed for condition and wear.', label: '01 · Surface condition — inspect wear, cracks and the existing finish', effect: 'fx-scan' },
      { src: pexels(2280571), alt: 'Technical testing equipment used to understand material condition.', label: '02 · Moisture / site assessment — identify conditions before selection', effect: 'fx-moisture' },
      { src: unsplash('photo-1565793298595-6a879b1d9492'), alt: 'Working manufacturing environment with machinery and traffic.', label: '03 · Operating environment — understand loads, traffic and exposure', effect: 'fx-route' },
      { src: unsplash('photo-1450101499163-c8848c66ca85'), alt: 'Technical documents being reviewed for system selection.', label: '04 · Correct system selection — bring the assessment together', effect: 'fx-docs' },
      { src: pexels(3862365), alt: 'Professional industrial application work taking place on site.', label: '05 · Controlled application — preparation, application and checks', effect: 'fx-apply' },
      { src: unsplash('photo-1586528116311-ad8dd3c8310d'), alt: 'Finished industrial floor reviewed after completion.', label: '06 · Final inspection — review completed work against scope', effect: 'fx-focus' }
    ]
  });

  /* How We Work uses a dedicated video layer (home-work-video-final.js).
   * Do not mount a competing static photo in this scene. */

  bind({
    host: home.querySelector('.care-stage'),
    target: home.querySelector('.care-stage .care-scene'),
    attribute: 'data-care-state',
    states: [
      { src: unsplash('photo-1581578731548-c64695cc6952'), alt: 'Professional cleaning and floor maintenance activity.', label: 'Maintenance Guidance · cleaning and care suited to the installed system', effect: 'fx-clean' },
      { src: unsplash('photo-1586528116311-ad8dd3c8310d'), alt: 'Industrial floor condition reviewed during a support visit.', label: 'Inspection Support · review floor condition when needed', effect: 'fx-scan' },
      { src: unsplash('photo-1450101499163-c8848c66ca85'), alt: 'Project documentation used for warranty communication.', label: 'Warranty Communication · project-specific terms and records', effect: 'fx-docs' },
      { src: unsplash('photo-1521737604893-d14cc237f11d'), alt: 'Service team discussing ongoing facility support.', label: 'Service Support · stay connected as requirements evolve', effect: 'fx-support' }
    ]
  });
})();