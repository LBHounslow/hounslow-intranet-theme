<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package Hounslow_Intranet

 */

?>

<div class="row" >



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php

		if ( is_singular() ) :

			the_title( '<h1 class="entry-title">', '</h1>' );

		else :

			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		endif;



			?>


	</header><!-- .entry-header -->







	<div class="entry-content">


	
<div class="row status-1 align-items-center">
    <div class="col-lg-2">
        <h5>Intranet site</h5>
    </div>

    <div class="col-lg-1">
    <?php $value = rwmb_meta( 'intranet_site');
    if ( 'working' == $value ) { ?>

        <div class="green-status"></div>


    <?php } elseif ( 'issues' == $value ) { ?>

        <div class="orange-status"></div>


    <?php } elseif ( 'down' == $value ) { ?>
      <div class="red-status"></div>


    <?php } ?>
    </div>

    <div class="col-lg-8">
    <p><?php echo rwmb_meta( 'intranet_details' ) ?></p>
    </div>

</div>

<div class="row status-1 align-items-center">
    <div class="col-lg-2">
        <h5>OHMS</h5>
    </div>

    <div class="col-lg-1">
    <?php $value = rwmb_meta( 'ohms');
    if ( 'working' == $value ) { ?>

        <div class="green-status"></div>


    <?php } elseif ( 'issues' == $value ) { ?>

      <div class="orange-status"></div>


    <?php } elseif ( 'down' == $value ) { ?>
       <div class="red-status"></div>


    <?php } ?>
    </div>

    <div class="col-lg-8">
    <p><?php echo rwmb_meta( 'ohms_details' ) ?></p>
    </div>

</div>


<div class="row status-1 align-items-center">
    <div class="col-lg-2">
        <h5>Business World (Agresso)</h5>
    </div>

    <div class="col-lg-1">
    <?php $value = rwmb_meta( 'business_world');
    if ( 'working' == $value ) { ?>

        <div class="green-status"></div>


    <?php } elseif ( 'issues' == $value ) { ?>

      <div class="orange-status"></div>


    <?php } elseif ( 'down' == $value ) { ?>
       <div class="red-status"></div>


    <?php } ?>
    </div>

    <div class="col-lg-8">
    <p><?php echo rwmb_meta( 'business_world_details' ) ?></p>
    </div>

</div>



<div class="row status-1 align-items-center">
    <div class="col-lg-2">
        <h5>Corporate Website</h5>
    </div>

    <div class="col-lg-1">
    <?php $value = rwmb_meta( 'corporate_website');
    if ( 'working' == $value ) { ?>

        <div class="green-status"></div>


    <?php } elseif ( 'issues' == $value ) { ?>

      <div class="orange-status"></div>


    <?php } elseif ( 'down' == $value ) { ?>
       <div class="red-status"></div>


    <?php } ?>
    </div>

    <div class="col-lg-8">
    <p><?php echo rwmb_meta( 'corporate_website_details' ) ?></p>
    </div>

</div>


<div class="row status-1 align-items-center">
    <div class="col-lg-2">
        <h5>iManage</h5>
    </div>

    <div class="col-lg-1">
    <?php $value = rwmb_meta( 'imanage');
    if ( 'working' == $value ) { ?>

        <div class="green-status"></div>


    <?php } elseif ( 'issues' == $value ) { ?>

      <div class="orange-status"></div>


    <?php } elseif ( 'down' == $value ) { ?>
       <div class="red-status"></div>


    <?php } ?>
    </div>

    <div class="col-lg-8">
    <p><?php echo rwmb_meta( 'imanage_details' ) ?></p>
    </div>

</div>

<div class="row">

<h3>Report a problem</h3>
<a href="/"><btn class="btn btn-dark">Report</btn></a>



</div>













	<footer class="entry-footer">

		<?php Hounslow_Intranet_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

