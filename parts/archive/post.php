<article <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<?php
		if( has_post_thumbnail( get_the_ID() ) || get_theme_mod( 'setting_archive_default_image', '' ) ) {
			$noimage = '';
		} else {
			$noimage = ' noimage';
		}
		?>
			<div class="post-image<?php echo esc_attr( $noimage ); ?>">
			<?php if( $noimage == '' ){ ?>
						<figure>
				<?php if( has_post_thumbnail( get_the_ID() ) ){
					the_post_thumbnail( 'post-thumbnail' );
				} else {
					if( get_theme_mod( 'setting_archive_default_image', '' ) ){
						$image = get_theme_mod( 'setting_archive_default_image' );
						$image_id       = attachment_url_to_postid( $image );
						$image_data     = wp_get_attachment_image_src( $image_id, 'thumbnail' );
						if( $image_data[3] === true ){
							$image_thumbnail = $image_data[0];
							echo '<img src="' . esc_url( $image_thumbnail ) . '" alt="">';
						}
					}
				} ?>
						</figure>
			<?php } else { ?>
						<i class="icomoon icon-image"></i>
			<?php } ?>
			</div>
		<header><?php the_title( '<h1>', '</h1>' ); ?></header>
		<div class="excerpt"><?php echo esc_html( get_the_excerpt() ); ?></div>
	</a>
	<footer>
		<?php
		if( get_theme_mod( 'setting_archive_display_date', true ) ) {
			echo '<span class="date">' . esc_html( get_the_time( get_option( 'date_format' ) ) ) . '</span>';
		}
		if( !is_category() && get_theme_mod( 'setting_archive_display_archive', true ) ){
			$categories = get_the_category();
			$separator = '/';
			$output = '';
			if( $categories ){
				foreach ( $categories as $category ) {
					$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->cat_name ) . '</a>' . $separator;
				}
				$output = trim( $output, $separator );
			}
			echo '<span class="cat"><i class="icomoon icon-folder-open"></i>' . wp_kses_post( $output ) . '</span>';
		}
		if( get_theme_mod( 'setting_archive_display_comment', true ) ){
			$comment_count = wp_count_comments( get_the_ID() );
			$comment_num = $comment_count->approved;
			if( $comment_num !== 0 ){
				echo '<span class="comment"><i class="icomoon icon-bubble"></i>' . absint( $comment_num ) . '</span>';
			}
		}
		if( get_theme_mod( 'setting_archive_display_author', true ) ) {
			echo '<span class="author">' . esc_html( get_the_author() ) . '</span>';
		}
		?>
	</footer>
</article>
