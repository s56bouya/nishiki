<?php get_header(); ?>
	<main id="main" class="site-main" role="main">
		<header>
			<div class="mask"></div>
			<div class="page_header container">
			<h1>Page Not Found</h1>
			<span class="taxonomy-description"><?php esc_html_e( "Page Not Found.", 'nishiki' ); ?></span>
			</div>
		</header>
		<div class="container">
			<p><?php esc_html_e( 'It looks like nothing was found at the location. Maybe try a search?', 'nishiki' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</main>
<?php get_footer();
