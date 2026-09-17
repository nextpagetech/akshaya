(() => {
  'use strict';

  const section = document.querySelector('.home-page #industries');
  const legacy = section?.querySelector('.home-industries');
  if (!section || !legacy || legacy.classList.contains('is-video-grid')) return;

  const cards = [
    {
      slug: 'manufacturing',
      title: 'Manufacturing',
      tagline: 'Heavy traffic. Continuous operations.',
      video: 'https://videos.pexels.com/video-files/32243651/13751466_3840_2160_25fps.mp4',
      poster: 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?auto=format&fit=crop&w=1000&q=82'
    },
    {
      slug: 'pharma',
      title: 'Pharma',
      tagline: 'Controlled, clean production environments.',
      video: 'https://videos.pexels.com/video-files/31522467/13436992_3840_2160_50fps.mp4',
      poster: 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?auto=format&fit=crop&w=1000&q=82'
    },
    {
      slug: 'food-beverage',
      title: 'Food & Beverage',
      tagline: 'Hygiene-led processing and cleaning routines.',
      video: 'https://videos.pexels.com/video-files/10416677/10416677-hd_1280_720_50fps.mp4',
      poster: 'https://images.unsplash.com/photo-1556911220-bff31c812dba?auto=format&fit=crop&w=1000&q=82'
    },
    {
      slug: 'electronics',
      title: 'Electronics',
      tagline: 'Precision work and static-sensitive environments.',
      video: 'https://videos.pexels.com/video-files/4709394/4709394-uhd_4096_2160_25fps.mp4',
      poster: 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1000&q=82'
    },
    {
      slug: 'automobile',
      title: 'Automobile',
      tagline: 'Assembly, movement and demanding work zones.',
      video: 'https://videos.pexels.com/video-files/4468754/4468754-uhd_3840_2160_24fps.mp4',
      poster: 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1000&q=82'
    },
    {
      slug: 'warehouses-logistics',
      title: 'Warehouses & Logistics',
      tagline: 'Forklift movement, loads and turnaround.',
      video: 'https://videos.pexels.com/video-files/6194507/6194507-uhd_3840_2160_30fps.mp4',
      poster: 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1000&q=82'
    },
    {
      slug: 'hospitals-healthcare',
      title: 'Hospitals & Healthcare',
      tagline: 'Cleanable spaces designed around daily care.',
      video: 'https://videos.pexels.com/video-files/6130553/6130553-hd_1920_1080_30fps.mp4',
      poster: 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=1000&q=82'
    },
    {
      slug: 'data-centres',
      title: 'Data Centres',
      tagline: 'Critical technical environments and controlled access.',
      video: 'https://videos.pexels.com/video-files/5028622/5028622-uhd_3840_2160_25fps.mp4',
      poster: 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1000&q=82'
    }
  ];

  const fallbackHref = (slug) => `industries/${slug}.php`;
  const hrefFor = (slug) => {
    const legacyPanel = section.querySelector(`#industry-${slug}`);
    return legacyPanel?.querySelector('.link-arrow')?.getAttribute('href') || fallbackHref(slug);
  };

  const grid = document.createElement('div');
  grid.className = 'industry-video-grid';
  grid.setAttribute('aria-label', 'Featured industries');

  cards.forEach((item, index) => {
    const link = document.createElement('a');
    link.className = 'industry-video-card';
    link.href = hrefFor(item.slug);
    link.setAttribute('aria-label', `Explore ${item.title}`);
    link.innerHTML = `
      <span class="industry-card-poster" style="background-image:url('${item.poster}')" aria-hidden="true"></span>
      <video class="industry-card-video" muted loop playsinline autoplay preload="none" aria-hidden="true" data-video-src="${item.video}"></video>
      <span class="industry-card-scan" aria-hidden="true"></span>
      <span class="industry-card-index" aria-hidden="true">${String(index + 1).padStart(2, '0')}</span>
      <span class="industry-card-topline" aria-hidden="true">Loop</span>
      <span class="industry-card-copy"><strong>${item.title}</strong><span>${item.tagline}</span></span>
      <span class="industry-card-arrow" aria-hidden="true">→</span>
    `;
    grid.appendChild(link);
  });

  const footer = document.createElement('div');
  footer.className = 'industries-grid-footer';
  footer.innerHTML = '<a href="industries/manufacturing.php">Explore All Industries <span aria-hidden="true">→</span></a>';

  legacy.classList.add('is-video-grid');
  legacy.appendChild(grid);
  legacy.appendChild(footer);

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const videos = [...grid.querySelectorAll('.industry-card-video')];

  const start = (video) => {
    if (reducedMotion.matches) return;
    if (!video.src) video.src = video.dataset.videoSrc;
    const promise = video.play();
    if (promise?.catch) promise.catch(() => {});
  };

  const stop = (video) => {
    video.pause();
  };

  videos.forEach((video) => {
    video.addEventListener('playing', () => video.closest('.industry-video-card')?.classList.add('is-video-ready'), { once: true });
    video.addEventListener('timeupdate', () => {
      if (video.currentTime >= 2) video.currentTime = 0;
    });
  });

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        const video = entry.target;
        if (entry.isIntersecting && entry.intersectionRatio > .2) start(video);
        else stop(video);
      });
    }, { rootMargin: '180px 0px', threshold: [0, .2, .55] });
    videos.forEach((video) => observer.observe(video));
  } else {
    videos.forEach(start);
  }

  document.addEventListener('visibilitychange', () => {
    videos.forEach((video) => {
      if (document.hidden) stop(video);
      else if (video.getBoundingClientRect().top < innerHeight && video.getBoundingClientRect().bottom > 0) start(video);
    });
  });
})();
