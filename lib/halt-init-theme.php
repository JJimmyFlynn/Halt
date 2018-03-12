<?php

namespace Halt;
use TimberMenu;

class HaltTheme extends HaltBaseTheme {

  public function __construct() {
    parent::__construct();
    add_action( 'after_setup_theme', array( $this, 'halt_extras' ) );
  }

  /**
   * Register WordPress menus
   */
  public function register_menus() {
    register_nav_menus( [
      'primary_navigation' => 'Primary Navigation'
    ] );
  }

  /**
   * Add to the global Timber context here
   */
  public function add_to_timber_context($context) {

    /**
     * Add menu(s) to global Timber context
     */
    $context['primary_navigation'] = new TimberMenu('primary_navigation');

    return $context;
  }

  /**
   * Define acceptable body classes
   */
  public function body_class($classes) {

    $allowed_classes = [
      'home',
      'single',
    ];

    $classes = array_intersect($classes, $allowed_classes);

    return $classes;
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

// Go Go Gadget
new HaltTheme();
