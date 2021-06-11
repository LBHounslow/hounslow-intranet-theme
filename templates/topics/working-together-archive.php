<div class="row">
<?php
$the_query = new WP_Query( array(
'post_type' => 'wt_cpt',
 'posts_per_page' => 4,
'tax_query' => array(
    array (
        'taxonomy' => 'wt_category',
        'field' => 'slug',
        'terms' => 'featured-content'
    )
),

    ) );
if ( $the_query->have_posts() ) { ?>
<div class="bubbleb-outer"><div class="bubbleb"><h5>Featured Articles</h5></div></div>
<?php }
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

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

				<button class="btn btn-dark"><a style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a></button>



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



<?php endwhile;

?>
</div>


<?php



$cat_args = array (
    'taxonomy' => 'wt_category',
);
$categories = get_categories ( $cat_args );

foreach ( $categories as $category ) {
    $cat_query = null;
    $args = array (
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => 7,
        'post_type' =>  'wt_cpt',
        'taxonomy' => 'wt_category',
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

<div style="background:url(/wp-content/uploads/2021/04/working-together.png);height:200px;background-size:cover;background-position:center;">
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
