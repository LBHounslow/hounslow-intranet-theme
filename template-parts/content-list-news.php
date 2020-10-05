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
	<div class="row">
		<div class="col-sm-4">
			<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php hounslow_intranet_news_thumbnail( $post ); ?></a>
		</div>
		<div class="col-sm-8">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
				<div class="entry-meta mb-1">
					<?php
					hounslow_intranet_posted_on();
					hounslow_intranet_is_sticky();
					//hounslow_intranet_posted_by();
					?>
				</div><!-- .entry-meta -->
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
		</div>
	<div>
	<hr />
</article><!-- #post-<?php the_ID(); ?> -->
