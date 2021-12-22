<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LBH_Intranet_v1
 */

get_header();
get_sidebar();
?>
<!-- Page Content  -->
<div id="content">
  <main id="primary" class="site-main">
    <?php
		while ( have_posts() ) :
      the_post();
      get_template_part( 'template-parts/content', hounslow_intranet_get_post_type() );
    endwhile; // End of the loop.
		?>
    <div class="suggested">
    	<?php get_template_part('templates/suggested-posts'); ?>
    </div>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
