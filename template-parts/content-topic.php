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
				<div class="entry-lead">
					<p><?php echo rwmb_get_value( 'lbh_entry_summary' ) ?></p>
				</div>
				<div>
					<hr />
					<p><?php hounslow_intranet_section_link(); ?></p>
					<hr />
				</div>
					<?php if ( rwmb_get_value( 'lbh_item_oembed_url' ) ):
						echo '<div class="kb-oembed">';
						if ( rwmb_get_value( 'lbh_item_oembed_heading' ) ):
            	echo '<h2>' . rwmb_meta( 'lbh_item_oembed_heading' ) . '</h2>';
          	endif;
						rwmb_the_value( 'lbh_item_oembed_url' ) ?>
						<p class="kb-caption"><?php rwmb_the_value( 'lbh_item_oembed_caption' ) ?></p>
        <?php
        echo '</div>';
			endif; ?>
				<div class="entry-body">
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
				 </div>
<?php

$args = array(
	'post_type' => array('item', 'guide', 'training_course' ),
	'orderby' => 'menu_order post_title',
	'order'   => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'item-topic',
			'field'    => 'slug',
			'terms'    => $post_slug = $post->post_name,
		),
	),
);
$connected = new WP_Query( $args );

				if ( $connected->have_posts() ) {

						echo '<div class="entry-related-items"><hr />';
						echo '<h2>Related Items</h2>';
						echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';

						while ( $connected->have_posts() ) : $connected->the_post();
								?>
								<div class="col">
							    <div class="card h-100">
							      <div class="card-body">
							        <h5 class="card-title"><?php the_title(); ?></h5>
							        <p class="card-text"><?php hounslow_intranet_excerpt(); ?></p>
											<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more&hellip;</a>
							      </div>
										<div class="card-footer">
								       <small class="text-muted"><?php hounslow_intranet_post_type_identifier(); ?></small>
								    </div>
							    </div>
							  </div>
								<?php
						endwhile;
						wp_reset_postdata();
						echo '</div></div>';
					}


					$connected2 = new WP_Query( [
					    'relationship' => [
					        'id'   => 'topics_to_resources',
					        'from' => get_the_ID(), // You can pass object ID or full object
					    ],
					    'nopaging'     => true,
					] );

				if ( $connected2->have_posts() ) {

						echo '<div class="entry-related-items"><hr />';
						echo '<h2>Related Resources</h2>';
						echo '<div class="row"><div class="col"><ol class="list-group list-group-numbered">';

						while ( $connected2->have_posts() ) : $connected2->the_post();
								?>
								<li class="list-group-item d-flex justify-content-between align-items-start">
							    <div class="ms-2 me-auto">
							      <div class="fw-bold"><a href="<?php rwmb_the_value( 'lbh_resource_url' ) ?>"><?php the_title(); ?></a></div>
							      <?php hounslow_intranet_excerpt(); ?>
							    </div>
							    <span class="badge bg-primary rounded-pill"><?php hounslow_intranet_post_type_identifier(); ?></span>
							  </li>
								<?php
						endwhile;
						wp_reset_postdata();
						echo '</ol></div></div></div>';
					}

					$connected3 = new WP_Query( [
					    'relationship' => [
					        'id'   => 'topics_to_contacts',
					        'from' => get_the_ID(), // You can pass object ID or full object
					    ],
					    'nopaging'     => true,
					] );

				if ( $connected3->have_posts() ) {

						echo '<div class="entry-related-items"><hr />';
						echo '<h2>Contact</h2>';
						echo '<div class="row"><div class="col">';

						while ( $connected3->have_posts() ) : $connected3->the_post();
								?>
								<div class="card">
								  <div class="card-body">
								    <h5 class="card-title"><?php the_title(); ?></h5>
								    <?php rwmb_the_value( 'lbh_contact_info' ) ?>
								  </div>
								</div>
								<?php
						endwhile;
						wp_reset_postdata();
						echo '</div></div></div>';
					}
					?>
			 </div><!-- .entry-content -->
				 <footer class="entry-footer">
					 <p><?php hounslow_intranet_entry_footer(); ?></p>
					 <?php hounslow_intranet_entry_meta(); ?>
			 	 </footer><!-- .entry-footer -->
			 </div>
			 <div class="col-lg-5">
				 <div class="sticky-top">
					 <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100vh;background-size:cover;background-position:center;"></div>
				 </div>
			 </div>
		 </div>
	 </article><!-- #post-<?php the_ID(); ?> -->
