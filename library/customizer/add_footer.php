<?php
add_action( "customize_register", "nishiki_init_customizer_footer" );
function nishiki_init_customizer_footer( $wp_customize ) {
	// Section
	$wp_customize->add_section('section_footer',array(
		'title'     =>  __( 'Footer', 'nishiki' ),
		'priority'  =>  80,
	));

	// Footer Contents Width
	$wp_customize->add_setting( 'setting_footer_contents_width' , array(
		'default'     => 1000,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_footer_contents_width',
			array(
				'label'	=>  __( 'Footer Contents Width(Default 1000px)', 'nishiki' ),
				'min' => 500,
				'max' => 9000,
				'step' => 1,
				'section' => 'section_footer',
				'settings'   => 'setting_footer_contents_width',
				'priority'  =>  1000,
			)
		)
	);

	// Widget Columns
	$wp_customize->add_setting('setting_footer_widget_columns',array(
		'default'           =>  3,
		'sanitize_callback' =>  'nishiki_sanitize_choices_columns',
	));

	$wp_customize->add_control('ctrl_footer_widget_columns',array(
		'label'             =>  __( 'Widget Columns', 'nishiki' ),
		'section'           =>  'section_footer',
		'settings'          =>  'setting_footer_widget_columns',
		'priority'          =>  1010,
		'type'              =>  'select',
		'choices'           =>  array(
			'1' =>  __( '1 Column', 'nishiki' ),
			'2' =>  __( '2 Columns', 'nishiki' ),
			'3' =>  __( '3 Columns', 'nishiki' ),
		),
	));

	// Widget Text color
	$wp_customize->add_setting('setting_footer_widget_text_color',array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_footer_widget_text_color',
			array(
				'label'         => __( 'Widget Text Color', 'nishiki' ),
				'section'       => 'section_footer',
				'settings'      => 'setting_footer_widget_text_color',
				'priority'      => 1020,
			)
		)
	);

	// Widget Link color
	$wp_customize->add_setting('setting_footer_widget_link_color',array(
		'default' => '#0a88cc',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_footer_widget_link_color',
			array(
				'label'         => __( 'Widget Link Color', 'nishiki' ),
				'section'       => 'section_footer',
				'transport'     => 'postMessage',
				'settings'      => 'setting_footer_widget_link_color',
				'priority'      => 1030,
			)
		)
	);


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
		'priority'  =>  1040,
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
				'priority'      => 1050,
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
				'priority'      => 1060,
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
		'priority'  =>  2010,
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
		'priority'  =>  2020,
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
		'priority'    =>  2030,
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
				'priority'    =>  2040,
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
		'priority'  =>  3010,
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
				'priority'  =>  3020,
			)
		)
	);

}
