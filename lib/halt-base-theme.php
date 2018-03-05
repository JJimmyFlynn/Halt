<?php

namespace Halt;
use Halt\Utils;
use Timber;
use Twig_Extension_StringLoader;
use Twig_SimpleFilter;

/**
 * This class contains common setup intended to be used for all themes.
 */
abstract class HaltBaseTheme {

  public function __construct() {
    add_action( 'after_setup_theme', array( $this, 'timber_setup' ) );
    add_action( 'init', array( $this, 'remove_emojis' ) );
    add_filter( 'pings_open', '__return_false', PHP_INT_MAX );
		add_filter( 'wp_headers', array( $this, 'disable_pingbacks' ) );
    add_filter( 'get_twig', array( $this, 'twig_setup' ) );
    add_filter( 'timber/context', array( $this, 'add_to_timber_context' ) );
    add_filter( 'get_twig', array( $this, 'add_filters' ) );
    add_action( 'after_setup_theme', array( $this, 'basic_supports' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 100 );
    add_action( 'after_setup_theme', array( $this, 'soil_theme_supports' ) );
  }

  abstract protected function body_class( $classes );

  abstract protected function add_to_timber_context($context);

  /**
  * Initialize Timber
  */
  function timber_setup() {
    $timber = new Timber\Timber();
  }

  /**
  * Initialize Twig
  */
  function twig_setup($twig) {
    $twig->addExtension(new Twig_Extension_StringLoader());
    return $twig;
  }

  /**
   * Add filters to Twig
   */
  function add_filters($twig) {

      /**
       * Returns the path to theme/dist
       * @return String
       */
      $twig->addFilter(new Twig_SimpleFilter('halt_assets',
        function($path) {
          return Utils\assets($path);
        }
      ));

      /**
       * Returns the path to theme/dist/images
       * @return String
       */
      $twig->addFilter(new Twig_SimpleFilter('halt_images',
        function($path) {
          return Utils\assets('images/'.$path);
        }
      ));

      return $twig;
    }

  /**
   * Add basic support theme supports
   */
  public function basic_supports() {
    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Enable post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Removes basic WP custom fields box
     *
     * Since Halt uses ACF the rendering of the custom fields box is extra
     * overhead that can be removed to improve admin area performance
     */
    add_filter('acf/settings/remove_wp_meta_box', '__return_true');
  }

  /**
   * Enqueue theme assets
   */
  public function enqueue_assets() {
    wp_enqueue_style('halt/css', mix('css/main.css', 'dist'), false, null);
    wp_enqueue_script('halt/js', mix('js/main.js', 'dist'), null, null, true);
  }

  /** Enable features from Soil when plugin is activated
  *   https://roots.io/plugins/soil/
  */
  public function soil_theme_supports() {
    add_theme_support('soil-clean-up');
    // add_theme_support('soil-nice-search');
    // add_theme_support('soil-relative-urls');
  }

  /**
   * Remove emoji asset enqueues
   */
  public function remove_emojis()
	{
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
	}

  /**
   * Disable pingback
   */
  public function disable_pingbacks( $headers ) {
		unset( $headers['X-Pingback'] );
		return $headers;
	}
}
