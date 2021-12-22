<?php
/**
 * Utility functions for this theme
 *
 * @package Hounslow_Intranet
 */

 if ( ! function_exists( 'hounslow_intranet_get_post_type' ) ) :
 	/**
 	 * Outputs the featured video.
 	 */
 	function hounslow_intranet_get_post_type() {

    $post_type = get_post_type();
    $output = $post_type;
    $item_post_types = array('dal_cpt', );

    if ( in_array( $post_type, $item_post_types ) ):
      $output = 'item';
 		endif;

    return $output;
 	}
 endif;


//DEVELOPMENT FUNCTIONS - REMOVE IN PRODUCTION

 /**
  * Theme Template Usage Report
  *
  * Displays a data dump to show you the pages in your WordPress
  * site that are using custom theme templates.
  */
 function theme_template_usage_report( $file = false ) {
     if ( ! isset( $_GET['template_report'] ) ) return;

     $templates = wp_get_theme()->get_page_templates();
     $report = array();

     echo '<h1>Page Template Usage Report</h1>';
     echo "<p>This report will show you any pages in your WordPress site that are using one of your theme's custom templates.</p>";

     foreach ( $templates as $file => $name ) {
         $q = new WP_Query( array(
             'post_type' => 'page',
             'posts_per_page' => -1,
             'meta_query' => array( array(
                 'key' => '_wp_page_template',
                 'value' => $file
             ) )
         ) );

         $page_count = sizeof( $q->posts );

         if ( $page_count > 0 ) {
             echo '<p style="color:green">' . $file . ': <strong>' . sizeof( $q->posts ) . '</strong> pages are using this template:</p>';
             echo "<ul>";
             foreach ( $q->posts as $p ) {
                 echo '<li><a href="' . get_permalink( $p, false ) . '">' . $p->post_title . '</a></li>';
             }
             echo "</ul>";
         } else {
             echo '<p style="color:red">' . $file . ': <strong>0</strong> pages are using this template, you should be able to safely delete it from your theme.</p>';
         }

         foreach ( $q->posts as $p ) {
             $report[$file][$p->ID] = $p->post_title;
         }
     }

     exit;
 }
 add_action( 'wp', 'theme_template_usage_report' );
