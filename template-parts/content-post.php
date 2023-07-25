<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

?>
<!-- Content Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div id="entry-container" class="col-lg-7 bg-white">
			<!-- Content Header -->
			<header id="entry-header" class="row">
				<!-- Content Title -->
				<div id="entry-title" class="col-12">
					<?php
					if (is_singular()) :
						the_title('<h1 class="entry-title">', '</h1>');
					else :
						the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;
					?>
				</div><!-- #entry-title -->
				<!-- Content Byline -->
				<div id="entry-byline" class="col-12 entry-meta">
					<?php
					hounslow_intranet_posted_on();
					hounslow_intranet_posted_by();
					?>
				</div><!-- #entry-byline .entry-meta -->
				<!-- Content Lead -->
				<div id="entry-lead" class="col-12 entry-summary">
					<?php hounslow_intranet_entry_lead(); ?>
				</div><!-- #entry-lead .entry-meta -->
				<!-- Content Featured Media -->
				<div id="entry-featured-media" class="col-12 entry-featured-media">
					<?php hounslow_intranet_entry_featured_video(); ?>
				</div><!-- #entry-featured-media .entry-featured-media -->
			</header><!-- .entry-header -->
			<!-- Content Navigation -->
			<!-- Content -->
			<main id="entry-content" class="entry-content pb-3 border-bottom">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'hounslow-intranet'),
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
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'hounslow-intranet'),
						'after'  => '</div>',
					)
				);
				?>
			</main><!-- .entry-content -->

			<!-- Supplementary Content -->
			<?php hounslow_intranet_entry_related_links(); ?>

			<!-- Content Footer -->
			<footer id="entry-footer" class="entry-footer pb-3">
				<p><?php hounslow_intranet_entry_footer(); ?></p>
				<?php hounslow_intranet_entry_meta(); ?>
			</footer><!-- #entry-footer -->
			<!-- Comments -->
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
			?>
		</div>
		<div class=" col-lg-5">
			<div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;"></div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->