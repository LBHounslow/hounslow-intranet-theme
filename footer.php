<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hounslow_Intranet
 */

?>
</div><!-- .row -->
</div><!-- .container -->
</div><!-- #content -->
	<footer id="colophon" class="site-footer bg-secondary2 px-3" data-swiftype-index="false">
		<div class="container-fluid">

				<div class="row">
					<div id="footer-column-one" class="widget-area col-sm">
						<?php hounslow_intranet_multisite_sidebar( 'sidebar-fc1' ) ?>
			    </div>
					<div id="footer-column-two" class="widget-area col-sm">
						<?php hounslow_intranet_multisite_sidebar( 'sidebar-fc2' ) ?>
			    </div>
					<div id="footer-column-three" class="widget-area col-sm">
						<?php hounslow_intranet_multisite_sidebar( 'sidebar-fc3' ) ?>
			    </div>
					<div id="footer-column-four" class="widget-area col-sm">
						<?php hounslow_intranet_multisite_sidebar( 'sidebar-fc4' ) ?>
			    </div>
				</div>
				<div class="row justify-content-center">
					<div class="col col-md-8 col-lg-6">
						<?php if ( function_exists('hounslow_intranet_network_nav_menu') && is_user_logged_in() ) {
						$social_menu_args = array(
								'theme_location'    => 'social',
								'depth'          => 1,
								'container'      => false,
								'container_class'=> '',
								'menu_class'     => 'nav justify-content-center',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
						);
						hounslow_intranet_network_nav_menu( $social_menu_args );
					} ?>
					</div>
			</div>
			<div class="row">
				<div class="col text-center">
					<div class="site-info">
						Hounslow Intranet &#169; Copyright London Borough of Hounslow

					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


 <script type="text/javascript">
        jQuery( document ).ready(function( $ ) {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


<!-- Swiftype Search -->
<script type="text/javascript">

  (function(w,d,t,u,n,s,e){w['SwiftypeObject']=n;w[n]=w[n]||function(){

  (w[n].q=w[n].q||[]).push(arguments);};s=d.createElement(t);

  e=d.getElementsByTagName(t)[0];s.async=1;s.src=u;e.parentNode.insertBefore(s,e);

  })(window,document,'script','//s.swiftypecdn.com/install/v2/st.js','_st');

	_st('install','_DkzPVuz5eyykUsibtix','2.0.0');

</script>


<?php wp_footer(); ?>

</body>
</html>
