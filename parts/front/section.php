<?php
do_action( 'nishiki_before_front_page_section_content' );
$section_count = NISHIKI_SECTION_NUM;
$featured_item_count = NISHIKI_FEATURED_ITEM_NUM;
for( $i = 1; $i <= $section_count; ++$i ){
	if( get_theme_mod( 'setting_front_page_section' . $i, 'disabled' ) !== 'disabled' ){
		$image = '';
		$image_output = '';
		if( get_theme_mod( 'setting_front_page_image' . $i, '' ) ){
			$image = get_theme_mod( 'setting_front_page_image' . $i, '' );
			$image_id       = attachment_url_to_postid( $image );
			$image_large = ' data-src="' . $image . '"';
			$image_data     = wp_get_attachment_image_src( $image_id, 'nishiki-thumbnail' );
			if( $image_data[3] === true && get_theme_mod( 'setting_front_page_image_placeholder_display' . $i ) ){
				$image_thumbnail = esc_url( $image_data[0] );
				$image_output = '<img class="img-placeholder" src="' . $image_thumbnail . '" alt="">';
			}
		} else {
			$image_large = '';
		}

		do_action( 'nishiki_before_front_page_section' . $i . '_content' );
		?>
		<section id="front-page-section<?php echo absint( $i ); ?>" class="front-page-section"<?php echo $image_large; ?>>
		<?php
		if ( $image ) {
			echo $image_output;
		}
		?>
			<div class="container">
			<?php
			if( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ){
				echo '<p class="main-text">' . esc_html( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ) . '</p>';
			}
			if( get_theme_mod( 'setting_front_page_sub_text' . $i ) ){
				echo '<p class="sub-text">' . esc_html( get_theme_mod( 'setting_front_page_sub_text' . $i, __( 'Sub Text', 'nishiki' ) ) ) . '</p>';
			}
			if( get_theme_mod( 'setting_front_page_button_text' . $i, __( 'Button Text', 'nishiki' ) ) ){
				?>
							<p class="main-button"><a <?php if( get_theme_mod( 'setting_front_page_button_link_target' . $i, false ) == true ){ ?>target="_blank"
				<?php }
				echo ' href="' . esc_url( get_theme_mod( 'setting_front_page_button_link' . $i, '#' ) ) . '">' . esc_html( get_theme_mod( 'setting_front_page_button_text' . $i,  __( 'Button Text', 'nishiki' ) ) ) . '</a></p>';
			}

			// Featured Item
			if( get_theme_mod( 'setting_front_page_featured_items' . $i, 'disabled' ) !== 'disabled' ) {
				$featured_item_column = get_theme_mod( 'setting_front_page_featured_item_column' . $i, 3 );
				$j = 1;
				echo '<div class="featured-items column-' . absint( $featured_item_column ) . ' featured-items' . $j . '">';
				while ( $j <= NISHIKI_FEATURED_ITEM_NUM ) {
					if( get_theme_mod( 'setting_front_page_featured_item' . $i . '_' . $j, 'disabled' ) !== 'disabled' ){
						echo '<div class="featured-item featured-item' . $j . '">';
						if( get_theme_mod( 'setting_front_page_featured_item_type' . $i . '_' . $j, 'icon' ) === 'icon' ) {
							if( get_theme_mod( 'setting_front_page_featured_item_icon' . $i . '_' . $j ) ){
								echo '<i class="icomoon icon-' . esc_attr( get_theme_mod( 'setting_front_page_featured_item_icon' . $i . '_' . $j ) ) . '"></i>';
							}
						} elseif( get_theme_mod( 'setting_front_page_featured_item_type' . $i . '_' . $j ) === 'image' ){
							$item_image = get_theme_mod( 'setting_front_page_featured_item_image' . $i . '_' . $j );
							$item_image_id       = attachment_url_to_postid( $item_image );
							$item_image_data     = wp_get_attachment_image_src( $item_image_id, 'thumbnail' );
							$item_image_thumbnail = esc_url( $item_image_data[0] );
							$item_image_output = '<img src="' . $item_image_thumbnail . '" alt="">';
							echo $item_image_output;
						}

						if( get_theme_mod( 'setting_front_page_featured_item_title' . $i . '_' . $j ) ){
							echo '<p class="featured-title">' . esc_html( get_theme_mod( 'setting_front_page_featured_item_title' . $i . '_' . $j ) ) . '</p>';
						}

						if( get_theme_mod( 'setting_front_page_featured_item_text' . $i . '_' . $j ) ){
							echo '<p class="featured-text">' . esc_html( get_theme_mod( 'setting_front_page_featured_item_text' . $i . '_' . $j ) ) . '</p>';
						}

						if( get_theme_mod( 'setting_front_page_featured_item_button_text' . $i . '_' . $j ) ){
							$item_target = '';
							if( get_theme_mod( 'setting_front_page_featured_item_button_link_target' . $i . '_' . $j ) ){
								$item_target = ' target="_blank"';
							}
							echo '<p class="featured-button"><a' . esc_attr( $item_target ) . ' href="' . esc_url( get_theme_mod( 'setting_front_page_featured_item_button_link' . $i . '_' . $j ) ) . '">' . esc_html( get_theme_mod( 'setting_front_page_featured_item_button_text' . $i . '_' . $j ) ) . '</a></p>';
						}

						echo '</div>';
					}

					$j++;
				}
				echo '</div>';
			}
			?>
				</div>
			</section>
		<?php
		do_action( 'nishiki_after_front_page_section' . $i . '_content' );
	}
}
do_action( 'nishiki_after_front_page_section_content' );
if ( is_active_sidebar( 'front_widget' ) ) { ?>
	<div id="front-widget" class="front-widget">
		<?php dynamic_sidebar( 'front_widget' ); ?>
	</div>
<?php }
