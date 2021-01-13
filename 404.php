<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Hounslow_Intranet
 */

get_header();
?>
<div class="container">
	<div class="row">
		<section id="primary" class="content-area col-sm-12 col-lg-8">
			<main id="main" class="site-main" role="main">
				<article id="post-error-404" class="error-404 not-found">
					<header class="entry-header">
						<h1 class="entry-title">Error 404</h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p>Sorry, that page can&rsquo;t be found.</p>
						<p>The Hounslow Intranet has recently been replaced with a new set of pages - so the content you are looking for may no longer be here.</p>
						<p>The old intranet has been kept available at a new location on a temporary basis. So the content you are looking for may have been moved there. You can visit the old intranet by following this link:</p>
						<ul>
							<li>
								<a href="http://intranet2.hounslow.gov.uk/">intranet2.hounslow.gov.uk</a>
							</li>
						</ul>
						<p>If you have reached this page after following a specific link please try again by adding a &lsquo;2&rsquo; after the word &lsquo;intranet&rsquo; in the address bar above.</p>
						<p>For example:<br /><code>http://intranet.hounslow.gov.uk/index/p/pay_scales.htm</code><br />becomes:<br /><code>http://intranet2.hounslow.gov.uk/index/p/pay_scales.htm</code></p>
						<p>&nbsp;</p>
					</div><!-- .page-content -->

				</section><!-- .error-404 -->
			</main><!-- #main -->
		</section><!-- #primary -->
<?php
get_footer();
