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
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta mb-2">
				<?php
				hounslow_intranet_posted_on();
				hounslow_intranet_is_sticky();
				//hounslow_intranet_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php hounslow_intranet_post_thumbnail(); ?>
	</header><!-- .entry-header -->



	<div class="entry-content mt-2 clearfix">
		<?php
		the_excerpt(
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

		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
