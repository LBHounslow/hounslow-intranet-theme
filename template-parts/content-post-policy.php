<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package Hounslow_Intranet

 */



?>

        <div class="col-lg-12 outer-top">
      <div class="inner">
      <h5><?php the_title(); ?></h5>

      
      <?php the_excerpt(); ?>

          <div class="row justify-content-between">
          <div class="col-lg-3">
  <button class="btn btn-dark"><a style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a></button>
          </div>
          <div class="col-lg-3">
          
      <?php if ( rwmb_meta( 'lbh_draft_sharepoint' ) ): ?>

  <button class="btn btn-dark"><a style="color:white;" href="<?php echo rwmb_meta( 'lbh_draft_sharepoint' ); ?>">Download File</a></button>
  </div>
  <?php else: // field_name returned false ?>
  <?php endif; // end of if field_name logic ?>

      </div>
        </div>
		</div>
    













	

</article><!-- #post-<?php the_ID(); ?> -->



