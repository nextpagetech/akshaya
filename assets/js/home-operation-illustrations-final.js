(() => {
  'use strict';

  const section = document.querySelector('.home-page #why-akshaya');
  const wrap = section?.querySelector('.operation-scene-wrap');
  const scene = wrap?.querySelector('.operation-scene');
  if (!section || !wrap || !scene) return;

  const items = [
    ['Minimum Production Disruption','assets/images/home/operations/minimum-production-disruption.svg'],
    ['Quality-Controlled Execution','assets/images/home/operations/quality-controlled-execution.svg'],
    ['Trained Application Team','assets/images/home/operations/trained-application-team.svg'],
    ['Support Beyond Installation','assets/images/home/operations/support-beyond-installation.svg']
  ];

  scene.classList.remove('has-real-photo');
  scene.querySelectorAll(':scope > .real-photo-fill, :scope > .operation-3d-world, :scope > .operation-illustration-stage').forEach(n => n.remove());

  const stage = document.createElement('div');
  stage.className = 'operation-illustration-stage';
  stage.innerHTML = '<img alt="" loading="eager" decoding="async">';
  scene.appendChild(stage);

  const img = stage.querySelector('img');

  const render = () => {
    const raw = Number(wrap.getAttribute('data-operation-state'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(items.length - 1, raw)) : 0;
    const [title, src] = items[index];

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