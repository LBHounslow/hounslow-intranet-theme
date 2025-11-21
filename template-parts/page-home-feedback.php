<?php 
$displayFeedback = true; // Set to false to hide feedback section
if ($displayFeedback == true) { ?>  
<div class="row">
    <div class="col">
        <h4 class="mt-2">Feedback</h4>
    </div>
</div>
<div class="row outer">
    <div class="inner">
        <?php echo do_shortcode('[gravityform id="19" title="true"]'); ?>
    </div>
</div>
<?php } ?>