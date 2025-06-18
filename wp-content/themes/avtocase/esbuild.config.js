require('dotenv').config();

const esbuild = require('esbuild');

const isProduction = process.env.NODE_ENV === 'production';

const entryNames = isProduction ? '[name].min' : process.env.DEV_ID ? `[name]-${process.env.DEV_ID}.min` : '[name].min';

/** @type {import('esbuild').BuildOptions} */
const baseConfig = {
    entryPoints: ['src/js/core.js', 'src/js/core-editor.js', 'src/js/pages/*.js'],
    bundle: true,
    minify: isProduction,
    sourcemap: !isProduction,
    target: ['es2023', 'chrome100', 'firefox100', 'safari15'],
    loader: {
        '.js': 'jsx',
        '.css': 'css',
        '.svg': 'file',
        '.png': 'file',
        '.jpg': 'file',
        '.gif': 'file',
    },
    outdir: 'assets/js',
    entryNames: entryNames,
    logLevel: 'info',
    allowOverwrite: true,
    legalComments: 'eof',
};

// Development build with watch mode
const devBuild = async () => {
    console.log(`Building for ${process.env.DEV_ID}...`);
    try {
        const ctx = await esbuild.context(baseConfig);
        await ctx.watch();
        console.log('Watching for changes...');
    } catch (err) {
        console.error('Build failed:', err);
        process.exit(1);
    }
};

// Production build
const prodBuild = async () => {
    try {
        await esbuild.build(baseConfig);
        console.log('Build complete');
    } catch (err) {
        console.error('Build failed:', err);
        process.exit(1);
    }
};

// Run appropriate build based on NODE_ENV
if (process.env.NODE_ENV === 'production') {
    prodBuild();
} else {
    devBuild();
}
