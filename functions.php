<?php

// Adding styles and scripts
function jlstore_add_theme_scripts() {
    // Include styles
    wp_enqueue_style( 'jl-style', get_stylesheet_uri() );

    // Include scripts
    wp_enqueue_script( 'jl-script', get_theme_file_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0', true);

    // Include comments
    if ( is_singular() ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'jlstore_add_theme_scripts' );


// setup
function jlstore_setup() {
    // Add site title support (and remove hard coded <title> tag from header)
    add_theme_support( 'title-tag' );

    // Add custom background color
    add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );

    // Include post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add default posts and comments RSS feed links to <head>
    add_theme_support( 'automatic-feed-links' );

    // Add translations for theme
    load_theme_textdomain( 'jlstore', get_template_directory() . '/languages' );

    // Allow partial refreshes of widgets in a theme’s sidebars
    add_theme_support( 'customize-selective-refresh-widgets' );

    if ( ! isset( $content_width ) ) $content_width = 1920;

}
add_action( 'after_setup_theme', 'jlstore_setup' );


// Adding scripts for customizer preview
function jlstore_add_theme_scripts_preview() {
    wp_enqueue_script( 'jlstore_customizer', get_theme_file_uri() . '/assets/js/customizer.js', array(), 1.0, true);
}
add_action( 'customize_preview_init', 'jlstore_add_theme_scripts_preview' );


// Include menus
function jlstore_register_my_menus() {
    register_nav_menus(
        array(
        'header-menu' => __( 'Header Menu', 'jlstore' ),
        )
    );
}
add_action( 'init', 'jlstore_register_my_menus' );


// Include logo
function jlstore_set_custom_logo() {
    $defaults = array(
    'height'      => 100,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
    // 'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'jlstore_set_custom_logo' );


// Include custom style editor (TinyMCE visual editor)
function jlstore_add_editor_styles() {
    add_editor_style( 'inc/css/editor-style.css' );
}
add_action( 'admin_init', 'jlstore_add_editor_styles' );


// Include custom header
function jlstore_set_custom_header() {
    $header_info = array(
        'width'         => 1920,
        'height'        => 700,
        'flex-width'    => true,
        'flex-height'   => true,
        'default-image' => get_template_directory_uri() . '/assets/images/winter.jpg',
        // Display the header text along with the image
        'header-text'   => true,
        // Header text color default
        'default-text-color' => 'ffffff',
    );
    add_theme_support( 'custom-header', $header_info );

    // register header(s)
    $header_images = array(
        'winter' => array(
            'url'           => get_theme_file_uri() . '/inc/images/winter.jpg',
            'thumbnail_url' => get_theme_file_uri() . '/inc/images/winter.jpg',
            'description'   => 'Header image',
        ),
    );
    register_default_headers( $header_images );
}
add_action( 'after_setup_theme', 'jlstore_set_custom_header' );


// Include custom sections in customizer - all the sections, settings, and controls will be added here
function jlstore_customize_register( $wp_customize ) {
    // Adding settings - front page
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
        'default'   => '#EF9F8F',
        'transport' => 'refresh',                       
        'type'      => 'theme_mod',                     
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'top_bar_font_color' , array(
        'default'   => '#FFFFFF',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',
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

    $wp_customize->add_setting( 'menu_background_color' , array(
        'default'   => '#A8C5FF',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'menu_font_color' , array(
        'default'   => '#1e73be',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => 'sanitize_hex_color',     // selective refresh is set for menu_font_color setting (in customizer.js), so it needs to sanitize data used by script
    ) );

    


    // Adding panel
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

    $wp_customize->add_section( 'colors' , array(
        'title'      => __( 'Colors', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 10,
    ) );

    $wp_customize->add_section( 'background_image' , array(
        'title'      => __( 'Background image', 'jlstore' ),
        'panel' => 'appearance',
        'priority'   => 20,
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

    // Adding controls - main site
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
        'settings'   => 'display_top_bar_mobile',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_font_color', array(
        'label'      => __( 'Font color', 'jlstore' ),
        'section'    => 'header_top_bar',
        'settings'   => 'display_top_bar_mobile',
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

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background_color', array(
        'label'      => __( 'Primary color', 'jlstore' ),
        'section'    => 'colors',
        'settings'   => 'menu_background_color',
        // 'type'       => ''                       // do not set type for color picker
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_font_color', array(
        'label'      => __( 'Menu font color', 'jlstore' ),
        'section'    => 'colors',
        'settings'   => 'menu_font_color',
        // 'type'       => ''                       // do not set type for color picker
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
        'label'      => __( 'Secondary color', 'jlstore' ),
        'section'    => 'colors',
        'settings'   => 'link_hover_color',
        // 'type'       => ''                       // do not set type for color picker
    ) ) );

    

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


// Register sidebars
function jlstore_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Left Sidebar', 'jlstore' ),
        'id'            => 'sidebar-left',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Right Sidebar', 'jlstore' ),
        'id'            => 'sidebar-right',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'jlstore_widgets_init' );


// Pass PHP variables to CSS and add custom styles
function jlstore_set_css_variables() {
    $colors = get_field( 'theme_colors', 'option' );
    ?>
        <style>
            :root {
                --display_top_bar_mobile: <?php echo get_theme_mod( 'display_top_bar_mobile', true ) ? "block" : 'none' ?>;
                --display_top_bar_desktop: <?php echo get_theme_mod( 'display_top_bar_desktop', true ) ? "block" : 'none' ?>;
                --menu_hover_background_color: "#FFFFFF";
            }
            .top-bar {
                background-color: <?php echo get_theme_mod( 'top_bar_background_color', '#EF9F8F' ) ?>;
                color: <?php echo get_theme_mod( 'top_bar_font_color', '#FFFFFF' ) ?>;
            }
            .menu-container {
                background-color: <?php echo get_theme_mod( 'top_bar_background_color', '#EF9F8F' ) ?>;
                color: <?php echo get_theme_mod( 'top_bar_font_color', '#FFFFFF' ) ?>;
            }
            .sub-menu, .menu-item {
                background-color: <?php echo get_theme_mod( 'top_bar_background_color', '#EF9F8F' ) ?>;
                color: <?php echo get_theme_mod( 'top_bar_font_color', '#FFFFFF' ) ?>;
            }
        </style>
    <?php
}
add_action('wp_head', 'jlstore_set_css_variables');
