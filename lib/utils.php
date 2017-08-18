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
 * Returns human friendly dates (ie. "2 days ago") if the post is less than
 * one week old. Otherwise, it displays a standard datestamp.
 *
 * @param  string $the_date date that can be parsed into a DateTime (wp default post date format works fine
 * @param  string $limit largest number of days ago the date should be to be converted to 'ago'
 * @param  string $timestamp_fallback The PHP date format to fall back to if post is older than 1 weeek
 */
function ago($the_date, $limit=7, $timestamp_fallback='F j, Y') {
  $postdate = new \DateTime($the_date);
  $today = new \DateTime();

  $difference = $today->diff($postdate);

  if ( $difference->format('%a') >= $limit ) :
    $humandate = 'on '.$postdate->format($timestamp_fallback);
  else :
    $humandate = human_time_diff( $postdate->format('U'), $today->format('U') ) . ' ago';
  endif;

  $humandate = str_replace('mins', 'minutes', $humandate);
  return $humandate;
}
add_filter('ago', __NAMESPACE__ . '\\ago');

/**
 * Returns left or right half of an array
 *   if count($array) is odd, count($left_half) == ( count($right_half)+1 )
 */
function array_halve($array, $side) {
  $length = count($array);
  $midpoint = ceil($length/2);

  if ( $side == 'left' ) {
    return array_slice($array, 0, $midpoint);
  } elseif ( $side == 'right' ) {
    return array_slice($array, $midpoint);
  }

  return $array;
}
add_filter('array_halve', __NAMESPACE__ . '\\array_halve');

