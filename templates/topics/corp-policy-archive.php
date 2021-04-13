<style>
.bubbleb {
    margin-top:30px;
}
</style>

<div class="row">

<div class="col-md-6 order-md-2 text-center">

<div class="sticky-top a-z">
<h4> Search by A-Z</h4>
<a style="color:white;" href="#A"><button class="btn btn-dark topic-btn">A</button></a>
<a style="color:white;" href="#B"><button class="btn btn-dark topic-btn">B</button></a>
<a style="color:white;" href="#C"><button class="btn btn-dark topic-btn">C</button></a>
<a style="color:white;" href="#D"><button class="btn btn-dark topic-btn">D</button></a>
<a style="color:white;" href="#E"><button class="btn btn-dark topic-btn">E</button></a>
<a style="color:white;" href="#F"><button class="btn btn-dark topic-btn">F</button></a>
<a style="color:white;" href="#G"><button class="btn btn-dark topic-btn">G</button></a>
<a style="color:white;" href="#H"><button class="btn btn-dark topic-btn">H</button></a>
<a style="color:white;" href="#I"><button class="btn btn-dark topic-btn">I</button></a>
<a style="color:white;" href="#J"><button class="btn btn-dark topic-btn">J</button></a>
<a style="color:white;" href="#K"><button class="btn btn-dark topic-btn">K</button></a>
<a style="color:white;" href="#L"><button class="btn btn-dark topic-btn">L</button></a>
<a style="color:white;" href="#M"><button class="btn btn-dark topic-btn">M</button></a>
<a style="color:white;" href="#N"><button class="btn btn-dark topic-btn">N</button></a>
<a style="color:white;" href="#O"><button class="btn btn-dark topic-btn">O</button></a>
<a style="color:white;" href="#P"><button class="btn btn-dark topic-btn">P</button></a>
<a style="color:white;" href="#Q"><button class="btn btn-dark topic-btn">Q</button></a>
<a style="color:white;" href="#R"><button class="btn btn-dark topic-btn">R</button></a>
<a style="color:white;" href="#S"><button class="btn btn-dark topic-btn">S</button></a>
<a style="color:white;" href="#T"><button class="btn btn-dark topic-btn">T</button></a>
<a style="color:white;" href="#U"><button class="btn btn-dark topic-btn">U</button></a>
<a style="color:white;" href="#V"><button class="btn btn-dark topic-btn">V</button></a>
<a style="color:white;" href="#W"><button class="btn btn-dark topic-btn">W</button></a>
<a style="color:white;" href="#X"><button class="btn btn-dark topic-btn">X</button></a>
<a style="color:white;" href="#Y"><button class="btn btn-dark topic-btn">Y</button></a>
<a style="color:white;" href="#Z"><button class="btn btn-dark topic-btn">Z</button></a>


</div>
</div>

<div class="col-md-6 order-md-1">
       
<?php
$urls = rwmb_meta( 'lbh_draft_sharepoint' );
$series = new WP_Query(array(
    'posts_per_page'        => -1,
    'post_type'             => 'pol_cpt',
    'orderby'               => 'title',
    'order'                 => 'asc'
));
if($series->have_posts())
{
    $letter = '';
    while($series->have_posts())
    {
        $series->the_post();

        // Check the current letter is the same that the first of the title
        if($letter != strtoupper(get_the_title()[0]))
        {
            echo ($letter != '') ? '' : '';
            $letter = strtoupper(get_the_title()[0]);
            echo '<div id="'.strtoupper(get_the_title()[0]).'"></div>';
            echo '<div class="bubbleb"><div class="bubbleb-inner"><h4>'.strtoupper(get_the_title()[0]).'</h4></div></div>';            
        }?>

        <div class="col-lg-12 outer-top">
		<div class="inner">
		<h5><?php the_title(); ?></h5>
		<?php the_excerpt(); ?>

        <div class="row justify-content-between">
        <div class="col-lg-3">
<button class="btn btn-dark"><a style="color:white;" href="<?php echo get_permalink(); ?>">Read More</a></button>
        </div>
        <div class="col-lg-3">
        
		<?php if ( rwmb_meta( 'lbh_draft_sharepoint' ) ): ?>

<button class="btn btn-dark"><a style="color:white;" href="<?php echo rwmb_meta( 'lbh_draft_sharepoint' ); ?>">Download File</a></button>
</div>
<?php else: // field_name returned false ?>
<?php endif; // end of if field_name logic ?>

		</div>
        </div>
		</div>
    
	<?php }
}

?>
</div>


</div>