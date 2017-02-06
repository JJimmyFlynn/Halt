/*
------------------------------

Halt Gulpfile

Halt uses The Laravel Elixir Gulp API Wrapper
Additional Information: https://github.com/laravel/elixir

Available Commands:

- gulp
-- Runs all tasks 

- gulp --production
-- Runs all tasks and minifys JS and CSS

- gulp watch
-- Watches SCSS and JS files for changes and runs all tasks on change,
   also launches BrowserSync (set proxy url variable below)

------------------------------
 */

/**
 * Get Elixir
 */
const elixir = require('laravel-elixir');

/**
 * Plugins
 */
require('laravel-elixir-imagemin');
require('laravel-elixir-svg-symbols');

/**
 * Set Project Paths
 */
elixir.config.assetsPath = './assets';
elixir.config.publicPath = './dist';

/**
 * Set BrowserSync Proxy URL
 * 
 * EDIT THIS
 */
const browserSyncProxy = 'halt.dev'

elixir((mix) => {

  /**
   * SASS Build Task
   */
  mix.sass('main.scss');

  /**
   * JS Build Task
   */
  mix.webpack('main.js');

  /**
   * Images Task
   */
  mix.imagemin();

  /**
   * SVG Task
   */
  mix.svgSprite('assets/svg', 'dist/svg', {
    mode: {
      symbol: {
        sprite: 'svg-symbols.php',
        dest: '.'
      }
    },
    svg: {
      xmlDeclaration: false
    }  
  });

  /**
   * Copy Task
   * -- Fonts
   */
  mix.copy('assets/fonts', 'dist/fonts');

  /**
   * BrowserSync
   */
  mix.browserSync({
    proxy: browserSyncProxy
  });

});