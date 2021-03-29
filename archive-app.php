<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

get_header();
?>
<div class="container">
	<div class="row">
		<section id="primary" class="content-area col">
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
						<hr />
					</header><!-- .page-header -->
					<div class="apps-list">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						$app_name = rwmb_meta( '_hi_app_name' );
						$app_url = rwmb_meta( '_hi_app_url' );
						$app_icon_meta = rwmb_meta( '_hi_app_icon', array( 'limit' => 1 ) );
						$app_icon_meta_1 = reset( $app_icon_meta );
						$app_icon_id = $app_icon_meta_1['ID'];
						$app_icon = wp_get_attachment_image_src( $app_icon_id );
						if (empty($app_icon_id)) { $app_icon_src = false; } else { $app_icon_src = $app_icon[0]; }
						?>
						<a href="<?php echo $app_url; ?>" class="apps-tile">
							<div class="apps-tile-icon">
							<? if ( false == $app_icon_src ) { ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/app-icon-default.png" />
							<? } else { ?>
								<img src="<?php echo $app_icon_src; ?>">
							<?php } ?>
							</div>
							<div class="apps-tile-title">
								<span><?php echo $app_name; ?></span>
							</div>
						</a>
						<?php

					endwhile;

					?>
				</div>
				<?php 

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main><!-- #main -->
		</section><!-- #primary -->
<?php
get_footer();
