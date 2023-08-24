<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LBH_Intranet_v1
 */

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">


  <!-- 1) Corporate Policies Archive -->
  <?php if (strpos($url, 'corporate-policies') !== false) { ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="bubble-outer">
          <div class="bubble">
            <h3 class="page-title">
              <?php
              printf(__('%s', ''), '<span>' . single_cat_title('', false) . '</span>');
              ?>
            </h3>
          </div>
        </div>
        <div style="padding:20px;background:#83d6c9;margin-bottom:20px;">
          <div class="row align-items-center justify-content-around">
            <div class="col-lg-6">
              <?php echo term_description() ?>
            </div>

            <div class="col-lg-3">
            </div>
          </div>
        </div>
        <div class="bubble-outer">
          <?php get_template_part('templates/topics-tabs', 'topics-dropdown'); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <?php
          while (have_posts()) :
            the_post();

            get_template_part('template-parts/content-post-policy', get_post_type());

          endwhile; // End of the loop.
          ?>
        </div>
      </div>
    </div>


  <?php } else { ?>
    <!-- 1) All Other Archives -->

    <?php if (have_posts()) : ?>

      <!-- Content Article -->
      <div class="row">
        <div class="col-lg-12">
          <div class="bubble-outer">
            <div class="bubble">
              <h3> <?php
                    the_archive_title('<span>', '</span>');
                    ?></h3>
            </div>
          </div>
        </div>
        <div style="padding:20px;background:#83d6c9;margin-bottom:20px;">
          <div class="row">
            <div class="col-lg-7">
              <?php the_archive_description('<span class="archive-description">', '</span>'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">


      <?php
      while (have_posts()) :
        the_post();

        get_template_part('template-parts/content-topics', get_post_type());

      endwhile; // End of the loop.

      the_posts_pagination();

    else :

      get_template_part('template-parts/content', 'none');

    endif;
      ?>
      </div>
    <?php } //endif 
    ?>
</div><!-- .row -->
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
