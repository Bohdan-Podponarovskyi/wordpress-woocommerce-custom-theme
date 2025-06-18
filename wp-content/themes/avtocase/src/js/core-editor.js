import LazyLoad from './libs/vanilla-lazyload';
import { onDomReady } from './utils/dom';
import initSwiperBlocks from './acf-blocks/swiper-blocks';

(function () {
    // Make sure WordPress editor dependencies are available
    const { domReady } = wp;

    console.log('Editor JS loaded');
    console.log(wp);

    domReady(function () {
        console.log('Editor DOM Ready - Setting up Swiper watcher');

        // Set up a mutation observer to watch for our blocks being added/modified
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.addedNodes.length || mutation.type === 'attributes') {
                    // Look for swiper blocks after DOM changes
                    setTimeout(initSwiperBlocks, 300); // Small delay to ensure rendering
                }
            });
        });

        // Start observing the editor canvas
        const editorCanvas =
            document.querySelector('.editor-styles-wrapper') ||
            document.querySelector('.block-editor-block-list__layout');
        if (editorCanvas) {
            observer.observe(editorCanvas, {
                childList: true,
                subtree: true,
                attributes: true,
            });

            // Also run on initial load
            setTimeout(initSwiperBlocks, 300);
        }

        // Additional hook for block preview render
        if (window.acf && window.acf.addAction) {
            window.acf.addAction('render_block_preview', initSwiperBlocks);
            window.acf.addAction('render_block_preview', () => {
                const lazyLoadInstance = new LazyLoad({
                    // elements_selector: '.lazy',
                    // threshold: 300,
                });
            });
            // wp.hooks.addAction('acf/render_block_preview/type=carousel-cards', 'acfswiper', initSwiperBlocks);
        }
    });
})();
