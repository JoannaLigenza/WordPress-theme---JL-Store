<?php
$this_post_id = $post->ID;
$post_link = get_permalink( $this_post_id );
$author_id = get_the_author_meta('ID');
$author_image = get_avatar_url( $author_id );
$author_url = get_author_posts_url( $author_id );
$author_name = get_the_author_meta( 'nickname', $author_id );
$thumbnail_id = get_post_thumbnail_id( $this_post_id );
$img_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

<article class="article article--archive">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="archive-image-wrapper">
            <div class="archive-image-wrapper__col"></div>
            <div class="archive-image-wrapper__col"></div>
            <a href="<?php echo esc_url( $post_link ); ?>" rel="nofollow">
                <?php the_post_thumbnail( 'full', array('alt' => $img_alt, 'class' => "archive-image ". jlstore_display_decorations( 'archive-image--decorations' ) ) ); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="archive-image-wrapper archive-image-wrapper--empty">
            <div class="archive-image-wrapper__col"></div>
            <div class="archive-image-wrapper__col"></div>
            <a href="<?php echo esc_url( $post_link ); ?>" rel="nofollow">
                <div class="archive-image <?php echo jlstore_display_decorations( 'archive-image--decorations' ) ?>"></div>
            </a>
        </div>
    <?php endif; ?>
        <div class="archive-content-wrapper">
            <div class="archive-content">
                <div class="post-above-title-wrapper">
                    <div class="post-categories">
                        Kategoria
                    </div>
                    <div class="post-comments">
                        Comments: 0
                    </div>
                </div>
                <a href="<?php echo esc_url( $post_link ); ?>">
                    <h2 class="post-title">
                        <?php echo esc_html( get_the_title( $this_post_id ) ); ?>
                    </h2>
                </a>
                <div class="post-meta">
                    <?php esc_html_e('Posted on: ', 'jlstore'); ?>
                    <a href="<?php echo esc_url( get_home_url()."/".$post_date_month) ?>">
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                    </a>
                    <?php esc_html_e( 'by', 'jlstore' ); ?>
                    <a href="<?php echo esc_url( get_author_posts_url($author_id) ) ?>">
                        <?php echo esc_html( get_the_author(), 'jlstore' ); ?>
                    </a>
                </div>
                <div class="post-excerpt">
                    <p class="post-excerpt__text"><?php echo wp_kses_post( get_the_excerpt( $this_post_id ) ); ?></p>
                </div>
                <div class="post-read-more <?php echo jlstore_display_decorations( 'post-read-more--decorations' ) ?>">
                    <a href="<?php echo esc_url( $post_link ); ?>" rel="nofollow"><?php esc_html_e( 'Read more', 'jlstore' ); ?></a>
                </div>
            </div>
        </div>
</article>
