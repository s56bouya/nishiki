<?php
$nishiki_main_visual_class = '';
$image_large = '';
if ( nishiki_has_header_video() ) {
	$nishiki_main_visual_class = ' main-video';
} elseif ( has_header_image() ) {
	if( is_random_header_image() ){
	  $nishiki_main_visual_class = ' main-random-header-image';
	} else {
	  $nishiki_main_visual_class = ' main-custom-header-image';
	}
}

if ( get_theme_mod( 'setting_top_main_visual_image' ) && ! has_header_image() ) {
	$nishiki_main_visual_class .= ' main-header-image';
	$image = esc_url( get_theme_mod('setting_top_main_visual_image') );
	$image_large = ' data-src="' . $image . '"';
} else {
	$image = '';
	$image_large = '';
}

echo '<div class="main-visual' . esc_attr( $nishiki_main_visual_class ) . '"' . $image_large .'>';
if( has_header_image() or nishiki_has_header_video() or is_random_header_image() ){
	//		var_dump(get_header_video_settings());
	echo '<div class="custom-header">';
	if( ! nishiki_has_header_video() && get_theme_mod( 'setting_top_main_visual_image_placeholder_display' ) ){
	  $custom_header_image_id = get_custom_header()->attachment_id;
	  if( $custom_header_image_id ){
		  $custom_header_image_data = wp_get_attachment_image_src( $custom_header_image_id, 'nishiki-thumbnail' );
		  if( $custom_header_image_data[3] === true ){
			  $custom_header_image_thumbnail = esc_url( $custom_header_image_data[0] );
			  echo '<img class="img-placeholder" src="' . $custom_header_image_thumbnail . '" alt="">';
		  }
	  }
  }
	the_custom_header_markup();
	echo '</div>';
} elseif( $image ) {
	$image_id       = attachment_url_to_postid( $image );
	$image_data     = wp_get_attachment_image_src( $image_id, 'nishiki-thumbnail' );
	if( $image_data[3] === true && get_theme_mod( 'setting_top_main_visual_image_placeholder_display' ) ){
	  $image_thumbnail = esc_url( $image_data[0] );
	  echo '<img class="img-placeholder" src="' . $image_thumbnail . '" alt="">';
	} else {
	  echo '<img src="' . $image . '" alt="">';
	}
} else {
	echo '<img class="imgloaded" src="' . get_template_directory_uri() . '/images/carp.jpg' . '" alt="">';
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
