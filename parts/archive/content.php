<div class="archives">
	<?php	if( is_front_page() && get_theme_mod( 'setting_top_recently_article_main_text', __( 'Recent Articles', 'nishiki' ) ) ) { ?>
			<div class="title">
				<h1><?php echo esc_html( get_theme_mod( 'setting_top_recently_article_main_text', __( 'Recent Articles', 'nishiki' ) ) ); ?></h1>
				<?php
				if( get_theme_mod( 'setting_top_recently_article_sub_text', __( 'Sub Text', 'nishiki' ) ) ){
					echo '<span class="sub_text">' . esc_html( get_theme_mod( 'setting_top_recently_article_sub_text', __( 'Sub Text', 'nishiki' ) ) ) . '</span>';
				}
				?>
			</div>
	<?php } ?>
	<?php
		$columns = ' column_' . intval( get_theme_mod( 'setting_archive_article_columns', '3' ) );
	?>
	<div class="articles<?php echo $columns; ?>">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'parts/archive/post' );
			endwhile;
		endif;
		?>
	</div>
	<?php
	the_posts_pagination( array(
		'prev_text' => '<i class="material-icons">navigate_before</i><span class="screen-reader-text">' . __( 'Previous page', 'nishiki' ) . '</span>',
		'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'nishiki' ) . '</span><i class="material-icons">navigate_next</i>',
		'before_page_number' => '',
	) );
	?>
</div>
