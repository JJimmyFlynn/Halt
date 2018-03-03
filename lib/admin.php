<?php

namespace Halt;

/**
 * Admin Panel Customizations
 */

class HaltThemeAdmin {
  public function __construct() {
    add_action('login_head', array($this, 'add_favicon'));
    add_action('admin_head', array($this, 'add_favicon'));
    add_action('login_head', array($this, 'custom_login_styles'));
    add_filter('login_headerurl', create_function(false,"return '" . home_url() . "';"));
    add_filter('login_headertitle', create_function(false,"return '" . get_bloginfo('name') . "';"));

  }

  /**
   * Add Favicon to Admin
   */
  public function add_favicon() {
    $favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
  }

  /**
  * Customize Login Screen
  */
  public function custom_login_styles() {
    wp_enqueue_style('halt/admin-css', user_trailingslashit(get_template_directory_uri()) . 'admin.css', false, null);
  }
}

new HaltThemeAdmin();