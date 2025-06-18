import dotenv from 'dotenv';

dotenv.config();

export const isProduction = process.env.NODE_ENV === 'production';
export const devId = process.env.DEV_ID && process.env.DEV_ID > 0 ? process.env.DEV_ID : null;

console.log(`Production mode: ${isProduction}`);
console.log(`DEV_ID: ${devId}`);

export const paths = {
    styles: {
        src: ['src/scss/**/*.scss', '!src/scss/acf-blocks/**/*.scss'],
        dest: './assets/css',
        acfBlocks: {
            src: 'src/scss/acf-blocks/*.scss',
            dest: './assets/css/acf-blocks',
        },
    },
    sassdoc: {
        src: 'src/scss/**/*.scss',
        dest: './docs/sassdoc',
        options: {
            dest: './docs/sassdoc',
            verbose: true,
            display: {
                access: ['public', 'private'],
                alias: true,
            },
        },
    },
    jsdoc: {
        src: ['src/js/**/*.js'],
        dest: './docs/jsdoc',
    },
    icons: {
        src: 'src/icons/**/*.svg',
        dest: './assets/icons',
    },
    images: {
        src: 'src/images/**/*',
        dest: './assets/images',
    },
    fonts: {
        src: 'src/fonts/*',
        dest: './assets/fonts',
    }
};

export const jsdocConfig = {
    opts: {
        destination: paths.jsdoc.dest,
        template: 'templates/default',
        recurse: true,
    },
    tags: {
        allowUnknownTags: true,
    },
    templates: {
        cleverLinks: true,
        monospaceLinks: false,
        default: {
            outputSourceFiles: false,
            includeDate: false,
            useLongnameInNav: false,
            displayModuleHeader: true,
            showInheritedInNav: true,
        },
    },
    plugins: ['plugins/markdown'],
};