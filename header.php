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
	<a class="visually-hidden-focusable" href="#primary"><?php esc_html_e('Skip to content', 'hounslow-intranet-theme'); ?></a>
	<div id="header" class="container-fluid bg-white border-top border-primary" style="border-top-width:12px!important">
		<div id="header-row-01" class="row">
			<!-- Branding and Network Home -->
			<div id="header-row-01-col-01" class="col-6 col-lg-2 align-self-center">
				<?php get_template_part('template-parts/header', 'branding'); ?>
			</div><!-- #header-row-01-col-01 -->
			<!-- Utility Navigation -->
			<div id="header-row-01-col-02" class="col-6 col-lg-4 order-lg-last">
				<?php get_template_part('template-parts/header', 'utilitynav'); ?>
			</div><!-- #header-row-01-col-02 -->
			<!-- Search -->
			<div id="header-row-01-col-03" class="col-12 col-lg-6">
				<?php get_template_part('template-parts/header', 'search'); ?>
			</div><!-- #header-row-01-col-03 -->
		</div><!-- #header-row-01 .row -->
		<div id="header-row-02" class="row">
			<div id="header-row-01-co2-01" class="col">
				<?php get_template_part('template-parts/header', 'networknav'); ?>
			</div>
		</div>
	</div><!-- #header .container  -->
	<div class="wrapper">
		<!-- Sidebar (navigation) -->
		<nav id="sidebar">
			<?php get_template_part('template-parts/navigation', 'menu'); ?>
		</nav>
		<!-- Page Content  -->
		<div id="content">