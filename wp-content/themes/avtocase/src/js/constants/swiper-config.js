/**
 * @fileoverview Swiper configuration constants
 * @module SwiperConfig
 * @description Predefined configurations for different types of Swiper instances
 */

import { EffectFade, Autoplay } from '../libs/swiper';
import { isDesktop, toggleSwiperEnabled } from "../utils";

/**
 * Banners carousel swiper configuration
 * @constant
 * @type {Object}
 */
const BANNERS_SWIPER_CONFIG = {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    modules: [EffectFade],
    effect: 'fade',
};

/**
 * Card carousel swiper configuration
 * @constant
 * @type {Object}
 */
const CARDS_SWIPER_CONFIG = {
    slidesPerView: 1.15,
    spaceBetween: 16,
    loop: true,
    speed: 800,
    slidesOffsetBefore: 16,
    slidesOffsetAfter: 16,
    breakpoints: {
        440: {
            slidesPerView: 1.4,
            spaceBetween: 16,
        },
        744: {
            slidesPerView: 2.2,
            spaceBetween: 16,
        },
        1140: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1440: {
            slidesPerView: 4,
            spaceBetween: 24,
        },
    },
};

/**
 * Collection products swiper configuration
 * @constant
 * @type {Object}
 */
const PRODUCTS_SWIPER_CONFIG = {
    slidesPerView: 1.15,
    spaceBetween: 16,
    // loop: true,
    speed: 800,
    slidesOffsetBefore: 16,
    slidesOffsetAfter: 16,
    breakpoints: {
        440: {
            slidesPerView: 1.4,
            spaceBetween: 16,
            slidesOffsetBefore: 16,
            slidesOffsetAfter: 16,
        },
        744: {
            slidesPerView: 2.2,
            spaceBetween: 16,
            slidesOffsetBefore: 16,
            slidesOffsetAfter: 16,
        },
        1140: {
            enabled: false,
            slidesPerView: 'auto',
            spaceBetween: 0,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
        },
    },
    on: {
        resize() {
            const shouldDisable = isDesktop();
            toggleSwiperEnabled(this, shouldDisable);
            this.update();
        }
    }
};

/**
 * Marquee carousel swiper configuration
 * @constant
 * @type {Object}
 */
const MARQUEE_SWIPER_CONFIG = {
    slidesPerView: 'auto',
    spaceBetween: 24,
    speed: 4000,
    loop: true,
    allowTouchMove: false,
    autoplay: {
        delay: false,
        disableOnInteraction: false
    },
    modules: [Autoplay],
    // breakpoints: {
    //     768: {
    //         spaceBetween: 16,
    //         speed: 5000,
    //         autoplay: {
    //             delay: 0,
    //             disableOnInteraction: false
    //         },
    //     }
    // }
};


/**
 * Configuration map for different swiper types
 * @constant
 * @type {Object.<string, Object>}
 */
export const SWIPER_TYPE_CONFIG = {
    banners: BANNERS_SWIPER_CONFIG,
    cards: CARDS_SWIPER_CONFIG,
    products: PRODUCTS_SWIPER_CONFIG,
    marquee: MARQUEE_SWIPER_CONFIG,
};
