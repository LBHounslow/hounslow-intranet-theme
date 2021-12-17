<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet_v1
 */
get_header();
get_sidebar();
?>
<!-- Page Content  -->
<div id="content">
  <main id="primary" class="site-main">
    <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url,'events/categories/') !== false) { ?>
      <?php get_template_part( 'template-parts/content-page', 'event' ); ?>
    <?php } else {?>
      <?php get_template_part( 'template-parts/content-page', 'page' ); ?>
    <?php } ?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
