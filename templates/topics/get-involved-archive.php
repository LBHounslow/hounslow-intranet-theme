    <?php



$cat_args = array (
    'taxonomy' => 'gi_category',  
);
$categories = get_categories ( $cat_args );

foreach ( $categories as $category ) {
    $cat_query = null;
    $args = array (
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => 7,
        'post_type' =>  'gi_cpt',
        'taxonomy' => 'gi_category',
        'term' => $category->slug,


    );

    $cat_query = new WP_Query( $args );

    if ( $cat_query->have_posts() ) {
        echo '<div class="row '. $category->slug .' ">';
        echo "<h4>". $category->name ."</h4>";
        
        while ( $cat_query->have_posts() ) {
            $cat_query->the_post();
            ?>
            <div class="col-lg-3 outer">
			
			<div class="inner">
					<?php if ( get_field( 'embed_video' ) ): ?>

<div class="embed-containerb">
    <?php the_field('embed_video'); ?>

</div>
<?php else: // field_name returned false ?>
  <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;background-position:center;">
                </div>



<?php endif; // end of if field_name logic ?>
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




            <?php
        }
        echo '<div class="col-lg-3 text-center" style="padding-top:120px;padding-bottom:10px;"><div class="inner"><h4>There are <span style="color:#D70787">'.$category->count .'</span> articles in this topic</h4> <button class="btn btn-dark"><a style="color:white;" href="'. $category->slug .'">view all</a></button></div></div>';
        echo '</div>';
        
    }
    wp_reset_postdata();
}

?>

