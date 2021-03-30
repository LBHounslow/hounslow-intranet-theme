<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet_v1
 */

?>

<div class="col-lg-3 outer">
<div class="blog-img" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;">
</div>
<div class="inner">




<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
	<header class="entry-header">
		<?php


		
		if ( is_singular() ) :
			the_title( '<h5 class="entry-title">', '</h5>' );
		else :
			the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			
		<?php endif; ?>
	</header><!-- .entry-header -->

	<button class="btn btn-dark"><a style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a></button>


</div>

</div>







	
</article><!-- #post-<?php the_ID(); ?> -->

