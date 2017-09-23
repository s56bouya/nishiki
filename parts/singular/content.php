<?php
$nishiki_header_class = '';
if( has_post_thumbnail() ){
	if( ( is_page() || is_single() ) && get_theme_mod( 'setting_post_eye_catch', false ) ){
		if( get_the_post_thumbnail_url( get_the_ID(), 'full' ) )
			$nishiki_header_class = ' style="background-image:url(' . esc_url_raw( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) . ');"';
	}
}
?>
<header<?php echo $nishiki_header_class; ?> class="<?php echo esc_attr( get_post_type() ); ?>">
	<div class="mask"></div>
	<div class="page_header container">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php if( is_single() && !is_attachment() ){ ?>
		<div class="date">
			<time datetime="<?php echo esc_attr( get_the_time('Y-m-d') ); ?>"><?php esc_html_e( 'published', 'nishiki' ); ?>:<?php the_time( get_option( 'date_format' ) ) ?></time>
			<?php if( get_the_time('Y-m-d') < get_the_modified_time('Y-m-d') ){ ?>
				<time datetime="<?php echo esc_attr( get_the_modified_time('c') ); ?>"><?php esc_html_e( 'edited', 'nishiki' ); ?>:<?php the_modified_date( get_option( 'date_format' ) ) ?></time>
			<?php } ?>
		</div>
		<?php
			if( get_theme_mod( 'setting_post_display_category', true ) ){
				$categories = get_the_category();
				$separator = '/';
				$output = '';
				if( $categories ){
					foreach ( $categories as $category ) {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . $category->cat_name . '</a>' . $separator;
					}
					$output = trim( $output, $separator );
				}
				echo '<span class="cat"><i class="material-icons">folder</i>' . $output . '</span>';
			}
			if( get_theme_mod( 'setting_post_display_tag', true ) && get_the_tags() ){
				echo '<span class="tag">' . the_tags( '<i class="material-icons">local_offer</i>','/' ) . '</span>';
			}
			if( get_theme_mod( 'setting_post_display_comment', true ) ){
				$comment_count = wp_count_comments( get_the_ID() );
				$comment_num = $comment_count->approved;
				if( $comment_num !== 0 ){
					echo '<span class="comment"><a href="./#comments"><i class="material-icons">comment</i>' . intval( $comment_num ) . '</a></span>';
				}
			}
		}
		?>
	</div>
</header>
<div class="container column">
	<article>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages('before=<div class="pagination">&after=</div>&link_before=<span>&link_after=</span>'); ?>
		</div>
			<footer>
				<?php if( is_single() ){ ?>

				<div class="author_info">
					<?php
					if( get_theme_mod( 'setting_footer_author_text', __( 'Author', 'nishiki' ) ) ){
						echo '<span>' . esc_html( get_theme_mod( 'setting_footer_author_text', __( 'Author', 'nishiki' ) ) ) . '</span>';
					}
					?>
					<div class="author_image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 90, array( 'extra_attr' => 'data') ); ?></div>
					<p><a href="<?php echo esc_url_raw( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author_meta('display_name') ); ?></a></p>
					<p class="description"><?php the_author_meta( 'description' ); ?></p>
				</div>
				<?php
				}
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				if( is_single() ) {
					if ( get_theme_mod( 'setting_post_display_prev_next_link', true ) ) {
						the_post_navigation( array(
								'prev_text' => '<i class="material-icons">navigate_before</i><span>' . "%title" . '</span>',
								'next_text' => '<span>' . "%title" . '</span>' . '<i class="material-icons">navigate_next</i>'
							)
						);
					}
				}
				?>
			</footer>
		<?php edit_post_link( __('Edit This Page', 'nishiki'), '<p id="edit_link">', '</p>'); ?>
	</article>

	<?php
	if( ( is_single() && get_theme_mod( 'setting_post_column', 'none' ) !== 'none' ) or ( is_page() && get_theme_mod( 'setting_page_column', 'none' ) !== 'none' ) ){
		get_sidebar();
	}
	$column_array = array( get_theme_mod( 'setting_post_column', 'none' ), get_theme_mod( 'setting_page_column', 'none' ) );
	?>
</div>
