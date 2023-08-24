<!-- Featured News -->
<div class="row">

    <div class="col-md-4">
        <div class="row">
            <?php
            $the_query = new WP_Query(array(
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_type' => 'post',
                'posts_per_page' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'featured'
                    )
                ),

            ));
            while ($the_query->have_posts()) :

                $the_query->the_post(); ?>

                <div class="col-md-12 outer">

                    <div class="">

                        <?php if (rwmb_get_value('lbh_featured_video')) : ?>

                            <div class="lbh-featured-video">

                                <?php echo rwmb_meta('lbh_featured_video'); ?>

                            </div>

                        <?php elseif (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="tall-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
                                </div>
                                <div class="featured-tab">
                                    <h5><?php the_title(); ?></h5>
                                </div>
                            </a>


                        <?php endif; ?>






                    </div>


                </div>



            <?php endwhile;

            ?>

        </div>
    </div>

    <div class="col-md-4">
        <div class="row">
            <?php
            $the_query = new WP_Query(array(
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_type' => 'post',
                'offset' => 1,
                'posts_per_page' => 2,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'featured'
                    )
                ),

            ));
            while ($the_query->have_posts()) :

                $the_query->the_post(); ?>

                <div class="col-lg-12 outer">

                    <div class="">

                        <?php if (rwmb_get_value('lbh_featured_video')) : ?>

                            <div class="lbh-featured-video">

                                <?php echo rwmb_meta('lbh_featured_video'); ?>

                            </div>

                        <?php elseif (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');background-size:cover;background-position:center;">
                                </div>
                                <div class="featured-tab">
                                    <h5><?php the_title(); ?></h5>
                                </div>
                            </a>



                        <?php endif; ?>






                    </div>


                </div>



            <?php endwhile;

            ?>

        </div>
    </div>

    <div class="col-md-4">
        <div class="row">
            <?php
            $the_query = new WP_Query(array(
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_type' => 'post',
                'offset' => 3,
                'posts_per_page' => 2,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'featured'
                    )
                ),

            ));
            while ($the_query->have_posts()) :

                $the_query->the_post(); ?>

                <div class="col-lg-12 outer">

                    <div class="">

                        <?php if (rwmb_get_value('lbh_featured_video')) : ?>

                            <div class="lbh-featured-video">

                                <?php echo rwmb_meta('lbh_featured_video'); ?>

                            </div>

                        <?php elseif (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');background-size:cover;background-position:center;">
                                </div>
                                <div class="featured-tab">
                                    <h5><?php the_title(); ?></h5>
                                </div>
                            </a>



                        <?php endif; ?>






                    </div>


                </div>



            <?php endwhile;

            ?>

        </div>
    </div>
</div>

<!-- End of Featured News -->