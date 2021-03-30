


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
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>
<div class="col-lg-3">

</div>
</div>
</div>


 <?php get_template_part('templates/topics-tabs', 'topics-dropdown'); ?>
<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'working-together') !== false) {?>
    
    <?php get_template_part('templates/topics/working-together-archive', 'wt'); ?>

<?php } else if (strpos($url,'health-and-wellbeing') !== false) {?>
    
	 <?php get_template_part('templates/topics/health-and-wellbeing-archive', 'haw'); ?> 

<?php } else if (strpos($url,'new-to-lbh') !== false) {?>
    
    <?php get_template_part('templates/topics/new-to-lbh-archive', 'ns'); ?>

<?php } else if (strpos($url,'get-involved') !== false) {?>
    
    <?php get_template_part('templates/topics/get-involved-archive', 'gi'); ?>    

<?php } else if (strpos($url,'events') !== false) {?>
    
    <?php get_template_part('templates/topics/events-archive', 'es'); ?>

<?php } else if (strpos($url,'develop-and-learn') !== false) {?>
    
    <?php get_template_part('templates/topics/develop-and-learn-archive', 'es'); ?>

<?php } else if (strpos($url,'how-do-i') !== false) {?>
    
    <?php get_template_part('templates/topics/how-do-i-archive', 'hdi'); ?>

<?php } else if (strpos($url,'corporate-policies') !== false) {?>
    
    <?php get_template_part('templates/topics/corp-policy-archive', 'p'); ?>

<?php }?>  
	</main><!-- #main -->

<style>
.new-starter {display:none;}
</style>
