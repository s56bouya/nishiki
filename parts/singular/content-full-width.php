<?php
$nishiki_header_class = '';
if( has_post_thumbnail() ){
	if( ( is_single() && get_theme_mod( 'setting_post_eye_catch', false ) == true ) or ( is_page() && get_theme_mod( 'setting_page_eye_catch', false ) == true ) ){
		if( get_the_post_thumbnail_url( get_the_ID(), 'full' ) )
			$nishiki_header_class = ' style="background-image:url(' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) . ');"';
	}
}
?>
<?php do_action( 'nishiki_before_singular_header' ); ?>
<header<?php echo wp_kses_post( $nishiki_header_class ); ?> class="<?php echo esc_attr( get_post_type() ); ?>">
	<div class="page-header container">
		<?php do_action( 'nishiki_before_singular_title' ); ?>
		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php do_action( 'nishiki_after_singular_title' ); ?>
		<?php if( is_single() && !is_attachment() ){ ?>
		<div class="date">
			<time datetime="<?php echo esc_attr( get_the_time('Y-m-d') ); ?>"><?php esc_html_e( 'published', 'nishiki' ); ?>:<?php the_time( get_option( 'date_format' ) ) ?></time>
			<?php if( get_the_time('Y-m-d') < get_the_modified_time('Y-m-d') ){ ?>
				<time datetime="<?php echo esc_attr( get_the_modified_time('c') ); ?>"><?php esc_html_e( 'updated', 'nishiki' ); ?>:<?php the_modified_date( get_option( 'date_format' ) ) ?></time>
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
				echo '<span class="cat"><i class="icomoon icon-folder-open"></i>' . wp_kses_post( $output ) . '</span>';
			}
			if( get_theme_mod( 'setting_post_display_tag', true ) && get_the_tags() ){
				echo '<span class="tag">';
				the_tags( '<i class="icomoon icon-price-tag"></i>','/' );
				echo '</span>';
			}
			if( get_theme_mod( 'setting_post_display_comment', true ) ){
				$comment_count = wp_count_comments( get_the_ID() );
				$comment_num = $comment_count->approved;
				if( $comment_num !== 0 ){
					echo '<span class="comment"><a href="#comments"><i class="icomoon icon-bubble"></i>' . absint( $comment_num ) . '</a></span>';
				}
			}
		}
		?>
	</div>
</header>
<?php do_action( 'nishiki_after_singular_header' ); ?>
<div class="container-full-width">
	<article class="entry">
		<?php do_action( 'nishiki_before_singular_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages('before=<div class="pagination">&after=</div>&link_before=<span>&link_after=</span>'); ?>
		</div>
		<?php do_action( 'nishiki_after_singular_content' ); ?>
			<footer>
			<?php if( is_single() && get_theme_mod( 'setting_post_author_display', true ) ){ ?>
						<div class="author-info">
				<?php
				if ( get_theme_mod( 'setting_post_author_text',
					__( 'Author', 'nishiki' ) )
				) {
					echo '<span>'
						. esc_html( get_theme_mod( 'setting_post_author_text',
						__( 'Author', 'nishiki' ) ) ) . '</span>';
				}
				?>
				<div class="author_image">
					<?php echo get_avatar( 
						get_the_author_meta( 'ID' ),
						90,
						array( 'extra_attr' => 'data' )
					); ?></div>
				<p class="display-name">
				<?php
				$author_display_name = get_the_author_meta( 'display_name' );
				if ( get_theme_mod( 'setting_post_author_name_archive_link',
					true )
				) {
					echo '<a href="'
						. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
						. '">' . esc_html( $author_display_name ) . '</a>';
				} else {
					echo esc_html( $author_display_name );
				}
				?>
				</p>
				<?php do_action( 'nishiki_before_single_author_description' ); ?>
							<p class="description"><?php the_author_meta( 'description' ); ?></p>
				<?php do_action( 'nishiki_after_single_author_description' ); ?>
						</div>
				<?php
			}
			?>
			</footer>
		<?php edit_post_link( __('Edit This Page', 'nishiki'), '<p id="edit-link">', '</p>'); ?>
	</article>
</div>
