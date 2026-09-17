(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  const visual = home?.querySelector('.home-work-visual');
  const scene = visual?.querySelector('.floor-scene');
  if (!home || !visual || !scene) return;

  const stageVideos = [
    {
      title: 'Site Survey',
      caption: 'Review the working area, access, traffic and operational constraints on site.',
      src: 'https://www.pexels.com/download/video/8964377/',
      start: 1.0
    },
    {
      title: 'Surface Testing',
      caption: 'Inspect the existing surface and verify its condition before system selection.',
      src: 'https://www.pexels.com/download/video/5532867/',
      start: 1.2
    },
    {
      title: 'Moisture Testing',
      caption: 'Check relevant site and substrate conditions before recommending the system.',
      src: 'https://www.pexels.com/download/video/5532867/',
      start: 3.6
    },
    {
      title: 'Recommendation',
      caption: 'Bring the site findings together and review the proposed flooring approach.',
      src: 'https://www.pexels.com/download/video/8482296/',
      start: 1.0
    },
    {
      title: 'Mock-up',
      caption: 'Review a controlled sample area where the project requires a mock-up.',
      src: 'https://www.pexels.com/download/video/4729560/',
      start: 1.0
    },
    {
      title: 'Installation',
      caption: 'Professional application proceeds in a controlled and coordinated sequence.',
      src: 'https://www.pexels.com/download/video/34994495/',
      start: 1.0
    },
    {
      title: 'Inspection',
      caption: 'Review completed work and confirm the finished floor against the agreed scope.',
      src: 'https://www.pexels.com/download/video/36970579/',
      start: 1.0
    },
    {
      title: 'Aftercare',
      caption: 'Maintenance guidance and follow-up support continue after the floor is handed over.',
      src: 'https://www.pexels.com/download/video/5646685/',
      start: 0.8
    }
  ];

  scene.querySelectorAll(':scope > .real-photo-fill').forEach((node) => node.remove());
  scene.classList.remove('has-real-photo');

  const layer = document.createElement('div');
  layer.className = 'home-work-video-layer';
  layer.innerHTML = `
    <video class="home-work-stage-video" muted autoplay playsinline preload="metadata" aria-hidden="true"></video>
    <span class="home-work-video-shade" aria-hidden="true"></span>
    <span class="home-work-video-loop">2 sec loop</span>
    <div class="home-work-video-meta">
      <span class="home-work-video-kicker">Project stage</span>
      <strong class="home-work-video-title"></strong>
      <span class="home-work-video-caption"></span>
    </div>`;
  scene.appendChild(layer);

  const video = layer.querySelector('video');
  const title = layer.querySelector('.home-work-video-title');
  const caption = layer.querySelector('.home-work-video-caption');
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const LOOP_LENGTH = 2;
  let activeIndex = -1;
  let isVisible = true;

  const safePlay = () => {
    if (prefersReduced.matches || !isVisible) return;
    const promise = video.play();
    if (promise?.catch) promise.catch(() => {});
  };

  video.addEventListener('loadedmetadata', () => {
    const item = stageVideos[activeIndex] || stageVideos[0];
    const maxStart = Math.max(0, (Number.isFinite(video.duration) ? video.duration : 0) - LOOP_LENGTH - 0.1);
    video.currentTime = Math.min(item.start || 0, maxStart || item.start || 0);
    safePlay();
  });

  video.addEventListener('timeupdate', () => {
    const item = stageVideos[activeIndex] || stageVideos[0];
    const start = item.start || 0;
    if (video.currentTime >= start + LOOP_LENGTH) {
      video.currentTime = start;
      safePlay();
    }
  });

  video.addEventListener('ended', () => {
    const item = stageVideos[activeIndex] || stageVideos[0];
    video.currentTime = item.start || 0;
    safePlay();
  });

  const render = () => {
    const raw = Number(visual.getAttribute('data-active-stage'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(stageVideos.length - 1, raw)) : 0;
    if (index === activeIndex) return;
    activeIndex = index;

    const item = stageVideos[index];
    title.textContent = item.title;
    caption.textContent = item.caption;
    layer.classList.remove('is-changing');
    void layer.offsetWidth;
    layer.classList.add('is-changing');

    video.pause();
    video.removeAttribute('src');
    video.load();
    video.src = item.src;
    video.load();
    safePlay();
  };

  new MutationObserver(render).observe(visual, {
    attributes: true,
    attributeFilter: ['data-active-stage']
  });

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      isVisible = entries[0]?.isIntersecting ?? true;
      if (isVisible) safePlay();
      else video.pause();
    }, { rootMargin: '180px 0px', threshold: 0.05 });
    observer.observe(visual);
  }

  const motionChange = () => {
    if (prefersReduced.matches) video.pause();
    else safePlay();
  };
  prefersReduced.addEventListener?.('change', motionChange);

  render();
})();
