<?php

/**
 * TEMPLATE NAME: Events
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet_v1
 */

get_header();
?>
<!-- Page Content  -->
<div id="content">
  <main id="primary" class="site-main">
    <?php get_template_part('template-parts/page-template', 'events'); ?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_sidebar();
get_footer();
