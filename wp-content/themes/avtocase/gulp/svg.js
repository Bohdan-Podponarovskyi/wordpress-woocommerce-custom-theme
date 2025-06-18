// gulp/svg.js - SVG sprite generation tasks
import gulp from 'gulp';
import svgSprite from 'gulp-svg-sprite';
import svgmin from 'gulp-svgmin';
import { paths } from './config.js';

export function buildSvgSprite() {
    return gulp
        .src(paths.icons.src)
        .pipe(
            svgmin({
                plugins: [
                    {
                        name: 'preset-default',
                        params: {
                            overrides: {
                                removeViewBox: false,
                            },
                        },
                    },
                    'removeDimensions',
                    {
                        name: 'cleanupIDs',
                        params: {
                            prefix: 'icon-',
                        },
                    },
                ],
            }),
        )
        .pipe(
            svgSprite({
                mode: {
                    symbol: {
                        sprite: 'sprite.svg',
                        dest: '.',
                        prefix: 'icon-',
                    },
                },
            }),
        )
        .on('error', function (error) {
            console.log(error);
        })
        .pipe(gulp.dest(paths.icons.dest));
}