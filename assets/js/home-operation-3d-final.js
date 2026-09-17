(() => {
  'use strict';

  const section = document.querySelector('.home-page #why-akshaya');
  const wrap = section?.querySelector('.operation-scene-wrap');
  const scene = wrap?.querySelector('.operation-scene');
  if (!section || !wrap || !scene || scene.querySelector('.operation-3d-world')) return;

  const world = document.createElement('div');
  world.className = 'operation-3d-world';
  world.setAttribute('aria-hidden', 'true');
  world.innerHTML = `
    <div class="operation-3d-stage">
      <div class="operation-floor">
        <span class="operation-zone3d operation-zone3d--machines"></span>
        <span class="operation-zone3d operation-zone3d--traffic"></span>
        <span class="operation-zone3d operation-zone3d--application"></span>
        <span class="operation-zone3d operation-zone3d--inspection"></span>
        <span class="operation-zone3d operation-zone3d--support"></span>

        <span class="operation-rack operation-rack--1"></span>
        <span class="operation-rack operation-rack--2"></span>
        <span class="operation-machine operation-machine--1"></span>
        <span class="operation-machine operation-machine--2"></span>
        <span class="operation-machine operation-machine--3"></span>
        <span class="operation-machine operation-machine--4"></span>

        <span class="operation-route3d"></span>
        <span class="operation-forklift3d"></span>
        <span class="operation-worker3d operation-worker3d--1"></span>
        <span class="operation-worker3d operation-worker3d--2"></span>
        <span class="operation-worker3d operation-worker3d--3"></span>
        <span class="operation-inspection3d"></span>
        <span class="operation-support3d"></span>
        <span class="operation-application3d"></span>

        <span class="operation-label3d operation-label3d--route">Movement route</span>
        <span class="operation-label3d operation-label3d--machines">Production / machine zone</span>
        <span class="operation-label3d operation-label3d--application">Application zone</span>
        <span class="operation-label3d operation-label3d--inspection">Inspection point</span>
        <span class="operation-label3d operation-label3d--support">Support / maintenance</span>
      </div>
    </div>`;
  scene.appendChild(world);

  const stage = world.querySelector('.operation-3d-stage');
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)');

  let raf = 0;
  const onPointerMove = (event) => {
    if (prefersReduced.matches || window.innerWidth < 992) return;
    cancelAnimationFrame(raf);
    raf = requestAnimationFrame(() => {
      const rect = wrap.getBoundingClientRect();
      const x = (event.clientX - rect.left) / rect.width - 0.5;
      const y = (event.clientY - rect.top) / rect.height - 0.5;
      stage.style.transform = `translate(-50%,-50%) rotateX(${58 - y * 5}deg) rotateZ(${-8 + x * 4}deg) translate3d(${x * 8}px,${y * 4}px,0)`;
    });
  };

  const resetTilt = () => {
    stage.style.transform = '';
  };

  wrap.addEventListener('pointermove', onPointerMove, { passive: true });
  wrap.addEventListener('pointerleave', resetTilt);

  const updateContext = () => {
    const index = Number(wrap.getAttribute('data-operation-state')) || 0;
    const labels = [
      ['01 / Minimum Production Disruption', 'Movement routes stay active while work zones are controlled.'],
      ['02 / Quality-Controlled Execution', 'Inspection points and quality checkpoints become the focus.'],
      ['03 / Trained Application Team', 'People and application zones show coordinated execution.'],
      ['04 / Support Beyond Installation', 'Support and maintenance points remain active after completion.']
    ];
    const readout = wrap.querySelector('[data-operation-readout]');
    if (readout) readout.textContent = labels[index]?.[0] || labels[0][0];
    world.setAttribute('data-active-story', String(index));
  };

  new MutationObserver(updateContext).observe(wrap, {
    attributes: true,
    attributeFilter: ['data-operation-state']
  });
  updateContext();
})();
