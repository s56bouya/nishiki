<?php
if ( ! function_exists('nishiki_read_scripts') ) :
	function nishiki_read_scripts() {

		// Add Script
		wp_enqueue_script('jquery');
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		wp_register_script( 'nishiki-main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true );
		wp_enqueue_script( 'nishiki-main-script' );

		// Add Style
		wp_register_style( 'nishiki-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), null, false );
		wp_enqueue_style( 'nishiki-main-style' );
		wp_add_inline_style( 'nishiki-main-style', nishiki_customizer_css() );

	}
	add_action( 'wp_enqueue_scripts', 'nishiki_read_scripts' );

	function nishiki_admin_read_scripts() {

		// Add Style
		if( is_admin() && ! empty( $_GET['page'] ) && ! empty( $_GET['tab'] ) && $_GET['page'] === 'nishiki-about' && $_GET['tab'] === 'iconfont' ){
			wp_register_style( 'nishiki-main-dashboard-icons', get_template_directory_uri() . '/assets/css/dashboard-icons.css', array(), null, false );
			wp_enqueue_style( 'nishiki-main-dashboard-icons' );
		}

	}
	add_action( 'admin_enqueue_scripts', 'nishiki_admin_read_scripts' );

endif;
