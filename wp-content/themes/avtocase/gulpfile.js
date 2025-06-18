// gulpfile.js - Main entry point
import gulp from 'gulp';
import { compileStyles, compileBlockStyles, watchStyles } from './gulp/styles.js';
import { buildSvgSprite } from './gulp/svg.js';
import { generateSassDoc, generateJSDoc } from './gulp/docs.js';
import { copyImages } from './gulp/images.js';
import { copyFonts } from './gulp/fonts.js';

function watchFiles() {
    watchStyles();
}

export const build = gulp.parallel(compileStyles, compileBlockStyles);
export const docs = gulp.parallel(generateSassDoc, generateJSDoc);
export const watch = gulp.series(build, watchFiles);
export default watch;
export const production = gulp.series(build);
export const svg = buildSvgSprite;
export const images = copyImages;
export const fonts = copyFonts;