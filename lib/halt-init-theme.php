<?php

class HaltTheme extends HaltBaseTheme {

  public function __construct() {
    parent::__construct();
    add_filter('body_class', array( $this, 'body_class' ));
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
  
  /**
   * Define acceptable body classes
   */
  public function body_class($classes) {
  
    $allowed_classes = [
      'home',
      'single',
    ];
  
    $classes = array_intersect($classes, $allowed_classes);
  
    return $classes;
    }
  }

// Go Go Gadget
new HaltTheme();