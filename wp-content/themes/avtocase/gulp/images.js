// gulp/images.js - Image copying tasks
import gulp from 'gulp';
import newer from 'gulp-newer';
import { paths } from './config.js';

export function copyImages() {
    return gulp
        .src(paths.images.src, { encoding: false })
        .pipe(newer(paths.images.dest))
        .pipe(gulp.dest(paths.images.dest));
}