<?php

namespace Halt\Filters;

function add_filters($twig) {

  $filters = gather_filters();

  foreach ( $filters as $filter ) :
    $twig->addFilter(new \Twig_SimpleFilter($filter, __NAMESPACE__.'\\'.$filter));
  endforeach;

  return $twig;

}
add_filter('get_twig', __NAMESPACE__.'\\add_filters');

// Find a better way to do this... maybe with WP filters?
function gather_filters() {
  return [
    'dist',
    'img',
    'ago',
  ];
}

function dist($path) {
  return trailingslashit(get_template_directory_uri()).'dist/'.$url;
}

function img($path) {
  return dist('images/'.$path);
}

/**
 * Prints human friendly dates (ie. "2 days ago") if the post is less than
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
    $humandate = $postdate->format($timestamp_fallback);
  else :
    $humandate = human_time_diff( $postdate->format('U'), $today->format('U') ) . ' ago';
  endif;

  $humandate = str_replace('mins', 'minutes', $humandate);
  return $humandate;
}

