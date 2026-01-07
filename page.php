<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if ( !is_login() && !is_user_logged_in()) :
  get_template_part('template-parts/denied/denied', 'page');
else: 
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <?php
  while (have_posts()) :
    the_post();
    if (strpos($url, 'events/categories/') !== false) {
      get_template_part('template-parts/page-events', 'archive');
    } else {
      get_template_part('template-parts/content', 'page');
    }
  endwhile; // End of the loop.
  ?>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
endif;
?>  
