<?php

use Timber\Timber;

/**
 * The Haltsite class sets up all Timber specific functionality,
 * like initializing Timber and Twig, add adding to the
 * global Timber context
 */
class HaltSite {

  /**
   * All the Timber Setup!
   */
  function __construct() {
    add_action('init', array($this, 'timber_setup'));
    add_filter('get_twig', array($this, 'twig_setup'));
    add_filter('timber/context', array($this, 'add_to_timber_context'));
  }

  /**
  * Initialize Timber
  */
  function timber_setup() {
    $timber = new \Timber\Timber();
  }

  /**
  * Initialize Twig
  */
  function twig_setup($twig) {
    $twig->addExtension(new \Twig_Extension_StringLoader());
    return $twig;
  }

  /**
   * Add to the global Timber context here
   */
  public function add_to_timber_context($context) {

    /**
     * Add menu(s) to global Timber context
     */
    $context['primary_navigation'] = new TimberMenu('primary_navigation');

    return $context;
  }

}

new HaltSite();