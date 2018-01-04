<?php
add_action( "customize_register", "nishiki_init_customizer_front" );
function nishiki_init_customizer_front( $wp_customize ) {
	// Panel
	$wp_customize->add_section('section_front_page', array(
		'title'     =>  __( 'Setting Front Page', 'nishiki' ),
		'priority'  =>  10000,
		'panel'     =>  'panel_top',
		'active_callback' => 'nishiki_is_static_front_page',
	));

	// Text
	for ( $i = 1; $i < ( 1 + NISHIKI_SECTION_NUM ); ++$i ) {

		// Add Section
		$wp_customize->add_setting( 'setting_front_page_section' . $i, array(
			'default'           =>  'disabled',
			//		'transport'         => 'postMessage',
			'sanitize_callback' =>  'nishiki_sanitize_choices_front_page_section',
		));

		$wp_customize->add_control( 'ctrl_front_page_section' . $i, array(
			'label'             =>  __( 'Section', 'nishiki' ) . $i,
			'section'           =>  'section_front_page',
			'settings'          =>  'setting_front_page_section' . $i,
			'type'              =>  'select',
			'choices'           =>  array(
				'disabled'         =>  __( 'Disabled', 'nishiki' ),
				//			'recently'        =>  __( 'Recently Posts', 'nishiki' ),
				'custom'        =>  __( 'Custom', 'nishiki' ),
			),
		));

		// Upload Image
		$wp_customize->add_setting( 'setting_front_page_image' . $i, array(
			'default' => get_template_directory_uri() . '/images/sky.jpg',
			'sanitize_callback' => 'nishiki_sanitize_image',
		));

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'setting_front_page_image' . $i,
				array(
					'label'       =>  __( 'Image', 'nishiki' ) . $i,
					'section'     =>  'section_front_page',
					'settings'    =>  'setting_front_page_image' . $i,
				)
			)
		);

		// Background Color
		$wp_customize->add_setting( 'setting_front_page_background_color' . $i, array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'ctrl_front_page_background_color' . $i,
				array(
					'label'       => __( 'Color above the image', 'nishiki' ),
					'section'     => 'section_front_page',
					'settings'    => 'setting_front_page_background_color' . $i,
				)
			)
		);

		// Background Opacity
		$wp_customize->add_setting( 'setting_front_page_background_opacity' . $i, array(
			'default'     => 10,
			'sanitize_callback' => 'nishiki_sanitize_number_range',
		) );

		$wp_customize->add_control(
			new Nishiki_WP_Customize_Range(
				$wp_customize,
				'ctrl_front_page_background_opacity' . $i,
				array(
					'label'	=>  __( 'Color above the image Opacity(%)', 'nishiki' ),
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'section' => 'section_front_page',
					'settings'   => 'setting_front_page_background_opacity' . $i,
				)
			)
		);

		//	// Background Opacity
		//	$wp_customize->add_setting( 'setting_front_page_background_opacity' . $i, array(
		//		'default'             => 0,
		//		'sanitize_callback'   => 'sanitize_number_range',
		//	) );
		//
		//	$wp_customize->add_control( 'ctrl_front_page_background_opacity' . $i, array(
		//		'type'        => 'range',
		//		'section'     => 'section_front_page',
		//		'settings'    => 'setting_front_page_background_opacity' . $i,
		//		'label'       => __( 'Background Opacity' ),
		//		'input_attrs' => array(
		//			'min' => 0,
		//			'max' => 100,
		//			'step' => 1,
		//		),
		//	) );

		// Main Text
		$wp_customize->add_setting( 'setting_front_page_main_text' . $i, array(
			'default'           => __( 'Main Text', 'nishiki' ),
			'sanitize_callback' => 'nishiki_sanitize_text',
		) );

		$wp_customize->add_control( 'ctrl_front_page_main_text' . $i, array(
			'label'    => __( 'Main Text', 'nishiki' ) . $i,
			'type'     => 'text',
			'section'  => 'section_front_page',
			'settings' => 'setting_front_page_main_text' . $i,
		) );

		// Sub Text
		$wp_customize->add_setting( 'setting_front_page_sub_text' . $i, array(
			'default'           => '',
			'sanitize_callback' => 'nishiki_sanitize_text',
		) );

		$wp_customize->add_control( 'ctrl_front_page_sub_text' . $i, array(
			'label'    => __( 'Sub Text', 'nishiki' ) . $i,
			'type'     => 'text',
			'section'  => 'section_front_page',
			'settings' => 'setting_front_page_sub_text' . $i,
		) );

		// Text align
		$wp_customize->add_setting( 'setting_front_page_text_align' . $i, array(
			'default'           =>  'left',
			'sanitize_callback' =>  'nishiki_sanitize_choices_front_page_text_align',
		));

		$wp_customize->add_control( 'ctrl_front_page_text_align' . $i, array(
			'label'             =>  __( 'Text Align', 'nishiki' ) . $i,
			'section'           =>  'section_front_page',
			'settings'          =>  'setting_front_page_text_align' . $i,
			'type'              =>  'select',
			'choices'           =>  array(
				'left'         =>  __( 'Left', 'nishiki' ),
				'center'        =>  __( 'Center', 'nishiki' ),
				'right'        =>  __( 'Right', 'nishiki' ),
			),
		));

		// Text Color
		$wp_customize->add_setting( 'setting_front_page_text_color' . $i, array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'ctrl_front_page_text_color' . $i,
				array(
					'label'         => __( 'Text Color', 'nishiki' ),
					'section'       => 'section_front_page',
					'transport'     => 'postMessage',
					'settings'      => 'setting_front_page_text_color' . $i,
				)
			)
		);

		// Button Text
		$wp_customize->add_setting( 'setting_front_page_button_text' . $i, array(
			'default'           => __( 'Button Text', 'nishiki' ),
			'sanitize_callback' => 'nishiki_sanitize_text',
		) );

		$wp_customize->add_control( 'ctrl_front_page_button_text' . $i, array(
			'label'    => __( 'Button Text', 'nishiki' ) . $i,
			'type'     => 'text',
			'section'  => 'section_front_page',
			'settings' => 'setting_front_page_button_text' . $i,
		) );

		// Button Link
		$wp_customize->add_setting('setting_front_page_button_link' . $i,array(
			'default' => '#',
			'sanitize_callback' => 'nishiki_sanitize_text',
		));

		$wp_customize->add_control('ctrl_front_page_button_link' . $i,array(
			'label'     =>  __( 'Button Link', 'nishiki' ),
			'type'      =>  'text',
			'section'   =>  'section_front_page',
			'settings'  =>  'setting_front_page_button_link' . $i,
		));

		// Button Text Color
		$wp_customize->add_setting( 'setting_front_page_button_text_color' . $i, array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'ctrl_front_page_button_text_color' . $i,
				array(
					'label'      => __( 'Button Text Color', 'nishiki' ),
					'section'    => 'section_front_page',
					'settings'   => 'setting_front_page_button_text_color' . $i,
				)
			)
		);

		// Button Link Color
		$wp_customize->add_setting( 'setting_front_page_button_link_color' . $i, array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'ctrl_front_page_button_link_color' . $i,
				array(
					'label'      => __( 'Button Link Color', 'nishiki' ),
					'section'    => 'section_front_page',
					'transport'   => 'postMessage',
					'settings'   => 'setting_front_page_button_link_color' . $i,
				)
			)
		);

		// Button Link Target
		$wp_customize->add_setting('setting_front_page_button_link_target' . $i, array(
			'default' => false,
			'sanitize_callback' => 'nishiki_sanitize_checkbox',
		));

		$wp_customize->add_control('ctrl_front_page_button_link_target' . $i, array(
			'label'       =>  __( 'Open New Window', 'nishiki' ),
			'type'        =>  'checkbox',
			'section'     =>  'section_front_page',
			'settings'    =>  'setting_front_page_button_link_target' . $i,
		));
	}

}
