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
        
    
    
