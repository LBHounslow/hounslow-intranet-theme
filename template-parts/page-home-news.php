<div class="row">
    <div class="col">
        <h4 class="mt-2">News</h4>
    </div>
</div>
<div class="row outer">
    <?php
    $news_site_id = 2;
    $loop = false;
    if (function_exists('hounslow_intranet_network_news_query_featured')) {
        $loop = hounslow_intranet_network_news_query_featured($news_site_id);
        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
                $news_post = get_post();
                switch_to_blog($news_site_id);
                $news_post_thumbnail_url = get_the_post_thumbnail_url($news_post->ID);
                $news_post_permalink = get_the_permalink($news_post->ID);
                $news_post_video = rwmb_meta('lbh_featured_video');
                $news_post_video_value = rwmb_get_value('lbh_featured_video');
                restore_current_blog(); ?>

                <div class="col-lg-6" style="padding:0px;">
                    <div class="inner">
                        <?php if ($news_post_video_value) :
                            echo $news_post_video;
                        else : ?>
                            <div style="background:url('<?php echo $news_post_thumbnail_url; ?>');height:300px;background-size:cover;background-position:center;">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 inner">
                    <h5><?php the_title(); ?></h5>
                    <p><?php the_time(get_option('date_format')); ?></p>
                    <?php the_excerpt(); ?>
                    <a style="color:white;" href="<?php echo $news_post_permalink; ?>"><button class="btn btn-dark">Read More</button></a>
                </div>
    <?php 
    $displayed_posts_to_exclude = wp_cache_get( 'displayed_posts_to_exclude' );
$displayed_posts_to_exclude[] = $news_post->ID; // add post id to array
wp_cache_set( 'displayed_posts_to_exclude', $displayed_posts_to_exclude );
    
            endwhile;
        endif;
        wp_reset_postdata();

    } ?>
    <div class="featured-border">
    </div>
</div>
<div class="row">
    <?php
    $displayed_posts_to_exclude = wp_cache_get( 'displayed_posts_to_exclude' );
    $loop = false;
    if (function_exists('hounslow_intranet_network_news_query_all')) {
        $loop = hounslow_intranet_network_news_query_all($news_site_id, $displayed_posts_to_exclude);
        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
                $news_post = get_post();
                switch_to_blog($news_site_id);
                $news_post_thumbnail_url = get_the_post_thumbnail_url($news_post->ID);
                $news_post_permalink = get_the_permalink($news_post->ID);
                $news_post_video = rwmb_meta('lbh_featured_video');
                $news_post_video_value = rwmb_get_value('lbh_featured_video');
                restore_current_blog();
    ?>

                <div class="col-lg-4 outer">
                    <div class="inner-post blog">

                        <?php if ($news_post_video_value) : ?>

                            <div class="lbh-featured-video">

                                <?php echo $news_post_video; ?>

                            </div>

                        <?php else : ?>

                            <div style="background:url('<?php echo $news_post_thumbnail_url; ?>');height:200px;background-size:cover;background-position:center;">
                            </div>

                        <?php endif; ?>


                        <div class="inner-body">
                            <h5><?php the_title(); ?></h5>
                        </div>
                        <p><?php the_time(get_option('date_format')); ?></p>
                        <?php the_excerpt(); ?>
                        <a style="color:white;" href="<?php echo $news_post_permalink; ?>"><button class="btn btn-dark">Read More</button></a>
                    </div>

                </div>
    <?php
            endwhile;
        endif;
        wp_reset_postdata();
    }
    ?>

</div>
<div class="row outer">
    <div class="col inner-feature shadow">
        <a class="btn btn-dark float-right" style="color:white;" href="/news">View all News</a>
    </div>
</div>