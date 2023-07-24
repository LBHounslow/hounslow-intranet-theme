<?php

/**
 * TEMPLATE NAME: Topics
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <?php get_template_part('template-parts/page-template', 'topics'); ?>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
