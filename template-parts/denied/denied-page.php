<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="visually-hidden-focusable" href="#primary"><?php esc_html_e('Skip to content', 'hounslow-intranet-theme'); ?></a>
	<div id="header" class="container-fluid bg-white border-top border-primary" style="border-top-width:12px!important">
		<div id="header-row-01" class="row">
			<!-- Branding and Network Home -->
			<div id="header-row-01-col-01" class="col-6 col-lg-2 align-self-center">
				<?php get_template_part('template-parts/header', 'branding'); ?>
			</div><!-- #header-row-01-col-01 -->
			<!-- Utility Navigation -->
			<div id="header-row-01-col-02" class="col-6 col-lg-4 order-lg-last">
				<?php get_template_part('template-parts/header', 'utilitynav'); ?>
			</div><!-- #header-row-01-col-02 -->
			<!-- Search -->
			<div id="header-row-01-col-03" class="col-12 col-lg-6">
			</div><!-- #header-row-01-col-03 -->
		</div><!-- #header-row-01 .row -->
	</div><!-- #header .container  -->
	<div class="wrapper">
		<!-- Page Content  -->
		<div id="content">
<!-- Body Main Content -->
<div id="primary" class="site-main">
	<div class="row justify-content-center">
		<div id="entry-container" class="col-9 bg-white">
            <div class="col text-center">
                <h1><?php esc_html_e('Hounslow Intranet', 'hounslow-intranet-theme'); ?></h1>
                <p class="lead"><?php esc_html_e('You must be logged in to view this site.', 'hounslow-intranet-theme'); ?></p>
                <p>Sorry, access to this content is for employees and partners of London Borough of Hounslow only.</p>
                <?php
                if ( shortcode_exists( 'wpo365-sso-button' ) ) {
                    echo do_shortcode( '[wpo365-sso-button]' );
                } else { ?>
                <p><a href="<?php echo esc_url(wp_login_url()); ?>" class="btn btn-primary"><?php esc_html_e('Login', 'hounslow-intranet-theme'); ?></a></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div><!-- #primary .site-main -->
</div><!-- #content -->
</div><!-- .wrapper -->
<!-- Body Footer -->
<div id="footer" class="site-footer container-fluid bg-white p-3">
	<!-- Footer Content -->
	<div id="footer-row-two" class="row">
		<div class="col text-center">
			<div class="site-info">Hounslow Intranet &#169; Copyright London Borough of Hounslow</div><!-- .site-info -->
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- #footer -->
<?php wp_footer(); ?>
</body>

</html>