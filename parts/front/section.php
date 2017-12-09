<?php
	$section_count = NISHIKI_SECTION_NUM;
	for( $i = 1; $i <= $section_count; ++$i ){
		if( get_theme_mod( 'setting_front_page_section' . $i, 'disabled' ) !== 'disabled' ){
			$style = get_theme_mod( 'setting_front_page_image' . $i, false ) ? ' style="background-image:url(' . esc_url( get_theme_mod( 'setting_front_page_image' . $i, false ) ) . ');"' : '';
			do_action( 'nishiki_before_front_page_section' . $i . '_content' );
			?>
			<section id="front-page-section<?php echo absint( $i ); ?>"<?php echo wp_kses_post( $style ); ?> class="front-page-section">
				<div class="mask"></div>
				<div class="container">
					<?php
					if( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ){
						echo '<p class="main_text">' . esc_html( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ) . '</p>';
					}
					if( get_theme_mod( 'setting_front_page_sub_text' . $i, __( 'Sub Text', 'nishiki' ) ) ){
					echo '<p class="sub_text">' . esc_html( get_theme_mod( 'setting_front_page_sub_text' . $i, __( 'Sub Text', 'nishiki' ) ) ) . '</p>';
					}
					if( get_theme_mod( 'setting_front_page_button_text' . $i, __( 'Button Text', 'nishiki' ) ) ){
						?>
						<p class="main_button"><a <?php if( get_theme_mod( 'setting_front_page_button_link_target' . $i, false ) == true ){ ?>target="_blank"
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
