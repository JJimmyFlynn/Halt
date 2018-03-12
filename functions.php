<?php

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
function halt_error ($message, $subtitle = '', $title = '') {
    $title = $title ?: 'Halt &rsaquo; Error';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is being used
 */
if( version_compare( '7.0.0', phpversion(), '>=' ) ) {
  halt_error( 'You must be using PHP 7.0 or greater.', 'Invalid PHP version');
}

/**
 * Ensure compatible version of WordPress is being used
 */
if( version_compare( '4.7.0', get_bloginfo( 'version' ), '>=' ) ) {
  halt_error( 'You must be using WordPress 4.7.0 or greater.', 'Invalid WordPress Version' );
}

/**
 * Ensure Composer Dependencies are loaded
 */
if( !file_exists( $composer = __DIR__ . '/vendor/autoload.php' ) ) {
  halt_error(
    'You must run <code>composer install</code> from the theme directory.',
    'Autoloader not found'
  );
}
// It exists, wrangle it!
require_once( $composer );

/**
 * Ensure node dependencies have been loaded
 * when in a development environment
 */
if ( isset($_ENV['PANTHEON_ENVIRONMENT']) && in_array($_ENV['PANTHEON_ENVIRONMENT'], array('lando')) ) {
  if( !file_exists( __DIR__ . '/node_modules' ) ) {
    halt_error(
      'Run <code>yarn install</code> or <code>npm install</code> to install theme dependencies.',
      'Theme dependencies not installed'
    );
  }
}

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
  'lib/admin.php',            // Admin Customizations
  'lib/halt-base-theme.php',  // Base Theme Setip
  'lib/halt-init-theme.php',  // Site-specific Theme Setup
  'lib/utils.php'             // General Theme Utilities
];

foreach ($halt_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'halt'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
