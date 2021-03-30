<?php

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'hdi_cpt',
    'orderby' => 'date',
    'order' => 'DESC',
 'tax_query' => array(
            array(
                'taxonomy' => 'hdi_category',  // Taxonomy name
                'field'    => 'slug',
                'terms'    => 'new-starter',   // Term name
            ),
        ),
    'paged' => $paged);
$loop = new WP_Query($args);
if ($loop->have_posts()) :
    while ($loop->have_posts()) : $loop->the_post(); ?>
    
 
			
 <div class="col-lg-3 outer">
			<div class="blog-img" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;">
					</div>
			<div class="inner">
				
                <h5><?php the_title(); ?></h5>
				<button class="btn btn-info"><a style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a></button>
			
			</div>




			</div>
		
            <?php
        

        
    endwhile;
endif;
wp_reset_postdata();

?>