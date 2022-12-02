<?php
/**
 * Template part for displaying a resource in a list group
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */
?>
<li class="list-group-item d-flex justify-content-between align-items-start">
  <div class="ms-2 me-auto">
    <div class="fw-bold"><a href="<?php rwmb_the_value( 'lbh_resource_url' ) ?>"><?php the_title(); ?></a></div>
    <?php hounslow_intranet_excerpt(); ?>
  </div>
  <span class="badge bg-primary rounded-pill"><?php hounslow_intranet_post_type_identifier(); ?></span>
</li>
