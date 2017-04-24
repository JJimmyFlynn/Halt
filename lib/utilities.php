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

/**
 * Returns the path to theme/dist
 * @return String
 */
function halt_assets() {
  return get_template_directory_uri() . '/dist';
}

/**
 * Returns the path to theme/dist/images
 * @return String
 */
function halt_images() {
  return get_template_directory_uri() . '/dist/images';
}

/**
 *   SMART EXCERPT
 *   http://www.distractedbysquirrels.com/blog/wordpress-improved-dynamic-excerpt
 *
 *   Returns an excerpt which is not longer than the given length and always
 *   ends with a complete sentence.
 */

    function halt_smart_excerpt($length) { // Max excerpt length. Length is set in characters
        global $post;
        $text = $post->post_excerpt;
        if ( '' == $text ) {
            $text = get_the_content('');
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]>', $text);
        }
        $text = strip_shortcodes($text); // optional, recommended
        $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
        if ( empty($length) ) {
            $length = 300;
        }
        $text = substr($text,0,$length);
        $excerpt = reverse_strrchr($text, '.', 1);
        if( $excerpt ) {
            echo apply_filters('the_excerpt',$excerpt);
        } else {
            echo apply_filters('the_excerpt',$text);
        }
    }
    function reverse_strrchr($haystack, $needle, $trail) {
        return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
    }