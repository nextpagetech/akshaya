(() => {
  'use strict';

  const section = document.querySelector('.home-page #floor-care');
  const stage = section?.querySelector('.care-stage');
  const scene = stage?.querySelector('.care-scene');
  if (!section || !stage || !scene) return;

  const scriptSrc = document.currentScript?.src || '';
  const assetBase = scriptSrc
    ? new URL('../images/home/care/', scriptSrc)
    : new URL('assets/images/home/care/', document.baseURI);

  const items = [
    ['Maintenance Guidance','maintenance-guidance.svg'],
    ['Inspection Support','inspection-support.svg'],
    ['Warranty Communication','warranty-communication.svg'],
    ['Service Support','service-support.svg']
  ];

  scene.querySelectorAll(':scope > .real-photo-fill, :scope > .care-illustration-stage')
    .forEach((node) => node.remove());
  scene.classList.remove('has-real-photo');

  const layer = document.createElement('div');
  layer.className = 'care-illustration-stage';
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
    const raw = Number(stage.getAttribute('data-care-state'));
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

    const readout = stage.querySelector('[data-care-readout]');
    if (readout) readout.textContent = String(index + 1).padStart(2,'0') + ' / ' + title;
  };

  new MutationObserver(render).observe(stage, {
    attributes:true,
    attributeFilter:['data-care-state']
  });

  render();
})();