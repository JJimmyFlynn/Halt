/*
------------------------------

Halt Mix File

Halt uses The Laravel Mix Webpack API Wrapper
Additional Information: https://github.com/JeffreyWay/laravel-mix

Available Commands:

- npm run dev
-- Runs all tasks
-- Alias for 'npm run development'

- npm run prod --production
-- Runs all tasks and minifys JS and CSS
-- Alias for 'npm run production'

- npm watch
-- Run development build, watches SCSS and JS files for changes and runs all tasks on change,
   also launches BrowserSync (set browserSyncProxy variable below)
------------------------------
 */

let mix = require('laravel-mix');
let ImageminPlugin = require( 'imagemin-webpack-plugin' ).default;

/**
 * Set BrowserSync Proxy URL
 *
 * EDIT THIS
 */
const browserSyncProxy = 'http://halt-wordpress.lndo.site:8000';

/**
 * Set the public path so Mix puts its 'mix-manifest.json'
 * file in the proper place
 */
mix.setPublicPath('./dist');

/**
 * Setup additional Webpack plugins
 */
mix.webpackConfig({
  plugins: [
    /**
     * Add image optimization when
     * image files are copied
     */
    new ImageminPlugin({
      pngquant: {
        quality: '95-100',
      },
      test: /\.(jpe?g|png|gif|svg)$/i
    })
  ]
});

/**
 * Stylus Task
 */
mix.stylus('assets/stylus/main.styl', 'dist/css').options({
  postCss: [
    require('rucksack-css')()
  ]
});

/**
 * JS Task
 */
mix.js('assets/js/main.js', 'dist/js');

/**
 * Copy Tasks
 */
mix.copyDirectory('assets/images', 'dist/images');
mix.copyDirectory('assets/fonts', 'dist/fonts');

/**
 * Versioning Task
 */
if(mix.inProduction) {
  mix.version();
}

/**
 * Browsersync
 */
mix.browserSync(browserSyncProxy);