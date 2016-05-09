<?php

namespace Halt\Admin;

/**
 * Admin Customizations
 */

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
 * Remove some dashboard metaboxes
 */
function halt_cleanup_dashboard() {
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // At a Glance
  remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
  remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
}
add_action('wp_dashboard_setup', __NAMESPACE__. '\\halt_cleanup_dashboard');