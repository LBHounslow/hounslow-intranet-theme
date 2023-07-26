<?php

/**
 * TEMPLATE NAME: Topics
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <!-- Content Article -->
  <?php
  get_template_part('template-parts/page', 'bubble');
  get_template_part('template-parts/page-topics', 'tabs');

  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

  if (strpos($url, 'working-together') !== false) {
    get_template_part('templates/topics/working-together-archive', 'wt');
  } else if (strpos($url, 'health-and-wellbeing') !== false) {
    get_template_part('templates/topics/health-and-wellbeing-archive', 'haw');
  } else if (strpos($url, 'new-to-lbh') !== false) {
    echo '';
  } else if (strpos($url, 'get-involved') !== false) {
    get_template_part('templates/topics/get-involved-archive', 'gi');
  } else if (strpos($url, 'events') !== false) {
    get_template_part('templates/topics/events-archive', 'es');
  } else if (strpos($url, 'develop-and-learn') !== false) {
    get_template_part('templates/topics/develop-and-learn-archive', 'es');
  } else if (strpos($url, 'how-do-i') !== false) {
    get_template_part('templates/topics/how-do-i-archive', 'hdi');
  } else if (strpos($url, 'corporate-policies') !== false) {
    get_template_part('templates/topics/corp-policy-archive', 'p');
  } else if (strpos($url, 'world-of-work') !== false) {
    get_template_part('templates/topics/world-of-work-archive', 'wow');
  } else if (strpos($url, 'one-hounslow') !== false) {
    get_template_part('templates/topics/one-hounslow-archive', 'oh');
  } ?>

  <style>
    .new-starter {
      display: none;
    }

    .featured-content {
      display: none;
    }

    .featured-content-home {
      display: none;
    }
  </style>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
