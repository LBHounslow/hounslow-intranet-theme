<?php
/**
 * Template Name:Landing Page (with cards)
 *
 * @package Hounslow_Intranet
 */

get_header();
?>
<div class="container">
	<div class="row">
		<section id="primary" class="content-area col">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					hounslow_intranet_display_child_pages( $post->ID, 'card' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
<?php

get_footer();
