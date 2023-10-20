<?php if (has_nav_menu('main')) : ?>

	<div class="sidebar-header">
		<h5><?php bloginfo('name'); ?></h5>
	</div>

<?php
	$menu_args = array(
		'theme_location'    => 'main',
		'fallback_cb'		=> false,
		'container'         => 'nav',
		'container_class'   => 'side-bar-menu',
		'container_id'      => 'side-bar-main',
	);
	wp_nav_menu($menu_args);

endif;

if (function_exists('hounslow_intranet_network_nav_menu')) :
	$network_menu_args = array(
		'theme_location'    => 'engage',
		'fallback_cb'		=> false,
		'container'         => 'nav',
		'container_class'   => 'side-bar-menu',
		'container_id'      => 'side-bar-engage',
	);
	hounslow_intranet_network_nav_menu($network_menu_args, '<div class="sidebar-header"><h5>Engage</h5></div>');

	$network_menu_args = array(
		'theme_location'    => 'popular',
		'fallback_cb'		=> false,
		'container'         => 'nav',
		'container_class'   => 'side-bar-menu',
		'container_id'      => 'side-bar-popularlinks',
	);
	hounslow_intranet_network_nav_menu($network_menu_args, '<div class="sidebar-header"><h5>Popular Links</h5></div>');

	$network_menu_args = array(
		'theme_location'    => 'support',
		'fallback_cb'		=> false,
		'container'         => 'nav',
		'container_class'   => 'side-bar-menu',
		'container_id'      => 'side-bar-connect',
	);
	hounslow_intranet_network_nav_menu($network_menu_args, '<div class="sidebar-header"><h5>Connect</h5></div>');

	$network_menu_args = array(
		'theme_location'    => 'external',
		'fallback_cb'		=> false,
		'container'         => 'nav',
		'container_class'   => 'side-bar-menu',
		'container_id'      => 'side-bar-external',
	);
	hounslow_intranet_network_nav_menu($network_menu_args, '<div class="sidebar-header"><h5>External Websites</h5></div>');

endif; ?>