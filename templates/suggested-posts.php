<div class="suggested">
<div class="post-title">
<h3>Suggested Articles</h3>
</div>
<?php


$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (strpos($url,'working-together') !== false) { ?>


    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'wt_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

    <div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>


<?php } else if (strpos($url,'health-and-wellbeing') !== false) {?>



    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'haw_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

    <div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>


<?php } else if (strpos($url,'new-to-lbh') !== false) {?>


    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'nth_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

    <div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>

<?php } else if (strpos($url,'corporate-policies') !== false) {?>


    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'pol_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

    <div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>

<?php } else if (strpos($url,'how-do-i') !== false) {?>


    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'hdi_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

    <div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>

<?php } else if (strpos($url,'get-involved') !== false) {?>
 

    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'gi_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

<div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>

<?php } else if (strpos($url,'develop-and-learn') !== false) {?>


    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'dal_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

<div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>

<?php } else if (strpos($url,'world-of-work') !== false) {?>
 

    <div class="row">
        <?php
        $the_query = new WP_Query( array(
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'wow_cpt',
        'posts_per_page' => 4,
       

    ) );
while ( $the_query->have_posts() ) :

    $the_query->the_post(); ?>

<div class="col-md-3 outer">
        <div class="inner">
            <a href="<?php the_permalink(); ?>">
                <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
            </a>

            <div class="post-title"><h6><?php the_title(); ?></h6></div>
                <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
            </div>       
        </div>

        <?php endwhile; ?>
        
    </div>

    <?php } else if (strpos($url,'one-hounslow') !== false) {?>
 

 <div class="row">
     <?php
     $the_query = new WP_Query( array(
     'orderby' => 'rand',
     'order' => 'ASC',
     'post_type' => 'oh_cpt',
     'posts_per_page' => 4,
    

 ) );
while ( $the_query->have_posts() ) :

 $the_query->the_post(); ?>

<div class="col-md-3 outer">
     <div class="inner">
         <a href="<?php the_permalink(); ?>">
             <div class="reg-item" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>') center; background-size:cover;"></div>
         </a>

         <div class="post-title"><h6><?php the_title(); ?></h6></div>
             <a class="btn btn-dark" style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a>
         </div>       
     </div>

     <?php endwhile; ?>
     
 </div>





<?php
   
}

?>



</div>