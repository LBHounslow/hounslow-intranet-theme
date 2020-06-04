<?php
/**
 * Template Name: Homepage
 *
 * @package Hounslow_Intranet
 */

get_header();
?>

<section id="primary" class="content-area col">
	<main id="main" class="site-main" role="main">

		<div class="row">

			<div id="home-col1" class="widget-area col-sm-12 col-lg-6">
				<?php dynamic_sidebar( 'home-widget-area1' ); ?>
			</div>
			<div id="home-col2" class="widget-area col-sm-12 col-lg-3">
				<?php dynamic_sidebar( 'home-widget-area2' ); ?>
			</div>
			<div id="home-col3" class="widget-area col-sm-12 col-lg-3">
				<?php dynamic_sidebar( 'home-widget-area3' ); ?>
			</div>

		</div>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
