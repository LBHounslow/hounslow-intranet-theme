<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Hounslow_Intranet
 */

if ( ! function_exists( 'hounslow_intranet_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function hounslow_intranet_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'hounslow-intranet' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'hounslow_intranet_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function hounslow_intranet_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'hounslow-intranet' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'hounslow_intranet_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hounslow_intranet_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'hounslow-intranet' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'hounslow-intranet' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'hounslow-intranet' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'hounslow-intranet' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'hounslow-intranet' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'hounslow-intranet' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'hounslow_intranet_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function hounslow_intranet_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'hounslow_intranet_display_child_pages' ) ) :
	/**
	 * Displays the children of a page.
	 *
	 * Description..
	 * ...
	 */
	function hounslow_intranet_display_child_pages( $post_id, $format = '' ) {
		if ( ! is_page() ) {
			return;
		}

		$args = array(
        'order'          => 'ASC',
        'post_parent'    => $post_id,
        'post_type'      => 'page',
    );

    $childpages = get_children( $args );

		if ( $format == 'media') :
				foreach ($childpages as $child) {
			?>
			<div class="media">
				<a href="<?php echo esc_url( get_permalink($child->ID) ); ?>">
					<svg class="bi bi-file-text" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
					  <path fill-rule="evenodd" d="M4.5 10.5A.5.5 0 0 1 5 10h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
					</svg>
				</a>
			  <div class="media-body ml-2">
			    <h5 class="mt-0"><a href="<?php echo esc_url( get_permalink($child->ID) ); ?>"><?php 	echo esc_html( get_the_title($child->ID) ); ?></a></h5>
					<?php echo apply_filters( 'the_excerpt', get_the_excerpt($child->ID) ); ?>
			  </div>
			</div>
		<?php }
		elseif ( $format == 'card' ) :
			?>
			<div class="row mb-3">
				<?php foreach ($childpages as $child) { ?>
					<div class="col-sm-4">
						<div class="card mb-2">

						<?php if (has_post_thumbnail( $child->ID ) ) :	?>
							<a class="post-thumbnail" href="<?php the_permalink($child->ID); ?>" aria-hidden="true" tabindex="-1">
						 		<?php echo get_the_post_thumbnail( $child->ID, 'large' ); ?>
						 	</a>
						 <?php else : ?>
							<a class="post-thumbnail" href="<?php the_permalink($child->ID); ?>" aria-hidden="true" tabindex="-1">
								<svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="currentColor"></rect></svg>
						 	</a>
						<?php endif; ?>
						  <div class="card-body">
						    <h5 class="card-title"><?php 	echo esc_html( get_the_title($child->ID) ); ?></h5>
						    <p class="card-text"><?php echo apply_filters( 'the_excerpt', get_the_excerpt($child->ID) ); ?></p>
						    <a class="card-link" href="<?php echo esc_url( get_permalink($child->ID) ); ?>">Read more&hellip;</a>
						  </div>
					</div>
				</div>
		<?php } ?>
		</div>
	<?php else : ?>
		<ul>
			<?php foreach ($childpages as $child) {	?>
				<li><a href="<?php echo esc_url( get_permalink($child->ID) ); ?>"><?php 	echo esc_html( get_the_title($child->ID) ); ?></a></li>
			<?php } ?>
		</ul>
		<?php
		endif;
	}
endif;
