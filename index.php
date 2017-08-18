<?php
get_header();
get_template_part('parts/front/main_visual'); ?>
	<main id="main" class="site-main" role="main">
		<?php
		if( get_theme_mod( 'setting_top_recently_article_display', true ) ){
			if( have_posts() ){
				?>
				<div class="container">
					<?php get_template_part( 'parts/archive/content' ); ?>
				</div>
			<?php } } ?>
	</main>
<?php get_footer();
