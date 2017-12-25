<?php
add_action( "customize_register", "nishiki_init_customizer_footer" );
function nishiki_init_customizer_footer( $wp_customize ) {
	// Section
	$wp_customize->add_section('section_footer',array(
		'title'     =>  __( 'Footer', 'nishiki' ),
		'priority'  =>  80,
	));

	// Main Text
	$wp_customize->add_setting('setting_footer_main_text',array(
		'default' => __( 'Main Text', 'nishiki' ),
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('ctrl_footer_main_text',array(
		'label'     =>  __( 'Main Text', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_footer',
		'settings'  =>  'setting_footer_main_text',
		'priority'  =>  1001,
	));

	// Text color
	$wp_customize->add_setting('setting_footer_text_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_footer_text_color',
			array(
				'label'         => __( 'Text Color', 'nishiki' ),
				'section'       => 'section_footer',
				'settings'      => 'setting_footer_text_color',
				'priority'      => 1002,
			)
		)
	);


	// Link color
	$wp_customize->add_setting('setting_footer_link_color',array(
		'default' => '#0a88cc',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_footer_link_color',
			array(
				'label'         => __( 'Link Color', 'nishiki' ),
				'section'       => 'section_footer',
				'transport'     => 'postMessage',
				'settings'      => 'setting_footer_link_color',
				'priority'      => 1003,
			)
		)
	);


	// Main Button Text
	$wp_customize->add_setting('setting_footer_main_button_text',array(
		'default' => __( 'Button Text', 'nishiki' ),
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('ctrl_footer_main_button_text',array(
		'label'     =>  __( 'Button Text', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_footer',
		'settings'  =>  'setting_footer_main_button_text',
		'priority'  =>  2001,
	));

	// Main Button Link
	$wp_customize->add_setting('setting_footer_main_button_link',array(
		'default' => '#',
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('ctrl_footer_main_button_link',array(
		'label'     =>  __( 'Button link', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_footer',
		'settings'  =>  'setting_footer_main_button_link',
		'priority'  =>  2002,
	));

	// Main Button Link Target
	$wp_customize->add_setting('setting_footer_main_button_link_target',array(
		'default' => false,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control('ctrl_footer_main_button_link_target',array(
		'label'       =>  __( 'Open New Window', 'nishiki' ),
		'type'        =>  'checkbox',
		'section'     =>  'section_footer',
		'settings'    =>  'setting_footer_main_button_link_target',
		'priority'    =>  2003,
	));

	// Main Button Color
	$wp_customize->add_setting('setting_footer_main_button_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_footer_main_button_color',
			array(
				'label'       =>  __( 'Button Color', 'nishiki' ),
				'section'     =>  'section_footer',
				'settings'    =>  'setting_footer_main_button_color',
				'priority'    =>  2003,
			)
		)
	);

	// copyright
	$wp_customize->add_setting('setting_footer_copyright',array(
		'default' => NISHIKI_CREDIT,
		'sanitize_callback' => 'nishiki_sanitize_footer_copyright',
	));

	$wp_customize->add_control('ctrl_footer_copyright',array(
		'label'     =>  __( 'Copyright', 'nishiki' ),
		'type'      =>  'textarea',
		'section'   =>  'section_footer',
		'settings'  =>  'setting_footer_copyright',
		'priority'  =>  3001,
	));

	// background color
	$wp_customize->add_setting('setting_footer_background_color',array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_footer_background_color',
			array(
				'label'     =>  __( 'Background Color', 'nishiki' ),
				'section'   =>  'section_footer',
				'transport' =>  'postMessage',
				'settings'  =>  'setting_footer_background_color',
				'priority'  =>  3002,
			)
		)
	);
}
