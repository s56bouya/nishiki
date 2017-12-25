<?php
add_action( "customize_register", "nishiki_init_customizer_archive" );
function nishiki_init_customizer_archive( $wp_customize ) {
	// Section
	$wp_customize->add_section('section_archive',array(
		'title'     =>  __( 'Archive Pages', 'nishiki' ),
		'priority'  =>  60,
	));

	// Article Columns
	$wp_customize->add_setting('setting_archive_article_columns',array(
		'default'           =>  3,
		'sanitize_callback' =>  'nishiki_sanitize_choices_columns',
	));

	$wp_customize->add_control('ctrl_archive_article_columns',array(
		'label'             =>  __( 'Article Columns', 'nishiki' ),
		'section'           =>  'section_archive',
		'settings'          =>  'setting_archive_article_columns',
		'priority'          =>  1000,
		'type'              =>  'select',
		'choices'           =>  array(
			'1' =>  __( '1 Column', 'nishiki' ),
			'2' =>  __( '2 Columns', 'nishiki' ),
			'3' =>  __( '3 Columns', 'nishiki' ),
		),
	));


	// Display Author
	$wp_customize->add_setting('setting_archive_display_author', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_archive_display_author',
			array(
				'label'       =>  __( 'Display Author', 'nishiki' ),
				'section'     =>  'section_archive',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_archive_display_author',
				'priority'    =>  10,
			)
		)
	);

	// Display Date
	$wp_customize->add_setting('setting_archive_display_date', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_archive_display_date',
			array(
				'label'       =>  __( 'Display Post Date', 'nishiki' ),
				'section'     =>  'section_archive',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_archive_display_date',
				'priority'    =>  10,
			)
		)
	);

	// Display Category
	$wp_customize->add_setting('setting_archive_display_archive', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_archive_display_archive',
			array(
				'label'       =>  __( 'Display Archive', 'nishiki' ),
				'section'     =>  'section_archive',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_archive_display_archive',
				'priority'    =>  10,
			)
		)
	);

	// Display Comment
	$wp_customize->add_setting('setting_archive_display_comment', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_archive_display_comment',
			array(
				'label'       =>  __( 'Display Comment', 'nishiki' ),
				'section'     =>  'section_archive',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_archive_display_comment',
				'priority'    =>  20,
			)
		)
	);

	// Title Background Color
	$wp_customize->add_setting('setting_archive_title_background_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_archive_title_background_color',
			array(
				'label'       => __( 'Title Background Color', 'nishiki' ),
				'section'     => 'section_archive',
				'settings'    => 'setting_archive_title_background_color',
				'priority'    => 1030,
			)
		)
	);

	// Title Background Opacity
	$wp_customize->add_setting( 'setting_archive_title_background_opacity' , array(
		'default'     => 100,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_archive_title_background_opacity',
			array(
				'label'	=>  __( 'Title Background Opacity(%)', 'nishiki' ),
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'section' => 'section_archive',
				'settings'   => 'setting_archive_title_background_opacity',
				'priority'          =>  1040,
			)
		)
	);

	// Title Text Color
	$wp_customize->add_setting('setting_archive_title_text_color',array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_archive_title_text_color',
			array(
				'label'       => __( 'Title Text Color', 'nishiki' ),
				'section'     => 'section_archive',
				'transport'   => 'postMessage',
				'settings'    => 'setting_archive_title_text_color',
				'priority'    => 1050,
			)
		)
	);

	// Excerpt Text
	$wp_customize->add_setting('setting_archive_excerpt_text',array(
		'default' => '...',
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('ctrl_archive_excerpt_text',array(
		'label'     =>  __( 'Excerpt Text', 'nishiki' ),
		'type'      =>  'text',
		'section'   =>  'section_archive',
		'settings'  =>  'setting_archive_excerpt_text',
		'priority'  =>  1060,
	));


	// Excerpt Text Num
	$wp_customize->add_setting( 'setting_archive_excerpt_text_num' , array(
		'default'           => 50,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_archive_excerpt_text_num',
			array(
				'label'     =>  __( 'Excerpt Text Num', 'nishiki' ),
				'min'       => 0,
				'max'       => 500,
				'step'      => 1,
				'section'   => 'section_archive',
				'settings'  => 'setting_archive_excerpt_text_num',
				'priority'  =>  1070,
			)
		)
	);

}

