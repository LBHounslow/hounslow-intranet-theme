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
				<svg class="bi bi-house-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
				  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
				</svg> | Hounslow Intranet
			</a>
			<form class="form-inline">
		    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
		  </form>
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
