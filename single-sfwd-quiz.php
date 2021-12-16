<?php
get_header();
get_sidebar();
?>
		<!-- Sidebar  -->
		<nav id="sidebar" data-swiftype-index="false">
			<?php get_template_part('templates/navigation', 'menu'); ?>
		</nav>
		<!-- Page Content  -->
		<div id="content">
			<main id="primary" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
		</div>
	</div>
</body>
<style>
#content {
	background:white;
}
</style>
<?php
get_footer();
