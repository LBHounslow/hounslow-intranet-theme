<?php
/**
 * Custom template tags for this theme
 *
 * @package Hounslow_Intranet
 */

 if ( ! function_exists( 'hounslow_intranet_entry_lead' ) ) :
 	/**
 	 * Outputs the text for the entry lead.
 	 */
 	function hounslow_intranet_entry_lead() {

 		if ( rwmb_get_value( 'lbh_entry_summary'  ) ):
      $value = rwmb_get_value( 'lbh_entry_summary' );
      echo wpautop( $value );
 		endif;
 	}
 endif;

 if ( ! function_exists( 'hounslow_intranet_entry_navigation' ) ) :
 	/**
 	 * Outputs the content for the in entry navigation - the link to the site section.
 	 */
 	function hounslow_intranet_entry_navigation() {

     $list_of_sections = hounslow_intranet_section_link();
     if ( $list_of_sections ) :
       $output = '<hr><p><i class="fa fa-tag"></i> Part of ' . $list_of_sections . '<hr></p>';
       echo $output;
 		endif;
 	}
 endif;

 if ( ! function_exists( 'hounslow_intranet_entry_oembed' ) ) :
 	/**
 	 * Includes an oembed link with associated content in the entry.
 	 */
 	function hounslow_intranet_entry_oembed() {

    if ( rwmb_get_value( 'lbh_entry_oembed_url' ) ):
      if ( rwmb_get_value( 'lbh_entry_oembed_heading' ) ):
          $heading = '<h2>' . rwmb_get_value( 'lbh_entry_oembed_heading' ) . '</h2>';
      endif;
      if ( rwmb_get_value( 'lbh_entry_oembed_caption' ) ):
          $caption = '<p class="kb-caption">' . rwmb_get_value( 'lbh_entry_oembed_caption' ) . '</p>';
      endif;
      echo '<div id="entry-oembed" class="kb-oembed">' . $heading . rwmb_meta( 'lbh_entry_oembed_url' ) . $caption . '</div>';
    endif;
 	}
 endif;

 if ( ! function_exists( 'hounslow_intranet_entry_related_items' ) ) :
 	/**
 	 * For topics only?.
 	 */
 	function hounslow_intranet_entry_related_items() {
    global $post;

    $args = array(
    	'post_type' => array('item', 'guide', 'training_course' ),
    	'orderby' => 'menu_order post_title',
    	'order'   => 'ASC',
    	'tax_query' => array(
    		array(
    			'taxonomy' => 'item-topic',
    			'field'    => 'slug',
    			'terms'    => $post_slug = $post->post_name,
    		),
    	),
    );

    $relatedItems = new WP_Query( $args );

    if ( $relatedItems->have_posts() ) :
      echo '<div id="entry-related-items" class="entry-related-items"><hr />';
      echo '<h2>Related Items</h2>';
      echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
      while ( $relatedItems->have_posts() ) : $relatedItems->the_post();
        get_template_part( 'template-parts/entry', 'item-card' );
      endwhile;
    	wp_reset_postdata();
    	echo '</div></div>';
    endif;
 	}
 endif;

 if ( ! function_exists( 'hounslow_intranet_entry_related_resources' ) ) :
 	/**
 	 * Displays a list group of related resources.
   *
   * https://getbootstrap.com/docs/5.2/components/list-group/
   *
 	 */
 	function hounslow_intranet_entry_related_resources() {
    global $post;

    $relatedResources = new WP_Query( [
        'relationship' => [
            'id'   => 'topics_to_resources',
            'from' => $post->ID, // You can pass object ID or full object
        ],
        'nopaging'     => true,
    ] );

    if ( $relatedResources->have_posts() ) :
      echo '<div id="entry-related-resources" class="entry-related-items"><hr />';
      echo '<h2>Related Resources</h2>';
      echo '<div class="row"><div class="col"><ol class="list-group list-group-numbered">';
      while ( $relatedResources->have_posts() ) : $relatedResources->the_post();
        get_template_part( 'template-parts/entry', 'resource-list-group-item' );
      endwhile;
      wp_reset_postdata();
      echo '</ol></div></div></div>';
    endif;
 	}
 endif;

 if ( ! function_exists( 'hounslow_intranet_entry_related_contacts' ) ) :
 	/**
 	 *
 	 */
 	function hounslow_intranet_entry_related_contacts() {
    global $post;

    $relatedContacts = new WP_Query( [
        'relationship' => [
            'id'   => 'topics_to_contacts',
            'from' => $post->ID, // You can pass object ID or full object
        ],
        'nopaging'     => true,
    ] );

    if ( $relatedContacts->have_posts() ) :
      echo '<div id="entry-related-contacts" class="entry-related-items"><hr />';
      echo '<h2>Contact</h2>';
      while ( $relatedContacts->have_posts() ) : $relatedContacts->the_post();
        get_template_part( 'template-parts/entry', 'contact-card' );
      endwhile;
      wp_reset_postdata();
      echo '</div>';
    endif;
 	}
 endif;

 if ( ! function_exists( 'hounslow_intranet_excerpt' ) ) :
 	/**
 	 * Prints HTML with a link to the related section page.
 	 */
 	function hounslow_intranet_excerpt() {

 		$post = get_post( $post );
 		if ( empty( $post ) ) {
 			$output = '';
 		} else if ( post_password_required( $post ) ) {
 			$output = 'A password is required to view this post.';
 		} else if ( empty( $post->post_excerpt ) ) {
 			if ( rwmb_get_value( 'lbh_entry_summary' ) ) {
 				$output = rwmb_get_value( 'lbh_entry_summary', '', get_the_ID() );
 			} else {
 				$output = get_the_excerpt();
 			}
 		} else {
 			$output = get_the_excerpt();
 		}

 		echo apply_filters( 'the_excerpt', $output );
 	}
 endif;

 if ( ! function_exists( 'hounslow_intranet_post_type_identifier' ) ) :
 	/**
 	 * Prints HTML with an icon and text to identify the post type.
 	 */
 	function hounslow_intranet_post_type_identifier() {

 		$post_type = get_post_type();
 		$output = '';

 		switch( $post_type )
 		{
 		    case 'post':
 		         $output = '';
 		    break;
 		    case 'page':
 		         $output = '';
 		    break;
 				case 'topic_item':
 		         $output = '';
 		    break;
 				case 'item':
 		         $output = '<i class="fas fa-paperclip"></i> Item';
 		    break;
 				case 'guide':
 		         $output = '<i class="far fa-life-ring"></i> Guide';
 		    break;
 				case 'training_course':
 		         $output = '<i class="fas fa-user-graduate"></i> Training Course';
 		    break;
 				case 'resource':
 						 $output = '<i class="fas fa-file"></i> Resource';
 				break;

 		}

 		echo $output;
 	}
 endif;
