


<div id="demo" class="carousel slide" data-interval="false" data-ride="carousel">
<h4>Top Articles</h4>


  
  <!-- The slideshow -->
  <div class=" carousel-inner no-padding">
    <div class="carousel-item active">
    <div class="row">
      <div class="col-md-3 outer">
        
    <div class="inner">
  <?php
          $the_query = new WP_Query( array(
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_type' => 'dal_cpt',
          'posts_per_page' => 1,
          'tax_query' => array(
          array (
          'taxonomy' => 'dal_category',
          'field' => 'slug',
          'terms' => 'featured-content'
          )
          ),

      ) );
  while ( $the_query->have_posts() ) :

      $the_query->the_post(); ?>

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div>    
      <div class="col-md-3 outer">
     
    <div class="inner">
  <?php
          $the_query = new WP_Query( array(
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_type' => 'gi_cpt',
          'posts_per_page' => 1,
          'tax_query' => array(
          array (
          'taxonomy' => 'gi_category',
          'field' => 'slug',
          'terms' => 'featured-content'
          )
          ),

      ) );
  while ( $the_query->have_posts() ) :

      $the_query->the_post(); ?>

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div>   
      <div class="col-md-3 outer">
        
    <div class="inner">
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

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div>   
      <div class="col-md-3 outer">
       
    <div class="inner">
  <?php
          $the_query = new WP_Query( array(
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_type' => 'hdi_cpt',
          'posts_per_page' => 1,
          'tax_query' => array(
          array (
          'taxonomy' => 'hdi_category',
          'field' => 'slug',
          'terms' => 'featured-content'
          )
          ),

      ) );
  while ( $the_query->have_posts() ) :

      $the_query->the_post(); ?>

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div>   

      </div>
    </div><!---row --->
    <div class="carousel-item">
    <div class="row">
      <div class="col-md-3 outer">
        
    <div class="inner">
  <?php
          $the_query = new WP_Query( array(
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_type' => 'nth_cpt',
          'posts_per_page' => 1,
          'tax_query' => array(
          array (
          'taxonomy' => 'nth_category',
          'field' => 'slug',
          'terms' => 'featured-content'
          )
          ),

      ) );
  while ( $the_query->have_posts() ) :

      $the_query->the_post(); ?>

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div>    
      <div class="col-md-3 outer">
        
    <div class="inner">
  <?php
          $the_query = new WP_Query( array(
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_type' => 'wt_cpt',
          'posts_per_page' => 1,
          'tax_query' => array(
          array (
          'taxonomy' => 'wt_category',
          'field' => 'slug',
          'terms' => 'featured-content'
          )
          ),

      ) );
  while ( $the_query->have_posts() ) :

      $the_query->the_post(); ?>

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div>   
      <div class="col-md-3 outer">
        
    <div class="inner">
  <?php
          $the_query = new WP_Query( array(
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_type' => 'oh_cpt',
          'posts_per_page' => 1,
          'tax_query' => array(
          array (
          'taxonomy' => 'oh_category',
          'field' => 'slug',
          'terms' => 'featured-content'
          )
          ),

      ) );
  while ( $the_query->have_posts() ) :

      $the_query->the_post(); ?>

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div>   
      <div class="col-md-3 outer-end">
           <div class=" inner">
  <?php
          $the_query = new WP_Query( array(
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_type' => 'wow_cpt',
          'posts_per_page' => 1,
          'tax_query' => array(
          array (
          'taxonomy' => 'wow_category',
          'field' => 'slug',
          'terms' => 'featured-content'
          )
          ),

      ) );
  while ( $the_query->have_posts() ) :

      $the_query->the_post(); ?>

  <a class="hoverfx" href="<?php the_permalink(); ?>">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
</a>

    <div class="pads">
      <div class="post-title">
        <h6><?php the_title(); ?></h6>
      </div>
      <a class="btn btn-dark" style="color:white;" href="<?php the_permalink(); ?>">Learn More</a>
    </div>

  <?php endwhile; ?>
  
  </div>
      </div> 
</div><!---row --->
    </div>

  </div>
  
 
<div class="row indicator-pad">
<div class="col-6">
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  </div>
  <div class="col-6">
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  </div>
  </div>
</div>