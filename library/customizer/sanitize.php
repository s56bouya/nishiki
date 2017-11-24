<?php

// Text
//wp_filter_nohtml_kses
function nishiki_sanitize_text( $text ) {
	return sanitize_text_field( $text );
}

// Allow HTML
function nishiki_sanitize_footer_copyright( $text ) {
	$allowed_html = array(
		'a' => array( 'href' => array (), 'onclick' => array (), 'target' => array(), ),
		'br' => array(),
		'strong' => array(),
		'b' => array(),
	);
	return wp_kses( $text, $allowed_html );
}

// Checkbox
function nishiki_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

// Sidebar
function nishiki_sanitize_choices( $input ) {
	$valid = array( 'left', 'right', 'bottom', 'none' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'none';
}

// Columns
function nishiki_sanitize_choices_columns( $input ) {
	$valid = array( '1', '2', '3' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return '3';
}

// Fixed Header Color
function nishiki_sanitize_choices_fixed_header_color( $input ) {
	$valid = array( 'light', 'dark' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'light';
}

// Section
function nishiki_sanitize_choices_front_page_section( $input ) {
	$valid = array( 'disabled', 'recently', 'custom' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'disabled';
}

// Text Align
function nishiki_sanitize_choices_front_page_text_align( $input ) {
	$valid = array( 'left', 'center', 'right' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'center';
}

// number
function nishiki_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = ( isset( $setting->manager->get_control( $setting->id )->input_attrs ) ? $setting->manager->get_control( $setting->id )->input_attrs : array() );
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// file uploader
function nishiki_sanitize_image( $image, $setting ) {
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon'
	);
	$file = wp_check_filetype( $image, $mimes );
	return ( $file['ext'] ? $image : $setting->default );
}