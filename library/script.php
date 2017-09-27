<?php
if ( ! function_exists('nishiki_read_scripts') ) :
	function nishiki_read_scripts() {

		// Add Script
		wp_enqueue_script('jquery');
		if ( is_single() ) wp_enqueue_script( "comment-reply" );
		wp_register_script( 'nishiki-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true );
		wp_enqueue_script( 'nishiki-main-js' );

		// Add Style
		wp_register_style( 'nishiki-main-css', get_template_directory_uri() . '/main.css', array(), null, false );
		wp_enqueue_style( 'nishiki-main-css' );
		wp_add_inline_style( 'nishiki-main-css', nishiki_customizer_css() );

	}
	add_action( 'wp_enqueue_scripts', 'nishiki_read_scripts' );
endif;
