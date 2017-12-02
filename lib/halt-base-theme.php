<?php

namespace Halt\HaltBaseTheme;

/**
 * This class contains common setup intended to be used for all themes. 
 */
abstract class HaltBaseTheme {
  
  public function __construct() {
    add_action( 'after_setup_theme', array( &$this, 'basic_supports' ) );
    add_action( 'after_setup_theme', array( &$this, 'soil_theme_supports' ) );
    add_action( 'after_setup_theme', array( &$this, 'halt_extras' ) );
  }

  abstract protected function body_class();

  /**
   * Add basic support theme supports
   */
  public function basic_supports() {
    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Enable post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
  }

  /** Enable features from Soil when plugin is activated
  *   https://roots.io/plugins/soil/
  */
  public function soil_theme_supports() {
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
  }

  /**
   * Enable features from Halt Extras plugin
   */
  public function halt_extras() {
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
  }
}