<div class="search-box">
	<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="search-inner">
			<div class="input">
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter a term to search.', 'nishiki' ); ?>">
			</div>
			<div class="submit">
				<button type="submit" id="searchsubmit"><?php esc_html_e( 'Search', 'nishiki' ); ?></button>
			</div>
		</div>
	</form>
</div>
