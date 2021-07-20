<div class="sidebar-header">
				<h5>Exchange</h5>
			</div>

			<nav id="side-bar" class="side-bar-menu">
		<div class="menu-popular-links-container"><ul id="menu-popular-links" class="menu">
<li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52"><a href="<?php echo bp_loggedin_user_domain(); ?>/activity">My Profile</a></li>
<li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52"><a href="/exchange/members">Members</a></li>
<li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-61"><a href="/exchange/groups">Groups</a></li>
</ul></div>
			</nav><!-- #site-navigation -->




<?php if ( function_exists('hounslow_intranet_network_nav_menu')  && is_user_logged_in() ) { ?>
			<div class="sidebar-header">
				<h5>Engage</h5>
			</div>

			<nav id="side-bar" class="side-bar-menu">
			<?php
				$network_menu_args = array(
						'theme_location'    => 'network',
						'fallback_cb'				=> false,
				);
				hounslow_intranet_network_nav_menu( $network_menu_args );
			?>
			</nav><!-- #site-navigation -->

			<div class="sidebar-header">
				<h5>Popular Links</h5>
			</div>

			<nav id="side-bar" class="side-bar-menu">
			<?php
				$network_menu_args = array(
						'theme_location'    => 'popular',
						'fallback_cb'				=> false,
				);
				hounslow_intranet_network_nav_menu( $network_menu_args );
			?>
			</nav><!-- #site-navigation -->

			<div class="sidebar-header">
				<h5>Connect</h5>
			</div>

			<nav id="side-bar" class="side-bar-menu">
			<?php
				$network_menu_args = array(
						'theme_location'    => 'support',
						'fallback_cb'				=> false,
				);
				hounslow_intranet_network_nav_menu( $network_menu_args );
			?>
			</nav><!-- #site-navigation -->

			<nav id="side-bar" class="side-bar-menu">
			<?php
				$network_menu_args = array(
						'theme_location'    => 'forum',
						'fallback_cb'				=> false,
				);
				hounslow_intranet_network_nav_menu( $network_menu_args );
			?>
			</nav><!-- #site-navigation -->

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
							hounslow_intranet_network_nav_menu( $network_menu_args );
						?>
			</nav><!-- #site-navigation -->
			</div>
<?php } ?>
