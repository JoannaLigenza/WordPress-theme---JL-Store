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

    //----- Header

    $wp_customize->add_setting( 'display_header_image_home' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'display_header_image_single_post' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'display_header_image_single_page' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'display_header_image_archives' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'display_header_image_shop' , array(
        'default'   => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'header_image_text' , array(
        'default'   => "Your Sample Text",
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'display_header_searchbox' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'display_header_icon_1' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'display_header_icon_2' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'display_header_icon_3' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'contact_icon_link' , array(
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
        'sanitize_js_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'menu_hover_color' , array(
        'default'   => '#D5C2AA',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',
    ) );

    //----- General

    $wp_customize->add_setting( 'primary_color' , array(
        'default'   => '#F8F3F0',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'secondary_color' , array(
        'default'   => '#F9E4E1',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'display_decorations' , array(
        'default'   => true,
        'transport' => 'refresh',
        'type'      => 'theme_mod', 
        'sanitize_callback' => 'jlstore_sanitize_checkbox',
    ) );

    //----- Sidebar

    $wp_customize->add_setting( 'sidebar_position_home' , array(
        'default'   => 'right',
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_radio',
    ) );

    $wp_customize->add_setting( 'sidebar_position_single_post' , array(
        'default'   => 'right',
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_radio',
    ) );

    $wp_customize->add_setting( 'sidebar_position_single_page' , array(
        'default'   => 'right',
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_radio',
    ) );

    $wp_customize->add_setting( 'sidebar_position_archives' , array(
        'default'   => 'right',
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_radio',
    ) );

    $wp_customize->add_setting( 'sidebar_position_shop' , array(
        'default'   => 'right',
        'transport' => 'refresh',
        'sanitize_callback' => 'jlstore_sanitize_radio',
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
        'priority'   => 10,
    ) );

    $wp_customize->add_section( 'header_top_bar' , array(
        'title'      => __( 'Header Top Bar', 'jlstore' ),
        'panel' => 'header',
        'priority'   => 20,
    ) );

    $wp_customize->add_section( 'header_icons' , array(
        'title'      => __( 'Header Content', 'jlstore' ),
        'panel' => 'header',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'header_menu' , array(
        'title'      => __( 'Header Menu Layout', 'jlstore' ),
        'panel' => 'header',
        'priority'   => 40,
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

    $wp_customize->add_section( 'sidebar' , array(
        'title'      => __( 'Sidebar', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 40,
    ) );

    // $wp_customize->add_section( 'footer' , array(
    //     'title'      => __( 'Footer', 'jlstore' ),
    //     'panel' => 'appearance',
    //     'priority'   => 70,
    // ) );

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

    //----- Header

    $wp_customize->add_control( 'display_header_image_home', array(
        'label'      => __( 'Display Header Image On Home Page', 'jlstore' ),
        'section'    => 'header_image',
        'settings'   => 'display_header_image_home',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'display_header_image_single_post', array(
        'label'      => __( 'Display Header Image On Single Post', 'jlstore' ),
        'section'    => 'header_image',
        'settings'   => 'display_header_image_single_post',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'display_header_image_single_page', array(
        'label'      => __( 'Display Header Image On Single Page', 'jlstore' ),
        'section'    => 'header_image',
        'settings'   => 'display_header_image_single_page',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'display_header_image_archives', array(
        'label'      => __( 'Display Header Image On Archive Page', 'jlstore' ),
        'section'    => 'header_image',
        'settings'   => 'display_header_image_archives',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'display_header_image_shop', array(
        'label'      => __( 'Display Header Image On Shop Page', 'jlstore' ),
        'section'    => 'header_image',
        'settings'   => 'display_header_image_shop',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'header_image_text', array(
        'label'      => __( 'Header Image Text', 'jlstore' ),
        'section'    => 'header_image',
        'settings'   => 'header_image_text',
        'type'       => 'text'
    ) );

    $wp_customize->add_control( 'display_header_searchbox', array(
        'label'      => __( 'Display Searchbox', 'jlstore' ),
        'section'    => 'header_icons',
        'settings'   => 'display_header_searchbox',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'display_header_icon_1', array(
        'label'      => __( 'Display Contact Icon', 'jlstore' ),
        'section'    => 'header_icons',
        'settings'   => 'display_header_icon_1',
        'type'       => 'checkbox'
    ) );

    if ( function_exists( 'is_woocommerce()' ) ) :

    $wp_customize->add_control( 'display_header_icon_2', array(
        'label'      => __( 'Display Account Icon', 'jlstore' ),
        'section'    => 'header_icons',
        'settings'   => 'display_header_icon_2',
        'type'       => 'checkbox'
    ) );

    $wp_customize->add_control( 'display_header_icon_3', array(
        'label'      => __( 'Display Cart Icon', 'jlstore' ),
        'section'    => 'header_icons',
        'settings'   => 'display_header_icon_3',
        'type'       => 'checkbox'
    ) );

    endif;

    $wp_customize->add_control( 'contact_icon_link', array(
        'label'      => __( 'Contact Icon - Link', 'jlstore' ),
        'section'    => 'header_icons',
        'settings'   => 'contact_icon_link',
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

    //----- Sidebar

    $wp_customize->add_control( 'sidebar_position_home', array(
        'label'      => __( 'Display Sidebar On Home page', 'jlstore' ),
        'section'    => 'sidebar',
        'settings'   => 'sidebar_position_home',
        'type'       => 'radio',
        'choices'    => array(
            'left'  => 'Left side',
            'right' => 'Right Side',
            'none'  => 'None',
        ),
    ) );

    $wp_customize->add_control( 'sidebar_position_single_post', array(
        'label'      => __( 'Display Sidebar On Single Post', 'jlstore' ),
        'section'    => 'sidebar',
        'settings'   => 'sidebar_position_single_post',
        'type'       => 'radio',
        'choices'    => array(
            'left'  => 'Left side',
            'right' => 'Right Side',
            'none'  => 'None',
        ),
    ) );

    $wp_customize->add_control( 'sidebar_position_single_page', array(
        'label'      => __( 'Display Sidebar On Single Page', 'jlstore' ),
        'section'    => 'sidebar',
        'settings'   => 'sidebar_position_single_page',
        'type'       => 'radio',
        'choices'    => array(
            'left'  => 'Left side',
            'right' => 'Right Side',
            'none'  => 'None',
        ),
    ) );
    
    $wp_customize->add_control( 'sidebar_position_archives', array(
        'label'      => __( 'Display Sidebar On Archives Pages', 'jlstore' ),
        'section'    => 'sidebar',
        'settings'   => 'sidebar_position_archives',
        'type'       => 'radio',
        'choices'    => array(
            'left'  => 'Left side',
            'right' => 'Right Side',
            'none'  => 'None',
        ),
    ) );

    $wp_customize->add_control( 'sidebar_position_shop', array(
        'label'      => __( 'Display Sidebar On Shop Pages', 'jlstore' ),
        'section'    => 'sidebar',
        'settings'   => 'sidebar_position_shop',
        'type'       => 'radio',
        'choices'    => array(
            'left'  => 'Left side',
            'right' => 'Right Side',
            'none'  => 'None',
        ),
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

