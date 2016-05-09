<?php 

  /**
   * General Page Template
   */
?>
<section class="general-page">
  <header>
    <h2 class="general-page__title"><?php the_title(); ?></h2>
  </header>
  <div class="general-page__content">
    <?php the_content() ?>
  </div>
  <!-- general-page__content -->
</section>
