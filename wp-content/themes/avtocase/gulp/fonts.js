// gulp/fonts.js - Fonts copying tasks
import gulp from 'gulp';
import newer from 'gulp-newer';
import { paths } from './config.js';

export function copyFonts() {
    return gulp
        .src(paths.fonts.src, { encoding: false })
        .pipe(newer(paths.images.dest))
        .pipe(gulp.dest(paths.fonts.dest));
}