<?php

// Define Extend
get_template_part( 'library/customizer/extend' );

// Init Customizer
add_action( "customize_register", "nishiki_init_customizer" );
function nishiki_init_customizer( $wp_customize ) {
	set_query_var( 'wp_customize', $wp_customize );

	// Sanitize
	get_template_part( 'library/customizer/sanitize' );

	// Custom Section
	$section_background_image = $wp_customize->get_section('background_image');
	if ( $section_background_image ) {
		$section_background_image->priority = 999999;
	}

	get_template_part( 'library/customizer/add_title_tagline' );
	get_template_part( 'library/customizer/add_header' );
	get_template_part( 'library/customizer/add_footer' );
	get_template_part( 'library/customizer/add_top' );
	get_template_part( 'library/customizer/add_front' );
	get_template_part( 'library/customizer/add_post' );
	get_template_part( 'library/customizer/add_page' );
	get_template_part( 'library/customizer/add_archive' );
}

// Output CSS
get_template_part( 'library/customizer/css' );

// Front Page Section
define( 'NISHIKI_SECTION_NUM', 4 );

// Footer Credit
define( 'CREDIT', 'Powered by WordPress. The Nishiki theme is Produced by <a target="_blank" href="https://www.animagate.com/">AnimaGate, Inc.</a>' );

function nishiki_panel_count() {

	$panel_count = 0;
	$num_sections = 4;

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_front_section' . $i ) ) {
			$panel_count++;
		}
	}

	return $panel_count;
}

// Customizer Controll JS
add_action( 'customize_controls_enqueue_scripts', 'nishiki_panels_js' );
function nishiki_panels_js() {
	wp_enqueue_script( 'nishiki-customize-controls', get_template_directory_uri() . '/js/customize-controls.js', array(), '1.0', true );
}
