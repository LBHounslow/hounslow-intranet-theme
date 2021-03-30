<?php
$featured_posts = get_field('featured_posts');
if( $featured_posts ): ?>
    <ul>
    <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span>A custom field from this post: <?php the_field( 'field_name' ); ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>


    <?php



$cat_args = array (
    'taxonomy' => 'pol_category',  
);
$categories = get_categories ( $cat_args );

foreach ( $categories as $category ) {
    $cat_query = null;
    $args = array (
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => 7,
        'post_type' =>  'pol_cpt',
        'taxonomy' => 'pol_category',
        'term' => $category->slug,


    );

    $cat_query = new WP_Query( $args );

    if ( $cat_query->have_posts() ) {
        echo '<div class="row  '. $category->slug .' " style="margin-top:20px;">';
        echo "<h4>". $category->name ."</h4>";
        
        while ( $cat_query->have_posts() ) {
            $cat_query->the_post();
            ?>
            <div class="col-lg-12 outer">
            <div class="row">
            
			<div class="col-lg-6">	
            <div class="inner">
                <h5><?php the_title(); ?></h5>
                <?php the_excerpt(); ?>
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
            </div>



			</div>




            <?php
        }
        echo '<div class="col-lg-3 text-center"><div class="inner"><h4>There are <span style="color:#D70787">'.$category->count .'</span> articles in this topic</h4> <button class="btn btn-dark"><a style="color:white;" href="'. $category->slug .'">view all</a></button></div></div>';
        echo '</div>';
        
    }
    wp_reset_postdata();
}

?>
