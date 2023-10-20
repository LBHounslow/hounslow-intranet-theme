<?php

/**
 * The template for displaying search results
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <div class="row">
    <div id="entry-container" class="col-lg-7 bg-white">
      <header>
        <h1 class="page-title">Search Results</h1>
      </header>
      <?php
      if (have_posts()) {
        get_template_part('template-parts/search', 'results');
      } else {
        get_template_part('template-parts/search', 'none');
      }
      ?>
    </div>
  </div>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
