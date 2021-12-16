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




        <!-- Sidebar  -->
        <nav id="sidebar" data-swiftype-index="false">

<?php get_template_part('templates/navigation', 'menu'); ?>

        </nav>

        <!-- Page Content  -->
        <div id="content">


            <main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-post', get_post_type() );



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
