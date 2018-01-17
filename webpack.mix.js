let mix = require('laravel-mix');
let ImageminPlugin = require( 'imagemin-webpack-plugin' ).default;
mix.setPublicPath('./dist');

mix.webpackConfig({
  plugins: [
    new ImageminPlugin({
      pngquant: {
        quality: '95-100',
      },
      test: /\.(jpe?g|png|gif|svg)$/i
    })
  ]
});

/**
 * SASS Task
 */
mix.sass('assets/sass/main.scss', 'dist/css');

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
mix.version();