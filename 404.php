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
<!-- Body Main Content -->
<div id="primary" class="site-main">
	<article id="post-error-404" class="error-404 not-found">
		<header class="entry-header">
			<h1 class="entry-title">Error 404</h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p>Sorry, that page can&rsquo;t be found.</p>
			<p>The Hounslow Intranet has recently been replaced with a new set of pages - so the content you are looking for may no longer be here.</p>
			<a href="/" class="btn btn-primary">Back To Home</a>
			<p>&nbsp;</p>
		</div><!-- .page-content -->

	</article>

</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
