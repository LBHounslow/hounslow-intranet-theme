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
				<div class="entry-lead">
					<p><?php rwmb_the_value( 'lbh_entry_summary' ) ?></p>
				</div>
    		<div >
    			<hr />
    			<p><?php hounslow_intranet_post_type_identifier(); ?>&nbsp;<?php hounslow_intranet_topic_link(); ?></p>
    			<hr />
    		</div>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
				if ( rwmb_meta( 'lbh_description' )) {
					$value_description = rwmb_meta( 'lbh_description' );
					echo '<h3>Description</h3>';
					echo do_shortcode( wpautop( $value_description ) );
				}
				if ( rwmb_meta( 'lbh_learning_outcomes' )) {
					$value_learning_outcomes = rwmb_meta( 'lbh_learning_outcomes' );
					echo '<h3>Learning Outcomes</h3>';
					echo do_shortcode( wpautop( $value_learning_outcomes ) );
				}
				if ( rwmb_meta( 'lbh_provider' )) {
					$value_provider = rwmb_meta( 'lbh_provider' );
					echo '<p>Provided by ';
					echo $value_provider ;
					echo '</p>';
				}
				if ( rwmb_meta( 'lbh_level' )) {
					$value_level = rwmb_meta( 'lbh_level' );
					echo '<p>Level: ';
					echo $value_level ;
					echo '</p>';
				}
				if ( rwmb_meta( 'lbh_study_time' )) {
					$value_study_time = rwmb_meta( 'lbh_study_time' );
					echo '<p>Study time: ';
					echo $value_study_time ;
					echo ' (hrs:mins)</p>';
				}
				if ( rwmb_meta( 'lbh_platform' )) {
					$value_platform = rwmb_meta( 'lbh_platform' );
					echo '<p>Platform: ';
					echo $value_platform ;
					echo '</p>';
				}
				if ( rwmb_meta( 'lbh_url' )) {
					$value_url = rwmb_meta( 'lbh_url' );
					echo '<p><a href="' . $value_url . '" target="_blank">Link to Course</a></p>';
				}
				if ( rwmb_meta( 'lbh_audience' )) {
					$term_audience = rwmb_meta( 'lbh_audience' );
					echo '<p>Audience: ';
					echo $term_audience->name;
					echo '</p>';
				}

				$value_mandatory_for_audience = rwmb_meta( 'lbh_mandatory_for_audience' );
				// If field is checked.
				if ($value_mandatory_for_audience ) {
				    echo '<p>Required</p>';
				}
				// If field is unchecked.
				else {
				    echo '';
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
