<?php
add_action( "customize_register", "nishiki_init_customizer_archive" );
function nishiki_init_customizer_archive( $wp_customize ) {
	// Section
	$wp_customize->add_section('section_archive',array(
		'title'     =>  __( 'Archive Pages', 'nishiki' ),
		'priority'  =>  60,
	));

	// Archive Contents Width
	$wp_customize->add_setting( 'setting_archive_contents_width' , array(
		'default'     => 1000,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_archive_contents_width',
			array(
				'label'	=>  __( 'Archive Contents Width(Default 1000px)', 'nishiki' ),
				'min' => 500,
				'max' => 9000,
				'step' => 1,
				'section' => 'section_archive',
				'settings'   => 'setting_archive_contents_width',
				'priority'  =>  1000,
			)
		)
	);

	// Sidebar Width
	$wp_customize->add_setting( 'setting_archive_sidebar_width' , array(
		'default'     => 300,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_archive_sidebar_width',
			array(
				'label'	=>  __( 'Sidebar Width', 'nishiki' ),
				'min' => 0,
				'max' => 1000,
				'step' => 10,
				'section' => 'section_archive',
				'settings'   => 'setting_archive_sidebar_width',
				'priority'          =>  1000,
			)
		)
	);

	// Sidebar Margin
	$wp_customize->add_setting( 'setting_archive_sidebar_margin' , array(
		'default'     => 20,
		'transport'   => '',
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_archive_sidebar_margin',
			array(
				'label'	=>  __( 'Sidebar Margin', 'nishiki' ),
				'min' => 0,
				'max' => 50,
				'step' => 1,
				'section' => 'section_archive',
				'settings'   => 'setting_archive_sidebar_margin',
				'priority'          =>  1000,
			)
		)
	);


	// Article Columns
	$wp_customize->add_setting('setting_archive_article_columns',array(
		'default'           =>  3,
		'sanitize_callback' =>  'nishiki_sanitize_choices_columns',
	));

	$wp_customize->add_control('ctrl_archive_article_columns',array(
		'label'             =>  __( 'Article Columns', 'nishiki' ),
		'section'           =>  'section_archive',
		'settings'          =>  'setting_archive_article_columns',
		'type'              =>  'select',
		'choices'           =>  array(
			'1' =>  __( '1 Column', 'nishiki' ),
			'2' =>  __( '2 Columns', 'nishiki' ),
			'3' =>  __( '3 Columns', 'nishiki' ),
		),
		'priority'          =>  1000,
	));


	// Column
	$wp_customize->add_setting('setting_archive_column',array(
		'default'           =>  'none',
		'sanitize_callback' =>  'nishiki_sanitize_choices',
	));

	$wp_customize->add_control('ctrl_archive_column',array(
		'label'             =>  __( 'Sidebar', 'nishiki' ),
		'section'           =>  'section_archive',
		'settings'          =>  'setting_archive_column',
		'type'              =>  'select',
		'choices'           =>  array(
			'left'  =>  __( 'Left Sidebar', 'nishiki' ),
			'right' =>  __( 'Right Sidebar', 'nishiki' ),
			'bottom' =>  __( 'Bottom Sidebar', 'nishiki' ),
			'none'  =>  __( 'No Sidebar', 'nishiki' ),
		),
		'priority'          =>  1000,
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
				'priority'    =>  2000,
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
				'priority'    =>  2000,
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
				'priority'    =>  2000,
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
				'priority'    =>  2000,
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
				'priority'    => 3000,
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
				'priority'          =>  3000,
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
				'priority'    => 3000,
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
		'priority'  =>  3000,
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
				'priority'  =>  3000,
			)
		)
	);

	// Default Thumbnail Image
	$wp_customize->add_setting('setting_archive_default_image',array(
		'default' => '',
		'sanitize_callback' => 'nishiki_sanitize_image',
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ctrl_archive_default_image',
			array(
				'label'      => __( 'Default eye-catching image', 'nishiki' ),
				'description' => __( 'Display when eye-catching image is not set. Recommended image size 16:9', 'nishiki' ),
				'section'    => 'section_archive',
				'settings'   => 'setting_archive_default_image',
				'priority'=> 3000,
			)
		)
	);

}

