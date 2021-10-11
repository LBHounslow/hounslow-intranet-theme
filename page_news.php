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
 				<h4>All the latest news and updates</h4>
 			</div>
 			<div class="col-lg-3">
 				<?php $images = rwmb_meta( 'second_image', array( 'size' => 'full' ) );
 				foreach ( $images as $image ) {
     			echo '<a href="', $image['full_url'], '"><img src="', $image['url'], '"></a>';
 				} ?>
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
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href=/news/category/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);
      /* Restore original Post Data */


?>
</div>
</div>
<div class="row">

<div class="col-md-4">
    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'post',
        'posts_per_page' => 1,
        'tax_query' => array(
         array (
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => 'featured'
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
<div class="tall-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;">
</div>
<div class="featured-tab"><h5><?php the_title(); ?></h5></div>
</a>


<?php endif; ?>






			</div>


</div>



<?php endwhile;

?>

    </div>
</div>

<div class="col-md-4">
<div class="row">
        <?php
        $the_query = new WP_Query( array(
         'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'post',
        'offset' => 1,
        'posts_per_page' => 2,
        'tax_query' => array(
         array (
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => 'featured'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-lg-12 outer">

			<div class="">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
  <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');background-size:cover;background-position:center;">
  </div>
  <div class="featured-tab"><h5><?php the_title(); ?></h5>
  </div>
</a>



<?php endif; ?>






			</div>


</div>



<?php endwhile;

?>

    </div>
</div>

<div class="col-md-4">
<div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'post',
        'offset' => 3,
        'posts_per_page' => 2,
        'tax_query' => array(
         array (
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => 'featured'
         )
        ),

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

   <div class="col-lg-12 outer">

			<div class="">

                 <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

                 <div class="lbh-featured-video">

                 <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

                 </div>

<?php elseif ( has_post_thumbnail() ): ?>
<a href="<?php the_permalink(); ?>">
  <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');background-size:cover;background-position:center;">
  </div>
  <div class="featured-tab"><h5><?php the_title(); ?></h5>
  </div>
</a>



<?php endif; ?>






			</div>


</div>



<?php endwhile;

?>

    </div>
</div>
</div>

<!--end of featured -->

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
