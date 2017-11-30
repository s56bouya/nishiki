<?php

// Define Extend
require_once( get_template_directory() . '/library/customizer/extend.php');

// Sanitize
require_once( get_template_directory() . '/library/customizer/sanitize.php');

// Title Tagline
require_once( get_template_directory() . '/library/customizer/add_title_tagline.php');

// Header
require_once( get_template_directory() . '/library/customizer/add_header.php');

// Footer
require_once( get_template_directory() . '/library/customizer/add_footer.php');

// Top
require_once( get_template_directory() . '/library/customizer/add_top.php');

// Front
require_once( get_template_directory() . '/library/customizer/add_front.php');

// Post
require_once( get_template_directory() . '/library/customizer/add_post.php');

// Page
require_once( get_template_directory() . '/library/customizer/add_page.php');

// Archive
require_once( get_template_directory() . '/library/customizer/add_archive.php');

// Output CSS
require_once( get_template_directory() . '/library/customizer/css.php');

// Front Page Section
define( 'NISHIKI_SECTION_NUM', 4 );

// Footer Credit
define( 'NISHIKI_CREDIT', __( 'Powered by WordPress. The Nishiki theme is Produced by AnimaGate, Inc.', 'nishiki' ) );

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
