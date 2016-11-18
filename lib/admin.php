<?php

/**
 * Admin Panel Customizations
 */

namespace Halt\Admin;
 
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
add_action( 'login_head', __NAMESPACE__ . '\\halt_custom_login');

/**
 * Change logo title and href
 */
add_filter('login_headerurl', create_function(false,"return '" . home_url() . "';"));
add_filter('login_headertitle', create_function(false,"return '" . get_bloginfo('name') . "';"));