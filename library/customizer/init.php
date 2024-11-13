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
define('NISHIKI_SECTION_NUM', apply_filters('nishiki_section_num', 4));

// Front Page Featured Item
define('NISHIKI_FEATURED_ITEM_NUM', apply_filters('nishiki_featured_item_num', 3));

// Footer Credit
define( 'NISHIKI_CREDIT', 'Powered by WordPress.<br><a target="_blank" href="https://wordpress.org/themes/nishiki/">The Nishiki theme</a> is Supported by <a target="_blank" href="https://support.animagate.com/product/wp-nishiki/">AnimaGate, Inc.</a>' );

function nishiki_panel_count() {
	$panel_count = 0;
	$num_sections = NISHIKI_SECTION_NUM;

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
	wp_enqueue_script( 'nishiki-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array(), '1.0', true );
}
