(() => {
  'use strict';

  const section = document.querySelector('.home-page #technical-assessment');
  const stage = section?.querySelector('.assessment-lab-stage');
  const scene = stage?.querySelector('.lab-scene');
  if (!section || !stage || !scene) return;

  const scriptSrc = document.currentScript?.src || '';
  const assetBase = scriptSrc
    ? new URL('../images/home/assessment/', scriptSrc)
    : new URL('assets/images/home/assessment/', document.baseURI);

  const items = [
    ['Surface Condition','surface-condition.svg'],
    ['Moisture / Site Assessment','moisture-site-assessment.svg'],
    ['Operating Environment','operating-environment.svg'],
    ['Correct System Selection','correct-system-selection.svg'],
    ['Controlled Application','controlled-application.svg'],
    ['Final Inspection','final-inspection.svg']
  ];

  scene.querySelectorAll(':scope > .assessment-video-layer, :scope > .real-photo-fill, :scope > .assessment-illustration-stage')
    .forEach((node) => node.remove());
  scene.classList.remove('has-real-photo');

  const layer = document.createElement('div');
  layer.className = 'assessment-illustration-stage';
  layer.innerHTML = '<img alt="" loading="eager" decoding="async">';
  scene.appendChild(layer);

  const img = layer.querySelector('img');

  img.addEventListener('load', () => layer.classList.remove('has-load-error'));
  img.addEventListener('error', () => {
    layer.classList.add('has-load-error');
    img.removeAttribute('src');
    img.alt = 'Illustration unavailable';
  });

  let active = -1;
  const render = () => {
    const raw = Number(stage.getAttribute('data-lab-state'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(items.length - 1, raw)) : 0;
    if (index === active) return;
    active = index;

    const [title, file] = items[index];
    const src = new URL(file, assetBase).href;

    layer.classList.remove('has-load-error');
    img.style.animation = 'none';
    img.src = src;
    img.alt = title + ' explanatory illustration';
    void img.offsetWidth;
    img.style.animation = '';

    const readout = stage.querySelector('[data-lab-readout]');
    if (readout) readout.textContent = String(index + 1).padStart(2,'0') + ' / ' + title;
  };

  new MutationObserver(render).observe(stage, {
    attributes:true,
    attributeFilter:['data-lab-state']
  });

  render();
})();