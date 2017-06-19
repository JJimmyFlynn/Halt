<?php

namespace Halt\Setup;

use Halt\Assets;
use Timber;

/**
 * Theme setup
 */
function halt_setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-relative-urls');

  // Enable features from Halt Extras plugin
  // 
  // Remove admin menu items
  add_theme_support('halt-menu', [
    'edit-comments.php',
  ]);
  // Remove dashboard metaboxes
  add_theme_support('halt-dashboard', [
    'dashboard_right_now',
    'dashboard_primary',
    'dashboard_secondary',
    'dashboard_quick_press',
  ]);
  // Clean up homepage edit page
  add_theme_support('halt-clean-homepage');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => 'Primary Navigation'
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

}
add_action('after_setup_theme', __NAMESPACE__ . '\\halt_setup');

/**
 * Add allowed <body> classes
 */
function body_class($classes) {

  $allowed_classes = [
    'home',
    'single',
  ];

  $classes = array_intersect($classes, $allowed_classes);

  // Add class if sidebar is active
  if (display_sidebar()) {
    $classes[] = 'has-sidebar';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Determine which pages should display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = in_array(true, [
    // The sidebar will be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('halt/display_sidebar', $display);
}

/**
 * Fix location of ACF local JSON.
 *
 * Since Halt does some surgery on the WordPress template locations, ACF looks in
 * the wrong location for the acf-json directory. We will fix this by manually
 * hooking into that functionality and attempting to save in the right spot.
 *
 * @param  string  $path
 * @return string
 */
add_filter('acf/settings/save_json', function ($path) {
    $targetDir = get_template_directory().'/acf-json';
    return (file_exists($targetDir) && is_dir($targetDir)) ? $targetDir : $path;
});



