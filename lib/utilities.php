<?php

/**
 * 
 * Contains utilility functions for working with Halt and/or WordPress
 * 
 */

/**
 * Gets the url of an image based on its ID and size requested.
 * Useful for working with ACF images
 * @param  int $imageId   The ID of the image requested (from get_field/get_sub_field)
 * @param  string $imageSize The name of the image size requested, defaults to the master image
 * @return string            The url of the image in the requested size
 */
function imageSizeFromAcf($imageId, $imageSize = '') {
  // Get the array of available images for the image ID and size
  $imageArray = wp_get_attachment_image_src($imageId, $imageSize);
  // Grab the url for the requested image size
  $imageUrl = $imageArray[0];

  return $imageUrl;
}

/**
 * Include components with variable scoping
 * @param string $component_name The base filename of the component in the components directory
 * @param array  $options        Array of options to pass to component. Each component should clearly define acceptable options.
 */
function get_component( $component_name, $options = array() ) {
  include(locate_template('components/'.$component_name.'.php'));
}
