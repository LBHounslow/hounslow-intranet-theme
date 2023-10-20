<section class="no-results not-found">
    <div class="page-content">
        <p>Sorry, there are no results for <?php printf(
                                                /* translators: %s: Search term. */
                                                esc_html__(' "%s".', 'text_domain'),
                                                '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
                                            ); ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->