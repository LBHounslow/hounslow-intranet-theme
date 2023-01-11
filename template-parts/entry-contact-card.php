<?php
/**
 * Template part for displaying cards of related contacts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <?php rwmb_the_value( 'lbh_contact_info' ) ?>
      </div>
    </div>
  </div>
</div>
