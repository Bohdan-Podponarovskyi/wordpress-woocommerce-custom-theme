import { SWIPER_SELECTORS } from '../constants';
import { getSwiperConfig, initSwiper } from '../utils';

export const initSwiperBlocks = () => {
    const swiperBlocks = document.querySelectorAll(SWIPER_SELECTORS.SWIPER_BLOCK);

    if (!swiperBlocks.length) return;

    swiperBlocks.forEach((block) => {
        const swiperContainer = block.querySelector(SWIPER_SELECTORS.SWIPER_CONTAINER);
        if (!swiperContainer) return;

        const swiperType = swiperContainer.getAttribute(SWIPER_SELECTORS.ATTR.TYPE);
        const config = getSwiperConfig(swiperType);

        const nextButton = block.querySelector(SWIPER_SELECTORS.NAVIGATION.NEXT);
        const prevButton = block.querySelector(SWIPER_SELECTORS.NAVIGATION.PREV);

        if (nextButton && prevButton) {
            config.navigation = {
                nextEl: nextButton,
                prevEl: prevButton,
            };
        }

        initSwiper(swiperContainer, config);
    });
};

export default initSwiperBlocks;
