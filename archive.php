<?php get_header(); ?>
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header>
					<div class="mask"></div>
					<div class="page_header container">
						<?php if ( is_post_type_archive() ) { ?>
							<h1><?php post_type_archive_title(); ?></h1>
							<?php
						} else {
							the_archive_title( '<h1>', '</h1>' );
						}
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</div>
				</header>
			<?php endif; ?>

			<div class="container">
				<?php get_template_part( 'parts/archive/content' ); ?>
			</div>
		</main>
<?php get_footer();
