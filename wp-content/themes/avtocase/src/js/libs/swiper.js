/**
 * @fileoverview Swiper initialization and management utilities
 * @module SwiperUtils
 * @description Utilities for initializing and managing Swiper instances
 * @requires swiper
 */

import Swiper from 'swiper';
import {Navigation, EffectFade, Autoplay} from 'swiper/modules';

Swiper.use([Navigation]);

export default Swiper;
export {EffectFade, Autoplay};
