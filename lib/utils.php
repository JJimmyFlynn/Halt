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

/**
 * Gets current asset file with appended revision hash
 * from /assets/rev-manifest.json
 * @param  string $file
 * @return string       The asset with with appended revision hash
 */
function elixir($file) {
  $manifest = null;

  if (is_null($manifest)) {
      $manifest = json_decode(file_get_contents(get_stylesheet_directory() . '/dist/rev-manifest.json'), true);
  }

  if (isset($manifest[$file])) {
      return assets($manifest[$file]);
  }
}
