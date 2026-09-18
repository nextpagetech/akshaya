(() => {
  'use strict';

  const home = document.querySelector('.home-page');
  const stage = home?.querySelector('.assessment-lab-stage');
  const scene = stage?.querySelector('.lab-scene');
  if (!home || !stage || !scene) return;

  const states = [
    {
      title: 'Surface Condition',
      caption: 'Inspect cracks, worn coating, joints and damaged areas before any system is recommended.',
      src: 'https://videos.pexels.com/video-files/31628000/13475025_3840_2160_30fps.mp4',
      start: 0.7,
      story: 'surface'
    },
    {
      title: 'Moisture / Site Assessment',
      caption: 'Check substrate and site conditions so hidden moisture risks are identified before application.',
      src: 'https://videos.pexels.com/video-files/4293956/4293956-uhd_3840_2160_25fps.mp4',
      start: 1.0,
      story: 'moisture'
    },
    {
      title: 'Operating Environment',
      caption: 'Understand traffic, machinery, loads and how the floor is actually used every day.',
      src: 'https://videos.pexels.com/video-files/31628000/13475025_3840_2160_30fps.mp4',
      start: 3.6,
      story: 'operation'
    },
    {
      title: 'Correct System Selection',
      caption: 'Bring the assessment together and match site conditions to the appropriate flooring approach.',
      src: 'https://videos.pexels.com/video-files/4293956/4293956-uhd_3840_2160_25fps.mp4',
      start: 4.8,
      story: 'selection'
    },
    {
      title: 'Controlled Application',
      caption: 'Preparation and coating are carried out in a controlled sequence with clear work zones.',
      src: 'https://videos.pexels.com/video-files/34994495/14825809_2160_3840_30fps.mp4',
      start: 1.4,
      story: 'application'
    },
    {
      title: 'Final Inspection',
      caption: 'Review the finished floor, completed areas and agreed scope before handover.',
      src: 'https://videos.pexels.com/video-files/31628000/13475025_3840_2160_30fps.mp4',
      start: 5.8,
      story: 'inspection'
    }
  ];

  const fallback = 'https://videos.pexels.com/video-files/34994495/14825809_2160_3840_30fps.mp4';
  const loopLength = 2;

  scene.querySelectorAll(':scope > .real-photo-fill').forEach((node) => node.remove());
  scene.classList.remove('has-real-photo');

  const layer = document.createElement('div');
  layer.className = 'assessment-video-layer';
  layer.innerHTML = `
    <video class="assessment-stage-video" muted autoplay playsinline preload="auto" aria-hidden="true"></video>
    <span class="assessment-video-shade" aria-hidden="true"></span>
    <div class="assessment-story-overlay" aria-hidden="true">
      <span class="assessment-story assessment-story--surface">
        <i class="assessment-crack"></i><i class="assessment-scan-line"></i>
        <b>Surface damage check</b><small>Cracks · wear · existing finish</small>
      </span>
      <span class="assessment-story assessment-story--moisture">
        <i class="assessment-meter"></i><i class="assessment-moisture-ring"></i>
        <b>Moisture reading</b><small>Substrate condition check</small>
      </span>
      <span class="assessment-story assessment-story--operation">
        <i class="assessment-route"></i><i class="assessment-load"></i>
        <b>Operating load</b><small>Traffic · equipment · movement</small>
      </span>
      <span class="assessment-story assessment-story--selection">
        <i class="assessment-factor assessment-factor--a">Surface</i>
        <i class="assessment-factor assessment-factor--b">Moisture</i>
        <i class="assessment-factor assessment-factor--c">Traffic</i>
        <i class="assessment-choice">System selection</i>
      </span>
      <span class="assessment-story assessment-story--application">
        <i class="assessment-apply-sweep"></i>
        <b>Controlled application</b><small>Prepare → apply → verify</small>
      </span>
      <span class="assessment-story assessment-story--inspection">
        <i class="assessment-inspection-line"></i>
        <i class="assessment-check assessment-check--1">✓</i>
        <i class="assessment-check assessment-check--2">✓</i>
        <i class="assessment-check assessment-check--3">✓</i>
        <b>Final inspection</b><small>Completed floor review</small>
      </span>
    </div>
    <div class="assessment-video-meta">
      <span class="assessment-video-kicker">Floor analysis</span>
      <strong class="assessment-video-title"></strong>
      <span class="assessment-video-caption"></span>
    </div>`;

  scene.appendChild(layer);

  const video = layer.querySelector('video');
  const title = layer.querySelector('.assessment-video-title');
  const caption = layer.querySelector('.assessment-video-caption');
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  let active = -1;
  let visible = true;
  let usingFallback = false;

  video.muted = true;
  video.defaultMuted = true;
  video.autoplay = true;
  video.playsInline = true;

  const safePlay = () => {
    if (!visible || reduced.matches) return;
    const p = video.play();
    if (p?.catch) p.catch(() => {});
  };

  const seek = () => {
    const item = states[active] || states[0];
    const desired = usingFallback ? 0.8 : item.start;
    const duration = Number.isFinite(video.duration) ? video.duration : 0;
    const maxStart = duration > loopLength ? Math.max(0, duration - loopLength - 0.1) : desired;
    try { video.currentTime = Math.min(desired, maxStart); } catch (_) {}
  };

  video.addEventListener('loadedmetadata', () => { seek(); safePlay(); });
  video.addEventListener('canplay', safePlay);
  video.addEventListener('timeupdate', () => {
    const item = states[active] || states[0];
    const start = usingFallback ? 0.8 : item.start;
    if (video.currentTime >= start + loopLength) {
      try { video.currentTime = start; } catch (_) {}
      safePlay();
    }
  });
  video.addEventListener('ended', () => { seek(); safePlay(); });
  video.addEventListener('error', () => {
    if (usingFallback || video.src === fallback) return;
    usingFallback = true;
    video.src = fallback;
    video.load();
  });

  const render = () => {
    const raw = Number(stage.getAttribute('data-lab-state'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(states.length - 1, raw)) : 0;
    if (index === active) return;
    active = index;
    usingFallback = false;

    const item = states[index];
    title.textContent = item.title;
    caption.textContent = item.caption;
    layer.dataset.story = item.story;
    layer.classList.remove('is-changing');
    void layer.offsetWidth;
    layer.classList.add('is-changing');

    video.pause();
    video.src = item.src;
    video.load();
    safePlay();
  };

  new MutationObserver(render).observe(stage, {
    attributes: true,
    attributeFilter: ['data-lab-state']
  });

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      visible = entries[0]?.isIntersecting ?? true;
      if (visible) safePlay(); else video.pause();
    }, { rootMargin: '160px 0px', threshold: 0.05 });
    observer.observe(stage);
  }

  reduced.addEventListener?.('change', () => reduced.matches ? video.pause() : safePlay());
  render();
})();