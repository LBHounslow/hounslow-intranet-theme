<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet_v1
 */

get_header();
?>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" data-swiftype-index="false">

<?php get_template_part('templates/navigation', 'menu'); ?>

        </nav>

        <!-- Page Content  -->
        <div id="content-page">

    <div class="row" >

    <div class="col-lg-7" style="background:white;">

    <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

        <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

    <?php else: ?>

    <?php endif; ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">

            <?php

            if ( is_singular() ) :

                the_title( '<h1 class="entry-title">', '</h1>' );

            else :

                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

            endif;





                ?>

        </header><!-- .entry-header -->







        <div class="entry-content">

            <?php

            the_content(

                sprintf(

                    wp_kses(

                        /* translators: %s: Name of current post. Only visible to screen readers */

                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lbh-intranet-v1' ),

                        array(

                            'span' => array(

                                'class' => array(),

                            ),

                        )

                    ),

                    wp_kses_post( get_the_title() )

                )

            );



            wp_link_pages(

                array(

                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lbh-intranet-v1' ),

                    'after'  => '</div>',

                )

            );

            ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
     if ( comments_open() || get_comments_number() ) :
         comments_template();
     endif;

    ?>


        </div><!-- .entry-content -->





    </div>

        <div class="col-lg-5">

            <div class="sticky-top">



              <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;">
              </div>

            </div>

        </div>

    </div><!--- row --->

</div><!--- content page --->

</div>

</body>



<?php
get_sidebar();
get_footer();
