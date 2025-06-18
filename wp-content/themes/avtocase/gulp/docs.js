// gulp/docs.js - Documentation generation tasks
import gulp from 'gulp';
import sassdoc from 'sassdoc';
import jsdoc from 'gulp-jsdoc3';
import { paths, jsdocConfig } from './config.js';

export function generateSassDoc() {
    return gulp.src(paths.sassdoc.src).pipe(sassdoc(paths.sassdoc.options));
}

export function generateJSDoc() {
    return gulp.src(paths.jsdoc.src, { read: false }).pipe(jsdoc(jsdocConfig));
}