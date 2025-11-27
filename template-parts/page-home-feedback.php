<?php
$display_feedback_section = get_option('hounslow_intranet_main')['display_feedback_section'];
if (0 == $display_feedback_section ) {
    // Feedback section is disabled
} else { 
    $feedback_shortcode = get_option('hounslow_intranet_main')['feedback_shortcode'];
    ?>
<div class="row">
    <div class="col">
        <h4 class="mt-2">Feedback</h4>
    </div>
</div>
<div class="row outer">
    <div class="inner">
        <?php echo do_shortcode($feedback_shortcode); ?>
    </div>
</div>
<?php
}
?>