<?php

//Hook1: customize-register to define new Cutomizer panels, settings, controls
function mytheme_customize_register( $wp_customize ) {


   // Background Colour - Works
   $wp_customize->add_setting( 'Formative4_backgroundColour' , array(
       'default'   => '#ffffff',
       'transport' => 'refresh',
   ) );


   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Formative4_backgroundColourControl', array(
   	'label'      => __( 'Background Colour', 'Formative4Theme' ),
    'description' => 'Change the background Colour',
   	'section'    => 'colors',
   	'settings'   => 'Formative4_backgroundColour',
   ) ) );

   // Header and Footer Formative4_backgroundColour // Background Colour - Works
    $wp_customize->add_setting( 'Formative4_headerFooterColour' , array(
        'default'   => '#ffce3b',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Formative4_headerFooterColourControl', array(
    	'label'      => __( 'Header and Footer Colour', 'Formative4Theme' ),
     'description' => 'Change the Header and Footer Colour',
    	'section'    => 'colors',
    	'settings'   => 'Formative4_headerFooterColour',
    ) ) );

// Heading Text Colour - Works
    $wp_customize->add_setting( 'Formative4_headingTextColour', array(
        'default'   => '#ffce3b',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Formative4_headingTextColourControl', array(
      'label'      => __( 'Heading Text Colour', 'Formative4Theme' ),
     'description' => 'Change the Heading Text Colour',
      'section'    => 'colors',
      'settings'   => 'Formative4_headingTextColour',
    ) ) );

    // // Nav Links Color -
    //     $wp_customize->add_setting( 'Formative4_navLinkColour', array(
    //         'default'   => '#ffffff',
    //         'transport' => 'refresh',
    //     ) );
    //
    //     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Formative4_navLinkColourControl', array(
    //       'label'      => __( 'Nav and Footer Link Colour', 'Formative4Theme' ),
    //      'description' => 'Change the Nav and Footer Link Colour',
    //       'section'    => 'colors',
    //       'settings'   => 'Formative4_navLinkColour',
    //     ) ) );

   // Footer Message - Works
   $wp_customize->add_section( 'Formative4_footerSection' , array(
       'title'      => __( 'Footer Text', 'Formative4Theme' ),
       'priority'   => 30,
   ));

   $wp_customize->add_setting( 'Formative4_footerMessage' , array(
       'default'   => 'copyright@2020',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'Formative4_footerMessageControl', array(
     'label'      => __( 'Footer Text', 'Formative4Theme' ),
     'section'    => 'Formative4_footerSection',
     'settings'   => 'Formative4_footerMessage',
   ) ) );

   // Site Title Text - Works
   $wp_customize->add_section( 'Formative4_siteTitleTextSection' , array(
       'title'      => __( 'Site Title Text', 'Formative4Theme' ),
       'priority'   => 30,
   ));

   $wp_customize->add_setting( 'Formative4_siteTitleText' , array(
       'default'   => 'Site Title Text',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'Formative4_siteTitleTextControl', array(
     'label'      => __( 'Site Title Text', 'Formative4Theme' ),
     'section'    => 'Formative4_siteTitleTextSection',
     'settings'   => 'Formative4_siteTitleText',
   ) ) );


   }

 add_action( 'customize_register', 'mytheme_customize_register' );


//Hook2: wp_head to output custom-generated CSS - Works
 function mytheme_customize_css()
 {
   ?>
    <style type="text/css">
    body {
            background-color: <?php echo get_theme_mod('Formative4_backgroundColour','#ffffff'); ?>!important;
         }
   .myTheme{
             background-color: <?php echo get_theme_mod('Formative4_headerFooterColour', '#ffce3b'); ?>!important ;
           }
    .myHeadings{
        color: <?php echo get_theme_mod('Formative4_headingTextColour', '#ffce3b'); ?>!important ;
    }


  </style>
<?php
}
add_action( 'wp_head', 'mytheme_customize_css');
