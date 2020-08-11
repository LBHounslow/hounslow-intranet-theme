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


if ( ! function_exists( 'hounslow_intranet_breadcrumbs' ) ) :
	/**
	 * Displays the breadcrummb navigation.
	 *
	 * Original code from https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
	 * Modified to work with Bootstap and network
	 */
	function hounslow_intranet_breadcrumbs() {

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
		if ( is_front_page() ) {

			echo '<ol class="breadcrumb">';
			echo '<li class="breadcrumb-item"><a href="' . network_site_url() . '">Home</a></li>';
			$blog_title = get_bloginfo( 'name' );
			echo '<li class="breadcrumb-item active">' . $blog_title . '</li>';

		} else {

        // Build the breadcrums
        echo '<ol class="breadcrumb">';

				// Network Home
				echo '<li class="breadcrumb-item"><a href="' . network_site_url() . '">Home</a></li>';

				// Site Home
				if ( !is_main_site() ) {
					$blog_title = get_bloginfo( 'name' );
					echo '<li class="breadcrumb-item"><a href="' . get_home_url() . '">' . $blog_title . '</a></li>';
				}

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_archive_title() . '</li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="breadcrumb-item"><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="breadcrumb-item active">' . $custom_tax_name . '</li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="breadcrumb-item"><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }

						// Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end($category);

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb-item">'.$parents.'</li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="breadcrumb-item"><a href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

            } else {

                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="breadcrumb-item">' . single_cat_title('', false) . '</li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb-item"><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

            } else {

                // Just display current page if not parents
                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="breadcrumb-item active">' . $get_term_name . '</li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

            // Month link
            echo '<li class="breadcrumb-item"><a href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';

            // Day display
            echo '<li class="breadcrumb-item active">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

            // Month display
            echo '<li class="breadcrumb-item active">' . get_the_time('M') . ' Archives</li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="breadcrumb-item active">' . get_the_time('Y') . ' Archives</li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="breadcrumb-item active">Author: ' . $userdata->display_name . '</li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="breadcrumb-item active">'.__('Page') . ' ' . get_query_var('paged') . '</li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="breadcrumb-item">Search results for: ' . get_search_query() . '</li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ol>';

    }

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
