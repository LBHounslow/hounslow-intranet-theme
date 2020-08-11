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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hounslow-intranet' ); ?></a>
	<header id="masthead" class="site-header">
		<nav id="network-navigation" class="navbar  navbar-dark bg-dark">
		  <a class="navbar-brand" href="/">
				Hounslow Intranet
			</a>
		</nav>
		<div class="container">
			<nav id="site-branding" class="navbar">
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
			<hr>
		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
