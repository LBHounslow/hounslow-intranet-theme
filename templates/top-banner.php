<div class="status-bar">
<btn class="btn selector"><?php echo do_shortcode('[gtranslate]'); ?></btn>
<a id="desktop" class="btn btn-light status-btn"  href="/feedback">Leave Feedback</a>
<a id="desktop" class="btn btn-light status-btn"  href="/submit-a-new-intranet-page">Add a Page</a>
<a id="desktop" class="btn btn-light status-btn"  href="/event-submission-form/?action=edit">Add an Event</a>
<?php
$my_query = new WP_Query('p=2463');
while($my_query->have_posts()){
  $my_query->the_post(); ?>

   <?php $value = rwmb_meta( 'general');
    if ( 'working' == $value ) { ?>

<a class="btn btn-success status-btn" href="/status">See status</a>


    <?php } elseif ( 'issues' == $value ) { ?>

<a href="/status"><btn class="btn btn-warning status-btn">See status</btn></a>


    <?php } elseif ( 'down' == $value ) { ?>
<a href="/status"><btn class="btn btn-danger status-btn">See status</btn></a>


    <?php } ?>

 <?php } ?>



</div>