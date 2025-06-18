import { BREAKPOINTS } from '../constants';

/**
 * Checks if the current viewport matches a specific breakpoint using CSS media queries.
 * More reliable than window.innerWidth as it matches CSS behavior exactly.
 *
 * @param {number} breakpoint - The breakpoint value in pixels
 * @param {string} [operator='min'] - The comparison operator ('min' or 'max')
 * @returns {boolean} True if the media query matches
 * @example
 * // Check if viewport is 768px or wider
 * matchBreakpoint(768, 'min'); // true/false
 *
 * // Check if viewport is 767px or narrower
 * matchBreakpoint(768, 'max'); // true/false
 */
export const matchBreakpoint = (breakpoint, operator = 'min') => {
    const query = operator === 'min'
        ? `(min-width: ${breakpoint}px)`
        : `(max-width: ${breakpoint - 1}px)`;

    return window.matchMedia(query).matches;
};

/**
 * Checks if the current viewport is small mobile and up (440px+).
 *
 * @returns {boolean} True if viewport is 440px or wider
 * @example
 * if (isSm()) {
 *     // Apply styles for small screens and up
 * }
 */
export const isSm = () => matchBreakpoint(BREAKPOINTS.SM);

/**
 * Checks if the current viewport is medium/tablet and up (744px+).
 *
 * @returns {boolean} True if viewport is 744px or wider
 * @example
 * if (isMd()) {
 *     // Apply tablet styles and up
 * }
 */
export const isMd = () => matchBreakpoint(BREAKPOINTS.MD);

/**
 * Checks if the current viewport is large/desktop and up (1140px+).
 *
 * @returns {boolean} True if viewport is 1140px or wider
 * @example
 * if (isLg()) {
 *     // Apply desktop styles and up
 * }
 */
export const isLg = () => matchBreakpoint(BREAKPOINTS.LG);

/**
 * Checks if the current viewport is extra large and up (1440px+).
 *
 * @returns {boolean} True if viewport is 1440px or wider
 * @example
 * if (isXl()) {
 *     // Apply large desktop styles and up
 * }
 */
export const isXl = () => matchBreakpoint(BREAKPOINTS.XL);

/**
 * Checks if the current viewport is extra extra large and up (1728px+).
 *
 * @returns {boolean} True if viewport is 1728px or wider
 * @example
 * if (isXxl()) {
 *     // Apply very large desktop styles
 * }
 */
export const isXxl = () => matchBreakpoint(BREAKPOINTS.XXL);

/**
 * Checks if the current viewport is in mobile range (below 744px).
 * Useful for mobile-specific functionality.
 *
 * @returns {boolean} True if viewport is below 744px
 * @example
 * if (isMobile()) {
 *     // Mobile-only code
 *     initMobileMenu();
 * }
 */
export const isMobile = () => !matchBreakpoint(BREAKPOINTS.MD);

/**
 * Checks if the current viewport is in tablet range (744px - 1139px).
 * Specifically between medium and large breakpoints.
 *
 * @returns {boolean} True if viewport is between 744px and 1139px
 * @example
 * if (isTablet()) {
 *     // Tablet-specific layouts
 *     adjustTabletLayout();
 * }
 */
export const isTablet = () => matchBreakpoint(BREAKPOINTS.MD) && !matchBreakpoint(BREAKPOINTS.LG);

/**
 * Checks if the current viewport is in desktop range (1140px+).
 * Includes all desktop sizes from large and up.
 *
 * @returns {boolean} True if viewport is 1140px or wider
 * @example
 * if (isDesktop()) {
 *     // Desktop-specific functionality
 *     initDesktopFeatures();
 * }
 */
export const isDesktop = () => matchBreakpoint(BREAKPOINTS.LG);

/**
 * Checks if the current viewport is in large desktop range (1440px+).
 * For screens that need special handling on very large displays.
 *
 * @returns {boolean} True if viewport is 1440px or wider
 * @example
 * if (isLargeDesktop()) {
 *     // Large desktop optimizations
 *     enableAdvancedAnimations();
 * }
 */
export const isLargeDesktop = () => matchBreakpoint(BREAKPOINTS.XL);

/**
 * Checks if the current viewport is in extra large desktop range (1728px+).
 * For ultra-wide displays and very large screens.
 *
 * @returns {boolean} True if viewport is 1728px or wider
 * @example
 * if (isXLargeDesktop()) {
 *     // Ultra-wide display layouts
 *     enableUltraWideLayout();
 * }
 */
export const isXLargeDesktop = () => matchBreakpoint(BREAKPOINTS.XXL);

/**
 * Gets the current breakpoint name based on viewport width.
 * Returns the largest breakpoint that the current viewport matches.
 *
 * @returns {string} The breakpoint name: 'xs', 'SM', 'MD', 'LG', 'XL', or 'XXL'
 * @example
 * const currentBp = getCurrentBreakpoint();
 *
 * switch (currentBp) {
 *     case 'xs':
 *     case 'SM':
 *         // Mobile handling
 *         break;
 *     case 'MD':
 *         // Tablet handling
 *         break;
 *     default:
 *         // Desktop handling
 * }
 */
export const getCurrentBreakpoint = () => {
    if (isXxl()) return 'XXL';
    if (isXl()) return 'XL';
    if (isLg()) return 'LG';
    if (isMd()) return 'MD';
    if (isSm()) return 'SM';
    return 'XS';
};

/**
 * Checks if the current viewport is between two specific breakpoints.
 * Useful for targeting specific ranges without writing complex conditions.
 *
 * @param {string} minBreakpoint - The minimum breakpoint name (e.g., 'SM', 'MD')
 * @param {string} maxBreakpoint - The maximum breakpoint name (e.g., 'LG', 'XL')
 * @returns {boolean} True if viewport is within the specified range
 * @example
 * // Check if viewport is between tablet and desktop
 * if (isBetween('MD', 'XL')) {
 *     // Viewport is 744px - 1439px
 *     applyMidRangeLayout();
 * }
 *
 * // Check if viewport is between small mobile and tablet
 * if (isBetween('SM', 'LG')) {
 *     // Viewport is 440px - 1139px
 *     enableSwiper();
 * }
 */
export const isBetween = (minBreakpoint, maxBreakpoint) => {
    return matchBreakpoint(BREAKPOINTS[minBreakpoint]) &&
        !matchBreakpoint(BREAKPOINTS[maxBreakpoint]);
};