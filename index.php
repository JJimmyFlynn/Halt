
<?php

// Make sure WP is looking for the theme in '/views'
if (defined('ABSPATH')) {
    update_option('template', get_option('template') . '/views');
}