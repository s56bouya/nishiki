<?php
	$section_count = NISHIKI_SECTION_NUM;
	for( $i = 1; $i <= $section_count; ++$i ){
		if( get_theme_mod( 'setting_front_page_section' . $i, 'disabled' ) !== 'disabled' ){
			$image = get_theme_mod( 'setting_front_page_image' . $i, get_template_directory_uri() . '/images/sky.jpg' );
			do_action( 'nishiki_before_front_page_section' . $i . '_content' );
			?>
			<section id="front-page-section<?php echo absint( $i ); ?>" class="front-page-section">
				<?php if ( $image ) { ?>
					<img data-src="<?php echo $image; ?>">
				<?php } ?>
				<div class="container">
					<?php
					if( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ){
						echo '<p class="main-text">' . esc_html( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ) . '</p>';
					}
					if( get_theme_mod( 'setting_front_page_sub_text' . $i, __( 'Sub Text', 'nishiki' ) ) ){
					echo '<p class="sub-text">' . esc_html( get_theme_mod( 'setting_front_page_sub_text' . $i, __( 'Sub Text', 'nishiki' ) ) ) . '</p>';
					}
					if( get_theme_mod( 'setting_front_page_button_text' . $i, __( 'Button Text', 'nishiki' ) ) ){
						?>
						<p class="main-button"><a <?php if( get_theme_mod( 'setting_front_page_button_link_target' . $i, false ) == true ){ ?>target="_blank"
						<?php }
						echo ' href="' . esc_url( get_theme_mod( 'setting_front_page_button_link' . $i, '#' ) ) . '">' . esc_html( get_theme_mod( 'setting_front_page_button_text' . $i,  __( 'Button Text', 'nishiki' ) ) ) . '</a></p>';
					}
?>
				</div>
			</section>
<?php
			do_action( 'nishiki_after_front_page_section' . $i . '_content' );
		}
	}
?>
