<?php get_header(); ?>
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header>
					<div class="page-header container">
					  <?php do_action( 'nishiki_before_search_title' ); ?>
						<?php the_archive_title( '<h1>', '</h1>' ); ?>
					  <?php do_action( 'nishiki_after_search_title' ); ?>
						<div class="taxonomy-description"><?php esc_html_e( 'Search results for', 'nishiki' ); ?>:<?php echo get_search_query(); ?></span></div>
				</header>
			<?php endif; ?>

			<div class="container">
				<?php do_action( 'nishiki_before_search_content' ); ?>
				<?php get_template_part( 'parts/archive/content' ); ?>
				<?php do_action( 'nishiki_after_search_content' ); ?>
			</div>
		</main>
<?php get_footer();
