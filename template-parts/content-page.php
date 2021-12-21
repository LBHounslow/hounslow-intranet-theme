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
	<div class="row" >
	  <div id="entry-container" class="col-lg-7" style="background:white;">
			<div id="entry-featured-video" >
				<?php hounslow_intranet_entry_featured_video(); ?>
			</div>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
			<?php hounslow_intranet_post_thumbnail(); ?>
			<?php
			 the_content(
				 sprintf(
					 wp_kses(
						 /* translators: %s: Name of current post. Only visible to screen readers */
						 __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lbh-intranet' ),
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
						 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lbh-intranet' ),
						 'after'  => '</div>',
					 )
				 );

				 hounslow_intranet_entry_related_links();

				 // If comments are open or we have at least one comment, load up the comment template.
				 if ( comments_open() || get_comments_number() ) :
					 comments_template();
				 endif;
				 ?>
			 </div><!-- .entry-content -->
			 <footer class="entry-footer">
				<?php if ( get_edit_post_link() ) : ?>

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
					endif;?>
			</footer><!-- .entry-footer -->
		</div>
		<div class="col-lg-5">
			<div class="sticky-top">
				<div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;"></div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
