<?php
add_action( "customize_register", "nishiki_init_customizer_page" );
function nishiki_init_customizer_page( $wp_customize ) {
	// Section
	$wp_customize->add_section('section_page',array(
		'title'     =>  __( 'Pages', 'nishiki' ),
		'priority'  =>  50,
	));

	// Column
	$wp_customize->add_setting('setting_page_column',array(
		'default'           =>  'none',
		'sanitize_callback' =>  'nishiki_sanitize_choices',
	));

	$wp_customize->add_control('ctrl_page_column',array(
		'label'             =>  __( 'Sidebar', 'nishiki' ),
		'section'           =>  'section_page',
		'settings'          =>  'setting_page_column',
		'priority'          =>  1000,
		'type'              =>  'select',
		'choices'           =>  array(
			'left'  =>  __( 'Left Sidebar', 'nishiki' ),
			'right' =>  __( 'Right Sidebar', 'nishiki' ),
			'bottom' =>  __( 'Bottom Sidebar', 'nishiki' ),
			'none'  =>  __( 'No Sidebar', 'nishiki' ),
		),
	));

	// Sidebar Width
	$wp_customize->add_setting( 'setting_page_sidebar_width' , array(
		'default'     => 300,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_page_sidebar_width',
			array(
				'label'	=>  __( 'Sidebar Width', 'nishiki' ),
				'min' => 0,
				'max' => 1000,
				'step' => 10,
				'section' => 'section_page',
				'settings'   => 'setting_page_sidebar_width',
				'priority'          =>  1010,
			)
		)
	);

	// Sidebar Margin
	$wp_customize->add_setting( 'setting_page_sidebar_margin' , array(
		'default'     => 20,
		'transport'   => '',
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_page_sidebar_margin',
			array(
				'label'	=>  __( 'Sidebar Margin', 'nishiki' ),
				'min' => 0,
				'max' => 50,
				'step' => 1,
				'section' => 'section_page',
				'settings'   => 'setting_page_sidebar_margin',
				'priority'          =>  1020,
			)
		)
	);

	// Title Background Color
	$wp_customize->add_setting('setting_page_title_background_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_setting_page_title_background_color',
			array(
				'label'       =>  __( 'Title Background Color', 'nishiki' ),
				'section'     =>  'section_page',
				'settings'    =>  'setting_page_title_background_color',
				'priority'    =>  1030,
			)
		)
	);

	// Title Background Opacity
	$wp_customize->add_setting( 'setting_page_title_background_opacity' , array(
		'default'     => 100,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_page_title_background_opacity',
			array(
				'label'	=>  __( 'Title Background Opacity(%)', 'nishiki' ),
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'section' => 'section_page',
				'settings'   => 'setting_page_title_background_opacity',
				'priority'          =>  1040,
			)
		)
	);

	// Title Text Color
	$wp_customize->add_setting('setting_page_title_text_color',array(
		'default'           =>  '#ffffff',
		'sanitize_callback' =>  'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_page_text_color',
			array(
				'label'       =>  __( 'Title Text Color', 'nishiki' ),
				'section'     =>  'section_page',
				'transport'   =>  'postMessage',
				'settings'    =>  'setting_page_title_text_color',
				'priority'    =>  1050,
			)
		)
	);

	// Display Eye Catch
	$wp_customize->add_setting('setting_page_eye_catch',array(
		'default' => false,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control('ctrl_page_eye_catch',array(
		'label'       =>  __( 'Display Eye Catch', 'nishiki' ),
		'type'        =>  'checkbox',
		'section'     =>  'section_page',
		'settings'    =>  'setting_page_eye_catch',
		'priority'    =>  1060,
	));
}
