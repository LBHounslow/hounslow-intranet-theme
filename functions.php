<?php
/**
 * Hounslow Intranet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hounslow_Intranet
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.0' );
}

if ( ! function_exists( 'hounslow_intranet_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hounslow_intranet_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Hounslow Intranet, use a find and replace
		 * to change 'hounslow-intranet' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hounslow-intranet', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for Excerpts on pages.
		 *
		 */
		add_post_type_support( 'page', 'excerpt' );

		if ( is_main_site() ) {
			register_nav_menus(
				array(
					'network' => esc_html__( 'Network Navigation', 'hounslow-intranet' ),
					'popular' => esc_html__( 'Popular Links', 'hounslow-intranet' ),
					'support' => esc_html__( 'Support Links', 'hounslow-intranet' ),
					'external' => esc_html__( 'External Links', 'hounslow-intranet' ),
					'utility' => esc_html__( 'Utility Navigation', 'hounslow-intranet' ),
					'social' => esc_html__( 'Social Media', 'hounslow-intranet' ),
				)
			);
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'hounslow_intranet_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'hounslow_intranet_setup' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hounslow_intranet_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hounslow_intranet_content_width', 640 );
}
add_action( 'after_setup_theme', 'hounslow_intranet_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hounslow_intranet_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Post Sidebar', 'hounslow-intranet' ),
			'id'            => 'sidebar-post',
			'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'hounslow-intranet' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Homepage Sidebar', 'hounslow-intranet' ),
			'id' 						=> 'sidebar-homepage',
			'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	if ( is_main_site() ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Network Homepage Sidebar', 'hounslow-intranet' ),
				'id'            => 'sidebar-network',
				'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column One', 'hounslow-intranet' ),
				'id'            => 'sidebar-fc1',
				'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column Two', 'hounslow-intranet' ),
				'id'            => 'sidebar-fc2',
				'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column Three', 'hounslow-intranet' ),
				'id'            => 'sidebar-fc3',
				'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Column Four', 'hounslow-intranet' ),
				'id'            => 'sidebar-fc4',
				'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'BuddyPress Sidebar', 'hounslow-intranet' ),
				'id'            => 'sidebar-buddypress',
				'description'   => esc_html__( 'Add widgets here.', 'hounslow-intranet' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

}
add_action( 'widgets_init', 'hounslow_intranet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hounslow_intranet_scripts() {

	wp_enqueue_style( 'hounslow-intranet-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700', false );

	wp_enqueue_style( 'hounslow-intranet-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'hounslow-intranet-style', 'rtl', 'replace' );
	wp_enqueue_script( 'bootstrap-test-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap-test-vendor-scripts', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap-test-custom-scripts', get_template_directory_uri() . '/assets/js/custom.min.js', array('customize-preview'), '20151215', true );
	wp_enqueue_script( 'hounslow-intranet-fontawesome', 'https://kit.fontawesome.com/b97fd955b7.js');
	wp_script_add_data( 'hounslow-intranet-fontawesome', 'crossorigin' , 'anonymous' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hounslow_intranet_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * SEO functions.
 */
require get_template_directory() . '/inc/seo-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('after_setup_theme', 'hounslow_remove_admin_bar');

function hounslow_remove_admin_bar() {
	if (!current_user_can('edit_posts') && !is_admin()) {
	  show_admin_bar(false);
	}
}



/** add logo support */

add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );

    add_theme_support( 'custom-logo', $defaults );
}


/** Change excerpt length*/


add_filter( 'excerpt_length', function($length) {
    return 30;
} );

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/** show template for admin */

function show_template() {
  global $template;
  global $current_user;
  get_currentuserinfo();
  if ($current_user->user_level == 10 ) print_r($template);
}

/** include CPT tags in archive */

function post_type_tags_fix($request) {
    if ( isset($request['tag']) && !isset($request['post_type']) )
    $request['post_type'] = 'any';
    return $request;
}
add_filter('request', 'post_type_tags_fix');

/** Enqueue wp-indlude jquery */

function datepicker_fix() {

wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery' ) );
wp_enqueue_script( 'jquery-ui-sortable', array( 'jquery' ) );

}

add_action( 'wp_enqueue_scripts', 'datepicker_fix' );


/** add secondary image to topic pages */

function second_image_meta_boxes( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'   => esc_html__( 'Untitled Field Group', 'online-generator' ),
        'id'      => 'second_image',
        'post_types' => 'page',
        'context' => 'normal',
        'fields'  => [
            [
                'type' => 'image_advanced',
                'name' => esc_html__( 'second image', 'online-generator' ),
                'id'   => $prefix . 'second_image',
            ],
        ],
    ];

    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'second_image_meta_boxes' );

/** add video topic oembed does not work nicely with if/else so this is a temp workaround  */

add_filter( 'rwmb_meta_boxes', 'video_meta_boxes' );

function video_meta_boxes( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'   => esc_html__( 'Youtube ID', 'online-generator' ),
        'id'      => 'youtube_video',
        'post_types' => array ( 'post', 'news_cpt', 'dal_cpt', 'hdi_cpt', 'wt_cpt', 'haw_cpt', 'nth_cpt', 'gi_cpt', 'wow_cpt' ),
        'context' => 'normal',
        'fields'  => [

            [
                'type' => 'text',
                'name' => esc_html__( 'delete the first part of the URL "https://youtu.be/"', 'online-generator' ),
                'id'   => $prefix . 'lbh_draft_video',
            ],


        ],
    ];

    return $meta_boxes;
}
