(() => {
  'use strict';

  const section = document.querySelector('.home-page .home-work');
  const visual = section?.querySelector('.home-work-visual');
  const scene = visual?.querySelector('.floor-scene');
  if (!section || !visual || !scene) return;

  const stages = [
    {
      title: 'Site Survey',
      caption: 'Review the working area, access and operating conditions.',
      src: 'https://videos.pexels.com/video-files/7019176/7019176-uhd_2160_4096_25fps.mp4'
    },
    {
      title: 'Surface Testing',
      caption: 'Inspect the existing surface before deciding the preparation method.',
      src: 'https://videos.pexels.com/video-files/8471038/8471038-hd_1920_1080_25fps.mp4'
    },
    {
      title: 'Moisture Testing',
      caption: 'Check site conditions that can affect the flooring system.',
      src: 'https://videos.pexels.com/video-files/32243782/13751670_3840_2160_50fps.mp4'
    },
    {
      title: 'Recommendation',
      caption: 'Review the findings and agree the system approach and scope.',
      src: 'https://videos.pexels.com/video-files/8482295/8482295-hd_1080_1920_25fps.mp4'
    },
    {
      title: 'Mock-up',
      caption: 'Review a controlled sample area where the project calls for it.',
      src: 'https://videos.pexels.com/video-files/8964731/8964731-uhd_3840_2160_25fps.mp4'
    },
    {
      title: 'Installation',
      caption: 'Prepare and execute the work in planned stages on site.',
      src: 'https://videos.pexels.com/video-files/15959642/15959642-uhd_3840_2160_60fps.mp4'
    },
    {
      title: 'Inspection',
      caption: 'Inspect the completed work and verify the agreed scope.',
      src: 'https://videos.pexels.com/video-files/4293956/4293956-uhd_3840_2160_25fps.mp4'
    },
    {
      title: 'Aftercare',
      caption: 'Continue with maintenance guidance and support after completion.',
      src: 'https://videos.pexels.com/video-files/13422071/13422071-uhd_3840_2160_30fps.mp4'
    }
  ];

  scene.classList.remove('has-real-photo');
  scene.querySelectorAll(':scope > .real-photo-fill').forEach((node) => node.remove());

  const layer = document.createElement('div');
  layer.className = 'home-work-video-layer';
  layer.innerHTML = `
    <video class="home-work-stage-video" muted autoplay playsinline preload="metadata" aria-hidden="true"></video>
    <div class="home-work-video-shade" aria-hidden="true"></div>
    <div class="home-work-video-meta">
      <span class="home-work-video-kicker">Current stage</span>
      <strong class="home-work-video-title"></strong>
      <span class="home-work-video-caption"></span>
    </div>
    <span class="home-work-video-loop" aria-hidden="true">2 sec loop</span>`;
  scene.appendChild(layer);

  const video = layer.querySelector('video');
  const title = layer.querySelector('.home-work-video-title');
  const caption = layer.querySelector('.home-work-video-caption');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  let activeIndex = -1;

  const playVideo = () => {
    if (reducedMotion.matches) {
      video.pause();
      return;
    }
    const attempt = video.play();
    if (attempt?.catch) attempt.catch(() => {});
  };

  const render = () => {
    const raw = Number(visual.getAttribute('data-active-stage'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(stages.length - 1, raw)) : 0;
    if (index === activeIndex) return;
    activeIndex = index;
    const stage = stages[index];

    layer.classList.remove('is-changing');
    void layer.offsetWidth;
    layer.classList.add('is-changing');

    title.textContent = `${String(index + 1).padStart(2, '0')} / ${stage.title}`;
    caption.textContent = stage.caption;

    video.pause();
    video.src = stage.src;
    video.currentTime = 0;
    video.load();
    playVideo();
  };

  video.addEventListener('loadedmetadata', () => {
    try { video.currentTime = 0; } catch (_) {}
    playVideo();
  });

  video.addEventListener('timeupdate', () => {
    if (!Number.isFinite(video.currentTime) || video.currentTime < 2) return;
    try {
      video.currentTime = 0;
      playVideo();
    } catch (_) {}
  });

  video.addEventListener('ended', () => {
    try { video.currentTime = 0; } catch (_) {}
    playVideo();
  });

  new MutationObserver(render).observe(visual, {
    attributes: true,
    attributeFilter: ['data-active-stage']
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) playVideo();
      else video.pause();
    });
  }, { threshold: 0.15 });
  observer.observe(section);

  reducedMotion.addEventListener?.('change', playVideo);
  render();
})();
