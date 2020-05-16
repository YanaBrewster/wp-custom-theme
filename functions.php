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
add_theme_support( 'title-tagline' );

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
            'before_title'  => '<h4 class="widget-title px-3 py-3">',
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
            'before_title'  => '<h4 class="widget-title px-3 py-3">',
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

// custom header
function Formative4_custom_header_setup() {
    $defaults = array(
        // Default Header Image to display
        'default-image'         => get_template_directory_uri() . '/images/headers/default.jpg',
        // Display the header text along with the image
        'header-text'           => false,
        // Header text color default
        'default-text-color'        => '000',
        // Header image width (in pixels)
        'width'             => 1000,
        // Header image height (in pixels)
        'height'            => 198,
        // Header image random rotation default
        'random-default'        => false,
        // Enable upload of image file in admin
        'uploads'       => false,
        // function to be called in theme head section
        'wp-head-callback'      => 'wphead_cb',
        //  function to be called in preview page head section
        'admin-head-callback'       => 'adminhead_cb',
        // function to produce preview markup in the admin screen
        'admin-preview-callback'    => 'adminpreview_cb',
        );
}
add_action( 'after_setup_theme', 'Formative4_custom_header_setup' );

$args = array(
    'flex-width'    => true,
    'width'         => 980,
    'flex-height'   => true,
    'height'        => 200,
    'default-image' => get_template_directory_uri() . '/images/headers/default.jpg',
);
add_theme_support( 'custom-header', $args );

// =============================================================================

