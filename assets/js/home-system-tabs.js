(() => {
  'use strict';

  const root = document.querySelector('.home-page [data-system-explorer]');
  const stage = root?.querySelector('.system-visual');
  if (!root || !stage || stage.querySelector('.system-media-card')) return;

  const currentScript = document.currentScript;
  const asset = (path) => currentScript?.src ? new URL(`../../${path}`, currentScript.src).href : path;

  const systems = [
    {
      title: 'Epoxy Flooring',
      badge: 'Seamless resin finish',
      image: 'website_assets/Epoxy Coating Pics/IMG20190904110926.jpg',
      effect: 'gloss'
    },
    {
      title: 'PU Flooring',
      badge: 'Resilient working surface',
      image: 'website_assets/Selected Pics from _23/038.JPG',
      effect: 'pu'
    },
    {
      title: 'ESD / Antistatic Flooring',
      badge: 'Static-control environment',
      image: 'website_assets/Amritha Tools/IMG-20190721-WA0004.jpg',
      effect: 'esd'
    },
    {
      title: 'Dielectric Flooring',
      badge: 'Electrical insulation zone',
      image: 'website_assets/Selected Pics from _23/045.JPG',
      effect: 'shield'
    },
    {
      title: 'PVC Flooring',
      badge: 'Modular / sheet finish',
      image: 'website_assets/Selected Pics from _23/122.JPG',
      effect: 'pvc'
    },
    {
      title: 'Clean Room Wall Coating',
      badge: 'Cleanable controlled surface',
      image: 'website_assets/Epoxy Coating Pics/IMG20190903135838.jpg',
      effect: 'clean'
    },
    {
      title: 'Waterproofing',
      badge: 'Moisture protection',
      image: 'website_assets/Selected Pics from _23/080720091213.jpg',
      effect: 'water'
    },
    {
      title: 'VDF Flooring',
      badge: 'Industrial traffic surface',
      image: 'website_assets/Selected Pics from _23/060820091425.jpg',
      effect: 'vdf'
    }
  ];

  const fx = {
    gloss: '<span class="fx-gloss"></span>',
    pu: '<span class="fx-pu"></span>',
    esd: '<span class="fx-esd-grid"></span><span class="fx-esd-line"></span>',
    shield: '<span class="fx-shield"></span>',
    pvc: '<span class="fx-pvc"></span>',
    clean: '<span class="fx-clean"></span>',
    water: '<span class="fx-water-drop"></span><span class="fx-water-ripple"></span>',
    vdf: '<span class="fx-vdf-route"></span>'
  };

  const card = document.createElement('div');
  card.className = 'system-media-card';
  card.innerHTML = `
    <img class="system-media-image" alt="" decoding="async">
    <div class="system-media-effect" aria-hidden="true"></div>
    <div class="system-media-copy">
      <div>
        <span class="system-media-kicker">Selected flooring system</span>
        <h3 class="system-media-title"></h3>
      </div>
      <span class="system-media-badge"></span>
    </div>
  `;
  stage.appendChild(card);

  const image = card.querySelector('.system-media-image');
  const title = card.querySelector('.system-media-title');
  const badge = card.querySelector('.system-media-badge');
  const effect = card.querySelector('.system-media-effect');

  let active = -1;
  let loadToken = 0;
  const render = () => {
    const index = Math.max(0, Math.min(systems.length - 1, Number(stage.getAttribute('data-system-state')) || 0));
    if (index === active) return;
    active = index;
    const system = systems[index];
    const token = ++loadToken;

    card.classList.add('is-changing');
    const next = new Image();
    next.decoding = 'async';
    next.onload = () => {
      if (token !== loadToken) return;
      image.src = next.src;
      image.alt = `${system.title} reference image`;
      title.textContent = system.title;
      badge.textContent = system.badge;
      effect.innerHTML = fx[system.effect] || '';
      requestAnimationFrame(() => card.classList.remove('is-changing'));
    };
    next.onerror = () => {
      if (token !== loadToken) return;
      title.textContent = system.title;
      badge.textContent = system.badge;
      effect.innerHTML = fx[system.effect] || '';
      card.classList.remove('is-changing');
    };
    next.src = asset(system.image);
  };

  const observer = new MutationObserver(render);
  observer.observe(stage, { attributes: true, attributeFilter: ['data-system-state'] });
  render();
})();
