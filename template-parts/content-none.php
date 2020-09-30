<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'hounslow-intranet' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hounslow-intranet' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hounslow-intranet' ); ?></p>
			<?php
			get_search_form();
			$search_query = get_search_query();
			?>
			<hr/>
			<p>You could also try searching on the <a href="http://intranet2.hounslow.gov.uk" >old intranet</a> using the same keywords. To search click on the link below:</p>
			<ul>
				<li><a href="http://intranet2.hounslow.gov.uk/index/searchresults.htm#?cludoquery=<?php echo esc_attr( $search_query); ?>" >Search for "<?php echo esc_html( $search_query); ?>" on the old intranet.</a></li>
			</ul>
			<hr/>
			<?php

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hounslow-intranet' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
