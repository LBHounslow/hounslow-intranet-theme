<?php

/**
 * The home template file
 * TEMPLATE NAME: Homepage
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */
get_header();
$news_site_id = 2;
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <div class="row">
    <div class="col-lg-12">
      <?php get_template_part('template-parts/page', 'home-banner'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9">
      <?php get_template_part('template-parts/page', 'home-news'); ?>
    </div>
    <div class="col-lg-3">
       <?php get_template_part('template-parts/page', 'home-feedback'); ?>
       <?php get_template_part('template-parts/page', 'home-events'); ?> 
    </div>
  </div>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
