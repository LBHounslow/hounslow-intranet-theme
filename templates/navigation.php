

			<div class="sidebar-header">
				<h5>Topics</h5>
			</div>

			<nav id="side-bar" class="side-bar-menu">
			<?php wp_nav_menu( array( 'menu' => 'resources' ) ); ?>
			</nav><!-- #site-navigation -->

			<div class="sidebar-header">
				<h5>Popular Links</h5>
			</div>

			<nav id="side-bar" class="side-bar-menu">
				<?php wp_nav_menu( array( 'menu' => 'popular links' ) ); ?>
			</nav><!-- #site-navigation -->

			<div class="sidebar-header">
				<h5>Support</h5>
			</div>

			<nav id="side-bar" class="side-bar-menu">
                <?php wp_nav_menu( array( 'menu' => 'support' ) ); ?>
			</nav><!-- #site-navigation -->

<div class="sidebar-out-links">
					<nav id="side-bar" class="side-bar-menu">
				<?php wp_nav_menu( array( 'menu' => 'external' ) ); ?>
			</nav><!-- #site-navigation -->
			</div>
           