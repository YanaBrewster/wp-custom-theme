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


// load scripts
function load_js(){
  wp_enqueue_script('jquery');
  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
  wp_enqueue_script('bootstrap');
}

// hook
add_action('wp_enqueue_scripts', 'load_js');

// theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support( 'custom-logo' );

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

// Menus
register_nav_menus(
  array(
    'top-menu' => 'Top Menu Location',
    'mobile-menu' => 'Mobile Menu Location',
    'footer-menu' => 'Footer Menu Location',
  )


);

//Custom image size
add_image_size('blog-large', 800, 400, false);
add_image_size('blog-small', 300, 200, true);

// Register sidebars
function my_sidebars(){
  register_sidebar(
    array(
      'name' => 'Page Sidebar',
      'id' => 'page-sidebar',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>'
    )
  );

  register_sidebar(
    array(
      'name' => 'Blog Sidebar',
      'id' => 'blog-sidebar',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>'
    )
  );
}

add_action('widgets_init', 'my_sidebars');


// Custom post type
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


// Taxanomy
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
