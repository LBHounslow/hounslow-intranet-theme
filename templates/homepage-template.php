



<?php
$news_site_id = 2;

$loop = false;
if ( function_exists('hounslow_intranet_network_news_query_banner')  ) {
  $loop = hounslow_intranet_network_news_query_banner($news_site_id);
  if ($loop->have_posts()) :
      while ($loop->have_posts()) : $loop->the_post();
      $news_post = get_post();
      switch_to_blog( $news_site_id );
      $news_post_thumbnail = get_the_post_thumbnail( $news_post->ID );
      $news_post_thumbnail_url = get_the_post_thumbnail_url( $news_post->ID );
      $news_post_permalink = get_the_permalink( $news_post->ID );
      restore_current_blog();
      ?>


  <div class="col-lg-12 bg-banner" style="margin-bottom:10px;background:url('<?php echo $news_post_thumbnail_url; ?>');min-height:100px;background-size:cover;background-position:center;">
      <div class="overlay" style="background:rgba(131,214,201,0.8); min-height:100px;">
          <div class="row justify-content-between">

                  <div class="col-lg-8">
                      <div class="row banner-pad">
                          <div class="col-lg-12">
                                  <div class="">
                                      <h1 style="color:white;"><?php the_title(); ?></h1>
                                  </div>
                          </div>
                          <div class="col-lg-6">
                              <h5 style="color:white;"><?php the_excerpt(); ?></h5>

                              <a style="color:white;" href="<?php echo $news_post_permalink; ?>"><button id="button" class="btn btn-dark">Read More</button></a>

                          </div>

                       </div>

                  </div>

              <div class="col-lg-3 banner-sm">
                  <?php echo $news_post_thumbnail; ?>
              </div>

          </div>
      </div>
  </div>

              <?php



      endwhile;
  endif;
  wp_reset_postdata();

}
?>


<div class="row">
  <div class="col-lg-9">
    <div class="row outer">
      <?php
      $loop = false;
      if ( function_exists('hounslow_intranet_network_news_query_featured')  ) {
        $loop = hounslow_intranet_network_news_query_featured($news_site_id);
        if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
            $news_post = get_post();
            switch_to_blog( $news_site_id );
            $news_post_thumbnail_url = get_the_post_thumbnail_url( $news_post->ID );
            $news_post_permalink = get_the_permalink( $news_post->ID );
            $news_post_video = rwmb_meta( 'lbh_featured_video' );
            $news_post_video_value = rwmb_get_value( 'lbh_featured_video' );
            restore_current_blog(); ?>

            <div class="col-lg-6" style="padding:0px;">
              <div class="inner">
                <?php if ( $news_post_video_value ):
                  echo $news_post_video;
                else: ?>
                <div style="background:url('<?php echo $news_post_thumbnail_url; ?>');height:300px;background-size:cover;background-position:center;">
                </div>
               <?php endif; ?>
             </div>
           </div>
           <div class="col-lg-6 inner">
             <h5><?php the_title(); ?></h5>
             <p><?php the_time(get_option('date_format')); ?></p>
             <?php the_excerpt(); ?>
             <a style="color:white;"href="<?php echo $news_post_permalink; ?>"><button class="btn btn-dark">Read More</button></a>
           </div>
         <?php endwhile;
       endif;
       wp_reset_postdata();
     } ?>
       <div class="featured-border">
       </div>
     </div>
   </div>

  <div class="col-lg-3 outer">
    <div class="title" style="margin-left:8px;">
    </div>
    <div class="">
      <div class="inner">
  				<?php echo EM_Calendar::output(array('full'=>0, 'long_events'=>1)); ?>
      </div>
      <div class="inner-feature shadow">
        <a style="color:white" href="/events"><button class="btn btn-dark">See All Events</button></a>
      </div>
    </div>
  </div>
</div>

<?php //get_template_part('templates/topics-carousel'); ?>

<div class="row">
<div class="col-lg-9">
  <div class="row">
    <div class="col">
      <h4 class="mt-2">News</h4>
    </div>
    <div class="col">
      <a class="btn btn-dark float-right" style="color:white;" href="/news">View all News</a>
    </div>
  </div>
  <div class="row">
<?php

$loop = false;
if ( function_exists('hounslow_intranet_network_news_query_all')  ) {
  $loop = hounslow_intranet_network_news_query_all( $news_site_id );
  if ($loop->have_posts()) :
      while ($loop->have_posts()) : $loop->the_post();
      $news_post = get_post();
      switch_to_blog( $news_site_id );
      $news_post_thumbnail_url = get_the_post_thumbnail_url( $news_post->ID );
      $news_post_permalink = get_the_permalink( $news_post->ID );
      $news_post_video = rwmb_meta( 'lbh_featured_video' );
      $news_post_video_value = rwmb_get_value( 'lbh_featured_video' );
      restore_current_blog();
      ?>

     <div class="col-lg-4 outer">
  			<div class="inner-post blog">

<?php if ( $news_post_video_value ): ?>

  <div class="lbh-featured-video">

  <?php echo $news_post_video; ?>

  </div>

<?php else: ?>

 <div style="background:url('<?php echo $news_post_thumbnail_url; ?>');height:200px;background-size:cover;background-position:center;">
                </div>

<?php endif; ?>


                    <div class="inner-body">
					 <h5><?php the_title(); ?></h5>
           		</div>
                       <p><?php the_time(get_option('date_format')); ?></p>
                       <?php the_excerpt(); ?>
                       <a style="color:white;"href="<?php echo $news_post_permalink; ?>"><button class="btn btn-dark">Read More</button></a>
  					</div>

  			</div>
              <?php



      endwhile;
  endif;
  wp_reset_postdata();
}

?>

</div>


</div>

<div class="col-lg-3">
  <div class="row">
    <div class="col">
      <h4 class="mt-2">Events</h4>
    </div>
    <div class="col">
      <a class="btn btn-dark float-right" style="color:white;" href="/events">View all Events</a>
    </div>
  </div>
<div class="row">
 					<?php $EM_Events = EM_Events::get( array('limit'=>4, 'scope' => 'future' ) );

foreach ( $EM_Events as $EM_Event ){
  echo $EM_Event->output(
	  '    <div class="col-lg-12 outer">

	  <div class="inner event ">
			<div class="blog-img" style="background:url(#_EVENTIMAGEURL);height:200px;background-size:cover;">
					</div>
			<div class="">

                <h5>#_EVENTNAME</h5>
<h6>#_EVENTDATES|#_12HSTARTTIME</h6>
<div>
<a style="color:white;"href="#_EVENTURL"><button class="btn btn-dark">Read More</button></a>
	</div>
			</div>
            </div>
			</div>

	  ');
}?>
<div class="dropdown">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    Event Categories
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" ;>
 <?php echo do_shortcode('[categories_list]'); ?>
  </div>
</div>
</div>
</div>

</div>
