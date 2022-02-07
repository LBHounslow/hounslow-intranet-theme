<?php
/**
* Template Name:News
*
* @package Hounslow_Intranet
*/

get_header();
get_sidebar();
?>
<!-- Page Content  -->
<div id="content">
  <main id="primary" class="site-main">
    <?php get_template_part( 'template-parts/page-template', 'news' ); ?>
  </main><!-- #primary .site-main -->
</div><!-- #content -->
<?php
get_footer();
