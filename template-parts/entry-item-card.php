<?php
/**
 * Template part for displaying cards of related items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */
?>
<div class="col">
  <div class="card h-100">
    <div class="card-body">
      <h5 class="card-title"><?php the_title(); ?></h5>
      <p class="card-text"><?php hounslow_intranet_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more&hellip;</a>
    </div>
    <div class="card-footer">
       <small class="text-muted"><?php echo hounslow_intranet_post_type_identifier(); ?></small>
    </div>
  </div>
</div>
