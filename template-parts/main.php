<div class="content-wrapper wrapper--small">
    <?php if ( jlstore_get_sidebar_position() === 'left' ) : ?>
    <aside class="column column-left <?php echo display_decorations( 'column--decorations' ) ?>">
        <?php dynamic_sidebar( 'sidebar-left' ); ?>
    </aside>
    <?php endif; ?>

    <main class="main main-home">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                if ( is_home() || is_archive() ) {
                    get_template_part('template-parts/pages/archive', 'content');
                } 
                
            endwhile;
        else : ?>
            <p class="no-result"><?php esc_html_e( 'No posts yet', 'jlstore' ); ?></p>
        <?php endif; ?>
        <!-- Post pagination -->
        <div class="archive-pagination">
        <?php the_posts_pagination( array( 'mid_size' => 2 )); ?>
        </div>
    </main>

    <?php if ( jlstore_get_sidebar_position() === 'right' ) : ?>
    <aside class="column column-right <?php echo display_decorations( 'column--decorations' ) ?>">
        <?php dynamic_sidebar( 'sidebar-right' ); ?>
    </aside>
    <?php endif; ?>
</div>
