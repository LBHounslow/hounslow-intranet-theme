<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

$topics = wp_get_post_terms( $post->ID, 'guide-topic' );
$list_of_topics = '';
if ( $topics ) {
    $output = array();
    foreach ( $topics as $topic ) {
        $output[] = '<a href="' . get_term_link( $topic->slug, 'guide-topic') .'">' . $topic->name .'</a>';
    }
    $list_of_topics = ' &middot; Read all guides about ' . join( ' / ', $output );
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '<p class="kb-description">'. get_the_excerpt() . '</p>';
		?>
		<div class="kb-meta">
			<hr />
			<p class="kb-meta-type"><i class="far fa-life-ring"></i> Guide <?php echo $list_of_topics; ?></p>
			<hr />
		</div>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="col-sm-12 col-lg-8">
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

				$connected = new WP_Query( [
				    'relationship' => [
				        'id'   => 'guides_to_guides',
				        'from' => get_the_ID(), // You can pass object ID or full object
				    ],
				    'nopaging'     => true,
				] );

				if ( $connected->have_posts() ) {

					echo '<div class="related-guides"><hr />';
					echo '<h2>Related Guides</h2>';
					while ( $connected->have_posts() ) : $connected->the_post();
							?>
							<p><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></p>
							<?php the_excerpt();
					endwhile;
					wp_reset_postdata();
					echo '</div>';
				}
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
		<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">
			<section id="toc" class="widget widget_toc">
				<h2 class="widget-title">On this page</h2>
				<?php echo do_shortcode( '[toc content=".entry-content" anchor-text=" #"]' ); ?>
			</section>
			<?php dynamic_sidebar( 'sidebar-page' ); ?>
		</aside><!-- #secondary -->
	</div><!-- row -->
</article><!-- #post-<?php the_ID(); ?> -->
