<div class="row">

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
        'post_type' => 'haw_cpt',
        'offset' => 1,
        'posts_per_page' => 2,
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
        'post_type' => 'haw_cpt',
        'offset' => 3,
        'posts_per_page' => 2,
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

<?php







$cat_args = array (

    'taxonomy' => 'haw_category',

);

$categories = get_categories ( $cat_args );



foreach ( $categories as $category ) {

    $cat_query = null;

    $args = array (

        'order' => 'ASC',

        'orderby' => 'menu_order',

        'posts_per_page' => 7,

        'post_type' =>  'haw_cpt',

        'taxonomy' => 'haw_category',

        'term' => $category->slug,





    );



    $cat_query = new WP_Query( $args );



    if ( $cat_query->have_posts() ) {

        echo '<div class="row '. $category->slug .' ">';

       echo '<div class="bubbleb-outer"><div class="bubbleb"><h5>'. $category->name .'</h5></div></div>';



        while ( $cat_query->have_posts() ) {

            $cat_query->the_post();

            ?>

            <div class="col-lg-3 outer">

			<div class="inner">

        <?php if ( rwmb_get_value( 'lbh_featured_video' ) ): ?>

        <div class="lbh-featured-video">

          <?php echo rwmb_meta( 'lbh_featured_video' ); ?>

        </div>

<?php elseif ( has_post_thumbnail() ): ?>

<div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;background-position:center;">
</div>

<?php else: ?>

<div style="background:url(/wp-content/uploads/2021/04/health-and-wellbeing.png);height:200px;background-size:cover;background-position:center;">
                </div>


<?php endif; ?>


<div class="post-title" style="padding-top:10px;">
					 <h6><?php the_title(); ?></h6>
</div>

<a style="color:white;" href="<?php echo get_permalink(); ?>"><button class="btn btn-dark">Read More</button></a>



			</div>

            <div class="tag-box">

            <?php

$posttags = get_the_tags();

if ($posttags) {

  foreach($posttags as $tag) {

    echo ' <a class="tag" href="/tags/'.$tag->slug.'">'.$tag->name . '</a>, ';

  }

}

?>



</div>







			</div>









            <?php

        }

        echo '<div class="col-lg-3 outer text-center" style="padding-bottom:120px;"><div class="inner"><h4>There are <span style="color:#D70787">'.$category->count .'</span> articles in this topic</h4> <button class="btn btn-dark"><a style="color:white;" href="'. $category->slug .'">view all</a></button></div></div>';

        echo '</div>';



    }

    wp_reset_postdata();

}



?>
