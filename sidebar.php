<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hounslow_Intranet
 */


if ( is_page() ) :

	if ( ! is_active_sidebar( 'sidebar-page' ) ) {
		return;
	}
	?>

	<aside id="secondary" class="widget-area col-sm-12 col-lg-4">
		<?php dynamic_sidebar( 'sidebar-page' ); ?>
	</aside><!-- #secondary -->

	<?php

else :

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
	?>

	<aside id="secondary" class="widget-area col-sm-12 col-lg-4">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->

	<?php
endif;
?>
