<?php get_header(); ?>
	<main id="main" class="site-main" role="main">
		<header>
			<div class="page-header container">
			  <?php do_action( 'nishiki_before_404_title' ); ?>
				<h1><?php esc_html_e( 'Page Not Found', 'nishiki' ); ?></h1>
			  <?php do_action( 'nishiki_after_404_title' ); ?>
				<span class="taxonomy-description"><?php esc_html_e( 'Page Not Found.', 'nishiki' ); ?></span>
			</div>
		</header>
		<div class="container">
			<?php do_action( 'nishiki_before_404_content' ); ?>
			<p><?php esc_html_e( 'It looks like nothing was found at the location. Maybe try a search?', 'nishiki' ); ?></p>
			<?php get_search_form(); ?>
			<?php do_action( 'nishiki_after_404_content' ); ?>
		</div>
	</main>
<?php get_footer();
