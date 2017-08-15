<?php get_header(); ?>
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header>
					<div class="mask"></div>
					<div class="page_header container">
						<?php
						the_archive_title( '<h1>', '</h1>' );
						?>
						<div class="taxonomy-description"><?php esc_html_e( 'Search for', 'nishiki' ); ?>:<?php echo get_search_query(); ?></span></div>
				</header>
			<?php endif; ?>

			<div class="container">
				<?php get_template_part( 'parts/archive/content' ); ?>
			</div>
		</main>
<?php get_footer();
