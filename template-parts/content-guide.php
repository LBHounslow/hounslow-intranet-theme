<?php
/**
 * Template part for displaying page content in page.php
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
    			the_title( '<h1 class="entry-title">', '</h1>' );
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

        <?php //hounslow_intranet_post_thumbnail(); ?>


        <?php
        if ( rwmb_get_value( 'lbh_guide_oembed_url' ) ):
          echo '<div class="kb-oembed">';
          if ( rwmb_get_value( 'lbh_guide_oembed_heading' ) ):
            echo '<h2>' . rwmb_meta( 'lbh_guide_oembed_heading' ) . '</h2>';
          else:
          endif;
          ?>

          <?php rwmb_the_value( 'lbh_guide_oembed_url' ) ?>
          <p class="kb-caption"><?php rwmb_the_value( 'lbh_guide_oembed_caption' ) ?></p>
        <?php
        echo '</div>';
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_content_heading' ) ):
          echo '<h2>' . rwmb_meta( 'lbh_guide_content_heading' ) . '</h2>';
        else:
          echo '<h2>' . get_the_title() . '</h2>';
        endif;

        if ( rwmb_get_value( 'lbh_guide_content' ) ):
          $value = rwmb_meta( 'lbh_guide_content' );
          echo do_shortcode( wpautop( $value ) );
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_one_heading' ) ):
          echo '<h3>' . rwmb_meta( 'lbh_guide_section_one_heading' ) . '</h3>';
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_one_content' ) ):
          $value = rwmb_meta( 'lbh_guide_section_one_content' );
          echo do_shortcode( wpautop( $value ) );
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_two_heading' ) ):
          echo '<h3>' . rwmb_meta( 'lbh_guide_section_two_heading' ) . '</h3>';
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_two_content' ) ):
          $value = rwmb_meta( 'lbh_guide_section_two_content' );
          echo do_shortcode( wpautop( $value ) );
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_three_heading' ) ):
          echo '<h3>' . rwmb_meta( 'lbh_guide_section_three_heading' ) . '</h3>';
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_three_content' ) ):
          $value = rwmb_meta( 'lbh_guide_section_three_content' );
          echo do_shortcode( wpautop( $value ) );
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_four_heading' ) ):
          echo '<h3>' . rwmb_meta( 'lbh_guide_section_four_heading' ) . '</h3>';
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_four_content' ) ):
          $value = rwmb_meta( 'lbh_guide_section_four_content' );
          echo do_shortcode( wpautop( $value ) );
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_five_heading' ) ):
          echo '<h3>' . rwmb_meta( 'lbh_guide_section_five_heading' ) . '</h3>';
        else:
        endif;

        if ( rwmb_get_value( 'lbh_guide_section_five_content' ) ):
          $value = rwmb_meta( 'lbh_guide_section_five_content' );
          echo do_shortcode( wpautop( $value ) );
        else:
        endif;

				$connected = new WP_Query( [
				    'relationship' => [
				        'id'   => 'guides_to_guides',
				        'from' => get_the_ID(), // You can pass object ID or full object
				    ],
				    'nopaging'     => true,
				] );

				if ( $connected->have_posts() ) {

					echo '<div class="related-guides"><hr />';
					echo '<h2>Related Guides</h2>';
					while ( $connected->have_posts() ) : $connected->the_post();
							?>
							<p><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></p>
							<?php the_excerpt();
					endwhile;
					wp_reset_postdata();
					echo '</div>';
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
	</div><!-- row -->
</article><!-- #post-<?php the_ID(); ?> -->
