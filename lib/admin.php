<?php

namespace Halt\Admin;

/**
 * Admin Customizations
 */
 
 /**
 * Add Favicon to Admin
 */
function halt_add_favicon() {
    $favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('login_head', __NAMESPACE__. '\\halt_add_favicon');
add_action('admin_head', __NAMESPACE__. '\\halt_add_favicon');

/**
  * Customize Login Screen
  */
function halt_custom_login() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url('');
            background-position: center bottom;
            background-size: 125px;
            width: 150px;
            height: 150px;
            margin-bottom: 35px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\halt_custom_login');

/**
 * Change logo title and href
 */
add_filter('login_headerurl', create_function(false,"return '" . home_url() . "';"));
add_filter('login_headertitle', create_function(false,"return '" . get_bloginfo('name') . "';"));

/**
 * Cleanup Admin Menu
 */
function halt_cleanup_admin_menu() {
  // Remove Comments menu item
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', __NAMESPACE__. '\\halt_cleanup_admin_menu', 999);

/**
 * Remove some dashboard metaboxes
 */
function halt_cleanup_dashboard() {
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // At a Glance
  remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
  remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
}
add_action('wp_dashboard_setup', __NAMESPACE__. '\\halt_cleanup_dashboard');