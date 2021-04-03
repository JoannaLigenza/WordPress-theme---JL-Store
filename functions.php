<?php

// Adding styles and scripts
function jlstore_add_theme_scripts() {
    // Include styles
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // Include scripts
    wp_enqueue_script( 'script', get_theme_file_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0', true);

    // Include comments
    if ( is_singular() ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'jlstore_add_theme_scripts' );


