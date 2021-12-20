<?php

 /**
  * TEMPLATE NAME: Topics
  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
  *
  * @package LBH_Intranet
  */
get_header();
get_sidebar();
?>
<div id="content">
  <main id="primary" class="site-main">
    <?php get_template_part('template-parts/page-template', 'topics'); ?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
