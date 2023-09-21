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
	<div id="header" class="container-fluid bg-white" data-swiftype-index="false">
		<div id="header-row-01" class="row">
			<!-- Branding and Network Home -->
			<div id="header-row-01-col-01" class="col-lg-2 align-self-center">
				<div class="logo-inner">
					<a href="<?php echo network_home_url(); ?>" class="custom-logo-link" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/lbh-one-hounslow-logo.png" width="300" height="124" alt="One Hounslow logo" class="custom-logo" /></a>
				</div><!-- .logo-inner -->
			</div><!-- .site-branding -->
			<!-- Utility Navigation -->
			<div id="header-row-01-col-02" class="col-lg-10">
				<nav class="navbar navbar-expand-lg navbar-dark">
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse" class="btn btn-dark"><i class="fas fa-align-left"></i><span></span></button>
						<?php if (function_exists('hounslow_intranet_network_nav_menu') && is_user_logged_in()) :

							$network_menu_args = array(
								'theme_location'    => 'utility',
								'depth'             => 2,
								'container'         => 'div',
								'container_class'   => 'col-md-6 col-lg',
								'container_id'      => 'utility-menu',
								'menu_class'        => 'nav justify-content-end',
								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
								'walker'            => new WP_Bootstrap_Navwalker()
							);
							hounslow_intranet_network_nav_menu($network_menu_args);
						elseif (is_user_logged_in()) :
							$current_user_ID = get_current_user_id();
							$userdata = get_userdata($current_user_ID);
							$profile_link = '<a href="' . get_edit_user_link($current_user_ID) . '" class="nav-link" >Welcome, ' . esc_attr($userdata->user_nicename) . '</a>'; ?>
							<div id="utility-menu" class="col-md-6 col-lg">
								<ul class="nav justify-content-end">
									<li class="nav-item username-link">
										<?php echo $profile_link; ?>
									</li>
								</ul>
							</div><!-- .utility-menu -->
						<?php else : ?>
							<div id="utility-menu" class="col-md-6 col-lg">
								<ul class="nav justify-content-end">
									<li class="nav-item username-link">
										<a href="<?php echo wp_login_url(get_permalink()); ?>" class="nav-link">Log In</a>
									</li>
								</ul>
							</div><!-- .utility-menu -->
						<?php endif;
						get_search_form(); ?>
					</div>
				</nav>
			</div>
		</div><!-- #header-row-01 .row -->
	</div><!-- #header .container  -->
	<div class="wrapper">
		<!-- Sidebar (navigation) -->
		<nav id="sidebar" data-swiftype-index="false">
			<?php get_template_part('template-parts/navigation', 'menu'); ?>
		</nav>
		<!-- Page Content  -->
		<div id="content">