<div class="col-lg-12" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:200px;background-size:cover;background-position:center;">
    <div class="bubble-outer">
        <div class="bubble">
            <h3><?php the_title(); ?></h3>
        </div>
    </div>
</div>
<div style="padding:20px;background:#83d6c9;margin-bottom:20px;">
    <div class="row align-items-center justify-content-around">
        <div class="col-lg-6">
        <?php if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif; ?>
        </div>
        <div class="col-lg-3">
            <?php $images = rwmb_meta('second_image', array('size' => 'full'));
            if ($images) {
                foreach ($images as $image) {
                    echo '<a href="', $image['full_url'], '"><img src="', $image['url'], '"></a>';
                }
            }
            ?>
        </div>
    </div>
</div>
