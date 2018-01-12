<?php

namespace Halt\Utils;
/**
 * General theme utilities
 */

/**
 * Returns the path to theme/dist
 * @return String
 */
function assets($path, $uri=true) {
  if ($uri) {
    return trailingslashit(get_stylesheet_directory_uri()).'dist/'.$path;
  }
  return trailingslashit(get_stylesheet_directory()).'dist/'.$path;
}
add_filter('assets', __NAMESPACE__ . '\\assets');