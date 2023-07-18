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
	<div id="before-page" data-swiftype-index="false">
		<?php wp_body_open(); ?>
		<div class="status-bar">
			<btn class="btn selector"><?php echo do_shortcode('[gtranslate]'); ?></btn>
			<a id="desktop" class="btn btn-light status-btn" href="/submit-a-new-intranet-page">Add a Page</a>
			<a id="desktop" class="btn btn-light status-btn" href="/event-submission-form/?action=edit">Add an Event</a>
		</div>
	</div>
	<div id="page" class="site">
		<a class="visually-hidden-focusable" href="#primary" data-swiftype-index="false"><?php esc_html_e('Skip to content', 'hounslow-intranet-theme'); ?></a>
		<header id="masthead" class="site-header" data-swiftype-index="false">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-lg-2 align-self-center site-branding">
						<div class="logo-inner">
							<?php the_custom_logo();
							if (is_front_page() && is_home()) :
							else :
							endif;
							$test_description = get_bloginfo('description', 'display');
							if ($test_description || is_customize_preview()) :
							endif; ?>
						</div><!-- .logo-inner -->
					</div><!-- .site-branding -->
					<div class="col-lg-10">
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
				</div><!-- .row -->
			</div><!-- .container -->
		</header><!-- #masthead -->
		<div class="wrapper">