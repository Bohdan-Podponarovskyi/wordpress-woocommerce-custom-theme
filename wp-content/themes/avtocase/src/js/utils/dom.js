/**
 * Executes a callback function when the DOM is fully loaded and ready.
 * If DOM is already loaded, executes the callback immediately.
 * Otherwise, waits for the DOMContentLoaded event.
 *
 * @param {Function} callback - The function to execute when DOM is ready
 * @example
 * onDomReady(() => {
 *     // DOM is ready, you can safely access the DOM
 *     myFunction();
 *     // or
 *     const element = document.querySelector('.my-element');
 * });
 */

export const onDomReady = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback);
    } else {
        callback();
    }
};
