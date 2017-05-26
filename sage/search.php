<?php

/**
 * Search Results Page
 */

get_template_part('views/partials/page', 'header'); 

?>

<?php if (!have_posts()) : 

// No Results Found

?>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php 
    // Results Found
    get_template_part('views/partials/content', 'search'); 
  ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
