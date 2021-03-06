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
 $appsBar = hounslow_intranet_get_apps_bar();
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
		<!-- Utility Navigation -->
		<nav id="utility-navigation" class="container-fluid bg-dark text-light">
			<div class="row g-2 ">
		    <div id="utility-brand" class="col-12 col-lg">
					<ul class="nav justify-content-left align-bottom">
						<!-- hounslow_intranet_utility_brand_nav_item -->
            <?php echo $appsBar['nav_item']; ?>
						<li class="nav-item">
				      <a class="nav-link link-secondary utility-brand-fs" href="/">HI!</a>
				    </li>
				  </ul>
		    </div>
					<?php if ( function_exists('hounslow_intranet_network_nav_menu') && is_user_logged_in() ) {

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
					hounslow_intranet_network_nav_menu( $network_menu_args );
				} else { ?>
					<div id="utility-menu" class="col-md-6 col-lg">
						<ul class="nav justify-content-end">
					    <li class="nav-item username-link">
					      <a href="<?php echo wp_login_url(get_permalink()); ?>" class="nav-link">Log In</a>
					    </li>
						</ul>
					</div>
				<?php } ?>
				<div id="utility-search" class="col-md-6 col-lg">
					<?php get_search_form(); ?>
		    </div>
		  </div>
		</nav>
		<!-- Network Navigation -->
		<nav id="network-navigation" class="navbar navbar-expand-sm navbar-light border-bottom">
			<button id="network-navigation-menu-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#network-navigation-menu" aria-controls="network-navigation-menu" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
			<?php if ( function_exists('hounslow_intranet_network_nav_menu')  && is_user_logged_in() ) {
			$network_menu_args = array(
					'theme_location'    => 'network',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse justify-content-center',
					'container_id'      => 'network-navigation-menu',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker()
			);
			hounslow_intranet_network_nav_menu( $network_menu_args );
		} ?>
		</nav>
		<?php if ( is_main_site() && is_front_page() ) { ?>
		  <!-- Front Page Navigation -->
		<?php } else { ?>
		<nav id="site-breadcrumbs" class="navbar navbar-light border-bottom" aria-label="breadcrumb">
		  <?php hounslow_intranet_breadcrumbs(); ?>
		</nav>
		<?php } ?>
	</header><!-- #masthead -->
		<!-- hounslow_intranet_apps_bar -->
    <?php echo $appsBar['apps_list']; ?>
	<div id="content" class="site-content">
