<?php

/**
 * TEMPLATE NAME: Events
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet_v1
 */

get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <?php get_template_part('template-parts/page-template', 'events'); ?>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
