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
    add_theme_support( 'custom-background', array( 'default-color' => '#FFFFFF' ) );

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
        'default-image' => get_template_directory_uri() . '/assets/images/header-image.jpg',
        // Display the header text along with the image
        'header-text'   => true,
        'default-text-color' => 'ffffff',
    );
    add_theme_support( 'custom-header', $header_info );

    // register header(s)
    $header_images = array(
        'winter' => array(
            'url'           => get_theme_file_uri() . '/assets/images/header-image.jpg',
            'thumbnail_url' => get_theme_file_uri() . '/assets/images/header-image-thumbnail.jpg',
            'description'   => 'Header image',
        ),
    );
    register_default_headers( $header_images );
}
add_action( 'after_setup_theme', 'jlstore_set_custom_header' );


require_once( 'inc/customize.php' );


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


function jlstore_get_sidebar_position() {
    $sidebar_position = 'none';
    if ( is_single() ) {
        $sidebar_position = get_theme_mod( 'sidebar_position_single_post', 'right' );
    }
    if ( is_page() ) {
        $sidebar_position = get_theme_mod( 'sidebar_position_single_page', 'right' );
    }
    if ( is_archive() ) {
        $sidebar_position = get_theme_mod( 'sidebar_position_archives', 'right' );
    }
    if ( is_home() ) {
        $sidebar_position = get_theme_mod( 'sidebar_position_home', 'right' );
    }
    if ( function_exists( 'is_shop') ) {
        $sidebar_position = get_theme_mod( 'sidebar_position_shop', 'right' );
    }
    return $sidebar_position;
}


// Pass PHP variables to CSS and add custom styles
function jlstore_set_css_variables() {
    ?>
        <style>
            :root {
                --bgcolor: <?php echo get_background_color() ?>;
                --display_top_bar_mobile: <?php echo get_theme_mod( 'display_top_bar_mobile', true ) ? "block" : 'none' ?>;
                --display_top_bar_desktop: <?php echo get_theme_mod( 'display_top_bar_desktop', true ) ? "block" : 'none' ?>;
                --top_bar_bgcolor: <?php echo get_theme_mod( 'top_bar_background_color', '#C3A990' ) ?>;
                --top_bar_font_color: <?php echo get_theme_mod( 'top_bar_font_color', '#FFFFFF' ) ?>;
                --header_bgcolor: <?php echo get_theme_mod( 'header_background_color', '#F8F3F0' ) ?>;
                --menu_bgcolor: <?php echo get_theme_mod( 'menu_background_color', '#C3A990' ) ?>;
                --menu_font_color: <?php echo get_theme_mod( 'menu_font_color', '#FFFFFF' ) ?>;
                --menu_hover_bgcolor: <?php echo get_theme_mod( 'menu_hover_color', '#D5C2AA' ) ?>;
                --theme_primary_color: <?php echo get_theme_mod( 'primary_color', '#C3A990' ) ?>;
                --theme_secondary_color: <?php echo get_theme_mod( 'secondary_color', '#F8F3F0' ) ?>;
                --header_image_url: url(<?php echo esc_url(get_custom_header()->url) ?>);
            }

            .header-image {
                background-image: url(<?php echo esc_url(get_custom_header()->thumbnail_url) ?>);
                
            }
            @media only screen and (min-width: 500px) {
                .header-image {
                    background-image: url(<?php echo esc_url(get_custom_header()->url) ?>);
                }
            }
        </style>
    <?php
}
add_action('wp_head', 'jlstore_set_css_variables');

function display_decorations($class) {
    $display_decorations = get_theme_mod( 'display_decorations', true );
    if ( $display_decorations ) {
        return $class;
    } else {
        return null;
    }
}