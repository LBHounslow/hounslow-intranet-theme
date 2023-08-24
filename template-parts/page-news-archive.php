<div class="row">
    <div class="bubbleb-outer">
        <div class="bubbleb">
            <h5>Archive</h5>
        </div>
    </div>
    <?php
    //New WP Query to get news
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $news_query_args = array(
        'post_type' => 'post',
        'paged' => $paged,
    );
    $news = new WP_Query($news_query_args);

    // The Loop
    if ($news->have_posts()) {

        while ($news->have_posts()) {
            $news->the_post();

            get_template_part('template-parts/content-list', 'news');
        }

        hounslow_intranet_paged_posts_navigation($news, 'News navigation', $aria_label = 'News');
    } else {

        get_template_part('template-parts/content', 'none');
    }

    /* Restore original Post Data */
    wp_reset_postdata();

    ?>
</div>