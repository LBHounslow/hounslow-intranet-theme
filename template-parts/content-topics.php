<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package LBH_Intranet_v1

 */



?>



<div class="col-lg-3 outer">



<div class="inner">
<?php if ( has_post_thumbnail() ): ?>

 <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;background-position:center;">
                </div>
<?php else: ?>

<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'working-together') !== false) {?>
    
<div style="background:url(/wp-content/uploads/2021/04/working-together.png);height:200px;background-size:cover;background-position:center;">
                </div>

<?php } else if (strpos($url,'health-and-wellbeing') !== false) {?>
    
<div style="background:url(/wp-content/uploads/2021/04/health-and-wellbeing.png);height:200px;background-size:cover;background-position:center;">
                </div>

<?php } else if (strpos($url,'new-to-lbh') !== false) {?>
    
    <div style="background:url(/wp-content/uploads/2021/04/new-to-lbh.png);height:200px;background-size:cover;background-position:center;">
                </div>

<?php } else if (strpos($url,'get-involved') !== false) {?>
    
<div style="background:url(/wp-content/uploads/2021/04/get-involved.png);height:200px;background-size:cover;background-position:center;">
                </div>   

<?php } else if (strpos($url,'events') !== false) {?>
    
<div style="background:url(/wp-content/uploads/2021/04/events.png);height:200px;background-size:cover;background-position:center;">
                </div>

<?php } else if (strpos($url,'develop-and-learn') !== false) {?>
    
<div style="background:url(/wp-content/uploads/2021/04/develop-and-learn.png);height:200px;background-size:cover;background-position:center;">
                </div>

<?php } else if (strpos($url,'how-do-i') !== false) {?>
    
  <div style="background:url(/wp-content/uploads/2021/04/how-do-i.png);height:200px;background-size:cover;background-position:center;">
                </div>

<?php } else if (strpos($url,'corporate-policies') !== false) {?>
    
 <div style="background:url(/wp-content/uploads/2021/04/corp-policy.png);height:200px;background-size:cover;background-position:center;">
                </div>

<?php }?>  





<?php endif; ?>








<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>

	<header class="entry-header" style="margin-top:10px;">

		<?php





		

		if ( is_singular() ) :

			the_title( '<h6 class="entry-title">', '</h6>' );

		else :

			the_title( '<h6 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' );

		endif;



		if ( 'post' === get_post_type() ) :

			?>

			

		<?php endif; ?>

	</header><!-- .entry-header -->



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















	

</article><!-- #post-<?php the_ID(); ?> -->



