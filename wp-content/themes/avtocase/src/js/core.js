import LazyLoad from './libs/vanilla-lazyload';
import { onDomReady } from './utils/dom';
import initSwiperBlocks from './acf-blocks/swiper-blocks';

import initSeatAnimation from '../js/animations/scroll-animation';

import { ScrollSmoother } from 'gsap/ScrollSmoother';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import {getSwiperConfig, initSwiper} from "./utils/swiper-utils";

// TODO: refactor
const marqueeSwiperInit = () => {
    return initSwiper('[data-swiper-type="marquee"]', getSwiperConfig('marquee'));
}

onDomReady(() => {
    const lazyLoadInstance = new LazyLoad({
        // elements_selector: '.lazy',
        threshold: 300,
    });

    initSwiperBlocks();
    initSeatAnimation();

    // TODO: refactor
    // if (window.location.pathname.includes('dev-1')) {
        window.footerMarquee = marqueeSwiperInit();

        if (window.matchMedia('(min-width: 1140px)').matches) {
            const smoother = ScrollSmoother.create({
                smooth: 2,
                effects: true,
                normalizeScroll: true,
            })

            const footerReveal = ScrollTrigger.create({
                trigger: ".footer",
                start: "bottom bottom",
                pinSpacing: false,
                pin: true,
                onToggle: (state) => {
                    if (window.footerMarquee) {
                        window.footerMarquee.destroy();
                    }
                    window.footerMarquee = marqueeSwiperInit();
                }
            });
        }
    // }
});
