<?php
/**
 * Template Name: BuddyPress
 *
 * Full Width (with sidebar)
 *
 * @package Hounslow_Intranet
 */

get_header();
?>
<div class="container-fluid">
	<div class="row">
		<section id="primary" class="content-area col">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) :
					the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content clearfix">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; // End of the loop.	?>

			</main><!-- #main -->
		</section><!-- #primary -->
		<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">
			<?php dynamic_sidebar( 'sidebar-buddypress' ); ?>
		</aside><!-- #secondary -->
<?php get_footer();
