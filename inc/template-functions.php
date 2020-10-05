<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Hounslow_Intranet
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hounslow_intranet_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'hounslow_intranet_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hounslow_intranet_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'hounslow_intranet_pingback_header' );


/**
 * Display sidebars managed from the main site on other sites.
 *
 * The following functions provide for sidebars that are managed in the widget admin of the primary site
 * to be displayed on other sites in the network. We use this to display the same footer widgets on every
 * site in the network.
 *
 * Code taken from: https://redtreewebdesign.com/sharing-caring-wordpress-multisite/
 *
 */

// This is the function you use to place / call your sidebar at a specific theme location.
// Accepts the sidebar’s id as a parameter.
function hounslow_intranet_multisite_sidebar( $sidebar ) {

	// Try to get the stored widget content for the sidebar.
	$markup = get_site_transient( 'sidebar_cache_' . $sidebar );

	// If we’re not on the main site and the transient exists, display the stored widget content.
	if ( !is_main_site() && $markup ) {
		echo $markup;
	} else {
		// If we’re not on the main site and the transient doesn’t exist, we make a call to the main site, which kicks off example_multisite_sidebar_save().
		if ( !is_main_site() ) {
			$url = add_query_arg( array('get_sidebar' => $sidebar), get_site_url( 1 ) );
			$ctx = stream_context_create( array(
				'http' => array(
					'timeout' => 1
					)
				)
			);
			$request = file_get_contents( $url, 0, $ctx );
			if ( $request ) {
				echo $request;
			} else {
				echo '<!-- failed to open stream: HTTP request failed -->';
			}

			// display the content
			echo get_site_transient( 'sidebar_cache_' . $sidebar );
		} else {
			// If we’re on the main site and the transient doesn’t exist, store the widget content in the transient.
			ob_start();
			dynamic_sidebar($sidebar);
			$markup = ob_get_clean();
			set_site_transient( 'sidebar_cache_' . $sidebar, $markup, 4*60*60 );
			echo $markup;
		}
	}
}

add_action( 'template_redirect', 'hounslow_intranet_multisite_sidebar_save' );

function hounslow_intranet_multisite_sidebar_save() {

	// If we’re on the main site and the get_sidebar query var is set,
	// start a buffer that will record the widget content.
	if ( is_main_site() && isset( $_GET['get_sidebar'] ) ) {
		$sidebar = $_GET['get_sidebar'];
		ob_start();
		dynamic_sidebar( $sidebar );
		$markup = ob_get_clean();

		// Set a transient to store the HTML of the widget content
		set_site_transient( 'sidebar_cache_' . $sidebar, $markup, 4*60*60 );

		// Also display the content. This ensures that the content gets displayed if a site other than the main site is the first to be loaded after an update.
		echo $markup;
		die();
	}
}

// Delete all sidebar transients when editing sidebar widgets.
add_action( 'sidebar_admin_setup', 'hounslow_intranet_multisite_sidebar_clear_cache' );

function hounslow_intranet_multisite_sidebar_clear_cache() {
	global $wp_registered_sidebars;
	foreach($wp_registered_sidebars as $sidebar){
		delete_site_transient('sidebar_cache_' . $sidebar['id']);
	}
}
