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

<div class="col-lg-12" style="background:white;">

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




<p><i class="fas fa-calendar-day"></i> <span class="posted-on">Posted on <?php the_time(get_option('date_format')); ?></p>
<p><i class="fas fa-user"></i> <span class="byline"> By  <?php the_author_link(); ?></p>
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


<?php

$posttags = get_the_tags();

if ($posttags) {

  foreach($posttags as $tag) {

    echo '<button class="btn btn-dark tag"> <a style="color:white;" href="/tags/'.$tag->slug.'">'.$tag->name . '</a></button> ';

  }

}

?>

</div>





</div>













	<footer class="entry-footer">

		<?php Hounslow_Intranet_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
