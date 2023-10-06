<?php

/**
 * TEMPLATE NAME: Advanced Search
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet_v1
 */

global $post;
global $blog_id;
$origin_id = 1;
$show_advanced_search = true;
$current_blog_id = get_current_blog_id();

if (!is_multisite() || $origin_id != $blog_id) {
    $show_advanced_search = false;
}

if (true === $show_advanced_search) {

    // Retrieve applicable query parameters.
    $search_query = isset($_GET['searchwp']) ? sanitize_text_field($_GET['searchwp']) : null;
    $search_page  = isset($_GET['swppg']) ? absint($_GET['swppg']) : 1;

    // Perform the search.
    $search_results    = [];
    $search_pagination = '';
    if (!empty($search_query) && class_exists('\\SearchWP\\Query')) {

        $searchwp_query = new \SearchWP\Query($search_query, [
            'engine' => 'supplemental', // The Engine name.
            'fields' => 'default',      // Retain site ID info with results.
            'site'   => [1, 2, 4],          // Search all sites.
            'page'   => $search_page,
        ]);

        $search_results = $searchwp_query->get_results();
    }
}

get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
    <div class="row">
        <div id="entry-container" class="col-lg-7 bg-white">
            <?php if (true === $show_advanced_search) { ?>
                <header>
                    <h1 class="page-title">Advanced Search</h1>
                </header>
                <form role="search" method="get" class="search-form" action="<?php echo site_url('/search'); ?>">
                    <label>
                        <span class="screen-reader-text">
                            <?php echo _x('Search for:', 'label') ?>
                        </span>
                        <input type="search" class="search-field" name="searchwp" placeholder="<?php echo esc_attr_x('Search...', 'placeholder') ?>" value="<?php echo isset($_GET['searchwp']) ? esc_attr($_GET['searchwp']) : '' ?>" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
                    </label>
                    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
                </form>

                <hr />

                <?php if (!is_null($search_query)) { ?>

                    <h2>
                        <?php if (!empty($search_query)) :
                            printf(__('Search Results for: %s'), esc_html($search_query));
                        endif; ?>
                    </h2>

                    <?php if (!empty($search_query) && !empty($search_results)) : ?>
                        <?php foreach ($search_results as $search_result) : ?>

                            <?php
                            // Track whether we switched sites for this result.
                            $switched_site = false;

                            // Do we need to switch to the proper site for this result?
                            if ($blog_id != $search_result->site) {
                                switch_to_blog($search_result->site);
                                $switched_site = true;
                            }
                            $post = get_post($search_result->id);
                            ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="container px-0">
                                    <div class="row">
                                        <div class="col-10">
                                            <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                        </div>
                                        <div class="col-2 p-2 d-flex justify-content-center">
                                            <span><?php echo hounslow_intranet_post_type_identifier(); ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?php hounslow_intranet_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </article>


                        <?php wp_reset_postdata();


                            if (true == $switched_site) {
                                restore_current_blog();
                            }
                        endforeach; ?>

                        <?php if ($searchwp_query->max_num_pages > 1) : ?>
                            <nav class="navigation search-navigation" role="navigation" aria-label="Search results">
                                <h2 class="screen-reader-text">Search results navigation</h2>
                                <?php echo bootstrap_search_pagination($searchwp_query); ?>
                            </nav>
                        <?php endif; ?>
                    <?php elseif (!empty($search_query)) : ?>
                        <p>No results found, please search again.</p>
                    <?php endif; ?>


                <?php } ?>



            <?php } else { ?>
                <header class="entry-header">
                    <h1 class="page-title">
                        Search <?php echo get_bloginfo('name'); ?>
                    </h1>
                </header><!-- .entry-header -->
                <?php get_search_form(); ?>

            <?php } ?>

        </div>
        <div class="col-lg-5">
            <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;"></div>
        </div>
    </div>
    </article><!-- #post-<?php the_ID(); ?> -->

</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
