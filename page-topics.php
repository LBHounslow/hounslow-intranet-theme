<?php

/**
 * The template for displaying the list of all topics.
 *
 * Applied to a page where the slug is 'topics'.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <?php get_template_part('template-parts/content-page', 'topics-atoz'); ?>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
