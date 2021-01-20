<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hounslow_Intranet
 */


if ( is_page() ) {

	if ( is_front_page() ) {

		?>

		<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">
			<?php
			if ( is_active_sidebar( 'sidebar-homepage' ) ) {
				dynamic_sidebar( 'sidebar-homepage' );
			} ?>
		</aside><!-- #secondary -->

		<?php

	} elseif ( is_page_template( array( 'page_document.php', 'page_document-landing.php' ) ) ) {

		?>

		<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">
			<?php dynamic_sidebar( 'sidebar-guidance' ); ?>
		</aside><!-- #secondary -->

		<?php

	} elseif ( is_page_template( 'page_news.php' ) ) {

		?>

		<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">
			<?php dynamic_sidebar( 'sidebar-post' ); ?>
		</aside><!-- #secondary -->

		<?php

	} else {

		if ( ! is_active_sidebar( 'sidebar-page' ) ) {
			return;
		}
		?>

		<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">
			<?php dynamic_sidebar( 'sidebar-page' ); ?>
		</aside><!-- #secondary -->

		<?php

	}

} elseif ( is_single() ) {
	?>
	<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">

		<?php
		if ( 'post' === get_post_type() ) :
		?>
		<section id="hounslow-intranet-post-meta" class="widget entry-meta hounslow-intranet-post-meta">
			<?php
			hounslow_intranet_is_sticky();
			hounslow_intranet_posted_on();
			hounslow_intranet_posted_by();
	    ?>
		</section>
		<?php endif;
		if ( is_active_sidebar( 'sidebar-post' ) ) {
			dynamic_sidebar( 'sidebar-post' );
		}
		?>
	</aside><!-- #secondary -->
	<?php
} else {

	if ( ! is_active_sidebar( 'sidebar-post' ) ) {
		return;
	}
	?>

	<aside id="secondary" class="widget-area col-sm-12 col-lg-4" data-swiftype-index="false">
		<?php dynamic_sidebar( 'sidebar-post' ); ?>
	</aside><!-- #secondary -->

	<?php
}
?>
