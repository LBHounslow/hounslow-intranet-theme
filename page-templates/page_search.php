<?php

/**
 * TEMPLATE NAME: Advanced Search
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet_v1
 */

global $post;
global $blog_id;
$origin_id = 1; // ID of main site
$show_advanced_search = true;

if (!is_multisite() || $origin_id != $blog_id) {
    $show_advanced_search = false;
}

// Advanced Network Search 
if (true === $show_advanced_search) {

    // Retrieve applicable query parameters.
    $search_query = isset($_GET['searchwp']) ? sanitize_text_field($_GET['searchwp']) : null;
    $search_page  = isset($_GET['swppg']) ? absint($_GET['swppg']) : 1;
    $search_standard  = isset($_GET['searchStandard']) ? sanitize_text_field($_GET['searchStandard']) : 'true';
    $search_news  = isset($_GET['searchNews']) ? sanitize_text_field($_GET['searchNews']) : 'true';
    $search_blogs  = isset($_GET['searchBlogs']) ? sanitize_text_field($_GET['searchBlogs']) : 'false';

    // Select sites to be searched based on search options
    $sitesSearched = array();

    // I. Search standard content: site ID 1
    $checked_standard = '';
    if ($search_standard == 'true') {
        array_push($sitesSearched, 1);
        $checked_standard = 'checked';
    }
    // II. Search news articles: site ID 2
    $checked_news = '';
    if ($search_news == 'true') {
        array_push($sitesSearched, 2);
        $checked_news = 'checked';
    }
    // III. Search blog posts: site ID 4 (more can be added here)
    $checked_blogs = '';
    if ($search_blogs == 'true') {
        array_push($sitesSearched, 4);
        $checked_blogs = 'checked';
    }

    // Perform the search.
    $search_results    = [];
    $search_pagination = '';
    if (!empty($search_query) && class_exists('\\SearchWP\\Query')) {

        $searchwp_query = new \SearchWP\Query($search_query, [
            'engine' => 'supplemental', // The Engine name.
            'fields' => 'default',      // Retain site ID info with results.
            'site'   => $sitesSearched,          // Search selected sites.
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
            <?php if (true === $show_advanced_search) { // Display advanced search 
            ?>
                <header>
                    <h1 class="page-title visually-hidden-focusable">Advanced Search</h1>
                </header>
                <!--- Advanced Search Form -->
                <div class="container my-4">
                    <div class="row">
                        <form id="advancedSearchForm" class="col d-inline-flex" role="search" method="get" action="<?php echo site_url('/search'); ?>">
                            <input class="me-2" type="search" placeholder="<?php echo esc_attr_x('Search...', 'placeholder') ?>" aria-label="Search" value="<?php echo isset($_GET['searchwp']) ? esc_attr($_GET['searchwp']) : '' ?>" name="searchwp" title="<?php echo esc_attr_x('Search for:', 'label') ?>">
                            <button class="btn btn-primary me-2" type="submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>"><i class="fa fa-search"></i></button>
                            <input type="hidden" id="searchStandard" name="searchStandard" value="<?php echo $search_standard; ?>">
                            <input type="hidden" id="searchNews" name="searchNews" value="<?php echo $search_news; ?>">
                            <input type="hidden" id="searchBlogs" name="searchBlogs" value="<?php echo $search_blogs; ?>">
                        </form>
                    </div>
                </div>
                <!--- Advanced Search Options -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <p class="mx-4 my-2">Search for:</p>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="searchStandardSwitch" <?php echo $checked_standard; ?>>
                        <label class="form-check-label" for="searchStandardSwitch">Standard content</label>
                    </div>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="searchNewsSwitch" <?php echo $checked_news; ?>>
                        <label class="form-check-label" for="searchNewsSwitch">News articles</label>
                    </div>
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="searchBlogsSwitch" <?php echo $checked_blogs; ?>>
                        <label class="form-check-label" for="searchBlogsSwitch">Blog posts</label>
                    </div>
                </nav>
                <hr />

                <!-- Search Results -->
                <?php if (!is_null($search_query)) { ?>
                    <h2>Search Results</h2>
                    <?php if (!empty($search_query) && !empty($search_results)) : ?>
                        <?php if (!empty($search_query)) :
                            printf(__('<p>We found the following results for &#8220;%s&#8221;.</p>'), esc_html($search_query));
                        endif; ?>
                        <hr />
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
                                            <div class="mb-2">
                                                <?php if (hounslow_intranet_get_post_type() == 'post') {
                                                    hounslow_intranet_posted_on();
                                                } ?>
                                            </div>
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

                        <!-- Paged search navigation -->
                        <?php if ($searchwp_query->max_num_pages > 1) : ?>
                            <nav class="navigation search-navigation" role="navigation" aria-label="Search results">
                                <h2 class="screen-reader-text">Search results navigation</h2>
                                <?php echo bootstrap_search_pagination($searchwp_query); ?>
                            </nav>
                        <?php endif; ?>

                    <?php elseif (!empty($search_query)) : // No results 
                    ?>
                        <p>No results found, please search again.</p>
                        <hr />
                    <?php endif; ?>

                <?php } else { ?>
                    <!-- List of alternative search tools -->
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <p class="mx-4 my-2">Other search tools:</p>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/address-book-search/">Address Book Search</a>
                            </li>
                        </ul>
                    </nav>
                <?php } ?>

            <?php } else { // Display standard site search 
            ?>
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
