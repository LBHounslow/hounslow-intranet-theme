<?php
/**
 * TEMPLATE NAME: Events
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
        <div id="content">

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
<?php the_content(); ?>
</div>
<div class="col-lg-3">
<?php $images = rwmb_meta( 'second_image', array( 'size' => 'full' ) );
foreach ( $images as $image ) {
    echo '<a href="', $image['full_url'], '"><img src="', $image['url'], '"></a>';
}

?>
</div>
</div>
</div>

<div class="row justify-content-center text-center">
    <div class="col-lg-2">
      <button class="btn btn-dark"><a style="color:white;" href="/event-submission-form">Manage Your Events</a></button>
    </div>
    <div class="col-lg-2">
           <button class="btn btn-dark"><a style="color:white;" href="/event-submission-form/?action=edit">Submit An Event</a></button>
    </div>
	<div class="col-lg-2">
    <button class="btn btn-dark"><a style="color:white;" href="/manage-bookings">Manage Attendees</a></button>
    </div>
  </div>

            <main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-event', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->


        </div>


    </div>
</body>



<?php
get_sidebar();
get_footer();
