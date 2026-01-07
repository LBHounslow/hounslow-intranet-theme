<?php

/**
 * Template Name:News
 *
 * @package Hounslow_Intranet
 */
if ( !is_login() && !is_user_logged_in()) :
  get_template_part('template-parts/denied/denied', 'page');
else: 
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <?php
  get_template_part('template-parts/page', 'bubble');
  get_template_part('template-parts/page-news', 'featured');
  get_template_part('template-parts/page-news', 'archive'); ?>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
endif;
?>