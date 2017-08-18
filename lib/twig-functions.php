<?php

namespace Halt\TwigFunctions;

use Halt\Utils;

/**
 * Register functions to use in Twig templates
 */

function add_functions($twig) {

  /*
  $twig->addFunction(new \Twig_SimpleFunction('foo',
    function($options) {
      return 'bar';
    }
  ));
   */

  return $twig;

}
add_filter('get_twig', __NAMESPACE__.'\\add_functions');

