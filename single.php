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
      get_template_part( 'template-parts/content-post', get_post_type() );

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; // End of the loop.
		?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
