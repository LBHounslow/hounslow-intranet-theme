<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row" >
		<div id="entry-container" class="col-lg-7" style="background:white;">
			<div id="entry-featured-video" >
				<?php hounslow_intranet_entry_featured_video(); ?>
			</div>
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
							 __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lbh-intranet' ),
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
							 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lbh-intranet' ),
							 'after'  => '</div>',
						 )
					 );

					 hounslow_intranet_entry_related_links();

					 // If comments are open or we have at least one comment, load up the comment template.
					 if ( comments_open() || get_comments_number() ) :
						 comments_template();
					 endif;
					 ?>
				 </div><!-- .entry-content -->
				 <footer class="entry-footer">

					 <?php

					 $posttags = get_the_tags();

					 if ($posttags) {

					   foreach($posttags as $tag) {

					     echo '<button class="btn btn-dark tag"> <a style="color:white;" href="/tags/'.$tag->slug.'">'.$tag->name . '</a></button> ';

					   }

					 }

					 ?>

			 		<?php Hounslow_Intranet_entry_footer(); ?>

			 	 </footer><!-- .entry-footer -->
			 </div>
			 <div class="col-lg-5">
				 <div class="sticky-top">
					 <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;"></div>
				 </div>
			 </div>
		 </div>
	 </article><!-- #post-<?php the_ID(); ?> -->