<?php
/**
 * The home template file
 * TEMPLATE NAME: Homepage
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */
get_header();
get_sidebar();
?>
<!-- Page Content  -->
<div id="content">
  <main id="primary" class="site-main">
    <?php get_template_part( 'templates/homepage-template', 'homepage' ); ?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
