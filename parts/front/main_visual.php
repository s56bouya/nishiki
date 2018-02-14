<?php
if( get_bloginfo( 'description' ) !== '' ){
	$nishiki_video_class = ( nishiki_has_header_video() ) ? ' main-video' : '';
	if( nishiki_has_header_video() ) {
	  $nishiki_video_class = ' main-video';
  } elseif ( is_random_header_image() ){
	  $nishiki_video_class = ' main-random-header-image';
	} else {
	  $nishiki_video_class = ' main-header-image';
	}

	echo '<div class="main-visual' . esc_attr( $nishiki_video_class ) . '">';
	if( has_header_image() or nishiki_has_header_video() ){
		//		var_dump(get_header_video_settings());
	  echo '<div class="custom-header">';
		the_custom_header_markup();
	  echo '</div>';
	} elseif( get_theme_mod( 'setting_top_main_visual_image', get_template_directory_uri() . '/images/carp.jpg' ) !== '' ) {
		$image = esc_url( get_theme_mod( 'setting_top_main_visual_image', get_template_directory_uri() . '/images/carp.jpg' ) );
		echo '<img data-src="' . $image . '">';
	}

	echo '<div class="main-visual-content container">';
	if( get_header_textcolor() !== 'blank' ){
		echo '<p class="description">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
	}
	if( get_theme_mod( 'setting_top_main_visual_sub_text' ) == true ){
		echo '<p class="sub-text">' . esc_html( get_theme_mod( 'setting_top_main_visual_sub_text', __( 'Beautiful WordPress Theme the Nishiki.', 'nishiki' ) ) ) . '</p>';
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
			<p class="main-button">
			<a <?php if ( get_theme_mod( 'setting_top_main_visual_main_button_link_target', false ) == true ) { ?>target="_blank"
			<?php }
			echo 'href="' . esc_url( $main_visual_button_link ) . '">' . esc_html( get_theme_mod( 'setting_top_main_visual_main_button_text', __( 'Get started!', 'nishiki' ) ) ) . '</a></p>';
		}
	}
	echo '</div>';

	echo '</div>';
}
