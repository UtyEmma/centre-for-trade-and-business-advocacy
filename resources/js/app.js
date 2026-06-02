import 'fslightbox';
import Masonry from 'masonry-layout';
// import Alpine from 'alpinejs'
// import masonry from 'alpinejs-masonry'
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
// import masonry from 'data-masonry'

// Alpine.plugin(masonry)
// // Alpine.start()
// console.log(Alpine)
// Livewire.start()

// document.addEventListener('DOMContentLoaded', masonry())

const galleryLayouts = new WeakMap();

function relayoutWhenMediaLoads(grid, masonry) {
    grid.querySelectorAll('img').forEach((image) => {
        if (image.complete) {
            return;
        }

        image.addEventListener('load', () => masonry.layout(), { once: true });
        image.addEventListener('error', () => masonry.layout(), { once: true });
    });

    grid.querySelectorAll('video').forEach((video) => {
        if (video.readyState >= 1) {
            return;
        }

        video.addEventListener('loadedmetadata', () => masonry.layout(), { once: true });
        video.addEventListener('loadeddata', () => masonry.layout(), { once: true });
        video.addEventListener('error', () => masonry.layout(), { once: true });
    });

    window.addEventListener('load', () => masonry.layout(), { once: true });
}

function initializeGallery() {
    document.querySelectorAll('[data-gallery-masonry]').forEach((grid) => {
        galleryLayouts.get(grid)?.destroy();

        const masonry = new Masonry(grid, {
            itemSelector: '[data-gallery-item]',
            columnWidth: '.gallery-masonry-sizer',
            gutter: 10,
            percentPosition: true,
            transitionDuration: '0.2s',
        });

        galleryLayouts.set(grid, masonry);
        relayoutWhenMediaLoads(grid, masonry);

        requestAnimationFrame(() => masonry.layout());
    });

    if (typeof window.refreshFsLightbox === 'function') {
        window.refreshFsLightbox();
    }
}

window.initializeGallery = initializeGallery;

document.addEventListener('DOMContentLoaded', initializeGallery);
document.addEventListener('livewire:navigated', initializeGallery);
