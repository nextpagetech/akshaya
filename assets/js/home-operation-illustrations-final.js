(() => {
  'use strict';

  const section = document.querySelector('.home-page #why-akshaya');
  const wrap = section?.querySelector('.operation-scene-wrap');
  const scene = wrap?.querySelector('.operation-scene');
  if (!section || !wrap || !scene) return;

  const scriptSrc = document.currentScript?.src || '';
  const assetBase = scriptSrc
    ? new URL('../images/home/operations/', scriptSrc)
    : new URL('assets/images/home/operations/', document.baseURI);

  const items = [
    ['Minimum Production Disruption','minimum-production-disruption.svg'],
    ['Quality-Controlled Execution','quality-controlled-execution.svg'],
    ['Trained Application Team','trained-application-team.svg'],
    ['Support Beyond Installation','support-beyond-installation.svg']
  ];

  scene.classList.remove('has-real-photo');
  scene.querySelectorAll(':scope > .real-photo-fill, :scope > .operation-3d-world, :scope > .operation-illustration-stage').forEach(n => n.remove());

  const stage = document.createElement('div');
  stage.className = 'operation-illustration-stage';
  stage.innerHTML = '<img alt="" loading="eager" decoding="async">';
  scene.appendChild(stage);

  const img = stage.querySelector('img');
  img.addEventListener('error', () => {
    stage.classList.add('has-load-error');
    img.removeAttribute('src');
    img.alt = 'Illustration unavailable';
  });
  img.addEventListener('load', () => {
    stage.classList.remove('has-load-error');
  });

  const render = () => {
    const raw = Number(wrap.getAttribute('data-operation-state'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(items.length - 1, raw)) : 0;
    const [title, file] = items[index];
    const src = new URL(file, assetBase).href;

    img.style.animation = 'none';
    img.src = src;
    img.alt = title + ' explanatory illustration';
    void img.offsetWidth;
    img.style.animation = '';

    const readout = wrap.querySelector('[data-operation-readout]');
    if (readout) readout.textContent = String(index + 1).padStart(2,'0') + ' / ' + title;
  };

  new MutationObserver(render).observe(wrap,{attributes:true,attributeFilter:['data-operation-state']});
  render();
})();