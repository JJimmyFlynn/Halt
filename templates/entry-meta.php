<?php 

  /**
   * Includable Template for Post Meta
   */
?>
<time class="blog-post__published" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
<p class="blog-post__author">
  <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?= get_the_author(); ?></a>
</p>
