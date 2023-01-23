<?php
$nishiki_main_visual_class = '';
$image_large = '';
$image = '';

if ( nishiki_has_header_video() ) {
	$nishiki_main_visual_class .= ' main-video';
	if( has_header_image() ){
		$nishiki_main_visual_class .= ' has-header-image';
		$image_large = ' data-src="' . esc_url( get_header_image() ) . '"';
	} elseif( get_theme_mod( 'setting_top_main_visual_image' ) ){
		$nishiki_main_visual_class .= ' has-main-visual';
		$image = esc_url( get_theme_mod('setting_top_main_visual_image') );
		$image_large = ' data-src="' . $image . '"';
	}
} else {
	if( has_header_image() ){
		$nishiki_main_visual_class .= ' has-header-image';
		$image_large = ' data-src="' . esc_url( get_header_image() ) . '"';
	} elseif( get_theme_mod( 'setting_top_main_visual_image' ) ){
		$nishiki_main_visual_class .= ' has-main-visual';
		$image = esc_url( get_theme_mod('setting_top_main_visual_image') );
		$image_large = ' data-src="' . $image . '"';
	} else {
		$nishiki_main_visual_class = ' main-default-header-image';
		$image_large = ' data-src="' . esc_url( get_template_directory_uri() ) . '/images/carp.jpg' . '"';
	}
}

echo '<section id="main-visual" class="main-visual' . esc_attr( $nishiki_main_visual_class ) . '"' . $image_large .'>';
echo '<div class="custom-header">';
if( get_theme_mod( 'setting_top_main_visual_image_placeholder_display' ) ){
	if( has_header_image() ){
		$image_id = get_custom_header()->attachment_id;
	} elseif( get_theme_mod( 'setting_top_main_visual_image' ) ){
		$image_id = attachment_url_to_postid( get_theme_mod( 'setting_top_main_visual_image' ) );
	}
	if( !empty( $image_id ) ){
		$image_data = wp_get_attachment_image_src( $image_id, 'nishiki-thumbnail' );
		if( $image_data[3] === true ){
			$custom_header_image_thumbnail = esc_url( $image_data[0] );
			echo '<img class="img-placeholder" src="' . $custom_header_image_thumbnail . '" alt="">';
		}
	}
}
if( has_custom_header() ){
	the_custom_header_markup();
}
echo '</div>';

echo '<div class="main-visual-content container">';
if( get_bloginfo( 'description' ) && get_header_textcolor() !== 'blank' ){
	echo '<p class="description">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
}
if( get_theme_mod( 'setting_top_main_visual_sub_text' ) == true ){
	$sub_text_align = get_theme_mod( 'setting_top_main_visual_sub_text_align', 'center' );
	echo '<p class="sub-text ' . $sub_text_align .'">' . esc_html( get_theme_mod( 'setting_top_main_visual_sub_text', __( 'Beautiful WordPress Theme the Nishiki.', 'nishiki' ) ) ) . '</p>';
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
echo '</section>';
