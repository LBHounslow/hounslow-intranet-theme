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
	<link rel="stylesheet" id="custom-css" href="/wp-content/themes/hounslow-intranet-theme/css/new-style.css?ver=4" type="text/css" media="all">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Nunito+Sans">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary" data-swiftype-index="false"><?php esc_html_e( 'Skip to content', 'hounslow-intranet-theme' ); ?></a>

		<header id="masthead" class="site-header">
	<div class="container-fluid" >
<div class="row align-items-center">
	<div class="col-lg-2 align-self-center site-branding">
		<div class="logo-inner">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>

				<?php
			else :
				?>

				<?php
			endif;
			$test_description = get_bloginfo( 'description', 'display' );
			if ( $test_description || is_customize_preview() ) :
				?>

			<?php endif; ?>
		</div><!-- .site-branding -->
	</div>
	<div class="col-lg-10">
		    <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark text-sidebar ">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>

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

                   <?php get_search_form(); ?>
                </div>
            </nav>
	</div>
	</div>
</div>
</header><!-- #masthead -->
            </div>
