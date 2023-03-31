<?php get_header(); ?>
	<main id="main" class="site-main front-page" role="main">
		<?php get_template_part('parts/front/main-visual'); ?>
		<?php if( get_theme_mod( 'setting_front_page_home_content_display', false ) === true ){ ?>
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<div class="container">
						<div class="entry-content">
							<div class="entry">
					<?php the_content(); ?>
							</div>
						</div>
					</div>
					<?php
				endwhile;
			endif;
			?>
		<?php } ?>
		<?php get_template_part('parts/front/section'); ?>
	</main>
<?php get_footer();
