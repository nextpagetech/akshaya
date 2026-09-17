(() => {
  'use strict';

  const section = document.querySelector('.home-page #why-akshaya');
  const scene = section?.querySelector('.operation-scene');
  if (!section || !scene) return;

  scene.classList.remove('has-real-photo');
  scene.querySelectorAll(':scope > .real-photo-fill').forEach((node) => node.remove());

  const world = scene.querySelector(':scope > .operation-3d-world');
  if (world) {
    world.style.removeProperty('display');
    world.style.removeProperty('opacity');
    world.style.removeProperty('visibility');
  }
})();
