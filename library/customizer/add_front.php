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

	// Home Content Display
	$wp_customize->add_setting('setting_front_page_home_content_display', array(
		'default' => false,
		'sanitize_callback' => 'nishiki_sanitize_checkbox',
	));

	$wp_customize->add_control('ctrl_front_page_home_content_display', array(
		'label'       =>  __( 'Display home content', 'nishiki' ),
		'type'        =>  'checkbox',
		'section'     =>  'section_front_page',
		'settings'    =>  'setting_front_page_home_content_display',
	));

	// Section
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
			'default' => '',
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

		// Image Placeholder Display
		$wp_customize->add_setting('setting_front_page_image_placeholder_display' . $i, array(
			'default' => false,
			'transport'     => 'postMessage',
			'sanitize_callback' => 'nishiki_sanitize_checkbox',
		));

		$wp_customize->add_control('ctrl_front_page_image_placeholder_display' . $i, array(
			'label'       =>  __( 'Display image placeholder', 'nishiki' ),
			'type'        =>  'checkbox',
			'section'     =>  'section_front_page',
			'settings'    =>  'setting_front_page_image_placeholder_display' . $i,
		));

		// Image Placeholder Grayscale
		$wp_customize->add_setting( 'setting_front_page_image_placeholder_grayscale' . $i, array(
			'default'     => 100,
			'transport'     => 'postMessage',
			'sanitize_callback' => 'nishiki_sanitize_number_range',
		) );

		$wp_customize->add_control(
			new Nishiki_WP_Customize_Range(
				$wp_customize,
				'ctrl_front_page_image_placeholder_grayscale' . $i,
				array(
					'label'	=>  __( 'Adjust image placeholder grayscale(%)', 'nishiki' ),
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'section' => 'section_front_page',
					'settings'   => 'setting_front_page_image_placeholder_grayscale' . $i,
				)
			)
		);

		// Background Color
		$wp_customize->add_setting( 'setting_front_page_background_color' . $i, array(
			'default' => '#333333',
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
			'sanitize_callback' =>  'nishiki_sanitize_choices_text_align',
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
			'default' => '#333333',
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
			'default' => '#333333',
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


		/*
		 * Featured Items
		 */
		// Add Featured Item
		$wp_customize->add_setting( 'setting_front_page_featured_items' . $i, array(
			'default'           =>  'disabled',
			'sanitize_callback' =>  'nishiki_sanitize_choices_front_page_featured_items',
		));

		$wp_customize->add_control( 'ctrl_front_page_featured_items' . $i, array(
			'label'             =>  __( 'Add Item', 'nishiki' ),
			'section'           =>  'section_front_page',
			'settings'          =>  'setting_front_page_featured_items' . $i,
			'type'              =>  'select',
			'choices'           =>  array(
				'disabled'         =>  __( 'Disabled', 'nishiki' ),
				'enabled'        =>  __( 'Enabled', 'nishiki' ),
			),
		));


		// Item Columns
		$wp_customize->add_setting('setting_front_page_featured_item_column' . $i, array(
			'default'           =>  3,
			'sanitize_callback' =>  'nishiki_sanitize_choices_columns',
		));

		$wp_customize->add_control('ctrl_front_page_featured_item_column' . $i, array(
			'label'             =>  __( 'Item Columns', 'nishiki' ),
			'section'           =>  'section_front_page',
			'settings'          =>  'setting_front_page_featured_item_column' . $i,
			'type'              =>  'select',
			'choices'           =>  array(
				'1' =>  __( '1 Column', 'nishiki' ),
				'2' =>  __( '2 Columns', 'nishiki' ),
				'3' =>  __( '3 Columns', 'nishiki' ),
			),
		));


		$j = 1;
		while ( $j <= NISHIKI_FEATURED_ITEM_NUM ) {

			// Wrapper
			$wp_customize->add_setting( 'setting_front_page_featured_item_header' . $i . '_' . $j, array(
				'sanitize_callback' => 'nishiki_sanitize_text',
			));

			$wp_customize->add_control(
				new Nishiki_WP_Customize_Content(
					$wp_customize, 'ctrl_front_page_featured_item_header' . $i . '_' . $j,
					array(
						'label'         =>  '<span class="item-num item-num' . $j . '">' . __( 'Item', 'nishiki' ) . ' ' . $j . '</span>',
						'section'       =>  'section_front_page',
						'settings'      =>  'setting_front_page_featured_item_header' . $i . '_' . $j,
					)
				)
			);


			// Display Featured Item
			$wp_customize->add_setting('setting_front_page_featured_item' . $i . '_' . $j, array(
				'default'           =>  'disabled',
				'sanitize_callback' =>  'nishiki_sanitize_choices_front_page_featured_items',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item' . $i . '_' . $j, array(
				'label'             =>  __( 'Display Item', 'nishiki' ),
				'section'           =>  'section_front_page',
				'settings'          =>  'setting_front_page_featured_item' . $i . '_' . $j,
				'type'              =>  'select',
				'choices'           =>  array(
					'disabled' =>  __( 'Disabled', 'nishiki' ),
					'enabled' =>  __( 'Enabled', 'nishiki' ),
				),
			));


			// Select Icon or Image
			$wp_customize->add_setting('setting_front_page_featured_item_type' . $i . '_' . $j, array(
				'default'           =>  'icon',
				'sanitize_callback' =>  'nishiki_sanitize_choices_item',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item_type' . $i . '_' . $j, array(
				'label'             =>  __( 'Select Item Type', 'nishiki' ),
				'section'           =>  'section_front_page',
				'settings'          =>  'setting_front_page_featured_item_type' . $i . '_' . $j,
				'type'              =>  'select',
				'choices'           =>  array(
					'icon' =>  __( 'Icon', 'nishiki' ),
					'image' =>  __( 'Image', 'nishiki' ),
				),
			));


			// Item Icon
			$wp_customize->add_setting('setting_front_page_featured_item_icon' . $i . '_' . $j, array(
				'default'           =>  '',
				'sanitize_callback' =>  'nishiki_sanitize_text',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item_icon' . $i . '_' . $j, array(
				'label'             =>  __( 'Item Icon', 'nishiki' ),
				'description'       =>  __( 'Example:menu', 'nishiki' ) . '(<a href="' . esc_url( admin_url( 'themes.php?page=nishiki-about&tab=iconfont' ) ) . '">' . __( 'Use Icon', 'nishiki' ) . '</a>)',
				'section'           =>  'section_front_page',
				'settings'          =>  'setting_front_page_featured_item_icon' . $i . '_' . $j,
				'type'      =>  'text',
			));

			// Item Upload Image
			$wp_customize->add_setting( 'setting_front_page_featured_item_image' . $i . '_' . $j, array(
				'default' => '',
				'sanitize_callback' => 'nishiki_sanitize_image',
			));

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'ctrl_front_page_featured_item_image' . $i . '_' . $j,
					array(
						'label'       =>  __( 'Item Image', 'nishiki' ),
						'section'     =>  'section_front_page',
						'settings'    =>  'setting_front_page_featured_item_image' . $i . '_' . $j,
					)
				)
			);

			// Item Icon Color
			$wp_customize->add_setting('setting_front_page_featured_item_icon_color' . $i . '_' . $j, array(
				'default' => '#333333',
				'sanitize_callback' => 'sanitize_hex_color',
			));

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'ctrl_front_page_featured_item_icon_color' . $i . '_' . $j,
					array(
						'label'      => __( 'Item Icon Color', 'nishiki' ),
						'section'    => 'section_front_page',
						'settings'   => 'setting_front_page_featured_item_icon_color' . $i . '_' . $j,
					)
				)
			);


			// Item Title
			$wp_customize->add_setting('setting_front_page_featured_item_title' . $i . '_' . $j, array(
				'default' => '',
				'sanitize_callback' => 'nishiki_sanitize_text',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item_title' . $i . '_' . $j, array(
				'label'     =>  __( 'Item Title', 'nishiki' ),
				'type'      =>  'text',
				'section'   =>  'section_front_page',
				'settings'  =>  'setting_front_page_featured_item_title' . $i . '_' . $j,
			));


			// Item Title Color
			$wp_customize->add_setting('setting_front_page_featured_item_title_color' . $i . '_' . $j, array(
				'default' => '#333333',
				'sanitize_callback' => 'sanitize_hex_color',
			));

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'ctrl_front_page_featured_item_title_color' . $i . '_' . $j,
					array(
						'label'      => __( 'Item Title Color', 'nishiki' ),
						'section'    => 'section_front_page',
						'settings'   => 'setting_front_page_featured_item_title_color' . $i . '_' . $j,
					)
				)
			);


			// Item Text
			$wp_customize->add_setting('setting_front_page_featured_item_text' . $i . '_' . $j, array(
				'default' => '',
				'sanitize_callback' => 'nishiki_sanitize_text',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item_text' . $i . '_' . $j, array(
				'label'     =>  __( 'Item Text', 'nishiki' ),
				'type'      =>  'text',
				'section'   =>  'section_front_page',
				'settings'  =>  'setting_front_page_featured_item_text' . $i . '_' . $j,
			));


			// Item Text Color
			$wp_customize->add_setting('setting_front_page_featured_item_text_color' . $i . '_' . $j, array(
				'default' => '#333333',
				'sanitize_callback' => 'sanitize_hex_color',
			));

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'ctrl_front_page_featured_item_text_color' . $i . '_' . $j,
					array(
						'label'      => __( 'Item Text Color', 'nishiki' ),
						'section'    => 'section_front_page',
						'settings'   => 'setting_front_page_featured_item_text_color' . $i . '_' . $j,
					)
				)
			);


			// Item Button Text
			$wp_customize->add_setting('setting_front_page_featured_item_button_text' . $i . '_' . $j, array(
				'default' => '',
				'sanitize_callback' => 'nishiki_sanitize_text',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item_button_text' . $i . '_' . $j, array(
				'label'     =>  __( 'Item Button Text', 'nishiki' ),
				'type'      =>  'text',
				'section'   =>  'section_front_page',
				'settings'  =>  'setting_front_page_featured_item_button_text' . $i . '_' . $j,
			));


			// Item Button Link
			$wp_customize->add_setting('setting_front_page_featured_item_button_link' . $i . '_' . $j, array(
				'default' => '',
				'sanitize_callback' => 'nishiki_sanitize_text',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item_button_link' . $i . '_' . $j, array(
				'label'     =>  __( 'Item Button Link', 'nishiki' ),
				'type'      =>  'text',
				'section'   =>  'section_front_page',
				'settings'  =>  'setting_front_page_featured_item_button_link' . $i . '_' . $j,
			));


			// Item Button Text Color
			$wp_customize->add_setting('setting_front_page_featured_item_button_text_color' . $i . '_' . $j, array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			));

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'ctrl_front_page_featured_item_button_text_color' . $i . '_' . $j,
					array(
						'label'      => __( 'Item Button Text Color', 'nishiki' ),
						'section'    => 'section_front_page',
						'settings'   => 'setting_front_page_featured_item_button_text_color' . $i . '_' . $j,
					)
				)
			);


			// Item Button Link Color
			$wp_customize->add_setting('setting_front_page_featured_item_button_link_color' . $i . '_' . $j, array(
				'default' => '#333333',
				'sanitize_callback' => 'sanitize_hex_color',
			));

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'ctrl_front_page_featured_item_button_link_color' . $i . '_' . $j,
					array(
						'label'      => __( 'Item Button Link Color', 'nishiki' ),
						'section'    => 'section_front_page',
						'settings'   => 'setting_front_page_featured_item_button_link_color' . $i . '_' . $j,
					)
				)
			);

			// Item Button Link Target
			$wp_customize->add_setting('setting_front_page_featured_item_button_link_target' . $i . '_' . $j, array(
				'default' => false,
				'sanitize_callback' => 'nishiki_sanitize_checkbox',
			));

			$wp_customize->add_control('ctrl_front_page_featured_item_button_link_target' . $i . '_' . $j, array(
				'label'       =>  __( 'Open New Window', 'nishiki' ),
				'type'        =>  'checkbox',
				'section'     =>  'section_front_page',
				'settings'    =>  'setting_front_page_featured_item_button_link_target' . $i . '_' . $j,
			));



			$j++;

		}


	}

}
