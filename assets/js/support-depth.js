(() => {
    'use strict';

    const finePointer = window.matchMedia('(hover:hover) and (pointer:fine)');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion:reduce)');

    const media = document.querySelector('.support-page .support-hero-media');
    if (media) {
        let frame = 0;
        const reset = () => {
            cancelAnimationFrame(frame);
            media.style.setProperty('--support-rx', '0deg');
            media.style.setProperty('--support-ry', '0deg');
        };
        media.addEventListener('pointermove', (event) => {
            if (!finePointer.matches || reducedMotion.matches) return reset();
            const bounds = media.getBoundingClientRect();
            const x = ((event.clientX - bounds.left) / bounds.width - .5) * 2;
            const y = ((event.clientY - bounds.top) / bounds.height - .5) * 2;
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(() => {
                media.style.setProperty('--support-rx', `${(-y * 2.1).toFixed(2)}deg`);
                media.style.setProperty('--support-ry', `${(x * 3.1).toFixed(2)}deg`);
            });
        }, { passive: true });
        media.addEventListener('pointerleave', reset);
        reducedMotion.addEventListener('change', reset);
    }

    const dialog = document.querySelector('[data-gallery-dialog]');
    if (!dialog || typeof dialog.showModal !== 'function') return;
    const image = dialog.querySelector('[data-gallery-dialog-image]');
    const caption = dialog.querySelector('[data-gallery-dialog-caption]');
    const close = dialog.querySelector('[data-gallery-close]');
    let opener = null;

    document.querySelectorAll('[data-gallery-src]').forEach((tile) => {
        tile.addEventListener('click', () => {
            opener = tile;
            image.src = tile.dataset.gallerySrc || '';
            image.alt = tile.dataset.galleryAlt || 'Expanded project image';
            caption.textContent = tile.dataset.galleryAlt || '';
            dialog.showModal();
            close.focus();
        });
    });

    close.addEventListener('click', () => dialog.close());
    dialog.addEventListener('click', (event) => {
        if (event.target === dialog) dialog.close();
    });
    dialog.addEventListener('close', () => {
        image.removeAttribute('src');
        if (opener) opener.focus();
    });
})();
