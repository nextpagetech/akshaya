(() => {
  'use strict';

  const stage = document.querySelector('.home-page [data-problem-explorer] .diagnostic-stage');
  if (!stage || stage.querySelector('.problem-visual')) return;

  const currentScript = document.currentScript;
  const asset = (path) => currentScript?.src ? new URL(`../../${path}`, currentScript.src).href : path;

  const scenes = [
    {
      title: 'Floor cracking',
      text: 'A visible crack in the floor should be assessed before any new flooring system is selected.',
      tag: 'Visible floor crack',
      image: 'website_assets/Selected Pics from _23/038.JPG',
      effect: 'crack'
    },
    {
      title: 'Dust generation',
      text: 'A worn or powdering surface can release dust during normal movement and daily operations.',
      tag: 'Surface dusting',
      image: 'website_assets/Selected Pics from _23/060820091425.jpg',
      effect: 'dust'
    },
    {
      title: 'Peeling / damaged coating',
      text: 'When the coating lifts or breaks away, the underlying floor becomes exposed and needs review.',
      tag: 'Coating damage',
      image: 'website_assets/Epoxy Coating Pics/IMG20190903134334.jpg',
      effect: 'peel'
    },
    {
      title: 'Static control requirement',
      text: 'Static-sensitive areas need a flooring approach designed around the actual operating requirement.',
      tag: 'Static-sensitive area',
      image: 'website_assets/Amritha Tools/IMG-20190721-WA0004.jpg',
      effect: 'static'
    },
    {
      title: 'Hygiene requirement',
      text: 'Cleanable, continuous floor and wall junctions can matter in hygiene-sensitive environments.',
      tag: 'Cleanable floor area',
      image: 'website_assets/Epoxy Coating Pics/IMG20190904110926.jpg',
      effect: 'clean'
    },
    {
      title: 'Water penetration',
      text: 'Where moisture enters, the source and the affected surface should be understood before treatment.',
      tag: 'Moisture affected area',
      image: 'website_assets/Selected Pics from _23/080720091213.jpg',
      effect: 'water'
    }
  ];

  const visual = document.createElement('div');
  visual.className = 'problem-visual';
  visual.setAttribute('aria-live', 'polite');
  visual.innerHTML = `
    <img class="problem-visual-image" alt="" decoding="async">
    <div class="problem-visual-copy">
      <span class="problem-visual-kicker">Selected floor problem</span>
      <h3 class="problem-visual-title"></h3>
      <p class="problem-visual-text"></p>
    </div>
    <div class="problem-visual-scene" aria-hidden="true"></div>
    <div class="problem-visual-tag"><i aria-hidden="true"></i><span></span></div>
  `;
  stage.prepend(visual);

  const img = visual.querySelector('.problem-visual-image');
  const title = visual.querySelector('.problem-visual-title');
  const text = visual.querySelector('.problem-visual-text');
  const tag = visual.querySelector('.problem-visual-tag span');
  const fx = visual.querySelector('.problem-visual-scene');

  const effectMarkup = {
    crack: `<svg viewBox="0 0 900 560" preserveAspectRatio="none"><path class="pv-crack-path" d="M150 390 L225 355 L292 382 L350 320 L410 348 L470 292 L530 330 L598 268 L655 305 L725 246"/><circle class="pv-crack-ring" cx="598" cy="268" r="34"/></svg>`,
    dust: `<span class="pv-dust"></span><span class="pv-dust"></span><span class="pv-dust"></span><span class="pv-dust"></span>`,
    peel: `<span class="pv-peel"></span>`,
    static: `<span class="pv-grid"></span>`,
    clean: `<span class="pv-clean"></span>`,
    water: `<span class="pv-water"></span>`
  };

  let current = -1;
  const render = () => {
    const index = Math.max(0, Math.min(scenes.length - 1, Number(stage.getAttribute('data-problem-state')) || 0));
    if (index === current) return;
    current = index;
    const scene = scenes[index];

    img.style.opacity = '0';
    window.setTimeout(() => {
      img.src = asset(scene.image);
      img.alt = `${scene.title} flooring reference`; 
      title.textContent = scene.title;
      text.textContent = scene.text;
      tag.textContent = scene.tag;
      fx.innerHTML = effectMarkup[scene.effect] || '';
      requestAnimationFrame(() => { img.style.opacity = '1'; });
    }, 120);
  };

  const observer = new MutationObserver(render);
  observer.observe(stage, { attributes: true, attributeFilter: ['data-problem-state'] });
  render();
})();
