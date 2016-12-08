<?php 

  /**
   * Includable Template for Post Meta
   */
?>
<time class="blog-post__published" datetime="<?php echo get_post_time('c', true); ?>"><?php echo get_the_date(); ?></time>
<p class="blog-post__author">
  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo get_the_author(); ?></a>
</p>
