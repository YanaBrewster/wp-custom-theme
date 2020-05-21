<?php

// load stylesheets
function load_css(){

  //Bootstrap
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
  wp_enqueue_style('bootstrap');

  //our own css at bottom so it's not overwritten
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
  wp_enqueue_style('main');
}

// hook
add_action('wp_enqueue_scripts','load_css');

// =============================================================================

// load scripts
function load_js(){
  wp_enqueue_script('jquery');

  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
  wp_enqueue_script('bootstrap');


  wp_register_script('js', get_template_directory_uri() . '/js/script.js', array('jquery'), false, true);
	wp_enqueue_script('js');
}

// hook
add_action('wp_enqueue_scripts', 'load_js');

// =============================================================================

// theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support( 'custom-logo' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
add_theme_support( 'custom-header' );


// =============================================================================

// nav logo
function Formative4_custom_logo_setup() {
  $defaults = array(
    'height'      => 100,
    'width'       => 100,
    'flex-height' => true,
    'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'Formative4_custom_logo_setup' );

//remove display tagline/title option
function de_register( $wp_customize ) {
    $wp_customize->remove_control('display_header_text');
}
add_action( 'customize_register', 'de_register', 11 );

// =============================================================================

// max-content width

if ( ! isset ( $content_width) )
    $content_width = 800;

// =============================================================================

// menus
register_nav_menus(
  array(
    'top-menu' => 'Top Menu Location',
    'mobile-menu' => 'Mobile Menu Location',
    'footer-menu' => 'Footer Menu Location',
  )
);

/**
 * Register Custom Navigation Walker -
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// =============================================================================

//custom image size
add_image_size('blog-large', 800, 400, false);
add_image_size('blog-medium', 600, 300, false);
add_image_size('blog-small', 300, 200, true);

// =============================================================================

// register sidebars
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {

    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Page Sidebar' ),
            'description'   => __( 'Main sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="myHeadings widget-title px-3 py-3">',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'id'            => 'secondary',
            'name'          => __( 'Blog Sidebar' ),
            'description'   => __( 'Blog sidebar for main archive.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="myHeadings widget-title px-3 py-3">',
            'after_title'   => '</h4>',
        )
    );
}

// =============================================================================

// custom post type
function my_first_post_type(){
  $args = array(
    'labels' => array(
      'name' => 'cats',
      'singular_name' => 'cat',
    ),
    'hierarchical' => true,
    'menu_icon' => 'dashicons-buddicons-activity',
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail','custom-fields'),

  );
  register_post_type('cats',$args);
}
add_action('init','my_first_post_type');

// =============================================================================

// taxanomy
function my_first_taxonomy(){
  $args = array(
    'labels' => array(
      'name' => 'Types',
      'singular_name' => 'Type',
    ),

    'public' => true,
    'hierarchical' => true,

  );
  register_taxonomy('types', array('cats'),$args);

}
add_action('init', 'my_first_taxonomy');

// =============================================================================

//header image

register_default_headers( array(
    'defaultImage' => array(
        'url'           => get_template_directory_uri() . '/images/headers/default.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/images/headers/default.jpg',
        'description'   => __( 'The default image for the custom header.', 'Formative4Theme' )
    )
) );

$customHeaderDefaults = array(
    'width' => 1280,
    'height' => 720,
    'default-image' => get_template_directory_uri() . '/images/headers/default.jpg'
);
add_theme_support('custom-header', $customHeaderDefaults);


// =============================================================================

//customize API
require_once get_template_directory() . '/customizer.php';
