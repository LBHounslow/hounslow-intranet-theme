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
		<div id="entry-container" class="col-lg-7" style="background:white;">
			<header class="entry-header">
				<?php
				if (is_singular()) :
					the_title('<h1 class="entry-title">', '</h1>');
				else :
					the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;
				?>
			</header><!-- .entry-header -->
			<div id="entry-content" class="entry-content">
				<div id="entry-lead" class="entry-lead">
					<?php hounslow_intranet_entry_lead(); ?>
				</div>
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
				<?php
				hounslow_intranet_entry_related_items();
				hounslow_intranet_entry_related_resources();
				hounslow_intranet_entry_related_contacts();
				?>
			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<p><?php hounslow_intranet_entry_footer(); ?></p>
				<?php hounslow_intranet_entry_meta(); ?>
			</footer><!-- .entry-footer -->
		</div>
		<div class="col-lg-5">
			<div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;"></div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->