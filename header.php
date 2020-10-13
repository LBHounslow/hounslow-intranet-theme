<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hounslow_Intranet
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'bg-dark' ) ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site bg-light">
	<a class="skip-link screen-reader-text" href="#primary" data-swiftype-index="false"><?php esc_html_e( 'Skip to content', 'hounslow-intranet' ); ?></a>
	<header id="masthead" class="site-header" data-swiftype-index="false">
		<nav id="network-navigation" class="navbar navbar-dark bg-dark px-3">
			<a class="navbar-brand" href="/">HI!</a>
			<?php get_search_form(); ?>
		</nav>
		<nav id="site-branding" class="navbar px-3">
			<span class="navbar-brand site-title">
				<a href="<?php echo esc_url( home_url( '/' )); ?>"><?php bloginfo( 'name' ); ?></a>
			</span>
			<?php
			$hounslow_intranet_description = get_bloginfo( 'description', 'display' );
			if ( $hounslow_intranet_description || is_customize_preview() ) :
				?>
				<span class="navbar-text"><?php echo $hounslow_intranet_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			<?php endif; ?>
		</nav>
		<?php if ( is_main_site() && is_front_page() ) { ?>
			<!-- Front Page Navigation -->
		<?php } else { ?>
		<nav id="site-breadcrumbs" class="navbar px-3" aria-label="breadcrumb">
			<?php hounslow_intranet_breadcrumbs(); ?>
		</nav>
		<?php } ?>
		<hr />
	</header><!-- #masthead -->
	<div id="content" class="site-content">
