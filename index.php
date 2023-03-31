<?php get_header(); ?>
	<main id="main" class="site-main" role="main">
		<?php
		// Front Page Setting
		if ( get_option( 'show_on_front' ) !== 'page' ) {
			get_template_part('parts/front/main-visual');
		} else {
			$nishiki_header_class = '';
			$blog_page_id = get_option( 'page_for_posts' );
			if( has_post_thumbnail( $blog_page_id ) ){
				if( ( get_theme_mod( 'setting_page_eye_catch', false ) == true ) ){
					if( get_the_post_thumbnail_url( $blog_page_id, 'full' ) )
						$nishiki_header_class = ' style="background-image:url(' . esc_url( get_the_post_thumbnail_url( $blog_page_id, 'full' ) ) . ');"';
				}
			}
			?>
				<header<?php echo wp_kses_post( $nishiki_header_class ); ?> class="<?php echo esc_attr( get_post_type() ); ?>">
					<div class="page-header container">
						<h1><?php single_post_title(); ?></h1>
					</div>
				</header>
			<?php
		}
		do_action( 'nishiki_before_recentry_article' );
		if( get_theme_mod( 'setting_top_recently_article_display', true ) ){
			if( have_posts() ){
				?>
					<div class="container column">
				<?php get_template_part( 'parts/archive/content' ); ?>
				<?php
				if( ( is_archive() or ! nishiki_is_static_front_page() ) && get_theme_mod( 'setting_archive_column' , 'none' ) !== 'none' ){
					get_sidebar();
				}
				?>
					</div>
				<?php
			}
		}
		do_action( 'nishiki_after_recentry_article' );
		?>
	</main>
<?php get_footer();
