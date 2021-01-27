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

		if ( is_single() ) {
			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( 'Posted on %s', 'post date', 'hounslow-intranet' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			echo '<p><i class="fas fa-calendar-day"></i> <span class="posted-on">' . $posted_on . '</span></p>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		} else {
			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( ' %s', 'post date', 'hounslow-intranet' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			echo '<i class="fas fa-calendar-day"></i> <span class="posted-on">' . $posted_on . '</span>&nbsp; &nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		}
	}
endif;

if ( ! function_exists( 'hounslow_intranet_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function hounslow_intranet_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'hounslow-intranet' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<p><i class="fas fa-user"></i> <span class="byline"> ' . $byline . '</span></p>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'hounslow_intranet_is_sticky' ) ) :
	/**
	 * Indicates sticky posts.
	 */
	function hounslow_intranet_is_sticky() {

		if ( is_sticky() ) {
			if ( is_single() ) {

				echo '<p><i class="fas fa-thumbtack"></i> <span class="is_sticky">Featured</span></p>';

			} else {

				echo '<i class="fas fa-thumbtack"></i> <span class="is_sticky">Featured</span>&nbsp; &nbsp;';
			}
		}
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
				printf( '<i class="fas fa-tags"></i> <span class="cat-links">' . esc_html__( 'Posted in: %1$s', 'hounslow-intranet' ) . '</span> ', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'hounslow-intranet' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<i class="fas fa-hashtag"></i> <span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'hounslow-intranet' ) . '</span> ', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '| <i class="fas fa-comment"></i> <span class="comments-link">';
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
			echo '</span> ';
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
			'| <i class="fas fa-edit"></i> <span class="edit-link">',
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

			<div class="post-thumbnail post-thumbnail-single">
				<?php the_post_thumbnail(); ?>
				<?php if ( !empty( get_the_post_thumbnail_caption() ) ) { ?>
					<figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
				<?php } ?>
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

if ( ! function_exists( 'hounslow_intranet_news_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function hounslow_intranet_news_thumbnail( $news ) {
    if ( has_post_thumbnail( $news ) ) {
			?>
				<a class="post-thumbnail" href="<?php echo get_the_permalink( $news ); ?>" aria-hidden="true" tabindex="-1"><?php echo get_the_post_thumbnail( $news ); ?></a>
			<?php
			} else {
			?>
				<a class="post-thumbnail" href="<?php echo get_the_permalink( $news ); ?>" aria-hidden="true" tabindex="-1"><img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/news-thumbnail-default.jpg" /></a>
			<?php
			}
	}
endif;

if ( ! function_exists( 'hounslow_intranet_link_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 *
	 */
	function hounslow_intranet_link_thumbnail( $post ) {
    if ( has_post_thumbnail( $post ) ) {
			?>
				<a class="post-thumbnail" href="<?php echo get_the_permalink( $post ); ?>" aria-hidden="true" tabindex="-1"><?php echo get_the_post_thumbnail( $post ); ?><figcaption><?php echo get_the_title($post); ?></figcaption></a>
			<?php
			} else {
			?>
				<a class="post-thumbnail" href="<?php echo get_the_permalink( $post ); ?>" aria-hidden="true" tabindex="-1"><img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/link-thumbnail-default.jpg" /><figcaption><?php echo get_the_title($post); ?></figcaption></a>
			<?php
			}
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
        } else if ( is_home() && ! is_front_page() ) {

					if ( get_query_var('paged') ) {

						echo '<li class="breadcrumb-item"><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">News</a></li>';
						echo '<li class="breadcrumb-item active">'.__('Page') . ' ' . get_query_var('paged') . '</li>';

					} else {

						echo '<li class="breadcrumb-item active">News</li>';

					}

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
                //echo $cat_display;
                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                //echo '<li class="breadcrumb-item"><a href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
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
									$isfp = $ancestor;
									if ( FALSE == HounslowIntranetCustom\Util::page_is_front_page( $ancestor ) ) {
                    $parents .= '<li class="breadcrumb-item"><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
									}
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
            echo '<li class="breadcrumb-item active">Error 404</li>';
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
	function hounslow_intranet_display_child_pages( $post_id, $format = '', $thumbnail = FALSE ) {
		if ( ! is_page() ) {
			return;
		}

		$childpages = hounslow_intranet_get_child_pages( $post_id );

		if ( !$childpages ) {
			return;
		}

		switch ($format) {
			case 'media':
				$element_header = '';
				$element_footer = '<hr/>';
				break;

			case 'card':
				$element_header = '<div class="row mb-3">';
				$element_footer = '</div><hr/>';
				break;

			case 'image':
				$element_header = '<div class="row mb-3">';
				$element_footer = '</div><hr/>';
				break;

			default:
				$element_header = '<ul class="list-of-pages">';
				$element_footer = '</ul><hr/>';
				break;
		}

		$front_page_id = get_option('page_on_front');

		echo $element_header;

		foreach ($childpages as $child) {
			if ( $front_page_id == $child->ID ) { continue; }
			switch ($format) {
				case 'media':
					hounslow_intranet_child_page_media_item( $child );
					break;

				case 'card':
					hounslow_intranet_child_page_card_item( $child );
					break;

				case 'image':
					hounslow_intranet_child_page_image_item( $child );
					break;

				default:
					hounslow_intranet_child_page_list_item( $child );
					break;
			}

		}

		echo $element_footer;
	}
endif;

function hounslow_intranet_get_child_pages( $post_id ) {

	if ( is_front_page() ) {

		$args = array(
			'parent' => 0,
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order',
		);

		$childpages = get_pages( $args );

	} else {

		$args = array(
				'order'          => 'ASC',
				'post_parent'    => $post_id,
				'post_type'      => 'page',
		);

		$childpages = apply_filters( 'get_pages', get_children( $args ) );

	}

	return $childpages;

}

function hounslow_intranet_child_page_list_item( $child ) {
	?><li><a href="<?php echo esc_url( get_permalink($child->ID) ); ?>"><?php echo esc_html( get_the_title($child->ID) ); ?></a></li><?php
}

function hounslow_intranet_child_page_media_item( $child ) {
	?><div class="media">
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
</div><?php
}

function hounslow_intranet_child_page_card_item( $child ) {
	?><div class="col-sm-6 col-lg-4">
	<div class="card mb-2">

		 			<?php if (has_post_thumbnail( $child->ID ) ) :	?>
		<a class="post-thumbnail" href="<?php the_permalink($child->ID); ?>" aria-hidden="true" tabindex="-1">

		<?php echo get_the_post_thumbnail( $child->ID, 'large' ); ?>
		</a>
	 <?php else : ?>
		<a class="post-thumbnail" href="<?php the_permalink($child->ID); ?>" aria-hidden="true" tabindex="-1">
			<img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/assets/img/link-thumbnail-default.jpg" />
			<!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="currentColor"></rect></svg>-->
		</a>
	<?php endif; ?>
		<div class="card-body">
			<h5 class="card-title"><?php 	echo esc_html( get_the_title($child->ID) ); ?></h5>
			<p class="card-text"><?php echo apply_filters( 'the_excerpt', get_the_excerpt($child->ID) ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url( get_permalink($child->ID) ); ?>">Read more&hellip;</a>
		</div>
</div>
</div><?php
}

function hounslow_intranet_child_page_image_item( $child ) {
	echo '<div class="col-sm-6 col-lg-4">';
	echo '<figure class="wp-block-image size-large">';
	hounslow_intranet_link_thumbnail( $child );
	echo '</figure></div>';
}


if ( ! function_exists( 'hounslow_intranet_paged_posts_navigation' ) ) :
	/**
	 * Prints a paginated navigation element.
	 * Used on post index and archive pages.
	 */
	function hounslow_intranet_paged_posts_navigation( $query = null, $screen_reader_text = 'Posts navigation', $aria_label = 'Posts', $class = 'posts-navigation' ) {

		?><nav class="navigation <?php echo $class ?>" role="navigation" aria-label="<?php echo $aria_label ?>">
				<h2 class="screen-reader-text"><?php echo $screen_reader_text ?></h2>
				<?php echo bootstrap_pagination( $query ); ?>
			</nav><?php
		}
endif;

/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 * @param array $params
 *
 * @return string|null
 *
 * Accepts a WP_Query instance to build pagination (for custom wp_query()),
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 5.4.1
 * - Tested with Bootstrap 4.4
 * - Tested on Sage 9.0.9
 *
 * SOURCE:
 * https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
 *
 * Modified to work with custon post queries on static pages
 *
 * USAGE:
 *     <?php echo bootstrap_pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ... endwhile() ...
 *       echo bootstrap_pagination($query);
 *     ?>
 */
function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true, $params = [] ) {
    if ( null === $wp_query ) {
        global $wp_query;
    }

    $add_args = [];

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

		if ( is_page_template() ) {
			$current = get_query_var( 'page' );
		} else {
			$current = get_query_var( 'paged' );
		}

    $pages = paginate_links( array_merge( [
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'       => '?paged=%#%',
            'current'      => max( 1, $current ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __( '« Prev' ),
            'next_text'    => __( 'Next »' ),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params )
    );

    if ( is_array( $pages ) ) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination justify-content-center"><ul class="pagination">';

        foreach ( $pages as $page ) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

/**
 * Notes:
 * AJAX:
 * - When used with wp_ajax (generate pagination HTML from ajax) you'll need to provide base URL (or it'll be admin-ajax URL)
 * - Example for a term page: bootstrap_pagination( $query, false, ['base' => get_term_link($term) . '?paged=%#%'] )
 *
 * Images as next/prev:
 * - You can use image as next/prev buttons
 * - Example: 'prev_text' => '<img src="' . get_stylesheet_directory_uri() . '/assets/images/prev-arrow.svg">',
 *
 * Add query parameters to page URLs
 * - If you need custom URL parameters on your page URLS, use the "add_args" attribute
 * - Example (before paginate_links() call):
 * $arg = [];
 * if (isset($_GET[ 'sort' ])) {
 *  $args[ 'sort' ] = (string)$_GET[ 'sort' ];
 * }
 * ...
 * 'add_args'     => $args,
 */
