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
 * @package LBH_Intranet
 */
get_header();
get_sidebar();
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<!-- Page Content  -->
<div id="content">
  <main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
    	the_post();
      if (strpos($url,'events/categories/') !== false) {
        get_template_part( 'template-parts/content-page', 'event' );
      } else {
        get_template_part( 'template-parts/content', 'page' );
      }
    endwhile; // End of the loop.
    ?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
