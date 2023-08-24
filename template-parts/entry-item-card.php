<?php

/**
 * Template part for displaying cards of related items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hounslow_Intranet
 */

if (has_post_thumbnail()) :
  $thumbnailId = get_the_ID();
else :
  $topics = wp_get_post_terms(get_the_ID(), 'item-topic');
  if ($topics) {
    $topicIds = array();
    foreach ($topics as $topic) {
      $topicIds[] = $topic->description;
    }
    $thumbnailId = $topicIds[0];
  }
endif;
?>
<div class="col-lg-3 mb-3">
  <div class="bg-white" style="background:url('<?php echo get_the_post_thumbnail_url($thumbnailId); ?>');height:200px;background-size:cover;background-position:center;"></div>
  <div class="h-auto p-3 bg-white">
    <?php the_title('<h6 class="entry-title">', '</h6>'); ?>
    <p><?php hounslow_intranet_excerpt(); ?></p>
    <button class="btn btn-dark"><a style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a></button>
  </div>
  <div class="p-3" style="background:#83d6c9;">
    <small><?php echo hounslow_intranet_post_type_identifier(); ?></small>
  </div>
</div>