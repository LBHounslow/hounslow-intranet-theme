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
  <?php
  get_template_part('template-parts/page', 'bubble');
  get_template_part('template-parts/page-events', 'navigation');
  get_template_part('template-parts/page-events', 'categories');

  while (have_posts()) :
    the_post();

    get_template_part('template-parts/content-event', 'page');

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
      comments_template();
    endif;

  endwhile; // End of the loop.
  ?>
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
