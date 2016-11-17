<?php

// These hooks inform WP that Halt's required theme file are located
// in the 'views' directory (excepting style.css, functions.php, and index.php)
// index.php contains self-correcting code in case the template option is reset
add_filter('template', function ($stylesheet) {
    return dirname($stylesheet);
});
add_action('after_switch_theme', function () {
    $stylesheet = get_option('template');
    if (basename($stylesheet) !== 'views') {
        update_option('template', $stylesheet . '/views');
    }
});

/**
 * Halt includes
 *
 * The $halt_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$halt_includes = [
  'lib/admin.php',           // Admin Customizations
  'lib/assets.php',          // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
  'lib/setup.php',           // Theme setup
  'lib/titles.php',          // Page titles
  'lib/wrapper.php',         // Theme wrapper class
  'lib/bem_nav_walker.php',  // BEM Nav Walker
  'lib/utilities.php'
];

foreach ($halt_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'halt'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
