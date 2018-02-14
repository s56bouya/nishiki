<?php get_header(); ?>
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header>
					<div class="page-header container">
					  <?php do_action( 'nishiki_before_archive_title' ); ?>
						<?php if ( is_post_type_archive() ) { ?>
							<h1><?php post_type_archive_title(); ?></h1>
						<?php } else {
							the_archive_title( '<h1>', '</h1>' );
						}
						?>
						<?php do_action( 'nishiki_after_archive_title' ); ?>
						<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
					</div>
				</header>
			<?php endif; ?>

			<div class="container">
				<?php do_action( 'nishiki_before_archive_content' ); ?>
				<?php get_template_part( 'parts/archive/content' ); ?>
				<?php do_action( 'nishiki_after_archive_content' ); ?>
			</div>
		</main>
<?php
get_footer();
