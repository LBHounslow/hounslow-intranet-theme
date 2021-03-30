
<?php

$args = array(
    'posts_per_page' => 1,
    'post_type' => 'news_cpt',
    'orderby' => 'date',
    'order' => 'DESC',
'tax_query' => array(
        array(
            'taxonomy' => 'news_category',
            'field'    => 'slug',
            'terms'    => 'banner',
        ),
    ),
    'paged' => $paged);
$loop = new WP_Query($args);
if ($loop->have_posts()) :
    while ($loop->have_posts()) : $loop->the_post(); ?>
    
 
			
<div class="col-lg-12 bg-banner" style="margin-bottom:10px;background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:100px;background-size:cover;background-position:center;">
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
                            <div id="button" class="btn btn-dark"><a style="color:white;" href="<?php echo the_permalink(); ?>">Read More <i class="fas fa-arrow-right"></i></a></div>

</a></button>
                        </div>
                        
                     </div>
                
                </div>   

            <div class="col-lg-3 banner-sm">
                <?php echo get_the_post_thumbnail(); ?>
            </div>

        </div>
    </div>
</div>
		
            <?php
        

        
    endwhile;
endif;
wp_reset_postdata();

?>

       
           <div class="row">
		
                <div class="col-lg-9">
      
              
             
              <div class="row outer">  

              
<?php

$args = array(
    'posts_per_page' => 1,
    'post_type' => 'news_cpt',
    'orderby' => 'date',
    'order' => 'DESC',
'tax_query' => array(
        array(
            'taxonomy' => 'news_category',
            'field'    => 'slug',
            'terms'    => 'featured',
        ),
    ),
    'paged' => $paged);
$loop = new WP_Query($args);
if ($loop->have_posts()) :
    while ($loop->have_posts()) : $loop->the_post(); ?>
    

			<div class="col-lg-6" style="padding:0px;"> 
                <div class="inner">


  <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:298px;background-size:cover;background-position:center;">
                </div>



          
            </div>
            </div>
                    <div class="col-lg-6 inner">
					 <h5><?php the_title(); ?></h5>
                     <p><?php the_date(); ?></p>
                     <?php the_excerpt(); ?>
                     <button class="btn btn-dark"><a style="color:white;"href="<?php echo the_permalink(); ?>">Read More<i class="fas fa-arrow-right"></i></a></button>
					</div>

            <?php
        

        
    endwhile;
endif;
wp_reset_postdata();

?>
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
                    <button class="btn btn-light"><a style="color:hotpink" href="/events"><strong>See All Events</strong></a></button>

                    </div>
                    </div>
				</div>
			
			</div>
		

<div class="row">
<div class="col-lg-9">

				
                    <div class="row">
<?php

$args = array(
    'posts_per_page' => 9,
    'post_type' => 'news_cpt',
    'orderby' => 'date',
    'order' => 'DESC',
'tax_query' => array(
        array(
            'taxonomy' => 'news_category',
            'field'    => 'slug',
            'terms'    => 'general',
        ),
    ),
    'paged' => $paged);
$loop = new WP_Query($args);
if ($loop->have_posts()) :
    while ($loop->have_posts()) : $loop->the_post(); ?>
    
   <div class="col-lg-4 outer "> 
			<div class="inner blog">
                
  <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;background-position:center;">
                </div>



					 <h5><?php the_title(); ?></h5>
                     <p><?php the_date(); ?></p>
                     <?php the_excerpt(); ?>
                     <button class="btn btn-dark"><a style="color:white;"href="<?php echo the_permalink(); ?>">Read More<i class="fas fa-arrow-right"></i></a></button>
					</div>

			</div>
            <?php
        

        
    endwhile;
endif;
wp_reset_postdata();

?>

</div>
<button class="btn btn-dark"> 
<a style=" color:white;" href="/news">View all news</a>
</button>
</div>

<div class="col-lg-3">			
<div class="row">
 					<?php $EM_Events = EM_Events::get( array('limit'=>3, 'scope' => 'future' ) );

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
				<button class="btn btn-dark"><a style="color:white;"href="#_EVENTURL">Read More</a></button>
	</div>		
			</div>
            </div>
			</div>
	  
	  ');
}?>
</div>
</div>

</div>
