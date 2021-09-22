<?php
   /**
    * Template Name:News
    *
    * @package Hounslow_Intranet
    */
   
   get_header();
   ?>
<body>
   <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar" data-swiftype-index="false">
         <?php get_template_part('templates/navigation', 'menu'); ?>
      </nav>
      <!-- Page Content  -->
      <div id="content">
         <main id="primary" class="site-main">
            <div class="col-lg-12" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');min-height:200px;background-size:cover;background-position:center;">
               <div class="bubble-outer">
                  <div class="bubble">
                     <h3><?php the_title(); ?></h3>
                  </div>
               </div>
            </div>
 <div style="padding:20px;background:#83d6c9;margin-bottom:20px;">
<div class="row align-items-center justify-content-around">
<div class="col-lg-6">
<?php the_content(); ?>
</div>
<div class="col-lg-3">
<?php $images = rwmb_meta( 'second_image', array( 'size' => 'full' ) );
foreach ( $images as $image ) {
    echo '<a href="', $image['full_url'], '"><img src="', $image['url'], '"></a>';
}

?>
</div>
</div>
</div>
            <div class="row text-center">

<div class="col-lg-12 news-categories">    
 <?php


$terms = get_terms( 'category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array();
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/news/category/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);
      /* Restore original Post Data */
              

?>
</div>
</div>
            <div class="row">
               <div class="bubbleb-outer">
                  <div class="bubbleb">
            <h5>Featured</h5>
            </div>
            </div>
               <?php
                  //New WP Query to get news
                  $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                  $news_query_args = array(
                  	'post_type' => 'post',
                  	'paged' => $paged,
                                  'posts_per_page' => 1,
                  	'tax_query' => array(
                      array(
                          'taxonomy' => 'category',
                          'field'    => 'slug',
                          'terms'    => 'featured',
                      ),
                  ),
                  );
                  $news = new WP_Query( $news_query_args );
                  
                  // The Loop
                  if ( $news->have_posts() ) {
                  
                  	while ( $news->have_posts() ) {
                  		$news->the_post();
                  
                  			?>
               <div class="col-md-6 outer">
                  <div class="inner">
                     <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>
                        <?php echo rwmb_meta( 'lbh_featured_video' ); ?>
                        <?php else: ?>
                        <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
                           <div class="news-featured-img" style="background:url(<?php echo get_the_post_thumbnail_url(); ?>);height:248px;background-size:cover;"></div>
                        </a>
                        <?php endif; ?>
                        <div class="post-title">
                           <?php
                              the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
                              ?>
                           <div class="entry-meta mb-1">
                              <?php
                                 hounslow_intranet_posted_on();
                                 hounslow_intranet_is_sticky();
                                 //hounslow_intranet_posted_by();
                                 ?>
                           </div>
                           <!-- .entry-meta -->
                        </div>
                        <div class="the-excerpt">
                           <?php
                              the_excerpt(
                              	sprintf(
                              		wp_kses(
                              			/* translators: %s: Name of current post. Only visible to screen readers */
                              			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hounslow-intranet' ),
                              			array(
                              				'span' => array(
                              					'class' => array(),
                              				),
                              			)
                              		),
                              		wp_kses_post( get_the_title() )
                              	)
                              );
                              
                              ?>
                        </div>
                        <a class="btn btn-dark" style="color:white;" href="<?php echo the_permalink(); ?>">Read More</a>
                     </article>
                     <!-- #post-<?php the_ID(); ?> -->
                  </div>
               </div>
               <?php	}
                  } else {
                  
                  	get_template_part( 'template-parts/content', 'none' );
                  
                  }
                  
                  /* Restore original Post Data */
                  wp_reset_postdata();
                  
                  ?>
               <div class="col-lg-6">
                  <div class="row">
                     <?php
                        //New WP Query to get news
                        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                        $news_query_args = array(
                        	'post_type' => 'post',
                        	'paged' => $paged,
                                        'posts_per_page' => 2,
                                        'offset' => 1,
                        	'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'featured',
                            ),
                        ),
                        );
                        $news = new WP_Query( $news_query_args );
                        
                        // The Loop
                        if ( $news->have_posts() ) {
                        
                        	while ( $news->have_posts() ) {
                        		$news->the_post();
                        
                        			?>
                     	<div class="col-md-6 outer">
        <div class="inner">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

				<?php echo rwmb_meta( 'lbh_featured_video' ); ?>

			<?php else: ?>

				<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><div class="news-featured-img" style="background:url(<?php echo get_the_post_thumbnail_url(); ?>);height:200px;background-size:cover;"></div></a>

			<?php endif; ?>
            <div class="post-title">
			<?php
				the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				?>
				<div class="entry-meta mb-1">
					<?php
					hounslow_intranet_posted_on();
					hounslow_intranet_is_sticky();
					//hounslow_intranet_posted_by();
					?>
				</div><!-- .entry-meta -->
                </div>
				<div class="the-excerpt">
				<?php
                
				the_excerpt(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hounslow-intranet' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				?>
				</div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo the_permalink(); ?>">Read More</a>
		</article><!-- #post-<?php the_ID(); ?> -->
        </div>
		</div>
                        
                        <?php	}
                           } else {
                           
                           	get_template_part( 'template-parts/content', 'none' );
                           
                           }
                           
                           /* Restore original Post Data */
                           wp_reset_postdata();
                           
                           ?>
                     </div>
                     
                  </div> <!--inner row -->
               </div>
            
            <div class="row">
                   <div class="bubbleb-outer">
                  <div class="bubbleb">
            <h5>Archive</h5>
            </div>
            </div>
               <?php
                  //New WP Query to get news
                  $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                  $news_query_args = array(
                  	'post_type' => 'post',
                  	'paged' => $paged,
                  );
                  $news = new WP_Query( $news_query_args );
                  
                  // The Loop
                  if ( $news->have_posts() ) {
                  
                  	while ( $news->have_posts() ) {
                  		$news->the_post();
                  
                  			get_template_part( 'template-parts/content-list', 'news' );
                  
                  		}
                  
                  		hounslow_intranet_paged_posts_navigation( $news, 'News navigation', $aria_label = 'News' );
                  
                  } else {
                  
                  	get_template_part( 'template-parts/content', 'none' );
                  
                  }
                  
                  /* Restore original Post Data */
                  wp_reset_postdata();
                  
                  ?>
            </div>
         </main>
         <!-- #main -->
      </div>
   </div>
</body>
<?php
get_sidebar();
get_footer();
