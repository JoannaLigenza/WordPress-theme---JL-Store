<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search"  class="search-input" placeholder="<?php _e( 'Szukaj...', 'jlstore' ) ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit">
		<?php if ( true ) : ?>
		<img src="<?php echo esc_url( get_theme_file_uri().'/assets/images/search-icon-white.svg' ) ?>" alt="search-icon">
		<?php else : ?>
		<img src="<?php echo esc_url( get_theme_file_uri().'/assets/images/search-icon-black.svg' ) ?>" alt="search-icon">
		<?php endif; ?>
	</button>
</form>