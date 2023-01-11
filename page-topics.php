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
get_sidebar();
?>
<div id="content">
  <main id="primary" class="site-main">
    <?php get_template_part('template-parts/content-page', 'topics-atoz'); ?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
