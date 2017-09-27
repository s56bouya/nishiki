<?php

// Content Width
if ( ! isset( $content_width ) && get_theme_mod( 'setting_site_contents_width', 1200 ) ) {
	$content_width = 1200;
}

/*****************
 * Add Theme Support
 *****************/
// Html5
$args = array(
	'search-form',
	'comment-form',
	'comment-list',
);
add_theme_support( 'html5', $args );

// Title Tag
add_theme_support('title-tag');

// Thumbnails
add_theme_support( 'post-thumbnails' );

// Custom Header
add_theme_support( 'custom-header', array(
	'width'              => 1900,
	'height'             => 480,
	'flex-height'        => true,
	'video'              => true,
) );

// Feed Links
add_theme_support( 'automatic-feed-links' );

/*****************
 * Check Front Page
 *****************/

// Setting Front Page Check
add_filter( 'frontpage_template', 'nishiki_front_page_template' );
function nishiki_front_page_template( $template ) {
	return is_home() ? '' : $template;
}

// Check Front Page
function nishiki_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/*****************
 * Check function exists
 *****************/

// Check has_header_video()
if( ! function_exists( 'has_header_video' ) ){
	function has_header_video(){
		return false;
	}
}

/*****************
 * Translate
 *****************/

load_theme_textdomain( 'nishiki', get_template_directory() . '/languages' );

/*****************
 * Register Nav
 *****************/

// Add Nav
add_action( 'after_setup_theme', 'register_nav' );
function register_nav() {
	// Global Nav
	register_nav_menu( 'global', __( 'Global Menu', 'nishiki' ) );
}

/*****************
 * Disable & Delete
 *****************/

// Disable Default Gallery Style
add_filter( 'use_default_gallery_style', '__return_false' );

// Delete .recentcomments CSS
add_action( 'widgets_init', 'nishiki_remove_recent_comments_style' );
function nishiki_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}

/*****************
 * Custom Editor Style
 *****************/

// Custom Editor Style
add_action( 'admin_init', 'nishiki_custom_editor_style' );
function nishiki_custom_editor_style() {
	add_editor_style();
}

/*****************
 * Excerpt
 *****************/

// Excerpt
add_filter('excerpt_length', 'nishiki_home_excerpt_length', 999);
function nishiki_home_excerpt_length( $excerpt ) {
	if( get_theme_mod( 'setting_archive_excerpt_text_num' ) ){
		$excerpt = intval( get_theme_mod( 'setting_archive_excerpt_text_num' ) );
	} else {
		$excerpt = 50;
	}

	return $excerpt;
}

// Excerpt More
add_filter('excerpt_more', 'nishiki_new_excerpt_more');
function nishiki_new_excerpt_more( $more ) {
	if( get_theme_mod( 'setting_archive_excerpt_text' ) ){
		$more = esc_html( get_theme_mod( 'setting_archive_excerpt_text' ) );
	} else {
		$more = '...';
	}

	return $more;
}

/*****************
 * Title
 *****************/

// Header Title
add_filter( 'pre_get_document_title', 'nishiki_header_title' );
function nishiki_header_title( $title ) {
	if ( is_author() ) {
		$title = get_the_author_meta('display_name');
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif( is_post_type_archive() ) {
		global $wp_query;
		$title = post_type_archive_title( '', false ) . $wp_query->found_posts . esc_html__( 'posts', 'nishiki' );
	} elseif ( is_search() ) {
		$title = esc_html( get_search_query() );
	} elseif ( is_404() ) {
		$title = esc_html__( "Page Not Found.", 'nishiki' );
	} else {
		$title = single_cat_title( '', false );
	}

	return $title;
}

// Title Separator
add_filter( 'document_title_separator', 'nishiki_header_title_sep' );
function nishiki_header_title_sep( $sep ) {
	$sep = '|';
	return $sep;
}

// Archive Title
add_filter( 'get_the_archive_title', 'nishiki_change_archive_title' );
function nishiki_change_archive_title($title){
	if( is_category() or is_tag() ) {
		$title = single_cat_title( '', false );
	} elseif( is_author() ) {
		$title = get_the_author_meta('display_name');
	} elseif( is_tax() ) {
		global $wp_query;
		$term = $wp_query->get_queried_object();
		$title = $term->name;
	} elseif( is_day() ){
		$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'nishiki' ) );
	} elseif( is_month() ){
//		$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'nishiki' ) );
		/* translators: %s: get_the_date */
		$title = sprintf( __( '%1$s %2$d', 'nishiki' ), get_the_date('M'), get_the_date('Y') );
	} elseif( is_year() ){
		/* translators: %s: get_the_date */
		$title = sprintf( esc_html__( '%s year', 'nishiki' ), get_the_date('Y') );
	} elseif( is_search() ){
		$title = __( 'Search Result', 'nishiki' );
	} elseif( is_archive() ){
		$title = single_cat_title( '', false );
	}

	return $title;
}

/*****************
 * Register Widget Area
 *****************/

// Register Widget Area
add_action( 'widgets_init', 'nishiki_custom_widgets_init' );
function nishiki_custom_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nishiki' ),
		'id'            => 'sidebar_main',
		'before_widget' => '<section class="widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}

/*****************
 * Tag Cloud
 *****************/

// Custom Tag Cloud
add_filter('widget_tag_cloud_args','nishiki_custom_tag_cloud');
function nishiki_custom_tag_cloud( $args ) {
	$args['smallest'] = 11;
	$args['largest'] = 11;
	return $args;
}

/*****************
 * Embed
 *****************/

// Embed Youtube & Vimeo Responsive
add_filter( 'embed_oembed_html', 'nishiki_add_oembed_class' );
function nishiki_add_oembed_class( $code ){
	if( (stripos( $code, 'youtube' ) !== FALSE || strpos( $code, 'vimeo' ) ) && stripos( $code, 'iframe' ) !== FALSE )
		$code = '<div class="embed_video">' . $code . '</div>';

	return $code;
}
