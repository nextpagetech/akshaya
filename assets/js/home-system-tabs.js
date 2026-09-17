(() => {
  'use strict';

  const root = document.querySelector('.home-page [data-system-explorer]');
  const stage = root?.querySelector('.system-visual');
  if (!root || !stage || stage.querySelector('.system-media-card')) return;

  const systems = [
    {
      title: 'Epoxy Flooring',
      badge: 'Seamless resin floor',
      note: 'Real flooring application scene. The moving highlight shows the seamless resin finish being created.',
      image: 'https://images.unsplash.com/photo-1772305595483-6b058aff40f9?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'epoxy'
    },
    {
      title: 'PU Flooring',
      badge: 'Process-area floor',
      note: 'A finished industrial floor shown in a high-use work environment, with a simple operating-zone highlight.',
      image: 'https://images.unsplash.com/photo-1772305336606-989a457ffbae?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'pu'
    },
    {
      title: 'ESD / Antistatic Flooring',
      badge: 'Static-control floor',
      note: 'A real industrial floor with a clear animated grounding path to explain static-control flooring.',
      image: 'https://images.unsplash.com/photo-1772305336606-989a457ffbae?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'esd'
    },
    {
      title: 'Dielectric Flooring',
      badge: 'Electrical insulation floor',
      note: 'An electrical work environment with a highlighted insulated standing zone around the equipment area.',
      image: 'https://images.unsplash.com/photo-1780034766295-43db0f2a0fb7?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'dielectric'
    },
    {
      title: 'PVC Flooring',
      badge: 'Sheet / tile finish',
      note: 'A real commercial interior. The moving seam highlight makes the PVC sheet/tile floor finish easy to recognise.',
      image: 'https://images.unsplash.com/photo-1771911646904-61f0fc9033e2?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'pvc'
    },
    {
      title: 'Clean Room Wall Coating',
      badge: 'Cleanable wall + floor',
      note: 'A real laboratory environment with the wall-to-floor junction highlighted to show a cleanable controlled surface.',
      image: 'https://images.unsplash.com/photo-1669344319065-61282714d7ce?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'cleanroom'
    },
    {
      title: 'Waterproofing',
      badge: 'Water protection layer',
      note: 'A real roof-work scene with a simple rain and membrane animation showing where waterproofing protects the surface.',
      image: 'https://images.unsplash.com/photo-1773432114061-2ae201208630?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'waterproofing'
    },
    {
      title: 'VDF Flooring',
      badge: 'Industrial traffic floor',
      note: 'A real warehouse floor with an animated forklift route to show the heavy-traffic use case immediately.',
      image: 'https://images.unsplash.com/photo-1772305336606-989a457ffbae?auto=format&fit=crop&fm=jpg&q=82&w=1800',
      effect: 'vdf'
    }
  ];

  const effectMarkup = {
    epoxy: `
      <span class="system-cue system-cue--label">Resin application</span>
      <span class="system-fx system-fx--epoxy-sweep"></span>
      <span class="system-fx system-fx--epoxy-line"></span>`,
    pu: `
      <span class="system-cue system-cue--label">High-use process floor</span>
      <span class="system-fx system-fx--pu-zone"></span>
      <span class="system-fx system-fx--pu-pulse"></span>`,
    esd: `
      <span class="system-cue system-cue--label">Static-control path</span>
      <span class="system-fx system-fx--esd-grid"></span>
      <span class="system-fx system-fx--esd-path"></span>
      <span class="system-fx system-fx--ground">⏚</span>`,
    dielectric: `
      <span class="system-cue system-cue--label">Insulated standing zone</span>
      <span class="system-fx system-fx--dielectric-pad"></span>
      <span class="system-fx system-fx--dielectric-ring"></span>`,
    pvc: `
      <span class="system-cue system-cue--label">PVC sheet / tile finish</span>
      <span class="system-fx system-fx--pvc-floor"></span>
      <span class="system-fx system-fx--pvc-seam"></span>`,
    cleanroom: `
      <span class="system-cue system-cue--label">Cleanable wall-to-floor junction</span>
      <span class="system-fx system-fx--clean-cove"></span>
      <span class="system-fx system-fx--clean-scan"></span>`,
    waterproofing: `
      <span class="system-cue system-cue--label">Waterproofing layer</span>
      <span class="system-fx system-fx--membrane"></span>
      <span class="system-fx system-fx--rain system-fx--rain-a"></span>
      <span class="system-fx system-fx--rain system-fx--rain-b"></span>
      <span class="system-fx system-fx--rain system-fx--rain-c"></span>`,
    vdf: `
      <span class="system-cue system-cue--label">Forklift traffic route</span>
      <span class="system-fx system-fx--vdf-route"></span>
      <span class="system-fx system-fx--forklift">▰</span>`
  };

  const card = document.createElement('div');
  card.className = 'system-media-card';
  card.innerHTML = `
    <div class="system-photo-wrap">
      <img class="system-media-image" alt="" decoding="async">
      <div class="system-media-effect" aria-hidden="true"></div>
    </div>
    <div class="system-media-copy">
      <div>
        <span class="system-media-kicker">Selected flooring system</span>
        <h3 class="system-media-title"></h3>
        <p class="system-media-note"></p>
      </div>
      <span class="system-media-badge"></span>
    </div>
  `;
  stage.appendChild(card);

  const image = card.querySelector('.system-media-image');
  const effect = card.querySelector('.system-media-effect');
  const title = card.querySelector('.system-media-title');
  const note = card.querySelector('.system-media-note');
  const badge = card.querySelector('.system-media-badge');

  let active = -1;
  let token = 0;

  const render = () => {
    const index = Math.max(0, Math.min(systems.length - 1, Number(stage.getAttribute('data-system-state')) || 0));
    if (index === active) return;
    active = index;
    const system = systems[index];
    const currentToken = ++token;

    card.classList.add('is-changing');
    const preload = new Image();
    preload.decoding = 'async';
    preload.onload = () => {
      if (currentToken !== token) return;
      image.src = preload.src;
      image.alt = `${system.title} real-world reference visual`;
      title.textContent = system.title;
      note.textContent = system.note;
      badge.textContent = system.badge;
      effect.innerHTML = effectMarkup[system.effect] || '';
      requestAnimationFrame(() => card.classList.remove('is-changing'));
    };
    preload.onerror = () => {
      if (currentToken !== token) return;
      title.textContent = system.title;
      note.textContent = system.note;
      badge.textContent = system.badge;
      effect.innerHTML = effectMarkup[system.effect] || '';
      card.classList.remove('is-changing');
    };
    preload.src = system.image;
  };

  const observer = new MutationObserver(render);
  observer.observe(stage, { attributes: true, attributeFilter: ['data-system-state'] });
  render();
})();
