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
            <a class="btn btn-dark" href="<?php echo get_permalink(); ?>">Read More</a>
          </div>
          <div class="col-lg-3">
          
      <?php if ( rwmb_meta( 'lbh_draft_sharepoint' ) ): ?>
        <a class="btn btn-dark" href="<?php echo rwmb_meta( 'lbh_draft_sharepoint' ); ?>" target="_blank">Download File</a>
  </div>
  <?php else: // field_name returned false ?>
  <?php endif; // end of if field_name logic ?>

      </div>
        </div>
		</div>
    













	

</article><!-- #post-<?php the_ID(); ?> -->



