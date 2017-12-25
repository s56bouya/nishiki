<?php
add_action( "customize_register", "nishiki_init_customizer_title_tagline" );
function nishiki_init_customizer_title_tagline( $wp_customize ) {
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

	// Site Background Color
	$wp_customize->add_setting('setting_site_background_color',array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_site_background_color',
			array(
				'label'       =>  __( 'Background Color', 'nishiki' ),
				'section'     =>  'title_tagline',
				'settings'    =>  'setting_site_background_color',
				'priority'    =>  2040,
			)
		)
	);

	// Contents Width
	$wp_customize->add_setting( 'setting_site_contents_width' , array(
		'default'     => 1200,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_site_contents_width',
			array(
				'label'	=>  __( 'Site Conents Width(Default 1200px)', 'nishiki' ),
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
		new Nishiki_WP_Customize_Range(
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

	// Background image
	$section_background_image = $wp_customize->get_section('background_image');
	if ( $section_background_image ) {
		$section_background_image->priority = 999999;
	}

}
