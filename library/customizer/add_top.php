<?php
add_action( "customize_register", "nishiki_init_customizer_top" );
function nishiki_init_customizer_top( $wp_customize ) {
	// Panel
	$wp_customize->add_panel('panel_top',array(
		'title'     =>  __( 'Top Page', 'nishiki' ),
		'priority'  =>  30,
	));

	// Static Front Page
	$ctrl_static_front_page = $wp_customize->get_section('static_front_page');
	if ( $ctrl_static_front_page ) {
		$ctrl_static_front_page->panel = 'panel_top';
		$ctrl_static_front_page->priority = 1003;
	}

	// Header Video
	$ctrl_header_video = $wp_customize->get_control('header_video');
	if ( $ctrl_header_video ) {
		$ctrl_header_video->label = __( 'Upload a Video', 'nishiki' );
		$ctrl_header_video->section = 'section_top_main_visual';
		$ctrl_header_video->priority = 3000;
	}

	// External Header Video
	$ctrl_external_header_video = $wp_customize->get_control('external_header_video');
	if ( $ctrl_external_header_video ) {
		$ctrl_external_header_video->section = 'section_top_main_visual';
		$ctrl_external_header_video->priority = 3100;
	}

	// Header Image
	$ctrl_header_image = $wp_customize->get_control('header_image');
	if ( $ctrl_header_image ) {
		$ctrl_header_image->section = 'section_top_main_visual';
		$ctrl_header_image->priority = 3200;
	}

	// Section
	$wp_customize->add_section('section_top_main_visual',array(
		'title'     =>  __( 'Main visual', 'nishiki' ),
		'priority'  =>  10,
		'panel'     =>  'panel_top',
	));

	// main text(description)
	$ctrl_blogdescription = $wp_customize->get_control('blogdescription');
	if ( $ctrl_blogdescription ) {
		$ctrl_blogdescription->section = 'section_top_main_visual';
	}

	// Sub text
	$wp_customize->add_setting('setting_top_main_visual_sub_text',array(
		'default'   =>  '',
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('contrl_top_main_visual_sub_text',array(
		'label'     =>  __( 'Sub Text', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_top_main_visual',
		'settings'  =>  'setting_top_main_visual_sub_text',
	));

	// image
	$wp_customize->add_setting('setting_top_main_visual_image',array(
		'default' => get_template_directory_uri() . '/images/carp.jpg',
		'sanitize_callback' => 'nishiki_sanitize_image',
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ctrl_top_main_visual_image',
			array(
				'label'      => __( 'Upload an Image', 'nishiki' ),
				'section'    => 'section_top_main_visual',
				'settings'   => 'setting_top_main_visual_image',
				'priority'=> 1,
			)
		)
	);

	// Main Visual Background Color
	$wp_customize->add_setting('setting_top_main_visual_background_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_top_main_visual_background_color',
			array(
				'label'      => __( 'Color above the image', 'nishiki' ),
				'section'    => 'section_top_main_visual',
				'settings'   => 'setting_top_main_visual_background_color',
				'priority'=> 1030,
			)
		)
	);

	// Main Visual Background Opacity
	$wp_customize->add_setting( 'setting_top_main_visual_background_opacity' , array(
		'default'     => 30,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_top_main_visual_background_opacity',
			array(
				'label'	=>  __( 'Color above the image Opacity(%)', 'nishiki' ),
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'section' => 'section_top_main_visual',
				'settings'   => 'setting_top_main_visual_background_opacity',
				'priority'          =>  1040,
			)
		)
	);

	// Text Color
	$wp_customize->add_setting('setting_top_main_visual_text_color',array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_top_main_visual_text_color',
			array(
				'label'       =>  __( 'Text Color', 'nishiki' ),
				'section'     =>  'section_top_main_visual',
				'transport'   =>  'postMessage',
				'settings'    =>  'setting_top_main_visual_text_color',
				'priority'    =>  1001,
			)
		)
	);

	// main button text
	$wp_customize->add_setting('setting_top_main_visual_main_button_text',array(
		'default' => __( 'Get started!', 'nishiki' ),
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('ctrl_top_main_visual_main_button_text',array(
		'label'     =>  __( 'Button Text', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_top_main_visual',
		'settings'  =>  'setting_top_main_visual_main_button_text',
		'priority'  =>  2001,
	));

	// main button link
	$wp_customize->add_setting('setting_top_main_visual_main_button_link',array(
		'default' => '#',
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('ctrl_top_main_visual_main_button_link',array(
		'label'     =>   __( 'Button link', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_top_main_visual',
		'settings'  =>  'setting_top_main_visual_main_button_link',
		'priority'  =>  2002,
	));

	// main button color
	$wp_customize->add_setting('setting_top_main_visual_main_button_color',array(
		'default' => '#895892',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_top_main_visual_main_button_color',
			array(
				'label'      => __( 'Button Color', 'nishiki' ),
				'section'    => 'section_top_main_visual',
				'settings'   => 'setting_top_main_visual_main_button_color',
				'priority'=> 2003,
			)
		)
	);

	// main button color
	$wp_customize->add_setting('setting_top_main_visual_main_button_text_color',array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_top_main_visual_main_button_text_color',
			array(
				'label'      => __( 'Text Color', 'nishiki' ),
				'section'    => 'section_top_main_visual',
				'transport'   => 'postMessage',
				'settings'   => 'setting_top_main_visual_main_button_text_color',
				'priority'=> 2003,
			)
		)
	);

	// main button link target
	$wp_customize->add_setting('setting_top_main_visual_main_button_link_target',array(
		'default' => false,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control('ctrl_top_main_visual_main_button_link_target',array(
		'label'=>__( 'Open New Window', 'nishiki' ),
		'type'       => 'checkbox',
		'section'=>'section_top_main_visual',
		'settings'=>'setting_top_main_visual_main_button_link_target',
		'priority'=> 2004,
	));


	// recent articles
	$wp_customize->add_section('section_top_recently_article',array(
		'title'     =>  __( 'Recent Articles', 'nishiki' ),
		'priority'  =>  10,
		'panel'     =>  'panel_top',
	));

	$wp_customize->add_setting('setting_top_recently_article_display',array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_recently_article_display',
			array(
				'label'      => __( 'Recent Articles', 'nishiki' ),
				'type'       => 'checkbox',
				'section'    => 'section_top_recently_article',
				'settings'   => 'setting_top_recently_article_display',
				'priority'=> 10,
			)
		)
	);

	// main text
	$wp_customize->add_setting('setting_top_recently_article_main_text',array(
		'default'   =>  __( 'Recent Articles', 'nishiki' ),
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('contrl_top_recently_article_main_text',array(
		'label'     =>  __( 'Main Text', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_top_recently_article',
		'settings'  =>  'setting_top_recently_article_main_text',
	));

	// sub text
	$wp_customize->add_setting('setting_top_recently_article_sub_text',array(
		'default'   =>  '',
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('contrl_top_recently_article_sub_text',array(
		'label'     =>  __( 'Sub Text', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_top_recently_article',
		'settings'  =>  'setting_top_recently_article_sub_text',
	));


	// Sticky Post Background Color
	$wp_customize->add_setting('setting_top_recently_article_sticky_background_color',array(
		'default' => '#557c4c',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_top_recently_article_sticky_background_color',
			array(
				'label'      => __( 'Sticky Badge Background Color', 'nishiki' ),
				'section'    => 'section_top_recently_article',
				'settings'   => 'setting_top_recently_article_sticky_background_color',
				'priority'=> 1030,
			)
		)
	);
}
