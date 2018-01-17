<?php

if (!class_exists('Timber')){
  halt_error( 'Timber must be installed for this theme to function. Run composer  install or install Timer via the WordPress plugins page.', 'Timber Not Found');
}

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
Timber::render('templates/index.twig', $context);
