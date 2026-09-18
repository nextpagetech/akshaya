(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  if (!home) return;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const finePointer = window.matchMedia('(hover: hover) and (pointer: fine) and (min-width: 992px)');

  /* Subtle scroll-linked depth on the hero scene layers, on top of the
   * existing pointer-tilt behaviour in main.js. Desktop + motion-allowed only. */
  const heroScene = home.querySelector('[data-hero-scene]');
  if (heroScene && finePointer.matches && !prefersReduced.matches) {
    let ticking = false;
    const update = () => {
      ticking = false;
      const rect = heroScene.getBoundingClientRect();
      const progress = Math.min(1, Math.max(0, 1 - rect.top / (window.innerHeight || 1)));
      heroScene.style.setProperty('--hero-scroll', progress.toFixed(3));
    };
    window.addEventListener('scroll', () => {
      if (!ticking) {
        ticking = true;
        requestAnimationFrame(update);
      }
    }, { passive: true });
    update();
  }
})();
