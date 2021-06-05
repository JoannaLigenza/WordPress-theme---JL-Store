<div class="content-wrapper wrapper--small">
    <?php if ( jlstore_get_sidebar_position() === 'left' ) : ?>
    <aside class="column column-left">
        <?php dynamic_sidebar( 'sidebar-left' ); ?>
    </aside>
    <?php endif; ?>

    <main class="main main-home">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                echo "bzbz <br>";
            endwhile;
        endif; ?>
    </main>

    <?php if ( jlstore_get_sidebar_position() === 'right' ) : ?>
    <aside class="column column-right">
        <?php dynamic_sidebar( 'sidebar-right' ); ?>
    </aside>
    <?php endif; ?>
</div>