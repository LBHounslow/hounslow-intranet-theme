<div class="status-bar">
  <btn class="btn selector"><?php echo do_shortcode('[gtranslate]'); ?></btn>
  <a id="desktop" class="btn btn-light status-btn"  href="/submit-a-new-intranet-page">Add a Page</a>
  <a id="desktop" class="btn btn-light status-btn"  href="/event-submission-form/?action=edit">Add an Event</a>
  <?php $value = rwmb_meta( 'lbh_status_radio');
  if ( 'working' == $value ) { ?>
    <a id="desktop" style="color:white" href="/system-status"><button class="btn btn-success status-btn"><strong>See Status</strong></button></a>
  <?php } elseif ( 'issues' == $value ) { ?>
    <a id="desktop" style="color:white" href="/system-status"><button class="btn btn-warning status-btn"><strong>See Status</strong></button></a>
  <?php } elseif ( 'down' == $value ) { ?>
    <a id="desktop" style="color:white" href="/system-status"><button class="btn btn-danger status-btn"><strong>See Status</strong></button></a>
  <?php } ?>
</div>
