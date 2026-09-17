(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  const visual = home?.querySelector('.home-work-visual');
  const scene = visual?.querySelector('.floor-scene');
  if (!home || !visual || !scene) return;

  /* Use direct Pexels media files rather than /download/video/... redirects.
   * The redirect URLs can fail inside <video> and leave the stage blank. */
  const stageVideos = [
    {
      title: 'Site Survey',
      caption: 'Review the working area, access, traffic and operational constraints on site.',
      src: 'https://videos.pexels.com/video-files/31628000/13475025_3840_2160_30fps.mp4',
      start: 0.6
    },
    {
      title: 'Surface Testing',
      caption: 'Inspect the existing surface and verify its condition before system selection.',
      src: 'https://videos.pexels.com/video-files/4293956/4293956-uhd_3840_2160_25fps.mp4',
      start: 1.0
    },
    {
      title: 'Moisture Testing',
      caption: 'Check relevant site and substrate conditions before recommending the system.',
      src: 'https://videos.pexels.com/video-files/4293956/4293956-uhd_3840_2160_25fps.mp4',
      start: 3.2
    },
    {
      title: 'Recommendation',
      caption: 'Bring the site findings together and review the proposed flooring approach.',
      src: 'https://videos.pexels.com/video-files/4293956/4293956-uhd_3840_2160_25fps.mp4',
      start: 5.4
    },
    {
      title: 'Mock-up',
      caption: 'Review a controlled sample area where the project requires a mock-up.',
      src: 'https://videos.pexels.com/video-files/34994495/14825809_2160_3840_30fps.mp4',
      start: 0.4
    },
    {
      title: 'Installation',
      caption: 'Professional application proceeds in a controlled and coordinated sequence.',
      src: 'https://videos.pexels.com/video-files/34994495/14825809_2160_3840_30fps.mp4',
      start: 2.7
    },
    {
      title: 'Inspection',
      caption: 'Review completed work and confirm the finished floor against the agreed scope.',
      src: 'https://videos.pexels.com/video-files/31628000/13475025_3840_2160_30fps.mp4',
      start: 4.0
    },
    {
      title: 'Aftercare',
      caption: 'Maintenance guidance and follow-up support continue after the floor is handed over.',
      src: 'https://videos.pexels.com/video-files/13422071/13422071-uhd_3840_2160_30fps.mp4',
      start: 0.8
    }
  ];

  const FALLBACK_VIDEO = 'https://videos.pexels.com/video-files/13422071/13422071-uhd_3840_2160_30fps.mp4';

  scene.querySelectorAll(':scope > .real-photo-fill').forEach((node) => node.remove());
  scene.classList.remove('has-real-photo');

  const layer = document.createElement('div');
  layer.className = 'home-work-video-layer';
  layer.innerHTML = `
    <video class="home-work-stage-video" muted autoplay playsinline preload="auto" aria-hidden="true"></video>
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
  let usingFallback = false;

  video.muted = true;
  video.defaultMuted = true;
  video.autoplay = true;
  video.playsInline = true;

  const safePlay = () => {
    if (prefersReduced.matches || !isVisible) return;
    const promise = video.play();
    if (promise?.catch) promise.catch(() => {});
  };

  const seekToStageStart = () => {
    const item = stageVideos[activeIndex] || stageVideos[0];
    const desired = usingFallback ? 0.6 : (item.start || 0);
    const duration = Number.isFinite(video.duration) ? video.duration : 0;
    const maxStart = duration > LOOP_LENGTH ? Math.max(0, duration - LOOP_LENGTH - 0.1) : desired;
    try { video.currentTime = Math.min(desired, maxStart); } catch (_) {}
  };

  video.addEventListener('loadedmetadata', () => {
    seekToStageStart();
    safePlay();
  });

  video.addEventListener('canplay', safePlay);

  video.addEventListener('timeupdate', () => {
    const item = stageVideos[activeIndex] || stageVideos[0];
    const start = usingFallback ? 0.6 : (item.start || 0);
    if (video.currentTime >= start + LOOP_LENGTH) {
      try { video.currentTime = start; } catch (_) {}
      safePlay();
    }
  });

  video.addEventListener('ended', () => {
    seekToStageStart();
    safePlay();
  });

  video.addEventListener('error', () => {
    if (usingFallback || video.src === FALLBACK_VIDEO) return;
    usingFallback = true;
    video.src = FALLBACK_VIDEO;
    video.load();
    safePlay();
  });

  const render = () => {
    const raw = Number(visual.getAttribute('data-active-stage'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(stageVideos.length - 1, raw)) : 0;
    if (index === activeIndex) return;
    activeIndex = index;
    usingFallback = false;

    const item = stageVideos[index];
    title.textContent = item.title;
    caption.textContent = item.caption;
    layer.classList.remove('is-changing');
    void layer.offsetWidth;
    layer.classList.add('is-changing');

    video.pause();
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