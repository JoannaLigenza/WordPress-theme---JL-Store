<?php

// Include custom sections in customizer - all the sections, settings, and controls will be added here
function jlstore_customize_register( $wp_customize ) {
    /*
    * SETTINGS
    */

    //----- Top Bar
    $wp_customize->add_setting( 'display_top_bar_mobile' , array(
        'default'   => true,
        'transport' => 'refresh',                                   // this will refresh customizer's preview window when changes are made
        'type'      => 'theme_mod',                                 // this is setted for themes, and 'theme_mod' is default setting, so it's optional in themes
        'sanitize_callback' => 'jlstore_sanitize_checkbox',         // this is WordPress sanitization function, to ensure that no unsafe data is stored in the database
    ) );

    $wp_customize->add_setting( 'display_top_bar_desktop' , array(
        'default'   => true,
        'transport' => 'refresh',
        'type'      => 'theme_mod', 
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'top_bar_background_color' , array(
        'default'   => '#C3A990',
        'transport' => 'refresh',                       
        'type'      => 'theme_mod',                     
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'top_bar_font_color' , array(
        'default'   => '#FFFFFF',
        'transport' => 'refresh',
        'type'      => 'theme_mod', 
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'top_bar_text' , array(
        'default'   => 'Check our promotions',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'top_bar_link' , array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    //----- Menu

    $wp_customize->add_setting( 'menu_background_color' , array(
        'default'   => '#C3A990',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',     // selective refresh is set for menu_font_color setting (in customizer.js), so it needs to sanitize data used by script
    ) );

    $wp_customize->add_setting( 'menu_font_color' , array(
        'default'   => '#FFFFFF',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',     // selective refresh is set for menu_font_color setting (in customizer.js), so it needs to sanitize data used by script
    ) );

    $wp_customize->add_setting( 'menu_hover_color' , array(
        'default'   => '#D5C2AA',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',     // selective refresh is set for menu_font_color setting (in customizer.js), so it needs to sanitize data used by script
    ) );

    //----- General

    $wp_customize->add_setting( 'primary_color' , array(
        'default'   => '#F8F3F0',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',     // selective refresh is set for menu_font_color setting (in customizer.js), so it needs to sanitize data used by script
    ) );

    $wp_customize->add_setting( 'secondary_color' , array(
        'default'   => '#F9E4E1',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',     // selective refresh is set for menu_font_color setting (in customizer.js), so it needs to sanitize data used by script
    ) );

    $wp_customize->add_setting( 'display_decorations' , array(
        'default'   => true,
        'transport' => 'refresh',
        'type'      => 'theme_mod', 
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    //-----


    /*
    * PANELS
    */
    $wp_customize->add_panel( 'header', array(
        'title' => __( 'Header', 'jlstore' ),
        'priority' => 40, // Mixed with top-level-section hierarchy.
    ) );

    $wp_customize->add_panel( 'appearance', array(
        'title' => __( 'Appearance Settings', 'jlstore' ),
        // 'description' => $description, // Include html tags such as <p>.
        'priority' => 50,
    ) );

    // Adding sections
    $wp_customize->add_section( 'header_image' , array(
        'title'      => __( 'Header Image', 'jlstore' ),
        'panel' => 'header',
        'priority'   => 50,
    ) );

    $wp_customize->add_section( 'header_top_bar' , array(
        'title'      => __( 'Header Top Bar', 'jlstore' ),
        'panel' => 'header',
        'priority'   => 50,
    ) );

    $wp_customize->add_section( 'header_menu' , array(
        'title'      => __( 'Header Menu Layout', 'jlstore' ),
        'panel' => 'header',
        'priority'   => 50,
    ) );

    $wp_customize->add_section( 'general' , array(
        'title'      => __( 'General Settings', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 10,
    ) );

    $wp_customize->add_section( 'colors' , array(
        'title'      => __( 'Colors', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 20,
    ) );

    $wp_customize->add_section( 'background_image' , array(
        'title'      => __( 'Background image', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'front-page-layout' , array(
        'title'      => __( 'Front Page Layout', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'single-post-layout' , array(
        'title'      => __( 'Single Post Layout', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 40,
    ) );

    $wp_customize->add_section( 'single-page-layout' , array(
        'title'      => __( 'Single Page Layout', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 50,
    ) );

    $wp_customize->add_section( 'archive-layout' , array(
        'title'      => __( 'Archive Layout', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 60,
    ) );

    $wp_customize->add_section( 'footer' , array(
        'title'      => __( 'Footer', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 70,
    ) );

    /*
    * CONTROLS
    */

    //----- Top Bar
    $wp_customize->add_control( 'display_top_bar_mobile', array(
        'label'      => __( 'Display Top Bar on Mobile', 'jlstore' ),
        'section'    => 'header_top_bar',
        'settings'   => 'display_top_bar_mobile',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'display_top_bar_desktop', array(
        'label'      => __( 'Display Top Bar on Desktop', 'jlstore' ),
        'section'    => 'header_top_bar',
        'settings'   => 'display_top_bar_desktop',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_background_color', array(
        'label'      => __( 'Background color', 'jlstore' ),
        'section'    => 'header_top_bar',
        'settings'   => 'top_bar_background_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_font_color', array(
        'label'      => __( 'Font color', 'jlstore' ),
        'section'    => 'header_top_bar',
        'settings'   => 'top_bar_font_color',
    ) ) );

    $wp_customize->add_control( 'top_bar_text', array(
        'label'      => __( 'Top Bar Text', 'jlstore' ),
        'section'    => 'header_top_bar',
        'settings'   => 'top_bar_text',
        'type'       => 'text'
    ) );

    $wp_customize->add_control( 'top_bar_link', array(
        'label'      => __( 'Top Bar link', 'jlstore' ),
        'section'    => 'header_top_bar',
        'settings'   => 'top_bar_link',
        'type'       => 'url'
    ) );

    //----- Menu

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background_color', array(
        'label'      => __( 'Menu background color', 'jlstore' ),
        'section'    => 'header_menu',
        'settings'   => 'menu_background_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_font_color', array(
        'label'      => __( 'Menu font color', 'jlstore' ),
        'section'    => 'header_menu',
        'settings'   => 'menu_font_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_color', array(
        'label'      => __( 'Menu hover color', 'jlstore' ),
        'section'    => 'header_menu',
        'settings'   => 'menu_hover_color',
    ) ) );

    //----- General

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'      => __( 'Primary color', 'jlstore' ),
        'section'    => 'colors',
        'settings'   => 'primary_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
        'label'      => __( 'Secondary color', 'jlstore' ),
        'section'    => 'colors',
        'settings'   => 'secondary_color',
    ) ) );

    $wp_customize->add_control( 'display_decorations', array(
        'label'      => __( 'Display Decorations', 'jlstore' ),
        'section'    => 'general',
        'settings'   => 'display_decorations',
        'type'       => 'checkbox'
    ) );

    

}
add_action( 'customize_register', 'jlstore_customize_register' );


// sanitize callback functions for settings
function jlstore_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function jlstore_sanitize_radio( $input, $setting ) {
    // Ensure input is a slug
    $input = sanitize_key( $input );
    
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

