<?php 

  /**
   * General Site Header Template
   */
?>

<header class="site-header">
  <nav class="site-nav">
    <?php
    if (has_nav_menu('primary_navigation')) :
      // For usage instructions see https://github.com/roikles/Wordpress-Bem-Menu
      // First Argument: Theme menu location
      // Second Argument: Block class name for the <ul>
      bem_menu('primary_navigation', 'nav');
    endif;
    ?>
  </nav>
</header>
