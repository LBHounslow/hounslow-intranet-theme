<?php
/*
 * Template Name: Youzify Template
 * Description: Youzify Plugin Pages Template.
 */

get_header();
?>



<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" data-swiftype-index="false">

<?php get_template_part('templates/navigation-forum', 'menu'); ?>

        </nav>

        <!-- Page Content  -->
        <div id="content">


            <main id="primary" class="site-main">

<?php
do_action( 'youzify_before_youzify_template_content' );
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
    the_content();
	endwhile;
endif;

do_action( 'youzify_after_youzify_template_content' );

?>

	</main><!-- #main -->


        </div>


    </div>
</body>

<script>

 </script>
<?php get_footer(); ?>