<?php
get_header(); 
?>
    <div class="main-container home-container flex-columns">
        <div class="home-headers-wrapper">
            <h1 class="home-header h1 wrapper--small <?php echo display_decorations( 'home-header--decorations' ) ?>"><?php echo get_bloginfo( 'name' ); ?></h1>
            <h2 class="home-subheader h5 wrapper--small"><?php echo get_bloginfo( 'description' ); ?></h2>
        </div>
        <?php get_template_part('template-parts/main'); ?>
    </div>
<?php
get_footer();
