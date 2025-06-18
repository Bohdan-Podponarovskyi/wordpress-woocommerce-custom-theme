// gulp/styles.js - Styles compilation tasks
import gulp from 'gulp';
import gulpSass from 'gulp-sass';
import * as sass from 'sass';
import autoprefixer from 'gulp-autoprefixer';
import newer from 'gulp-newer';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';
import { paths, isProduction, devId } from './config.js';

const sassCompiler = gulpSass(sass);

export function compileStyles() {
    let stream = gulp.src(paths.styles.src).pipe(newer(paths.styles.dest));

    if (!isProduction) {
        stream = stream.pipe(sourcemaps.init());
    }

    stream = stream
        .pipe(
            sassCompiler({
                style: isProduction ? 'compressed' : 'expanded',
            }).on('error', sassCompiler.logError),
        )
        .pipe(autoprefixer())
        .pipe(
            rename(function (path) {
                path.dirname = '';
                path.basename += (isProduction || !devId) ? '.min' : `-${devId}.min`;
            }),
        );

    if (!isProduction) {
        stream = stream.pipe(sourcemaps.write('./'));
    }

    return stream.pipe(gulp.dest(paths.styles.dest));
}

export function compileBlockStyles() {
    let stream = gulp.src(paths.styles.acfBlocks.src).pipe(newer(paths.styles.acfBlocks.dest));

    if (!isProduction) {
        stream = stream.pipe(sourcemaps.init());
    }

    stream = stream
        .pipe(
            sassCompiler({
                style: isProduction ? 'compressed' : 'expanded',
            }).on('error', sassCompiler.logError),
        )
        .pipe(autoprefixer())
        .pipe(
            rename(function (path) {
                path.dirname = '';
                path.basename += '.min';
            }),
        );

    if (!isProduction) {
        stream = stream.pipe(sourcemaps.write('./'));
    }

    return stream.pipe(gulp.dest(paths.styles.acfBlocks.dest));
}

export function watchStyles() {
    gulp.watch(paths.styles.src, compileStyles);
    gulp.watch(paths.styles.acfBlocks.src, compileBlockStyles);
}
