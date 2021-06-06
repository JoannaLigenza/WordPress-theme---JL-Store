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
                <?php the_post_thumbnail( 'full', array('alt' => $img_alt, 'class' => "archive-image") ); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="archive-image-wrapper archive-image-wrapper--empty">
            <div class="archive-image-wrapper__col"></div>
            <div class="archive-image-wrapper__col"></div>
            <div class="archive-image"></div>
        </div>
    <?php endif; ?>
        <div class="archive-content-wrapper">
            <div class="archive-content">
                <a href="<?php echo esc_url( $post_link ); ?>">
                    <h2 class="post-title">
                        <?php echo esc_html( get_the_title( $this_post_id ) ); ?>
                    </h2>
                </a>
                <div class="post-meta">
                    <div class="post-meta__element meta-date">
                        <a href="<?php echo esc_url( get_home_url()."/".$post_date_month) ?>">
                            <img src="<?php echo esc_url( get_theme_file_uri().'/assets/images/calendar-icon.svg' ) ?>" alt="calendar-icon" class="post-meta-icon">
                            <span class="meta-caption"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo esc_html_e('Post z dnia: ', 'pimpmylashes') . get_the_date(); ?></time></span>
                        </a>
                    </div>
                    <div class="post-meta__element meta-author">
                        <a href="<?php echo esc_url( get_author_posts_url($author_id) ) ?>">
                            <img src="<?php echo esc_url( get_theme_file_uri().'/assets/images/user-icon.svg' ) ?>" alt="blog-icon" class="post-meta-icon">
                            <span class="meta-caption"><?php echo esc_html( 'Autor: ' . get_the_author(), 'pimpmylashes' ); ?></span>
                        </a>
                    </div>
                </div>
                <div class="post-excerpt">
                    <p class=""><?php echo wp_kses_post( get_the_excerpt( $this_post_id ) ); ?></p>
                </div>
            </div>
        </div>
</article>
