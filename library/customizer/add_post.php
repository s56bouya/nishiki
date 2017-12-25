<?php
add_action( "customize_register", "nishiki_init_customizer_post" );
function nishiki_init_customizer_post( $wp_customize ) {
	// Section
	$wp_customize->add_section('section_post',array(
		'title'     =>  __( 'Posts', 'nishiki' ),
		'priority'  =>  40,
	));

	// Column
	$wp_customize->add_setting('setting_post_column',array(
		'default'           =>  'none',
		'sanitize_callback' =>  'nishiki_sanitize_choices',
	));

	$wp_customize->add_control('ctrl_post_column',array(
		'label'             =>  __( 'Sidebar', 'nishiki' ),
		'section'           =>  'section_post',
		'settings'          =>  'setting_post_column',
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
	$wp_customize->add_setting( 'setting_post_sidebar_width' , array(
		'default'     => 300,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_post_sidebar_width',
			array(
				'label'	=>  __( 'Sidebar Width', 'nishiki' ),
				'min' => 0,
				'max' => 1000,
				'step' => 10,
				'section' => 'section_post',
				'settings'   => 'setting_post_sidebar_width',
				'priority'          =>  1010,
			)
		)
	);

	// Sidebar Margin
	$wp_customize->add_setting( 'setting_post_sidebar_margin' , array(
		'default'     => 20,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_post_sidebar_margin',
			array(
				'label'	=>  __( 'Sidebar Margin', 'nishiki' ),
				'min'       => 0,
				'max'       => 50,
				'step'      => 1,
				'section'   => 'section_post',
				'settings'  => 'setting_post_sidebar_margin',
				'priority'  =>  1020,
			)
		)
	);

	// Title Background Color
	$wp_customize->add_setting('setting_post_title_background_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_post_title_background_color',
			array(
				'label'      => __( 'Title Background Color', 'nishiki' ),
				'section'    => 'section_post',
				'settings'   => 'setting_post_title_background_color',
				'priority'=> 1030,
			)
		)
	);

	// Title Background Opacity
	$wp_customize->add_setting( 'setting_post_title_background_opacity' , array(
		'default'     => 100,
		'sanitize_callback' => 'nishiki_sanitize_number_range',
	) );

	$wp_customize->add_control(
		new Nishiki_WP_Customize_Range(
			$wp_customize,
			'ctrl_post_title_background_opacity',
			array(
				'label'	=>  __( 'Title Background Opacity(%)', 'nishiki' ),
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'section' => 'section_post',
				'settings'   => 'setting_post_title_background_opacity',
				'priority'          =>  1040,
			)
		)
	);

	// Title Text Color
	$wp_customize->add_setting('setting_post_title_text_color',array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ctrl_post_title_text_color',
			array(
				'label'      => __( 'Title Text Color', 'nishiki' ),
				'section'    => 'section_post',
				'transport'   => 'postMessage',
				'settings'   => 'setting_post_title_text_color',
				'priority'=> 1050,
			)
		)
	);

	// Title Display Category
	$wp_customize->add_setting('setting_post_display_category', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_post_display_author',
			array(
				'label'       =>  __( 'Display Category', 'nishiki' ),
				'section'     =>  'section_post',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_post_display_category',
				'priority'    =>  1060,
			)
		)
	);

	// Title Display Tag
	$wp_customize->add_setting('setting_post_display_tag', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_post_display_tag',
			array(
				'label'       =>  __( 'Display Tag', 'nishiki' ),
				'section'     =>  'section_post',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_post_display_tag',
				'priority'    =>  1070,
			)
		)
	);

	// Title Display Comment
	$wp_customize->add_setting('setting_post_display_comment', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_post_display_comment',
			array(
				'label'       =>  __( 'Display Comment', 'nishiki' ),
				'section'     =>  'section_post',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_post_display_comment',
				'priority'    =>  1080,
			)
		)
	);

	// Title Display Prev Next Link
	$wp_customize->add_setting('setting_post_display_prev_next_link', array(
		'default' => true,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ctrl_post_display_prev_next_link',
			array(
				'label'       =>  __( 'Display Prev & Next Link', 'nishiki' ),
				'section'     =>  'section_post',
				'type'        =>  'checkbox',
				'settings'    =>  'setting_post_display_prev_next_link',
				'priority'    =>  1090,
			)
		)
	);

	// Display Eye Catch
	$wp_customize->add_setting('setting_post_eye_catch',array(
		'default' => false,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control('ctrl_post_eye_catch',array(
		'label'       =>  __( 'Display Eye Catch', 'nishiki' ),
		'type'        =>  'checkbox',
		'section'     =>  'section_post',
		'settings'    =>  'setting_post_eye_catch',
		'priority'    =>  1100,
	));

	// Author Text
	$wp_customize->add_setting('setting_footer_author_text',array(
		'default' => __( 'Author', 'nishiki' ),
		'sanitize_callback' => 'nishiki_sanitize_text',
	));

	$wp_customize->add_control('ctrl_footer_author_text',array(
		'label'       =>  __( 'Author Text Label', 'nishiki' ),
		'type'        =>  'text',
		'section'     =>  'section_post',
		'settings'    =>  'setting_footer_author_text',
		'priority'    =>  1110,
	));
}
