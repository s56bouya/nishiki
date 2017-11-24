<?php
if( get_bloginfo( 'description' ) !== '' ){
	$nishiki_video_class = ( has_header_video() ) ? ' main_video' : '';
	if( has_header_image() ){
		$image = get_header_image();
	} elseif( get_theme_mod( 'setting_top_main_visual_image', get_template_directory_uri() . '/images/carp.jpg' ) !== '' ) {
		$image = esc_url( get_theme_mod( 'setting_top_main_visual_image', get_template_directory_uri() . '/images/carp.jpg' ) );
	}

	$style = ' style="background-image:url(' . $image . ');"';
	echo '<div class="main_visual' . esc_attr( $nishiki_video_class ) . '"' . wp_kses_post( $style ) . '><div class="mask bg_dotted"></div>';
	echo '<div class="main_visual_content container">';
	if( get_header_textcolor() !== 'blank' ){
		echo '<p class="description">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
	}
	if( get_theme_mod( 'setting_top_main_visual_sub_text', __( 'Beautiful WordPress Theme the Nishiki.', 'nishiki' ) ) ){
		echo '<p class="sub_text">' . esc_html( get_theme_mod( 'setting_top_main_visual_sub_text', __( 'Beautiful WordPress Theme the Nishiki.', 'nishiki' ) ) ) . '</p>';
	}
	if( get_theme_mod( 'setting_top_main_visual_main_button_text', __( 'Get started!', 'nishiki' ) ) ){
		if( get_theme_mod( 'setting_top_main_visual_main_button_link', false ) === false ){
			$main_visual_button_display = false;
			if( current_user_can( 'edit_theme_options' ) ){
				$main_visual_button_display = true;
				$main_visual_button_link = get_admin_url( '', '/customize.php?return=/wp-admin/options-general.php', '' );
			} else {
				$main_visual_button_link = get_theme_mod( 'setting_top_main_visual_main_button_link', false );
			}
		} else {
			$main_visual_button_display = true;
			$main_visual_button_link = get_theme_mod( 'setting_top_main_visual_main_button_link', false );
		}
		if( $main_visual_button_display === true ) {
			?>
			<p class="main_button">
			<a <?php if ( get_theme_mod( 'setting_top_main_visual_main_button_link_target', false ) == true ) { ?>target="_blank"
			<?php }
			echo 'href="' . esc_url( $main_visual_button_link ) . '">' . esc_html( get_theme_mod( 'setting_top_main_visual_main_button_text', __( 'Get started!', 'nishiki' ) ) ) . '</a></p>';
		}
	}
	echo '</div>';
	if( has_header_video() ){
//		var_dump(get_header_video_settings());
		echo '<div class="custom_header">';
		the_custom_header_markup();
		echo '</div>';
	}
	echo '</div>';
}
