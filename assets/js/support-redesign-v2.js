(() => {
  'use strict';

  const page = document.querySelector('.support-v2 .support-main');
  if (!page) return;

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const fine = window.matchMedia('(hover:hover) and (pointer:fine)');

  // Hero depth follows the pointer only on precise-pointer desktops.
  const media = document.querySelector('.support-v2 .support-hero-media');
  if (media) {
    const reset = () => {
      media.style.setProperty('--sv2-rx','0deg');
      media.style.setProperty('--sv2-ry','0deg');
      media.style.setProperty('--sv2-x','50%');
      media.style.setProperty('--sv2-y','50%');
    };
    media.addEventListener('pointermove', (event) => {
      if (!fine.matches || reduced.matches) return reset();
      const r = media.getBoundingClientRect();
      const x = (event.clientX-r.left)/r.width;
      const y = (event.clientY-r.top)/r.height;
      media.style.setProperty('--sv2-x', (x*100).toFixed(1)+'%');
      media.style.setProperty('--sv2-y', (y*100).toFixed(1)+'%');
      media.style.setProperty('--sv2-rx', ((.5-y)*2.2).toFixed(2)+'deg');
      media.style.setProperty('--sv2-ry', ((x-.5)*3.2).toFixed(2)+'deg');
    }, {passive:true});
    media.addEventListener('pointerleave', reset);
  }

  // Desktop section navigator for long support pages.
  const sections = [...page.querySelectorAll(':scope > section')];
  if (sections.length > 2) {
    const nav = document.createElement('nav');
    nav.className = 'sv2-page-nav';
    nav.setAttribute('aria-label','Page sections');
    const buttons = sections.map((section,index) => {
      if (!section.id) section.id = 'section-' + (index+1);
      const eyebrow = section.querySelector('.section-eyebrow,.support-kicker');
      const heading = section.querySelector('h1,h2');
      const label = (eyebrow?.textContent || heading?.textContent || ('Section '+(index+1))).trim().replace(/\s+/g,' ');
      const b = document.createElement('button');
      b.type='button';
      b.setAttribute('aria-label',label);
      b.innerHTML='<span></span>';
      b.querySelector('span').textContent=label;
      b.addEventListener('click',()=>section.scrollIntoView({behavior:reduced.matches?'auto':'smooth',block:'start'}));
      nav.appendChild(b);
      return b;
    });
    document.body.appendChild(nav);

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const i = sections.indexOf(entry.target);
          buttons.forEach((b,j)=>b.classList.toggle('is-active',j===i));
        });
      }, {rootMargin:'-35% 0px -55% 0px',threshold:0});
      sections.forEach(s=>io.observe(s));
    } else {
      buttons[0]?.classList.add('is-active');
    }
  }

  // Principles and cards gain an explicit active state on keyboard/pointer focus.
  document.querySelectorAll('.support-v2 .support-principle,.support-v2 .contact-channel').forEach((card) => {
    const on = () => card.classList.add('is-active');
    const off = () => card.classList.remove('is-active');
    card.addEventListener('pointerenter',on);
    card.addEventListener('pointerleave',off);
    card.addEventListener('focusin',on);
    card.addEventListener('focusout',off);
  });

  // Projects cards: spotlight tracks pointer to make the photo/copy relationship feel interactive.
  document.querySelectorAll('.support-v2.projects-page .project-card').forEach((card) => {
    card.addEventListener('pointermove',(event)=>{
      if(!fine.matches || reduced.matches) return;
      const r=card.getBoundingClientRect();
      card.style.setProperty('--card-x',(((event.clientX-r.left)/r.width)*100).toFixed(1)+'%');
      card.style.setProperty('--card-y',(((event.clientY-r.top)/r.height)*100).toFixed(1)+'%');
    },{passive:true});
  });
})();
