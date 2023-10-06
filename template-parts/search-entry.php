<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container px-0">
        <div class="row">
            <div class="col-10">
                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
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