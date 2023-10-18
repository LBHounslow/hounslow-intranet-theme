<?php if (function_exists('hounslow_intranet_network_nav_menu')) : ?>

	<?php if (has_nav_menu('engage')) : ?>

		<div class="sidebar-header">
			<h5>Engage</h5>
		</div>

		<nav id="side-bar" class="side-bar-menu">
			<?php
			$network_menu_args = array(
				'theme_location'    => 'engage',
				'fallback_cb'		=> false,
			);
			hounslow_intranet_network_nav_menu($network_menu_args);
			?>
		</nav><!-- #site-navigation -->

	<?php endif;
	if (has_nav_menu('popular')) : ?>

		<div class="sidebar-header">
			<h5>Popular Links</h5>
		</div>

		<nav id="side-bar" class="side-bar-menu">
			<?php
			$network_menu_args = array(
				'theme_location'    => 'popular',
				'fallback_cb'				=> false,
			);
			hounslow_intranet_network_nav_menu($network_menu_args);
			?>
		</nav><!-- #site-navigation -->

	<?php endif;
	if (has_nav_menu('support')) : ?>

		<div class="sidebar-header">
			<h5>Connect</h5>
		</div>

		<nav id="side-bar" class="side-bar-menu">
			<?php
			$network_menu_args = array(
				'theme_location'    => 'support',
				'fallback_cb'				=> false,
			);
			hounslow_intranet_network_nav_menu($network_menu_args);
			?>
		</nav><!-- #site-navigation -->

	<?php endif;
	if (has_nav_menu('external')) : ?>

		<div class="sidebar-out-links">
			<div class="sidebar-header">
				<h5>External Websites</h5>
			</div>
			<nav id="side-bar" class="side-bar-menu">
				<?php
				$network_menu_args = array(
					'theme_location'    => 'external',
					'fallback_cb'				=> false,
				);
				hounslow_intranet_network_nav_menu($network_menu_args);
				?>
			</nav><!-- #site-navigation -->
		</div>
	<?php endif; ?>
<?php else : ?>
	<nav id="side-bar" class="side-bar-menu">
		<?php
		$menu_args = array(
			'theme_location'    => 'main',
			'fallback_cb'		=> false,
		);
		wp_nav_menu($menu_args);
		?>
	</nav><!-- #site-navigation -->
<?php endif; ?>