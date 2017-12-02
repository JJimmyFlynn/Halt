<?php

namespace Halt\HaltTheme;

use Halt\HaltBaseTheme;

class HaltTheme extends HaltBaseTheme {
  public function __construct() {
    parent::construct();
    add_filter('body_class', array( &$this, __NAMESPACE__ . '\\body_class' ));
  }
  /**
   * Define acceptable body classes
   */
  /**
 * Add allowed <body> classes
 */
function body_class($classes) {
  
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