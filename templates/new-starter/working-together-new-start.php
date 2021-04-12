<?php



$args = array(

    'posts_per_page' => -1,

    'post_type' => 'wt_cpt',

    'orderby' => 'date',

    'order' => 'DESC',

 'tax_query' => array(

            array(

                'taxonomy' => 'wt_category',  // Taxonomy name

                'field'    => 'slug',

                'terms'    => 'new-starter',   // Term name

            ),

        ),

    'paged' => $paged);

$loop = new WP_Query($args);

if ($loop->have_posts()) :

    while ($loop->have_posts()) : $loop->the_post(); ?>

    

 

			

 <div class="col-lg-3 outer">


			<div class="inner">

	<?php if ( has_post_thumbnail() ): ?>

 <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;background-position:center;">
                </div>
<?php else: ?>

<div style="background:url(/wp-content/uploads/2021/04/working-together.png);height:200px;background-size:cover;background-position:center;">
                </div>


<?php endif; ?>
				

<div class="post-title" style="padding-top:10px;">
					 <h6><?php the_title(); ?></h6>
</div> 

                   <div class="inner-body">
                   <small style="color:hotpink">Working Together</small> 
           		</div>

				<button class="btn btn-dark"><a style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a></button>

			

			</div>









			</div>

		

            <?php

        



        

    endwhile;

endif;

wp_reset_postdata();



?>