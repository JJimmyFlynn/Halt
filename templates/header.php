<header class="site-header">
  <nav class="site-nav">
    <?php
    if (has_nav_menu('primary_navigation')) :
      // For usage instructions see https://github.com/roikles/Wordpress-Bem-Menu
      bem_menu('primary_navigation', 'site-nav');
    endif;
    ?>
  </nav>
</header>
