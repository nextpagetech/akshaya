(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  if (!home) return;

  /* Industries grid: each card's play/pause control toggles its light-sweep
   * and motif animation without following the card's link. */
  home.querySelectorAll('#industries [data-motion-toggle]').forEach((button) => {
    button.addEventListener('click', (event) => {
      event.preventDefault();
      event.stopPropagation();
      const card = button.closest('.industry-video-card');
      if (!card) return;
      const paused = card.classList.toggle('is-paused');
      button.setAttribute('aria-pressed', String(paused));
      button.innerHTML = paused ? '&#10074;&#10074;' : '&#9654;';
    });
  });
})();