// customizer controls
function register_controls() {

    /* Themes (controls are loaded via ajax) */

    $this->add_panel(
        new WP_Customize_Themes_Panel(
            $this,
            'themes',
            array(
                'title'       => $this->theme()->display( 'Name' ),
                'description' => (
                '<p>' . __( 'Looking for a theme? You can search or browse the WordPress.org theme directory, install and preview themes, then activate them right here.' ) . '</p>' .
                '<p>' . __( 'While previewing a new theme, you can continue to tailor things like widgets and menus, and explore theme-specific options.' ) . '</p>'
                ),
                'capability'  => 'switch_themes',
                'priority'    => 0,
            )
        )
    );

    $this->add_section(
        new WP_Customize_Themes_Section(
            $this,
            'installed_themes',
            array(
                'title'      => __( 'Installed themes' ),
                'action'     => 'installed',
                'capability' => 'switch_themes',
                'panel'      => 'themes',
                'priority'   => 0,
            )
        )
    );

    if ( ! is_multisite() ) {
        $this->add_section(
            new WP_Customize_Themes_Section(
                $this,
                'wporg_themes',
                array(
                    'title'       => __( 'WordPress.org themes' ),
                    'action'      => 'wporg',
                    'filter_type' => 'remote',
                    'capability'  => 'install_themes',
                    'panel'       => 'themes',
                    'priority'    => 5,
                )
            )
        );
    }

    // Themes Setting (unused - the theme is considerably more fundamental to the Customizer experience).
    $this->add_setting(
        new WP_Customize_Filter_Setting(
            $this,
            'active_theme',
            array(
                'capability' => 'switch_themes',
            )
        )
    );

    /* Site Identity */

    $this->add_section(
        'title_tagline',
        array(
            'title'    => __( 'Site Identity' ),
            'priority' => 20,
        )
    );

    $this->add_setting(
        'blogname',
        array(
            'default'    => get_option( 'blogname' ),
            'type'       => 'option',
            'capability' => 'manage_options',
        )
    );

    $this->add_control(
        'blogname',
        array(
            'label'   => __( 'Site Title' ),
            'section' => 'title_tagline',
        )
    );

    $this->add_setting(
        'blogdescription',
        array(
            'default'    => get_option( 'blogdescription' ),
            'type'       => 'option',
            'capability' => 'manage_options',
        )
    );

    $this->add_control(
        'blogdescription',
        array(
            'label'   => __( 'Tagline' ),
            'section' => 'title_tagline',
        )
    );

    // Add a setting to hide header text if the theme doesn't support custom headers.
    if ( ! current_theme_supports( 'custom-header', 'header-text' ) ) {
        $this->add_setting(
            'header_text',
            array(
                'theme_supports'    => array( 'custom-logo', 'header-text' ),
                'default'           => 1,
                'sanitize_callback' => 'absint',
            )
        );

        $this->add_control(
            'header_text',
            array(
                'label'    => __( 'Display Site Title and Tagline' ),
                'section'  => 'title_tagline',
                'settings' => 'header_text',
                'type'     => 'checkbox',
            )
        );
    }

    $this->add_setting(
        'site_icon',
        array(
            'type'       => 'option',
            'capability' => 'manage_options',
            'transport'  => 'postMessage', // Previewed with JS in the Customizer controls window.
        )
    );

    $this->add_control(
        new WP_Customize_Site_Icon_Control(
            $this,
            'site_icon',
            array(
                'label'       => __( 'Site Icon' ),
                'description' => sprintf(
                    '<p>' . __( 'Site Icons are what you see in browser tabs, bookmark bars, and within the WordPress mobile apps. Upload one here!' ) . '</p>' .
                    /* translators: %s: Site icon size in pixels. */
                    '<p>' . __( 'Site Icons should be square and at least %s pixels.' ) . '</p>',
                    '<strong>512 &times; 512</strong>'
                ),
                'section'     => 'title_tagline',
                'priority'    => 60,
                'height'      => 512,
                'width'       => 512,
            )
        )
    );

    $this->add_setting(
        'custom_logo',
        array(
            'theme_supports' => array( 'custom-logo' ),
            'transport'      => 'postMessage',
        )
    );

    $custom_logo_args = get_theme_support( 'custom-logo' );
    $this->add_control(
        new WP_Customize_Cropped_Image_Control(
            $this,
            'custom_logo',
            array(
                'label'         => __( 'Logo' ),
                'section'       => 'title_tagline',
                'priority'      => 8,
                'height'        => isset( $custom_logo_args[0]['height'] ) ? $custom_logo_args[0]['height'] : null,
                'width'         => isset( $custom_logo_args[0]['width'] ) ? $custom_logo_args[0]['width'] : null,
                'flex_height'   => isset( $custom_logo_args[0]['flex-height'] ) ? $custom_logo_args[0]['flex-height'] : null,
                'flex_width'    => isset( $custom_logo_args[0]['flex-width'] ) ? $custom_logo_args[0]['flex-width'] : null,
                'button_labels' => array(
                    'select'       => __( 'Select logo' ),
                    'change'       => __( 'Change logo' ),
                    'remove'       => __( 'Remove' ),
                    'default'      => __( 'Default' ),
                    'placeholder'  => __( 'No logo selected' ),
                    'frame_title'  => __( 'Select logo' ),
                    'frame_button' => __( 'Choose logo' ),
                ),
            )
        )
    );

    $this->selective_refresh->add_partial(
        'custom_logo',
        array(
            'settings'            => array( 'custom_logo' ),
            'selector'            => '.custom-logo-link',
            'render_callback'     => array( $this, '_render_custom_logo_partial' ),
            'container_inclusive' => true,
        )
    );

    /* Colors */

    $this->add_section(
        'colors',
        array(
            'title'    => __( 'Colors' ),
            'priority' => 40,
        )
    );

    $this->add_setting(
        'header_textcolor',
        array(
            'theme_supports'       => array( 'custom-header', 'header-text' ),
            'default'              => get_theme_support( 'custom-header', 'default-text-color' ),

            'sanitize_callback'    => array( $this, '_sanitize_header_textcolor' ),
            'sanitize_js_callback' => 'maybe_hash_hex_color',
        )
    );

    // Input type: checkbox.
    // With custom value.
    $this->add_control(
        'display_header_text',
        array(
            'settings' => 'header_textcolor',
            'label'    => __( 'Display Site Title and Tagline' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
            'priority' => 40,
        )
    );

    $this->add_control(
        new WP_Customize_Color_Control(
            $this,
            'header_textcolor',
            array(
                'label'   => __( 'Header Text Color' ),
                'section' => 'colors',
            )
        )
    );

    // Input type: color.
    // With sanitize_callback.
    $this->add_setting(
        'background_color',
        array(
            'default'              => get_theme_support( 'custom-background', 'default-color' ),
            'theme_supports'       => 'custom-background',

            'sanitize_callback'    => 'sanitize_hex_color_no_hash',
            'sanitize_js_callback' => 'maybe_hash_hex_color',
        )
    );

    $this->add_control(
        new WP_Customize_Color_Control(
            $this,
            'background_color',
            array(
                'label'   => __( 'Background Color' ),
                'section' => 'colors',
            )
        )
    );

    /* Custom Header */

    if ( current_theme_supports( 'custom-header', 'video' ) ) {
        $title       = __( 'Header Media' );
        $description = '<p>' . __( 'If you add a video, the image will be used as a fallback while the video loads.' ) . '</p>';

        $width  = absint( get_theme_support( 'custom-header', 'width' ) );
        $height = absint( get_theme_support( 'custom-header', 'height' ) );
        if ( $width && $height ) {
            $control_description = sprintf(
                /* translators: 1: .mp4, 2: Header size in pixels. */
                __( 'Upload your video in %1$s format and minimize its file size for best results. Your theme recommends dimensions of %2$s pixels.' ),
                '<code>.mp4</code>',
                sprintf( '<strong>%s &times; %s</strong>', $width, $height )
            );
        } elseif ( $width ) {
            $control_description = sprintf(
                /* translators: 1: .mp4, 2: Header width in pixels. */
                __( 'Upload your video in %1$s format and minimize its file size for best results. Your theme recommends a width of %2$s pixels.' ),
                '<code>.mp4</code>',
                sprintf( '<strong>%s</strong>', $width )
            );
        } else {
            $control_description = sprintf(
                /* translators: 1: .mp4, 2: Header height in pixels. */
                __( 'Upload your video in %1$s format and minimize its file size for best results. Your theme recommends a height of %2$s pixels.' ),
                '<code>.mp4</code>',
                sprintf( '<strong>%s</strong>', $height )
            );
        }
    } else {
        $title               = __( 'Header Image' );
        $description         = '';
        $control_description = '';
    }

    $this->add_section(
        'header_image',
        array(
            'title'          => $title,
            'description'    => $description,
            'theme_supports' => 'custom-header',
            'priority'       => 60,
        )
    );

    $this->add_setting(
        'header_video',
        array(
            'theme_supports'    => array( 'custom-header', 'video' ),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint',
            'validate_callback' => array( $this, '_validate_header_video' ),
        )
    );

    $this->add_setting(
        'external_header_video',
        array(
            'theme_supports'    => array( 'custom-header', 'video' ),
            'transport'         => 'postMessage',
            'sanitize_callback' => array( $this, '_sanitize_external_header_video' ),
            'validate_callback' => array( $this, '_validate_external_header_video' ),
        )
    );

    $this->add_setting(
        new WP_Customize_Filter_Setting(
            $this,
            'header_image',
            array(
                'default'        => sprintf( get_theme_support( 'custom-header', 'default-image' ), get_template_directory_uri(), get_stylesheet_directory_uri() ),
                'theme_supports' => 'custom-header',
            )
        )
    );

    $this->add_setting(
        new WP_Customize_Header_Image_Setting(
            $this,
            'header_image_data',
            array(
                'theme_supports' => 'custom-header',
            )
        )
    );

    /*
     * Switch image settings to postMessage when video support is enabled since
     * it entails that the_custom_header_markup() will be used, and thus selective
     * refresh can be utilized.
     */
    if ( current_theme_supports( 'custom-header', 'video' ) ) {
        $this->get_setting( 'header_image' )->transport      = 'postMessage';
        $this->get_setting( 'header_image_data' )->transport = 'postMessage';
    }

    $this->add_control(
        new WP_Customize_Media_Control(
            $this,
            'header_video',
            array(
                'theme_supports'  => array( 'custom-header', 'video' ),
                'label'           => __( 'Header Video' ),
                'description'     => $control_description,
                'section'         => 'header_image',
                'mime_type'       => 'video',
                'active_callback' => 'is_header_video_active',
            )
        )
    );

    $this->add_control(
        'external_header_video',
        array(
            'theme_supports'  => array( 'custom-header', 'video' ),
            'type'            => 'url',
            'description'     => __( 'Or, enter a YouTube URL:' ),
            'section'         => 'header_image',
            'active_callback' => 'is_header_video_active',
        )
    );

    $this->add_control( new WP_Customize_Header_Image_Control( $this ) );

    $this->selective_refresh->add_partial(
        'custom_header',
        array(
            'selector'            => '#wp-custom-header',
            'render_callback'     => 'the_custom_header_markup',
            'settings'            => array( 'header_video', 'external_header_video', 'header_image' ), // The image is used as a video fallback here.
            'container_inclusive' => true,
        )
    );

    /* Custom Background */

    $this->add_section(
        'background_image',
        array(
            'title'          => __( 'Background Image' ),
            'theme_supports' => 'custom-background',
            'priority'       => 80,
        )
    );

    $this->add_setting(
        'background_image',
        array(
            'default'           => get_theme_support( 'custom-background', 'default-image' ),
            'theme_supports'    => 'custom-background',
            'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
        )
    );

    $this->add_setting(
        new WP_Customize_Background_Image_Setting(
            $this,
            'background_image_thumb',
            array(
                'theme_supports'    => 'custom-background',
                'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
            )
        )
    );

    $this->add_control( new WP_Customize_Background_Image_Control( $this ) );

    $this->add_setting(
        'background_preset',
        array(
            'default'           => get_theme_support( 'custom-background', 'default-preset' ),
            'theme_supports'    => 'custom-background',
            'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
        )
    );

    $this->add_control(
        'background_preset',
        array(
            'label'   => _x( 'Preset', 'Background Preset' ),
            'section' => 'background_image',
            'type'    => 'select',
            'choices' => array(
                'default' => _x( 'Default', 'Default Preset' ),
                'fill'    => __( 'Fill Screen' ),
                'fit'     => __( 'Fit to Screen' ),
                'repeat'  => _x( 'Repeat', 'Repeat Image' ),
                'custom'  => _x( 'Custom', 'Custom Preset' ),
            ),
        )
    );

    $this->add_setting(
        'background_position_x',
        array(
            'default'           => get_theme_support( 'custom-background', 'default-position-x' ),
            'theme_supports'    => 'custom-background',
            'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
        )
    );

    $this->add_setting(
        'background_position_y',
        array(
            'default'           => get_theme_support( 'custom-background', 'default-position-y' ),
            'theme_supports'    => 'custom-background',
            'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
        )
    );

    $this->add_control(
        new WP_Customize_Background_Position_Control(
            $this,
            'background_position',
            array(
                'label'    => __( 'Image Position' ),
                'section'  => 'background_image',
                'settings' => array(
                    'x' => 'background_position_x',
                    'y' => 'background_position_y',
                ),
            )
        )
    );

    $this->add_setting(
        'background_size',
        array(
            'default'           => get_theme_support( 'custom-background', 'default-size' ),
            'theme_supports'    => 'custom-background',
            'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
        )
    );

    $this->add_control(
        'background_size',
        array(
            'label'   => __( 'Image Size' ),
            'section' => 'background_image',
            'type'    => 'select',
            'choices' => array(
                'auto'    => _x( 'Original', 'Original Size' ),
                'contain' => __( 'Fit to Screen' ),
                'cover'   => __( 'Fill Screen' ),
            ),
        )
    );

    $this->add_setting(
        'background_repeat',
        array(
            'default'           => get_theme_support( 'custom-background', 'default-repeat' ),
            'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
            'theme_supports'    => 'custom-background',
        )
    );

    $this->add_control(
        'background_repeat',
        array(
            'label'   => __( 'Repeat Background Image' ),
            'section' => 'background_image',
            'type'    => 'checkbox',
        )
    );

    $this->add_setting(
        'background_attachment',
        array(
            'default'           => get_theme_support( 'custom-background', 'default-attachment' ),
            'sanitize_callback' => array( $this, '_sanitize_background_setting' ),
            'theme_supports'    => 'custom-background',
        )
    );

    $this->add_control(
        'background_attachment',
        array(
            'label'   => __( 'Scroll with Page' ),
            'section' => 'background_image',
            'type'    => 'checkbox',
        )
    );

    // If the theme is using the default background callback, we can update
    // the background CSS using postMessage.
    if ( get_theme_support( 'custom-background', 'wp-head-callback' ) === '_custom_background_cb' ) {
        foreach ( array( 'color', 'image', 'preset', 'position_x', 'position_y', 'size', 'repeat', 'attachment' ) as $prop ) {
            $this->get_setting( 'background_' . $prop )->transport = 'postMessage';
        }
    }

    /*
     * Static Front Page
     * See also https://core.trac.wordpress.org/ticket/19627 which introduces the static-front-page theme_support.
     * The following replicates behavior from options-reading.php.
     */

    $this->add_section(
        'static_front_page',
        array(
            'title'           => __( 'Homepage Settings' ),
            'priority'        => 120,
            'description'     => __( 'You can choose what&#8217;s displayed on the homepage of your site. It can be posts in reverse chronological order (classic blog), or a fixed/static page. To set a static homepage, you first need to create two Pages. One will become the homepage, and the other will be where your posts are displayed.' ),
            'active_callback' => array( $this, 'has_published_pages' ),
        )
    );

    $this->add_setting(
        'show_on_front',
        array(
            'default'    => get_option( 'show_on_front' ),
            'capability' => 'manage_options',
            'type'       => 'option',
        )
    );

    $this->add_control(
        'show_on_front',
        array(
            'label'   => __( 'Your homepage displays' ),
            'section' => 'static_front_page',
            'type'    => 'radio',
            'choices' => array(
                'posts' => __( 'Your latest posts' ),
                'page'  => __( 'A static page' ),
            ),
        )
    );

    $this->add_setting(
        'page_on_front',
        array(
            'type'       => 'option',
            'capability' => 'manage_options',
        )
    );

    $this->add_control(
        'page_on_front',
        array(
            'label'          => __( 'Homepage' ),
            'section'        => 'static_front_page',
            'type'           => 'dropdown-pages',
            'allow_addition' => true,
        )
    );

    $this->add_setting(
        'page_for_posts',
        array(
            'type'       => 'option',
            'capability' => 'manage_options',
        )
    );

    $this->add_control(
        'page_for_posts',
        array(
            'label'          => __( 'Posts page' ),
            'section'        => 'static_front_page',
            'type'           => 'dropdown-pages',
            'allow_addition' => true,
        )
    );

    /* Custom CSS */
    $section_description  = '<p>';
    $section_description .= __( 'Add your own CSS code here to customize the appearance and layout of your site.' );
    $section_description .= sprintf(
        ' <a href="%1$s" class="external-link" target="_blank">%2$s<span class="screen-reader-text"> %3$s</span></a>',
        esc_url( __( 'https://codex.wordpress.org/CSS' ) ),
        __( 'Learn more about CSS' ),
        /* translators: Accessibility text. */
        __( '(opens in a new tab)' )
    );
    $section_description .= '</p>';

    $section_description .= '<p id="editor-keyboard-trap-help-1">' . __( 'When using a keyboard to navigate:' ) . '</p>';
    $section_description .= '<ul>';
    $section_description .= '<li id="editor-keyboard-trap-help-2">' . __( 'In the editing area, the Tab key enters a tab character.' ) . '</li>';
    $section_description .= '<li id="editor-keyboard-trap-help-3">' . __( 'To move away from this area, press the Esc key followed by the Tab key.' ) . '</li>';
    $section_description .= '<li id="editor-keyboard-trap-help-4">' . __( 'Screen reader users: when in forms mode, you may need to press the Esc key twice.' ) . '</li>';
    $section_description .= '</ul>';

    if ( 'false' !== wp_get_current_user()->syntax_highlighting ) {
        $section_description .= '<p>';
        $section_description .= sprintf(
            /* translators: 1: Link to user profile, 2: Additional link attributes, 3: Accessibility text. */
            __( 'The edit field automatically highlights code syntax. You can disable this in your <a href="%1$s" %2$s>user profile%3$s</a> to work in plain text mode.' ),
            esc_url( get_edit_profile_url() ),
            'class="external-link" target="_blank"',
            sprintf(
                '<span class="screen-reader-text"> %s</span>',
                /* translators: Accessibility text. */
                __( '(opens in a new tab)' )
            )
        );
        $section_description .= '</p>';
    }

    $section_description .= '<p class="section-description-buttons">';
    $section_description .= '<button type="button" class="button-link section-description-close">' . __( 'Close' ) . '</button>';
    $section_description .= '</p>';

    $this->add_section(
        'custom_css',
        array(
            'title'              => __( 'Additional CSS' ),
            'priority'           => 200,
            'description_hidden' => true,
            'description'        => $section_description,
        )
    );

    $custom_css_setting = new WP_Customize_Custom_CSS_Setting(
        $this,
        sprintf( 'custom_css[%s]', get_stylesheet() ),
        array(
            'capability' => 'edit_css',
            'default'    => '',
        )
    );
    $this->add_setting( $custom_css_setting );

    $this->add_control(
        new WP_Customize_Code_Editor_Control(
            $this,
            'custom_css',
            array(
                'label'       => __( 'CSS code' ),
                'section'     => 'custom_css',
                'settings'    => array( 'default' => $custom_css_setting->id ),
                'code_type'   => 'text/css',
                'input_attrs' => array(
                    'aria-describedby' => 'editor-keyboard-trap-help-1 editor-keyboard-trap-help-2 editor-keyboard-trap-help-3 editor-keyboard-trap-help-4',
                ),
            )
        )
    );
}
