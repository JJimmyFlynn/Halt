<?php

use Halt\Setup;
use Halt\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('views/partials/head'); ?>
  <body <?php body_class(); ?>>
    <?php
      do_action('get_header');
      get_template_part('views/partials/header');
    ?>
    <div class="container" role="document">
      <main>
        <?php include Wrapper\template_path(); ?>
      </main><!-- /.main -->
      <?php if (Setup\display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include Wrapper\sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
      <?php
        do_action('get_footer');
        get_template_part('views/partials/footer');
        wp_footer();
      ?>
    </div>
    <!-- /.container -->
  </body>
</html>
