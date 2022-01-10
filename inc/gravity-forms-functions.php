<?php

function gf_reported_blog_id() {
  $blog_id = '1';
  if( isset( $_GET['blog_id'] ) ) {
    $blog_id = $_GET['blog_id'];
  }
  return $blog_id;
}

function gf_reported_post_id() {
  $post_id = '';
  if( isset( $_GET['post_id'] ) ) {
    $post_id = $_GET['post_id'];
  }
  return $post_id;
}

function gf_reported_post_author_id() {
  $post_id = gf_reported_post_id();
  switch_to_blog( gf_reported_blog_id() );
  $author_id = get_post_field ('post_author', $post_id);
  restore_current_blog();
  return $author_id;
}

add_filter( 'gform_field_value_gf_reported_post_id', 'gf_reported_post_id_population_function' );
function gf_reported_post_id_population_function( $value ) {
    return gf_reported_post_id();
}

add_filter( 'gform_field_value_gf_reported_post_title', 'gf_reported_post_title_population_function' );
function gf_reported_post_title_population_function( $value ) {
  $output = '';
  if ( !empty( gf_reported_post_id() )) {
    switch_to_blog( gf_reported_blog_id() );
    $output = esc_html( get_the_title( gf_reported_post_id() ) );
    restore_current_blog();
  }
  return $output;
}

add_filter( 'gform_field_value_gf_reported_post_url', 'gf_reported_post_url_population_function' );
function gf_reported_post_url_population_function( $value ) {
  $output = '';
  if ( !empty( gf_reported_post_id() )) {
    switch_to_blog( gf_reported_blog_id() );
    $output = esc_url( get_permalink( gf_reported_post_id() ) );
    restore_current_blog();
  }
  return $output;
}

add_filter( 'gform_field_value_gf_reported_post_owner_name', 'gf_reported_post_owner_name_population_function' );
function gf_reported_post_owner_name_population_function( $value ) {
  $output = '';
  if ( !empty( gf_reported_post_id() )) {
    switch_to_blog( gf_reported_blog_id() );
    $output = esc_html( get_the_author_meta( 'display_name' , gf_reported_post_author_id() ) );
    restore_current_blog();
  }
  return $output;
}

add_filter( 'gform_field_value_gf_reported_post_owner_email', 'gf_reported_post_owner_email_population_function' );
function gf_reported_post_owner_email_population_function( $value ) {
  $output = '';
  if ( !empty( gf_reported_post_id() )) {
    switch_to_blog( gf_reported_blog_id() );
    $output = esc_html( get_the_author_meta( 'user_email' , gf_reported_post_author_id() ) );
    restore_current_blog();
  }
  return $output;
}
