<?php
/**
 * The template for displaying all single posts
 *
  * Template Name: Full width post
 * Template Post Type: post, dal_cpt, gi_cpt, haw_cpt, hdi_cpt, nth_cpt, wt_cpt, pol_cpt, oh_cpt
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Hounslow_Intranet
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

			get_template_part( 'template-parts/content-post-full', get_post_type() );



			// If comments are open or we have at least one comment, load up the comment template.


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->


        </div>


    </div>
</body>
<style>
#content {
	background:white;
}
</style>



<?php
get_footer();
