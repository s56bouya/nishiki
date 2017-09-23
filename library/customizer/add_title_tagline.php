<?php
// Upload Logo Image
$wp_customize->add_setting('setting_site_logo',array(
	'default' => '',
	'sanitize_callback' => 'nishiki_sanitize_image',
));

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ctrl_site_logo',
		array(
			'label'       =>  __( 'Upload your Logo Image', 'nishiki' ),
			'section'     =>  'title_tagline',
			'settings'    =>  'setting_site_logo',
			'priority'    =>  1,
		)
	)
);

// Display Site Title
$wp_customize->add_setting('setting_site_display_title', array(
	'default' => true,
	'sanitize_callback' => 'nishiki_sanitize_checkbox',
));

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'ctrl_site_display_title',
		array(
			'label'       =>  __( 'Display Site Title', 'nishiki' ),
			'section'     =>  'title_tagline',
			'type'        =>  'checkbox',
			'settings'    =>  'setting_site_display_title',
			'priority'    =>  10,
		)
	)
);

// Site Main Text Color
$wp_customize->add_setting('setting_site_main_text_color',array(
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ctrl_site_main_text_color',
		array(
			'label'       =>  __( 'Main Text Color', 'nishiki' ),
			'section'     =>  'title_tagline',
			'transport'   =>  'postMessage',
			'settings'    =>  'setting_site_main_text_color',
			'priority'    =>  2000,
		)
	)
);

// Site Sub Text Color
$wp_customize->add_setting('setting_site_sub_text_color',array(
	'default' => '#aaaaaa',
	'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ctrl_site_sub_text_color',
		array(
			'label'       =>  __( 'Sub Text Color', 'nishiki' ),
			'section'     =>  'title_tagline',
			'transport'   =>  'postMessage',
			'settings'    =>  'setting_site_sub_text_color',
			'priority'    =>  2010,
		)
	)
);

// Site Main Color
$wp_customize->add_setting('setting_site_main_color',array(
	'default' => '#0a88cc',
	'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ctrl_site_main_color',
		array(
			'label'       =>  __( 'Main Color', 'nishiki' ),
			'section'     =>  'title_tagline',
			'transport'   =>  'postMessage',
			'settings'    =>  'setting_site_main_color',
			'priority'    =>  2020,
		)
	)
);

// Site Sub Color
$wp_customize->add_setting('setting_site_sub_color',array(
	'default' => '#0044a3',
	'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ctrl_site_sub_color',
		array(
			'label'       =>  __( 'Sub Color', 'nishiki' ),
			'section'     =>  'title_tagline',
			'transport'   =>  'postMessage',
			'settings'    =>  'setting_site_sub_color',
			'priority'    =>  2030,
		)
	)
);

// Background Color
$ctrl_background_color = $wp_customize->get_control('background_color');
if ( $ctrl_background_color ) {
	$ctrl_background_color->label = __( 'Background Color', 'nishiki' );
	$ctrl_background_color->section = 'title_tagline';
	$ctrl_background_color->priority = 2040;
}

// Contents Width
$wp_customize->add_setting( 'setting_site_contents_width' , array(
	'default'     => 1200,
	'transport'   => '',
	'sanitize_callback' => 'nishiki_sanitize_number_range',
) );

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'ctrl_site_contents_width',
		array(
			'label'	=>  __( 'Site Contents Width', 'nishiki' ),
			'min' => 500,
			'max' => 9000,
			'step' => 1,
			'section' => 'title_tagline',
			'settings'   => 'setting_site_contents_width',
		)
	)
);


// Font Size
$wp_customize->add_setting( 'setting_site_font_size' , array(
	'default'     => 16,
	'transport'   => '',
	'sanitize_callback' => 'nishiki_sanitize_number_range',
) );

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'ctrl_site_font_size',
		array(
			'label'	=>  __( 'Site Font Size(Default 16px)', 'nishiki' ),
			'min' => 12,
			'max' => 30,
			'step' => 1,
			'section' => 'title_tagline',
			'settings'   => 'setting_site_font_size',
		)
	)
);
