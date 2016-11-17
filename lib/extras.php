<?php

namespace Halt\Extras;

/**
 * Modify the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">Read More</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
