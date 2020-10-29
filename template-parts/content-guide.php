<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '<p class="kb-description">'. get_the_excerpt() . '</p>';
		?>
		<div class="kb-meta">
			<hr />
			<p class="kb-meta-type"><i class="far fa-life-ring"></i> Guide</p>
			<hr />
		</div>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="col-sm-12 col-lg-7">
			<div class="entry-content clearfix">
				<?php
				hounslow_intranet_post_thumbnail();

				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hounslow-intranet' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'hounslow-intranet' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div>
		<aside id="secondary" class="widget-area col-sm-12 col-lg-3 ml-lg-5" data-swiftype-index="false">
			<section id="toc" class="widget widget_toc">
				<h2 class="widget-title">On this page</h2>
				<?php echo do_shortcode( '[toc content=".entry-content" anchor-text=" #"]' ); ?>
			</section>
			<?php dynamic_sidebar( 'sidebar-page' ); ?>
		</aside><!-- #secondary -->
	</div><!-- row -->
</article><!-- #post-<?php the_ID(); ?> -->
