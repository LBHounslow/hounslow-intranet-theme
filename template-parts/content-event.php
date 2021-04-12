<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
	

		if ( !is_singular() ) : ?>
			<div class="entry-meta mb-1">
				<?php hounslow_intranet_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
 	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hounslow-intranet' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hounslow-intranet' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hounslow_intranet_entry_footer(); ?>
		<hr />
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
