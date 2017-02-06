<?php

namespace Halt\Assets;

/**
 * Enqueue theme assets
 */
function assets() {
  /**
   * Enqueue theme css
   */
  wp_enqueue_style('halt/css', halt_assets() . '/css/main.css', false, null);

  /**
   * Enqueue theme javascript
   */
  wp_enqueue_script('halt/js', halt_assets() . '/js/main.js', null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
