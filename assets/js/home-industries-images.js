(() => {
  'use strict';

  const section = document.querySelector('.home-page #industries');
  if (!section) return;

  const images = {
    'manufacturing': {
      src: 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&w=1600&q=82',
      alt: 'Industrial manufacturing facility with production equipment.'
    },
    'pharma': {
      src: 'https://unsplash.com/photos/k2H_b2AEqbg/download?force=true&w=1600',
      alt: 'Workers in protective clothing inside a pharmaceutical cleanroom.'
    },
    'food-beverage': {
      src: 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=1600&q=82',
      alt: 'Professional food preparation and processing environment.'
    },
    'electronics': {
      src: 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=82',
      alt: 'Electronics manufacturing and circuit technology environment.'
    },
    'automobile': {
      src: 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1600&q=82',
      alt: 'Automotive workshop and vehicle service environment.'
    },
    'warehouses-logistics': {
      src: 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1600&q=82',
      alt: 'Warehouse and logistics environment with stored goods and handling routes.'
    },
    'hospitals-healthcare': {
      src: 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=1600&q=82',
      alt: 'Bright healthcare and hospital interior environment.'
    },
    'data-centres': {
      src: 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1600&q=82',
      alt: 'Data centre with rows of server racks.'
    }
  };

  Object.entries(images).forEach(([slug, image]) => {
    const panel = document.getElementById(`industry-${slug}`);
    const img = panel?.querySelector('.home-media img');
    if (!img) return;
    img.removeAttribute('srcset');
    img.removeAttribute('sizes');
    img.src = image.src;
    img.alt = image.alt;
    img.loading = 'lazy';
    img.decoding = 'async';
    img.referrerPolicy = 'no-referrer';
  });
})();
