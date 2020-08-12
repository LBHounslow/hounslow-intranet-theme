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
	<footer id="colophon" class="site-footer bg-secondary">
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
			<div class="row">
				<div class="col text-center">
					<div class="site-info">
						Hounslow Intranet &#169; Copyright London Borough of Hounslow
						<span class="sep"> | </span>
						<a href="/feedback/">Intranet Feeback</a>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
