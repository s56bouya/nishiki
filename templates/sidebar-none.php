<?php
/**
 * Template Name: No Sidebar
 * Template Post Type: post, page
 *
 * @package Nishiki
 */

get_template_part( 'parts/header/meta' );
get_template_part( 'parts/header/content-sidebar-none' ); ?>
		<main id="main" role="main" <?php post_class(); ?>>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'parts/singular/content', get_post_format() );
			endwhile;
			?>
		</main>
<?php get_footer();
