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

  /**
   * Returns human friendly dates (ie. "2 days ago") if the post is less than
   * one week old. Otherwise, it displays a standard datestamp.
   *
   * See Utils\ago()
   *
   * @return String
   */
  $twig->addFilter(new \Twig_SimpleFilter('ago',
    function($the_date, $limit=7, $timestamp_fallback='F j, Y') {
      return Utils\ago($the_date, $limit, $timestamp_fallback);
    }
  ));

  /**
   * Returns specified half of array
   * @return String
   */
  $twig->addFilter(new \Twig_SimpleFilter('array_halve',
    function($array, $side) {
      return Utils\array_halve($array, $side);
    }
  ));

  return $twig;

}
add_filter('get_twig', __NAMESPACE__.'\\add_filters');

