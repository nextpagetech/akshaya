(() => {
  'use strict';

  const root = document.querySelector('.home-page [data-system-explorer]');
  const stage = root?.querySelector('.system-visual');
  if (!root || !stage || stage.querySelector('.system-media-card')) return;

  const systems = [
    {
      title: 'Epoxy Flooring',
      badge: 'Seamless resin floor',
      scene: 'epoxy',
      note: 'Smooth, seamless resin finish shown in an industrial work area.'
    },
    {
      title: 'PU Flooring',
      badge: 'Process-area floor',
      scene: 'pu',
      note: 'Resilient floor shown in a wet, high-use process environment.'
    },
    {
      title: 'ESD / Antistatic Flooring',
      badge: 'Static-control floor',
      scene: 'esd',
      note: 'Electronics workspace with a visible grounding path through the floor.'
    },
    {
      title: 'Dielectric Flooring',
      badge: 'Electrical insulation floor',
      scene: 'dielectric',
      note: 'Electrical work zone shown with an insulated floor area around equipment.'
    },
    {
      title: 'PVC Flooring',
      badge: 'Sheet / tile finish',
      scene: 'pvc',
      note: 'Clean interior corridor with a clearly visible modular flooring finish.'
    },
    {
      title: 'Clean Room Wall Coating',
      badge: 'Cleanable wall + floor',
      scene: 'cleanroom',
      note: 'Controlled room showing smooth walls and a coved wall-to-floor junction.'
    },
    {
      title: 'Waterproofing',
      badge: 'Water protection layer',
      scene: 'waterproofing',
      note: 'Roof slab with rain water visibly blocked by the protective membrane.'
    },
    {
      title: 'VDF Flooring',
      badge: 'Industrial traffic floor',
      scene: 'vdf',
      note: 'Warehouse floor shown under repeated forklift traffic.'
    }
  ];

  const commonDefs = `
    <defs>
      <linearGradient id="floorA" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#dce7eb"/><stop offset="1" stop-color="#9fb7c1"/></linearGradient>
      <linearGradient id="floorBlue" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#66c7df"/><stop offset="1" stop-color="#1b6e99"/></linearGradient>
      <linearGradient id="wallA" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#eef4f6"/><stop offset="1" stop-color="#cbd9de"/></linearGradient>
      <filter id="soft"><feDropShadow dx="0" dy="12" stdDeviation="12" flood-opacity=".22"/></filter>
    </defs>`;

  const sceneMarkup = {
    epoxy: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#d8e2e6"/><rect width="900" height="205" fill="url(#wallA)"/>
      <polygon points="0,205 900,205 900,560 0,560" fill="#9faeb4"/>
      <polygon class="sv-epoxy-finish" points="70,250 830,230 900,560 0,560" fill="url(#floorBlue)"/>
      <g class="sv-worker" filter="url(#soft)"><circle cx="650" cy="205" r="24" fill="#e1b79a"/><path d="M620 234h58l36 97h-116z" fill="#f0c419"/><path d="M620 255l-58 96" stroke="#173847" stroke-width="18" stroke-linecap="round"/><path d="M562 350l-92 22" stroke="#173847" stroke-width="11"/><rect x="442" y="365" width="80" height="13" rx="6" fill="#173847"/></g>
      <path class="sv-gloss" d="M45 430C220 365 430 335 844 320" fill="none" stroke="#fff" stroke-width="18" opacity=".15"/>
      <text x="58" y="70" class="sv-label">SEAMLESS RESIN FLOOR</text>
    </svg>`,
    pu: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#d8e2e6"/><rect width="900" height="210" fill="#dfe8ea"/>
      <rect x="75" y="78" width="220" height="115" rx="8" fill="#9aaeb6"/><rect x="605" y="74" width="215" height="118" rx="8" fill="#9aaeb6"/>
      <polygon points="0,210 900,210 900,560 0,560" fill="#6f8f8e"/>
      <path class="sv-pu-wet" d="M110 405C225 360 320 440 430 391S650 338 790 403" fill="none" stroke="#b7edf2" stroke-width="16" opacity=".62"/>
      <g class="sv-pu-pulse"><ellipse cx="530" cy="350" rx="155" ry="58" fill="none" stroke="#f2b721" stroke-width="6"/></g>
      <text x="58" y="70" class="sv-label">HIGH-USE PROCESS AREA</text>
    </svg>`,
    esd: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#e6eef1"/><rect width="900" height="220" fill="#d5e0e5"/>
      <g fill="#6f8088"><rect x="85" y="105" width="250" height="95" rx="8"/><rect x="565" y="105" width="250" height="95" rx="8"/></g>
      <polygon points="0,220 900,220 900,560 0,560" fill="#6e8f98"/>
      <g class="sv-esd-grid" stroke="#7bd9ea" stroke-width="2" opacity=".7"><path d="M95 290h710M80 350h740M65 410h770M50 470h800"/><path d="M180 255v270M300 245v290M420 235v310M540 235v310M660 245v290M780 255v270"/></g>
      <path class="sv-esd-current" d="M130 445H470V320H745" fill="none" stroke="#f2b721" stroke-width="7"/>
      <circle cx="745" cy="320" r="18" fill="#173847" stroke="#65cbe3" stroke-width="6"/><path d="M745 338v52m-28 0h56m-43 18h30" stroke="#65cbe3" stroke-width="6"/>
      <text x="58" y="70" class="sv-label">STATIC-CONTROL WORKSPACE</text>
    </svg>`,
    dielectric: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#e4ecef"/><rect width="900" height="220" fill="#d4dfe3"/>
      <rect x="595" y="72" width="215" height="152" rx="10" fill="#516773"/><rect x="625" y="102" width="55" height="58" fill="#d7e4e8"/><circle cx="740" cy="132" r="22" fill="#f2b721"/>
      <polygon points="0,220 900,220 900,560 0,560" fill="#9ba8ad"/>
      <polygon class="sv-dielectric-zone" points="325,290 765,275 840,520 245,520" fill="#dceff2" stroke="#65cbe3" stroke-width="7"/>
      <path class="sv-dielectric-bolt" d="M555 318l-42 74h41l-20 76 82-108h-43l28-42z" fill="#f2b721"/>
      <text x="58" y="70" class="sv-label">INSULATED ELECTRICAL WORK ZONE</text>
    </svg>`,
    pvc: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#eaf1f3"/><rect width="900" height="235" fill="#edf3f5"/>
      <rect x="80" y="70" width="190" height="150" fill="#c6d6dc"/><rect x="630" y="70" width="190" height="150" fill="#c6d6dc"/>
      <polygon points="0,235 900,235 900,560 0,560" fill="#8aa5af"/>
      <g class="sv-pvc-tiles" stroke="#eaf4f6" stroke-width="3"><path d="M0 315h900M0 395h900M0 475h900"/><path d="M150 235v325M300 235v325M450 235v325M600 235v325M750 235v325"/></g>
      <rect class="sv-pvc-highlight" x="300" y="315" width="150" height="80" fill="#65cbe3" opacity=".36"/>
      <text x="58" y="70" class="sv-label">CLEAN MODULAR FLOOR FINISH</text>
    </svg>`,
    cleanroom: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#f3f8f9"/><rect width="900" height="365" fill="#eef5f7"/>
      <rect x="90" y="70" width="260" height="210" rx="14" fill="#d5e4e8"/><rect x="560" y="70" width="250" height="210" rx="14" fill="#d5e4e8"/>
      <path d="M0 365h900v195H0z" fill="#b9dce4"/><path d="M0 365h900" stroke="#65cbe3" stroke-width="16"/>
      <path class="sv-cove" d="M0 365Q0 338 28 338H900" fill="none" stroke="#86d7e6" stroke-width="12"/>
      <rect class="sv-clean-scan" x="-80" y="0" width="70" height="560" fill="url(#floorBlue)" opacity=".14"/>
      <text x="58" y="70" class="sv-label">SMOOTH WALL + COVED FLOOR JUNCTION</text>
    </svg>`,
    waterproofing: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#d9e3e7"/><rect width="900" height="205" fill="#b7c8cf"/>
      <polygon points="70,260 820,235 900,515 0,540" fill="#9da9ad"/>
      <polygon class="sv-membrane" points="80,280 810,258 860,450 35,478" fill="#246f98" opacity=".9"/>
      <g class="sv-rain" stroke="#65cbe3" stroke-width="7" stroke-linecap="round"><path d="M220 70l-25 72M360 40l-25 72M515 68l-25 72M670 45l-25 72"/></g>
      <g class="sv-water-ripple" fill="none" stroke="#b8edf5" stroke-width="5"><ellipse cx="360" cy="340" rx="80" ry="24"/><ellipse cx="640" cy="320" rx="70" ry="20"/></g>
      <text x="58" y="70" class="sv-label">WATER BLOCKED AT PROTECTIVE MEMBRANE</text>
    </svg>`,
    vdf: `<svg viewBox="0 0 900 560" aria-hidden="true">${commonDefs}
      <rect width="900" height="560" fill="#d8e1e4"/><rect width="900" height="205" fill="#cfdadd"/>
      <polygon points="0,205 900,205 900,560 0,560" fill="#858f92"/>
      <g fill="#758084"><rect x="90" y="85" width="95" height="120"/><rect x="715" y="85" width="95" height="120"/></g>
      <path class="sv-vdf-route" d="M65 455C235 360 365 465 505 365S705 290 840 350" fill="none" stroke="#f2b721" stroke-width="15" stroke-dasharray="35 28"/>
      <g class="sv-forklift" filter="url(#soft)"><rect x="485" y="290" width="125" height="70" rx="8" fill="#e7b422"/><rect x="520" y="245" width="68" height="50" fill="#173847"/><circle cx="510" cy="365" r="25" fill="#263941"/><circle cx="590" cy="365" r="25" fill="#263941"/><path d="M610 310h58v16h-58zM655 310v105" stroke="#173847" stroke-width="11"/></g>
      <text x="58" y="70" class="sv-label">HEAVY TRAFFIC / FORKLIFT ROUTE</text>
    </svg>`
  };

  const card = document.createElement('div');
  card.className = 'system-media-card';
  card.innerHTML = `
    <div class="system-animated-scene" aria-hidden="true"></div>
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

  const scene = card.querySelector('.system-animated-scene');
  const title = card.querySelector('.system-media-title');
  const note = card.querySelector('.system-media-note');
  const badge = card.querySelector('.system-media-badge');

  let active = -1;
  const render = () => {
    const index = Math.max(0, Math.min(systems.length - 1, Number(stage.getAttribute('data-system-state')) || 0));
    if (index === active) return;
    active = index;
    const system = systems[index];
    card.classList.add('is-changing');
    window.setTimeout(() => {
      scene.innerHTML = sceneMarkup[system.scene] || '';
      title.textContent = system.title;
      note.textContent = system.note;
      badge.textContent = system.badge;
      requestAnimationFrame(() => card.classList.remove('is-changing'));
    }, 120);
  };

  const observer = new MutationObserver(render);
  observer.observe(stage, { attributes: true, attributeFilter: ['data-system-state'] });
  render();
})();
