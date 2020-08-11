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
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'hounslow-intranet' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'hounslow-intranet' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'hounslow-intranet' ), 'hounslow-intranet', '<a href="https://hounslow.digital/">London Borough of Hounslow</a>' );
							?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
