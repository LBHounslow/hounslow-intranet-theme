<?php

/**
 * The template for displaying the network home page
 *
 * Applied to a page where the slug is 'network-home'.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main content-area col-sm-12 col-lg-6">
	<?php
	while (have_posts()) :
		the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php //the_title( '<h1 class="entry-title">', '</h1>' ); 
				?>
			</header><!-- .entry-header -->

			<?php hounslow_intranet_post_thumbnail(); ?>

			<div class="entry-content clearfix">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'hounslow-intranet'),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php if (get_edit_post_link()) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Edit <span class="screen-reader-text">%s</span>', 'hounslow-intranet'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</article><!-- #post-<?php the_ID(); ?> -->

	<?php

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</div><!-- #primary .site-main -->

<section id="secondary" class="widget-area col-sm-12 col-lg-3">
	<?php
	if (is_active_sidebar('sidebar-homepage')) {
		dynamic_sidebar('sidebar-homepage');
	} ?>
</section><!-- #secondary -->

<aside id="tertiary" class="widget-area col-sm-12 col-lg-3">
	<?php
	if (is_active_sidebar('sidebar-network')) {
		dynamic_sidebar('sidebar-network');
	} ?>
</aside><!-- #tertiary -->
<?php
get_sidebar();
get_footer();
