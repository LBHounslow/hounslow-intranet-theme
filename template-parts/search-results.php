<p><?php
    printf(
        esc_html(
            /* translators: %d: The number of search results. */
            _n(
                'We found %d result',
                'We found %d results',
                (int) $wp_query->found_posts,
                'text_domain'
            )
        ),
        (int) $wp_query->found_posts
    );
    printf(
        /* translators: %s: Search term. */
        esc_html__(' for "%s".', 'text_domain'),
        '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
    );
    ?></p>
<hr />
<?php
while (have_posts()) :
    the_post();
    get_template_part('template-parts/search', 'entry');
endwhile; // End of the loop.
hounslow_intranet_paged_posts_navigation(null, 'Search results navigation', $aria_label = 'Search');
?>