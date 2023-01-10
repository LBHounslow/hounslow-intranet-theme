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
	<div class="row">
		<div id="entry-container" class="col-lg-7" style="background:white;">
			<div id="entry-featured-video">
				<?php hounslow_intranet_entry_featured_video(); ?>
			</div>
			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php hounslow_intranet_post_thumbnail(); ?>
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

				hounslow_intranet_entry_related_links();

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;


				$terms = get_terms(array(
					'taxonomy' => 'topic-alpha',
					'hide_empty' => false
				));

				if (!empty($terms) && !is_wp_error($terms)) {
					$count = count($terms);
					$i = 0;
					$term_tabs = '<ul class="nav nav-tabs" id="myTab" role="tablist">';
					foreach ($terms as $term) {
						$i++;
						if ($i == 1) {
							$tab_class = ' active';
							$tab_aria = 'aria-selected="true"';
						} else {
							$tab_class = '';
							$tab_aria = 'aria-selected="false"';
						};
						$term_tabs .= '<li class="nav-item" role="presentation"><button class="nav-link' . $tab_class . '" id="' . $term->slug . '-tab" data-bs-toggle="tab" data-bs-target="#' . $term->slug . '" type="button" role="tab" aria-controls="' . $term->name . '" ' . $tab_aria . '>' . strtoupper($term->name) . '</button></li>';
					}
					$term_tabs .= '</ul>';
					echo $term_tabs;

					$i = 0;
					$tab_content = '<div class="mt-3"><div class="tab-content" id="myTabContent">';
					foreach ($terms as $term) {
						$i++;
						if ($i == 1) {
							$tab_pane_class = ' show active';
						} else {
							$tab_pane_class = '';
						};
						$tab_content .= '<div class="tab-pane fade' . $tab_pane_class . '" id="' . $term->slug . '" role="tabpanel" aria-labelledby="' . $term->slug . '-tab"><ul>';

						$topicItems = get_posts(
							array(
								'post_type' => 'topic_item',
								'numberposts' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'topic-alpha',
										'field'    => 'slug',
										'terms'    => $term->slug,
									),
								),
							),
						);
						foreach ($topicItems as $topicItem) :
							$tab_content .= '<li><a href="' . esc_url(get_permalink($topicItem)) . '" >' . $topicItem->post_title . '</a></li>';
						endforeach;
						$tab_content .= '</ul></div>';
					}
					$tab_content .= '</div></div>';
					echo $tab_content;
				} ?>

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