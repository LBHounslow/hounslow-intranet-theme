
<div class="row outer justify-content-end align-items-center">
<?php $value = rwmb_meta( 'lbh_status_radio');
if ( 'working' == $value ) { ?>


<div class="col-lg-2 text-right ">
    <p class="status">Everything is working!</p>
 </div>
 <div class="col-lg-1">
 <a style="color:white" href="/system-status"><button class="btn btn-success"><strong>See Status</strong></button></a>
</div>


<?php } elseif ( 'issues' == $value ) { ?>
<div class="col-lg-2 text-right ">
    <p class="status">There are some issues on the Network!</p>
 </div>
 <div class="col-lg-1">
 <a style="color:white" href="/system-status"><button class="btn btn-warning"><strong>See Status</strong></button></a>
</div>
<?php } elseif ( 'down' == $value ) { ?>
<div class="col-lg-2 text-right ">
    <p class="status">Some Services are down</p>
 </div>
 <div class="col-lg-1">
 <a style="color:white" href="/system-status"><button class="btn btn-danger"><strong>See Status</strong></button></a>
</div>
<?php } ?>

</div>

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
      restore_current_blog();
      ?>


  			<div class="col-lg-6" style="padding:0px;">
                  <div class="inner">

<?php if ( $news_post_video_value ): ?>

  <?php echo $news_post_video; ?>

<?php else: ?>

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

              <?php



      endwhile;
  endif;
  wp_reset_postdata();
}

?>
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

<div class="row">
<div class="col-lg-9">


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
<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <?php wp_dropdown_categories( 'show_count=1&hierarchical=1' ); ?>
    <input type="submit" name="submit" value="view" /> 
<a class="btn btn-dark" style="color:white;" href="/news">View all news</a>
</form>
</div>

<div class="col-lg-3">
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
</div>
</div>

</div>


<div class="row">

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'dal_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'dal_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="inner">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'gi_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'gi_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="inner">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'haw_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'haw_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="inner">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->


<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'hdi_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'hdi_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'nth_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'nth_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="inner">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'oh_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'oh_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="inner">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'wow_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'wow_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="inner">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'wt_cpt',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'wt_category',
        'field' => 'slug',
        'terms' => 'featured-content'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-md-12 outer">

			<div class="inner">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
<div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
</a>
<div class="post-title"><h6><?php the_title(); ?></h6></div>
<a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Read More</a>


<?php endif; ?>






			</div>

         
</div>



<?php endwhile;

?>
     
    </div>
</div><!-- end -->



</div> <!-- row -->