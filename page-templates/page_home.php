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
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <?php get_template_part('templates/homepage-template', 'homepage'); ?>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
