<form role="search" class="wp-block-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="wp-block-search__inside-wrapper">
		<input class="wp-block-search__input" type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter a term to search.', 'nishiki' ); ?>" required>
		<button class="wp-block-search__button" type="submit" id="searchsubmit"><?php esc_html_e( 'Search', 'nishiki' ); ?></button>
	</div>
</form>
