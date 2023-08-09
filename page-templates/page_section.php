<?php

/**
 * TEMPLATE NAME: Section
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */
get_header();
?>
<!-- Body Main Content -->
<div id="primary" class="site-main">
  <!-- Content Article -->
  <div class="row">
    <?php
    get_template_part('template-parts/page', 'bubble');
    $post_slug = $post->post_name;

    switch ($post_slug) {
      case 'working-together':
        $section_taxonomy = 'wt_category';
        break;
      case 'health-and-wellbeing':
        $section_taxonomy = 'haw_category';
        break;
      case 'new-to-lbh':
        $section_taxonomy = 'nth_category';
        break;
      case 'corporate-policies':
        $section_taxonomy = 'pol_category';
        break;
      case 'how-do-i':
        $section_taxonomy = 'hdi_category';
        break;
      case 'get-involved':
        $section_taxonomy = 'gi_category';
        break;
      case 'develop-and-learn':
        $section_taxonomy = 'dal_category';
        break;
      case 'world-of-work':
        $section_taxonomy = 'wow_category';
        break;
      case 'one-hounslow':
        $section_taxonomy = 'oh_category';
        break;
      default:
        $section_taxonomy = 'default';
    }

    if ($section_taxonomy !== 'default') {
      // Display old categories as topics
      $excluded_categories = array();
      $oldTopics = get_terms($section_taxonomy, array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'exclude'  => $excluded_categories,
      ));

      foreach ($oldTopics as $oldTopic) {
        $topic_url = '/' . $post_slug . '/' . $oldTopic->slug;
    ?>
        <div class="col-lg-3 outer">
          <div class="inner">
            <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;background-position:center;"></div>
            <div class="post-title" style="padding-top:10px;">
              <h6><?php echo $oldTopic->name; ?></h6>
              <p><?php echo $oldTopic->description; ?></p>
            </div>
            <a style="color:white;" href="<?php echo $topic_url; ?>"><button class="btn btn-dark">Read More</button></a>
          </div>
        </div>
      <?php } //endforeach
    } //endif

    //Display new topics in matching section
    $args = array(
      'post_type' => 'topic_item',
      'orderby' => 'post_title',
      'order'   => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'section',
          'field'    => 'slug',
          'terms'    => $post_slug,
        ),
      ),
    );
    $connected = new \WP_Query($args);

    if ($connected->have_posts()) {
      while ($connected->have_posts()) : $connected->the_post();

      ?>
        <div class="col-lg-3 outer">
          <div class="inner">
            <div style="background:url('<?php echo get_the_post_thumbnail_url(); ?>');height:200px;background-size:cover;background-position:center;"></div>
            <div class="post-title" style="padding-top:10px;">
              <h6><?php the_title(); ?></h6>
              <p><?php hounslow_intranet_excerpt(); ?></p>
            </div>
            <a style="color:white;" href="<?php the_permalink(); ?>"><button class="btn btn-dark">Read More</button></a>
          </div>
        </div>
    <?php
      endwhile;
      wp_reset_postdata();
    }

    ?>
  </div><!-- .row -->
</div><!-- #primary .site-main -->
<?php
get_sidebar();
get_footer();
