<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package Hounslow_Intranet

 */



?>

<div class="row" >

<div class="col-lg-7" style="background:white;">

<?php if ( rwmb_meta( 'lbh_draft_video' ) ): ?>

<iframe width="100%" height="500px" src="https://www.youtube.com/embed/<?php echo rwmb_meta( 'lbh_draft_video' ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

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



		if ( 'post' === get_post_type() ) :

			?>

			<div class="entry-meta">

				<?php

				//lbh_intranet_v1_posted_on();

				hounslow_intranet_posted_on();
				//lbh_intranet_v1_posted_by();

				hounslow_intranet_posted_by();
				?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

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

		<?php if ( rwmb_meta( 'lbh_draft_sharepoint' ) ): ?>
<div class="row" style="background:#fafafa;padding:20px;">
<div class="col-lg-12">
<h5>Sharepoint download</h5>
<button class="btn btn-dark"><a style="color:white;" href="<?php echo rwmb_meta( 'lbh_draft_sharepoint' ); ?>">Download File</a></button>
</div>

</div>
<?php else: // field_name returned false ?>
<?php endif; // end of if field_name logic ?>
	</div><!-- .entry-content -->


    </div><!-- .entry-content -->


<?php

$posttags = get_the_tags();

if ($posttags) {

  foreach($posttags as $tag) {

    echo '<button class="btn btn-dark tag"> <a style="color:white;" href="/tags/'.$tag->slug.'">'.$tag->name . '</a></button> ';

  }

}

?>

</div>

<div class="col-lg-5">

<div class="sticky-top">



  <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;">

                </div>



</div>





</div>



</div>













	<footer class="entry-footer">

		<?php Hounslow_Intranet_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

