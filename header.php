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
	<header id="masthead" class="site-header bg-primary">
		<nav id="network-navigation" class="navbar  navbar-dark bg-dark">
		  <a class="navbar-brand" href="/">@ Hounslow Intranet</a>
			<form class="form-inline">
		    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		  </form>
		</nav>
		<div class="container">
			<nav id="site-branding" class="navbar navbar-dark bg-primary">
			  <span class="navbar-brand site-title">
					<?php bloginfo( 'name' ); ?>
				</span>
					<?php
					$hounslow_intranet_description = get_bloginfo( 'description', 'display' );
					if ( $hounslow_intranet_description || is_customize_preview() ) :
						?>
						<span class="navbar-text"><?php echo $hounslow_intranet_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<?php endif; ?>
			</nav>
			<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark bg-primary">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
					<?php
					wp_nav_menu( array(
							'theme_location'    => 'menu-1',
							'depth'             => 1,
							'container'         => 'ul',
							'container_class'   => '',
							'menu_class'        => 'navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
					) );
					?>
				 </div>
			</nav>
	</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
