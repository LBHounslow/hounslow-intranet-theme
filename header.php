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
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="visually-hidden-focusable" href="#primary" data-swiftype-index="false"><?php esc_html_e('Skip to content', 'hounslow-intranet-theme'); ?></a>
	<div id="header" class="container-fluid bg-white border-top border-primary" style="border-top-width:12px!important" data-swiftype-index="false">
		<div id="header-row-01" class="row">
			<!-- Branding and Network Home -->
			<div id="header-row-01-col-01" class="col-lg-2 align-self-center">
				<?php get_template_part('template-parts/header', 'branding'); ?>
			</div><!-- #header-row-01-col-01 -->
			<!-- Utility Navigation -->
			<div id="header-row-01-col-02" class="col-lg-10">
				<?php get_template_part('template-parts/header', 'utilitynav'); ?>
			</div><!-- #header-row-01-col-02 -->
		</div><!-- #header-row-01 .row -->
	</div><!-- #header .container  -->
	<div class="wrapper">
		<!-- Sidebar (navigation) -->
		<nav id="sidebar" data-swiftype-index="false">
			<?php get_template_part('template-parts/navigation', 'menu'); ?>
		</nav>
		<!-- Page Content  -->
		<div id="content">