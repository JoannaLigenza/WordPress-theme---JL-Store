<!DOCTYPE html>
<html <?php echo esc_attr( language_attributes() ); ?>>
<head>
    <meta charset="<?php echo bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description') ?>">
    <!-- Adds scripts in heads -->
    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="main-container">
        <header class="header">
            <div class="top-bar">
                <?php if ( empty( get_theme_mod( 'top_bar_link' ) ) ) {
                    echo esc_html( get_theme_mod( 'top_bar_text', 'Check our promotions' ) );
                } else {
                    echo '<a href="'. esc_url( get_theme_mod( 'top_bar_link' ) ) .'">'.esc_html( get_theme_mod( 'top_bar_text', 'Check our promotions' ) ).'</a>';
                } ?>
            </div>
            <div class="logo-container wrapper">
                <div class="logo-container__col"></div>
                <?php if ( has_custom_logo() ) : ?>
                <div class="logo-container__col">
                    <div class="logo">
                        <?php function_exists( 'the_custom_logo' ) ? the_custom_logo() : null; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="logo-container__col"></div>
            </div>
            <div class="menu-container">
                <nav class="nav-menu nav-menu--header wrapper" aria-labelledby="primary-navigation">
                    <?php 
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'header-menu',
                            'container_class' => 'header-menu',
                            'depth'           => 4,
                            'after'           => '<span class="menu-item-plus">+</span>',
                        )
                    );
                    ?>
                </nav>
            </div>
        </header>
    
    
