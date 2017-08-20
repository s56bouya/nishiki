<?php
// Trimming Thumbnail
set_post_thumbnail_size( get_option( 'thumbnail_size_w' ), get_option( 'thumbnail_size_h' ), array( 'center', 'top') );

// Trimming Medium
add_image_size( 'medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), array( 'center', 'top' ) );

// Insert Image Html Template
//add_filter('image_send_to_editor', 'nishiki_custom_html_template', 1, 8);
function nishiki_custom_html_template( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
	if( current_theme_supports( 'html5' )  && ! $caption )
		$html = sprintf( '<figure>%s</figure>', $html );

	return $html;
}

// Insert Image Html Template
add_filter( 'image_send_to_editor', 'nishiki_custom_insert_image', 10, 9 );
function nishiki_custom_insert_image( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
	$src  = wp_get_attachment_image_src( $id, $size, false );
	$html = '<figure id="post-' . $id . ' media-' . $id . '" class="align-' . $align . '">';
	if ( $url ) {
		$html .= '<a href="' . $url . '" class="image-link"><img src="' . $src[0] . '" alt="' . $alt . '" /></a>';
	} else {
		$html .= '<img src="' . $src[0] . '" alt="' . $alt . '" />';
	}
	if ( $caption ) {
		$html .= '<figcaption>' . $caption . '</figcaption>';
	}
	$html .= '</figure>';
	return $html;
}
