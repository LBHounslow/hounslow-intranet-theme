<?php
$news_site_id = 2;
$loop = false;
if (function_exists('hounslow_intranet_network_news_query_banner')) {
    $loop = hounslow_intranet_network_news_query_banner($news_site_id);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            $news_post = get_post();
            switch_to_blog($news_site_id);
            $news_post_thumbnail = get_the_post_thumbnail($news_post->ID);
            $news_post_thumbnail_url = get_the_post_thumbnail_url($news_post->ID);
            $news_post_permalink = get_the_permalink($news_post->ID);
            restore_current_blog();
?>
<div class="col bg-banner" style="margin-bottom:10px;background:url('<?php echo $news_post_thumbnail_url; ?>');min-height:100px;background-size:cover;background-position:center;">
    <div class="overlay" style="background:rgba(131,214,201,0.8); min-height:100px;">
        <div class="row g-0 justify-content-between">
            <div class="col-lg-8">
                <div class="row banner-pad">
                    <div class="col-lg-12">
                        <h1 style="color:white;"><?php the_title(); ?></h1>
                    </div>
                    <div class="col-lg-6">
                        <h5 style="color:white;"><?php the_excerpt(); ?></h5>
                        <a style="color:white;" href="<?php echo $news_post_permalink; ?>"><button id="button" class="btn btn-dark">Read More</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-flex align-self-end banner-sm">
                <?php echo $news_post_thumbnail; ?>
            </div>
        </div>
    </div>
</div>
<?php

$displayed_posts_to_exclude = wp_cache_get( 'displayed_posts_to_exclude' );
$displayed_posts_to_exclude[] = $news_post->ID; // add post id to array
wp_cache_set( 'displayed_posts_to_exclude', $displayed_posts_to_exclude );


        endwhile;
    endif;
    wp_reset_postdata();
}
?>