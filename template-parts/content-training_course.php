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
					if (rwmb_meta('lbh_course_description')) {
						$value_description = rwmb_meta('lbh_course_description');
						echo do_shortcode(wpautop($value_description));
					}

					if (rwmb_meta('lbh_course_url')) :
						$value_url = rwmb_meta('lbh_course_url');
					?>
						<div class="d-grid gap-2 col-6 mx-auto mb-3">
							<a href="<?php echo $value_url; ?>" class="btn btn-primary" role="button" target="_blank"><i class="fas fa-external-link-alt"></i> Link to this course</a>
						</div>
					<?php
						if (rwmb_meta('lbh_course_platform')) {
							$value_platform = rwmb_meta('lbh_course_platform');
							echo '<p class="text-center"><em>Note this course is available on ' . $value_platform . '.</em></p>';
						}
					endif; ?>
					<hr />
					<div class="row">
						<div class="col-md-6">
							<ul class="list-group list-group-flush">
								<h3>Course Details</h3>
								<?php
								if (rwmb_meta('lbh_course_level')) {
									$value_level = rwmb_meta('lbh_course_level');
									switch ($value_level) {
										case '1':
											echo '<li class="list-group-item"><span class="badge bg-dark text-light">1</span> Introductory</li>';
											break;
										case '2':
											echo '<li class="list-group-item"><span class="badge bg-dark text-light">2</span> Intermediate</li>';
											break;
										case '3':
											echo '<li class="list-group-item"><span class="badge bg-dark text-light">3</span> Advanced</li>';
											break;
										default:
											// code...
											break;
									}
								}

								if (rwmb_meta('lbh_course_study_time')) {
									$value_study_time = rwmb_meta('lbh_course_study_time');
									echo '<li class="list-group-item"><i class="far fa-clock"></i> ' . $value_study_time . ' (hrs:mins)</li>';
								}

								$value_mandatory_for_audience = rwmb_meta('lbh_course_mandatory_for_audience');
								// If field is checked.
								if ($value_mandatory_for_audience) {
									if (rwmb_meta('lbh_course_audience')) {
										$term_audience = rwmb_meta('lbh_course_audience');
										echo '<li class="list-group-item list-group-item-warning"><i class="fas fa-exclamation-circle"></i> Mandatory course for ' . $term_audience->name . '</li>';
									}
								}
								// If field is unchecked.
								else {
									if (rwmb_meta('lbh_course_audience')) {
										$term_audience = rwmb_meta('lbh_course_audience');
										echo '<li class="list-group-item"><i class="fas fa-users"></i> ' . $term_audience->name . '</li>';
									}
								}

								if (rwmb_meta('lbh_course_provider')) {
									$value_provider = rwmb_meta('lbh_course_provider');
									echo '<li class="list-group-item">Provided by ' . $value_provider . '</li>';
								}
								?>
							</ul>

						</div>
						<div class="col-md-6">
							<?php
							if (rwmb_meta('lbh_course_learning_outcomes')) {
								$value_learning_outcomes = rwmb_meta('lbh_course_learning_outcomes');
								echo '<h3>Learning Outcomes</h3>';
								echo do_shortcode(wpautop($value_learning_outcomes));
							}
							?>
						</div>
					</div>
				</div><!-- .entry-body -->
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