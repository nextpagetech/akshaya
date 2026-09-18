(() => {
  'use strict';

  const section = document.querySelector('.home-page #industries');
  if (!section) return;

  const videos = [...section.querySelectorAll('.industry-card-video')];
  if (!videos.length) return;

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const loopLength = 2;

  const start = (video) => {
    if (reduced.matches) return;
    if (!video.src) {
      const src = video.dataset.videoSrc;
      if (!src) return;
      video.src = src;
      video.load();
    }
    const play = video.play();
    if (play?.catch) play.catch(() => {});
  };

  const stop = (video) => video.pause();

  videos.forEach((video) => {
    video.muted = true;
    video.defaultMuted = true;
    video.autoplay = true;
    video.playsInline = true;

    video.addEventListener('playing', () => {
      video.closest('.industry-video-card')?.classList.add('is-video-ready');
    });

    video.addEventListener('timeupdate', () => {
      if (video.currentTime >= loopLength) {
        try { video.currentTime = 0; } catch (_) {}
        start(video);
      }
    });

    video.addEventListener('ended', () => {
      try { video.currentTime = 0; } catch (_) {}
      start(video);
    });

    video.addEventListener('error', () => {
      video.closest('.industry-video-card')?.classList.remove('is-video-ready');
    });
  });

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        const video = entry.target;
        if (entry.isIntersecting && entry.intersectionRatio >= .15) start(video);
        else stop(video);
      });
    }, { rootMargin:'180px 0px', threshold:[0,.15,.5] });
    videos.forEach((video) => observer.observe(video));
  } else {
    videos.forEach(start);
  }

  document.addEventListener('visibilitychange', () => {
    videos.forEach((video) => {
      if (document.hidden) stop(video);
      else {
        const rect = video.getBoundingClientRect();
        if (rect.top < innerHeight && rect.bottom > 0) start(video);
      }
    });
  });

  reduced.addEventListener?.('change', () => {
    videos.forEach((video) => reduced.matches ? stop(video) : start(video));
  });
})();