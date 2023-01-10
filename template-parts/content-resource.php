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
				<div id="entry-body" class="entry-body">
					<?php
					if (rwmb_meta('lbh_resource_description')) {
						$value_description = rwmb_meta('lbh_resource_description');
						echo do_shortcode(wpautop($value_description));
					}
					if (rwmb_meta('lbh_resource_url')) :
						$value_url = rwmb_meta('lbh_resource_url');
					?>
						<div class="d-grid gap-2 col-6 mx-auto mb-3">
							<a href="<?php echo $value_url; ?>" class="btn btn-primary" role="button" target="_blank"><i class="fas fa-external-link-alt"></i> Link to this resource</a>
						</div>
					<?php endif; ?>
				</div><!-- .entry-body -->
				<?php
				hounslow_intranet_entry_related_resources();
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