<?php

namespace Halt\Extras;

use Halt\Setup;

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
  if (Setup\display_sidebar()) {
    $classes[] = 'has-sidebar';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">Read More</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
