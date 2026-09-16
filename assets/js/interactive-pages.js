(() => {
    'use strict';

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    const fine = window.matchMedia('(hover:hover) and (pointer:fine)');

    const addRevealClasses = () => {
        const page = document.querySelector('.service-main, .industry-main, .support-main');
        if (!page) return;
        const candidates = [
            ...page.querySelectorAll('.section > .container, .section > .container-wide, .service-hero-copy, .service-hero-media, .industry-hero-copy, .industry-hero-media, .support-hero-copy, .support-hero-media')
        ];
        candidates.forEach((el, i) => {
            el.classList.add('inner-reveal');
            if (i % 3 === 1) el.classList.add('inner-reveal-right');
            if (i % 3 === 2) el.classList.add('inner-reveal-left');
        });
        if (reduced.matches || !('IntersectionObserver' in window)) {
            candidates.forEach((el) => el.classList.add('is-inview'));
            return;
        }
        document.documentElement.classList.add('inner-motion-ready');
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-inview');
                io.unobserve(entry.target);
            });
        }, { threshold: .08, rootMargin: '0px 0px -8% 0px' });
        candidates.forEach((el) => {
            const r = el.getBoundingClientRect();
            if (r.top < window.innerHeight && r.bottom > 0) el.classList.add('is-inview');
            else io.observe(el);
        });
    };

    const sectionProgress = () => {
        const sections = [...document.querySelectorAll('.service-main .section, .industry-main .section, .support-main .section')];
        if (!sections.length) return;
        let pending = false;
        const update = () => {
            const vh = window.innerHeight;
            sections.forEach((section) => {
                const r = section.getBoundingClientRect();
                const total = r.height + vh;
                const progress = Math.max(0, Math.min(1, (vh - r.top) / total));
                section.style.setProperty('--section-progress', progress.toFixed(3));
            });
            pending = false;
        };
        window.addEventListener('scroll', () => {
            if (!pending) { pending = true; requestAnimationFrame(update); }
        }, { passive: true });
        window.addEventListener('resize', update, { passive: true });
        update();
    };

    const pointerDepth = (el, xVar, yVar, maxX = 2.2, maxY = 3.2) => {
        if (!el || el.dataset.pointerDepthReady) return;
        let frame = 0;
        const reset = () => {
            cancelAnimationFrame(frame);
            el.style.setProperty(xVar, '0deg');
            el.style.setProperty(yVar, '0deg');
        };
        el.addEventListener('pointermove', (event) => {
            if (!fine.matches || reduced.matches) return reset();
            const r = el.getBoundingClientRect();
            const nx = ((event.clientX - r.left) / r.width - .5) * 2;
            const ny = ((event.clientY - r.top) / r.height - .5) * 2;
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(() => {
                el.style.setProperty(xVar, `${(-ny * maxX).toFixed(2)}deg`);
                el.style.setProperty(yVar, `${(nx * maxY).toFixed(2)}deg`);
            });
        }, { passive: true });
        el.addEventListener('pointerleave', reset);
        el.dataset.pointerDepthReady = 'true';
    };

    const serviceExperience = () => {
        const page = document.querySelector('.service-page');
        if (!page) return;
        const media = page.querySelector('.service-benefits-media');
        if (!media) return;
        media.dataset.benefitState = '0';
        pointerDepth(media, '--service-depth-x', '--service-depth-y', 2, 3);
        const items = [...page.querySelectorAll('.service-benefit')];
        items.forEach((item, i) => {
            const activate = () => {
                const state = String(i % 4);
                media.dataset.benefitState = state;
                items.forEach((x, j) => x.classList.toggle('is-active', j === i));
            };
            item.addEventListener('pointerenter', activate);
            item.addEventListener('focusin', activate);
            item.addEventListener('click', activate);
        });
        if (items[0]) items[0].classList.add('is-active');
    };

    const industryExperience = () => {
        const page = document.querySelector('.industry-page');
        if (!page) return;
        const media = page.querySelector('.industry-hero-media');
        const items = [...page.querySelectorAll('.industry-challenge, .industry-assessment-step')];
        if (!media || !items.length) return;
        items.forEach((item, i) => {
            const activate = () => {
                const state = i % 4;
                media.dataset.envState = String(state);
                items.forEach((x, j) => x.classList.toggle('is-active', j === i));
                const controls = media.querySelectorAll('.industry-visual-controls button');
                controls.forEach((button, j) => button.setAttribute('aria-pressed', String(j === state)));
            };
            item.addEventListener('pointerenter', activate);
            item.addEventListener('focusin', activate);
        });
    };

    const galleryExperience = () => {
        const page = document.querySelector('.gallery-page');
        if (!page) return;
        const dialog = page.querySelector('.gallery-dialog');
        const image = dialog?.querySelector('img');
        const caption = dialog?.querySelector('figcaption');
        const close = dialog?.querySelector('.gallery-dialog-close');
        if (!dialog || !image || !caption) return;
        let trigger = null;
        page.querySelectorAll('[data-gallery-src]').forEach((tile) => {
            tile.addEventListener('click', () => {
                trigger = tile;
                image.src = tile.dataset.gallerySrc;
                image.alt = tile.dataset.galleryAlt || '';
                caption.textContent = tile.dataset.galleryCaption || 'Akshaya project source photograph';
                dialog.showModal();
            });
        });
        close?.addEventListener('click', () => dialog.close());
        dialog.addEventListener('click', (event) => {
            if (event.target === dialog) dialog.close();
        });
        dialog.addEventListener('close', () => {
            image.removeAttribute('src');
            trigger?.focus();
        });
    };

    const start = () => {
        addRevealClasses();
        sectionProgress();
        serviceExperience();
        industryExperience();
        galleryExperience();
    };

    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start, { once: true });
    else start();
})();
