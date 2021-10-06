<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

?>

		<div class="col-md-3 outer">
        <div class="inner">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

				<?php echo rwmb_meta( 'lbh_featured_video' ); ?>

			<?php else: ?>

				<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><div class="news-featured-img" style="background:url(<?php echo get_the_post_thumbnail_url(); ?>);height:200px;background-size:cover;"></div></a>

			<?php endif; ?>
            <div class="post-title-list">
			<?php
				the_title( '<h5 class="entry-title post-title-list"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
				?>
				<div class="entry-meta mb-1">
					<?php
					hounslow_intranet_posted_on();
					hounslow_intranet_is_sticky();
					//hounslow_intranet_posted_by();
					?>
				</div><!-- .entry-meta -->
                </div>
				<div class="the-excerpt-list">
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
                <a class="btn btn-dark" style="color:white;" href="<?php echo the_permalink(); ?>">Read More</a>
		</article><!-- #post-<?php the_ID(); ?> -->
        </div>
		</div>
		


