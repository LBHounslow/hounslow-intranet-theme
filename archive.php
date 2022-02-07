<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LBH_Intranet_v1
 */

get_header();
get_sidebar();

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'corporate-policies') !== false) {?>


    	     <!-- Page Content  -->
        <div id="content">

        <div class="bubble-outer">
<div class="bubble">
  <h3 class="page-title">
  <?php
    printf( __( '%s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' );
        ?>
        </h3>
</div>
</div>
<div style="padding:20px;background:#83d6c9;margin-bottom:20px;">
<div class="row align-items-center justify-content-around">
<div class="col-lg-6">

       <?php echo term_description() ?>
</div>

<div class="col-lg-3">

     <?php // TAXONOMY IMAGE GOES HERE ?>
</div>
</div>
</div>
<div class="bubble-outer">
        <?php get_template_part('templates/topics-tabs', 'topics-dropdown'); ?>
</div>


            <main id="primary" class="site-main">
<div class="row">
  <div class="col-lg-6">
    <div class="row">
        <?php
        while ( have_posts() ) :
          the_post();

          get_template_part( 'template-parts/content-post-policy', get_post_type() );



          // If comments are open or we have at least one comment, load up the comment template.


        endwhile; // End of the loop.
        ?>
    </div>
  </div>
</div>


	</main><!-- #main -->


        </div>


<?php } else {?>

	     <!-- Page Content  -->
        <div id="content">
        <?php get_template_part('templates/topics-tabs', 'topics-dropdown'); ?>

        <h3 class="page-title"><?php
    printf( __( '%s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' );
        ?></h3>

            <main id="primary" class="site-main">
<div class="row">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-topics', get_post_type() );



			// If comments are open or we have at least one comment, load up the comment template.


		endwhile; // End of the loop.
		?>
</div>


	</main><!-- #main -->


        </div>
<?php }

?>




    </div>
</body>




<?php
get_footer();
