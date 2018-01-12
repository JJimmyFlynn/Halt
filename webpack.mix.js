let mix = require('laravel-mix');
mix.setPublicPath('./dist');

/**
 * SASS Task
 */
mix.sass('assets/sass/main.scss', 'dist/css');

/**
 * JS Task
 */
mix.js('assets/js/main.js', 'dist/js');

mix.version();

/**
 * Copy Tasks
 */
mix.copyDirectory('assets/images', 'dist/images');
mix.copyDirectory('assets/fonts', 'dist/fonts');

/**
 * Versioning Task
 */
// mix.version();
