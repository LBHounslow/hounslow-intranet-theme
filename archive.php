<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LBH_Intranet_v1
 */

get_header();
?>



<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
    	
<?php get_template_part('templates/navigation', 'menu'); ?>
           
        </nav>

	<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'news') !== false) {?>
    

     <!-- Page Content  -->
        <div id="content">

        
         <div class="row">
<?php 
  //get the current page
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  //pagination fixes prior to loop
  $temp =  $query;
  $query = null;

  //custom loop using WP_Query
  $query = new WP_Query( array( 
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC' 
  ) ); 

 //set our query's pagination to $paged
 $query -> query('post_type=newsitems&posts_per_page=2'.'&paged='.$paged);

 if ( $query->have_posts() ) : 
   while ( $query->have_posts() ) : $query->the_post();
    ?>
  <div class="col-lg-6 outer ">
				   <div class="col-lg-12 outer "> 
			<div class="inner">
<div class="child" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:300px;background-size:cover;">
                        </div>

					 <h5><?php the_title(); ?></h5>
           <p><?php the_date(); ?></p>
                     <?php the_excerpt(); ?>
                     <button class="btn btn-dark"><a style="color:white;"href="<?php echo the_permalink(); ?>">Read More</a></button>
					</div>

			</div>

			</div>
  <?php endwhile;?>

  <?php //pass in the max_num_pages, which is total pages ?>
  </div>
  <div class="pagenav">
    <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?></div>
    <div class="alignright"><?php next_posts_link('Next', $query->max_num_pages) ?></div>
  </div>

<?php endif; ?>

<?php //reset the following that was set above prior to loop
$query = null; $query = $temp; ?>
</div>


        </div>
   

    </div> 


<?php } else {?>
    
	     <!-- Page Content  -->
        <div id="content">
        <?php get_template_part('templates/topics-tabs', 'topics-dropdown'); ?>

        <h3 class="page-title"><?php
    printf( __( '%s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' );
        ?></h3>
        
            <main id="primary" class="site-main">
<div class="row">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-topics', get_post_type() );

			

			// If comments are open or we have at least one comment, load up the comment template.
			

		endwhile; // End of the loop.
		?>
</div>


	</main><!-- #main -->


        </div>
<?php } 

?>	

   
   

    </div> 
</body>


	

<?php
get_sidebar();
get_footer();
