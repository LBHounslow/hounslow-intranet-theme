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
		<div class="col-lg-12">
			<div class="bubble-outer">
				<div class="bubble">
					<?php the_title('<h3 class="entry-title">', '</h3>'); ?>
				</div>
			</div>
		</div>
		<div class="col-lg-12 mb-4" style="background:#83d6c9;">
			<div class="row">
				<div class="col-lg-7">
					<div id="entry-lead" class="entry-lead pt-3">
						<?php hounslow_intranet_entry_lead(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-7 bg-white pt-3">
					<div id="entry-navigation">
						<?php hounslow_intranet_entry_navigation(); ?>
					</div>
					<?php hounslow_intranet_entry_oembed(); ?>
					<div id="entry-body" class="entry-body">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'lbh-intranet'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'lbh-intranet'),
								'after'  => '</div>',
							)
						);

						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;
						?>
					</div><!-- .entry-body -->
				</div>
				<div class="col-lg-5">
					<div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100%;background-size:cover;background-position:center;background-clip: padding-box;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid mt-3">
		<div class="row display-flex">
			<?php hounslow_intranet_entry_related_items(); ?>
		</div>
	</div>
	<div class="container-fluid mt-3">
		<div class="row display-flex">
			<?php
			hounslow_intranet_entry_related_resources();
			?>
		</div>
	</div>
	<div class="container-fluid mt-3">
		<div class="row display-flex">
			<?php
			hounslow_intranet_entry_related_contacts();
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12" style="background:white;">
			<footer class="entry-footer">
				<p><?php hounslow_intranet_entry_footer(); ?></p>
				<?php hounslow_intranet_entry_meta(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->