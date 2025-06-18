/**
 * @fileoverview Swiper utility functions
 * @description Helper functions for working with Swiper configurations
 */

import { SWIPER_TYPE_CONFIG } from '../constants';
import Swiper from '../libs/swiper';

/**
 * Get configuration for a specific swiper type
 * @function
 * @param {string} type - The type of swiper
 * @returns {Object} - Configuration object for the specified type
 */
export const getSwiperConfig = (type) => {
    return { ...(SWIPER_TYPE_CONFIG[type] || {}) };
};

/**
 * Initializes a new Swiper instance with navigation module
 * @function
 * @memberof module:SwiperUtils
 * @param {string|HTMLElement} selector - data-attribute for Swiper container
 * @param {Object} [options={}] - Optional Swiper configuration options
 * @returns {Swiper} New Swiper instance
 * @example
 * // Initialize with custom options
 * const customSwiper = initSwiper('[data-swiper-container]', {
 *   slidesPerView: 3,
 *   spaceBetween: 20
 * });
 */
export const initSwiper = (selector, options = {}) => {
    const defaultOptions = {
        // modules: [Navigation],
        // TODO: check options with vanilla-lazyload
        // Let vanilla-lazyload handle image loading
        // watchSlidesProgress: true,
        // Performance optimization
        // observer: true,
        // observeParents: true,
        // resizeObserver: true,
    };

    return new Swiper(selector, { ...defaultOptions, ...options });
};

/**
 * Initializes Swiper instances for multiple elements
 * @function
 * @memberof module:SwiperUtils
 * @param {string} selector - CSS selector for multiple Swiper containers
 * @param {Object} [options={}] - Swiper configuration options
 * @returns {Array<Swiper>} Array of Swiper instances
 * @example
 * // Initialize all swipers with the same options
 * const allSwipers = initMultipleSwipers('[data-swiper-container]', {
 *   loop: true,
 *   autoplay: {
 *     delay: 3000
 *   }
 * });
 */
export const initMultipleSwipers = (selector, options = {}) => {
    const elements = document.querySelectorAll(selector);
    return Array.from(elements).map((element) => initSwiper(element, options));
};

/**
 * Destroy one or multiple Swiper instances. Maybe will be used in the future
 * @function
 * @memberof module:SwiperUtils
 * @param {Swiper|Array<Swiper>} instance - Swiper instance(s) to destroy
 * @example
 * // Destroy a single swiper instance
 * destroySwiper(mySwiper);
 *
 * // Destroy multiple swiper instances
 * destroySwiper(allSwipers);
 */
export const destroySwiper = (instance) => {
    if (Array.isArray(instance)) {
        instance.forEach((swiper) => {
            if (swiper && typeof swiper.destroy === 'function') {
                swiper.destroy(true, true);
            }
        });
    } else if (instance && typeof instance.destroy === 'function') {
        instance.destroy(true, true);
    }
};

/**
 * Toggles Swiper enabled state based on condition (typically breakpoint changes).
 * Resets to first slide before enabling/disabling to ensure consistent state.
 *
 * @function
 * @memberof module:SwiperUtils
 * @param {Object} swiper - The Swiper instance to toggle
 * @param {boolean} shouldDisable - Whether the swiper should be disabled
 * @example
 * // Toggle swiper based on desktop breakpoint
 * const shouldDisable = isDesktop();
 * toggleSwiperEnabled(mySwiper, shouldDisable);
 *
 * @example
 * // Use in swiper resize event
 * on: {
 *   resize() {
 *     const shouldDisable = window.innerWidth >= 1140;
 *     toggleSwiperEnabled(this, shouldDisable);
 *     this.update();
 *   }
 * }
 */
export const toggleSwiperEnabled = (swiper, shouldDisable) => {
    if (shouldDisable && swiper.enabled) {
        swiper.slideTo(0, 0);
        swiper.disable();
    } else if (!shouldDisable && !swiper.enabled) {
        swiper.slideTo(0, 0);
        swiper.enable();
    }
}