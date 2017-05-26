<?php 

  /**
   * Single Blog Post Template
   */

  while (have_posts()) : the_post(); 
?>
  <article class="blog-post" role="article">
    <header>
      <h1 class="blog-post__title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="blog-post__content">
      <?php the_content(); ?>
    </div>

    <?php
      // Uncomment for comments
     // comments_template('/templates/comments.php'); 
     ?>
  </article>
<?php endwhile; ?>
