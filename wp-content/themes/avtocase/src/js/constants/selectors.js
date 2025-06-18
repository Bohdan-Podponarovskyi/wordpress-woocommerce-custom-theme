/**
 * @fileoverview DOM selectors used throughout the application
 * @description Centralized collection of CSS selectors for consistent DOM targeting
 */

/**
 * General selectors
 */
export const SELECTORS = {};

/**
 * Swiper-specific selectors
 */
export const SWIPER_SELECTORS = {
    SWIPER_BLOCK: '[data-swiper-block]',
    SWIPER_CONTAINER: '[data-swiper-container]',
    NAVIGATION: {
        PREV: '[data-swiper-prev]',
        NEXT: '[data-swiper-next]',
    },
    ATTR: {
        TYPE: 'data-swiper-type',
    },
};
