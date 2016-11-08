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
add_action( 'login_head', __NAMESPACE__ . '\\halt_custom_login');

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

/**
 * Hide elements on homepage edit screen
 * Use options page to manage, unless otherwise necessary
 */
add_action('admin_init', __NAMESPACE__ . '\\hide_editor');
function hide_editor() {
  // Reutrn if not on a post edit page
  global $pagenow;
  if ($pagenow != 'post.php') {
    return;
  }
  // Get the Post ID
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

  // Return if no Post ID is set
  if (!isset($post_id)) {
    return;
  }

  // We have a Post ID, carry on...
  $homepage_name = get_the_title($post_id);
  if ($homepage_name == 'Homepage') {
    remove_post_type_support('page', 'editor');
    remove_post_type_support('page', 'thumbnail');
    remove_post_type_support('page', 'page-attributes');
  }
}