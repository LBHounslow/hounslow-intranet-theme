<?php
/**
 * "Featured" layout for Display Posts Shortcode
 *
 * @package Hounslow_Intranet
**/

echo '<article id="post-<?php the_ID(); ?>" class="' . esc_attr( join( ' ', get_post_class( ) ) ) . '">';
echo '<div class="row"><div class="col">';
echo '<div class="mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . hounslow_intranet_news_thumbnail( $post ) . '</a></div>';
echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a></h2>';
echo get_the_excerpt();
echo '</div></div><hr /></article>';
