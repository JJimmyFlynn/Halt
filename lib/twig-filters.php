<?php

namespace Halt\TwigFilters;

use Halt\Utils;

/**
 * Register filters to use in Twig templates
 *
 * notice: these may be used in php code as well
 */

function add_filters($twig) {

  /**
   * Returns the path to theme/dist
   * @return String
   */
  $twig->addFilter(new \Twig_SimpleFilter('halt_assets',
    function($path) {
      return Utils\assets($path);
    }
  ));

  /**
   * Returns the path to theme/dist/images
   * @return String
   */
  $twig->addFilter(new \Twig_SimpleFilter('halt_images',
    function($path) {
      return Utils\assets('images/'.$path);
    }
  ));

  return $twig;

}
add_filter('get_twig', __NAMESPACE__.'\\add_filters');

