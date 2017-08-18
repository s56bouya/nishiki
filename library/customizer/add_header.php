<?php
// Section
$wp_customize->add_section('section_header',array(
	'title' => __( 'Header', 'nishiki' ),
	'priority' => 70,
));

// Background Color
$wp_customize->add_setting('setting_header_background_color',array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ctrl_header_background_color',
		array(
			'label'      => __( 'Background Color', 'nishiki' ),
			'section'    => 'section_header',
			'transport'   => 'postMessage',
			'settings'   => 'setting_header_background_color',
			'priority'=> 1001,
		)
	)
);

// Text Color
$wp_customize->add_setting('setting_header_text_color',array(
	'default' => '#000000',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ctrl_header_text_color',
		array(
			'label'      => __( 'Text Color', 'nishiki' ),
			'section'    => 'section_header',
			'transport'   => 'postMessage',
			'settings'   => 'setting_header_text_color',
			'priority'=> 1002,
		) )
);

// Display Search Button
$wp_customize->add_setting('setting_header_search_button',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_checkbox',
));

$wp_customize->add_control('ctrl_header_search_button',array(
	'label'         =>  __( 'Display Search Button', 'nishiki' ),
	'type'          =>  'checkbox',
	'section'       =>  'section_header',
	'settings'      =>  'setting_header_search_button',
	'priority'      =>  2001,
));

// Header Fixed
$wp_customize->add_setting('setting_header_fixed',array(
	'default' => true,
	'sanitize_callback' => 'sanitize_checkbox',
));

$wp_customize->add_control('ctrl_header_fixed',array(
	'label'         =>  __( 'Fixed Header', 'nishiki' ),
	'type'          =>  'checkbox',
	'section'       =>  'section_header',
	'settings'      =>  'setting_header_fixed',
	'priority'      =>  2002,
));

// Fixed Header Color
$wp_customize->add_setting('setting_header_fixed_color',array(
	'default'           =>  'dark',
	'sanitize_callback' =>  'sanitize_choices_fixed_header_color',
));

$wp_customize->add_control('ctrl_header_fixed_color',array(
	'label'             =>  __( 'Fixed Header Color', 'nishiki' ),
	'section'           =>  'section_header',
	'settings'          =>  'setting_header_fixed_color',
	'priority'          =>  2003,
	'type'              =>  'radio',
	'choices'           =>  array(
		'light'  =>  __( 'light', 'nishiki' ),
		'dark' =>  __( 'dark', 'nishiki' ),
	),
));

