<?php

namespace Halt\Assets;

/**
 * Enqueue theme assets
 */
function assets() {
  /**
   * Enqueue theme css
   */
  wp_enqueue_style('halt/css', elixir('css/main.css'), false, null);

  /**
   * Enqueue theme javascript
   */
  wp_enqueue_script('halt/js', elixir('js/main.js'), null, null);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

/**
 * Gets current asset file with appended revision hash
 * from /assets/rev-manifest.json
 * @param  string $file
 * @return string       The asset with with appended revision hash
 */
function elixir($file) {
  $manifest = null;

  if (is_null($manifest)) {
      $manifest = json_decode(file_get_contents(get_stylesheet_directory() . '/dist/rev-manifest.json'), true);
  }

  if (isset($manifest[$file])) {
      return halt_assets() . '/' . $manifest[$file];
  }
}
