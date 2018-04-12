/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function() {
	wp.customize.bind( 'ready', function() {

///	jQuery("[id^='customize-control-ctrl_front_page_section_']").css("background-color","#9f9");
		var section = jQuery("[id^='customize-control-ctrl_front_page_section']");
		var section_count = section.length;
		jQuery("[id^='customize-control-ctrl_front_page_section']").find('.customize-control-title').css({'font-weight':'normal','color':'#fff','background':'#313a6f','padding':'0.2rem 0.6rem'});

		var featured_item = jQuery("[id^='customize-control-ctrl_front_page_featured_items']");
		var featured_item_count = featured_item.length;

		jQuery("[id^='customize-control-ctrl_front_page_featured_items']").find('.customize-control-title').css({'font-weight':'normal','color':'#fff','background':'#555','padding':'0.2rem 0.6rem'});

		jQuery("[id^='customize-control-ctrl_front_page_featured_item_header']").find('.customize-control-title').css({'font-weight':'normal','color':'#fff','background':'#888','padding':'0.2rem 0.6rem'});



		for (var i = 1; i <= section_count ; i++){
			// Only show the color hue control when there's a custom color scheme.
			wp.customize( 'setting_front_page_section' + i, function( setting ) {

				// Image
				wp.customize.control( 'setting_front_page_image' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Image Placeholder Display
				wp.customize.control( 'ctrl_front_page_image_placeholder_display' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Image Placeholder Grayscale
				wp.customize.control( 'ctrl_front_page_image_placeholder_grayscale' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Background Color
				wp.customize.control( 'ctrl_front_page_background_color' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Background Color Opacity
				wp.customize.control( 'ctrl_front_page_background_opacity' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							//console.log('test');
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Main Text
				wp.customize.control( 'ctrl_front_page_main_text' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Sub Text
				wp.customize.control( 'ctrl_front_page_sub_text' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Text Align
				wp.customize.control( 'ctrl_front_page_text_align' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});


				// Text Color
				wp.customize.control( 'ctrl_front_page_text_color' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Button Text
				wp.customize.control( 'ctrl_front_page_button_text' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Button Text Color
				wp.customize.control( 'ctrl_front_page_button_text_color' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});


				// Button Link
				wp.customize.control( 'ctrl_front_page_button_link' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Button Link Color
				wp.customize.control( 'ctrl_front_page_button_link_color' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});

				// Button Link Target
				wp.customize.control( 'ctrl_front_page_button_link_target' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});


				/**
				 * Featured Items
				 */
				wp.customize.control( 'ctrl_front_page_featured_items' + i, function( control ) {
					var visibility = function() {
						if ( 'custom' === setting.get() ) {
							control.container.slideDown( 180 );
						} else {
							control.container.slideUp( 180 );
						}
					};

					visibility();
					setting.bind( visibility );
				});


				// Repeat Items
				wp.customize( 'setting_front_page_featured_items' + i, function( setting_item ) {
					j = 1;
					while ( j < featured_item_count ) {

						wp.customize( 'setting_front_page_featured_item_type' + i + '_' + j, function( setting_item_type ) {
							// Icon
							wp.customize.control( 'ctrl_front_page_featured_item_icon' + i + '_' + j, function( control ) {
								var visibility = function() {
									if ( 'icon' === setting_item_type.get() && 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
										control.container.slideDown( 300 );
									} else {
										control.container.slideUp( 300 );
									}
								};

								visibility();
								setting.bind( visibility );
								setting_item.bind( visibility );
								setting_item_type.bind( visibility );
							});

							// Icon Color
							wp.customize.control( 'ctrl_front_page_featured_item_icon_color' + i + '_' + j, function( control ) {
								var visibility = function() {
									if ( 'icon' === setting_item_type.get() && 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
										control.container.slideDown( 180 );
									} else {
										control.container.slideUp( 180 );
									}
								};

								visibility();
								setting.bind( visibility );
								setting_item.bind( visibility );
								setting_item_type.bind( visibility );
							});


							// Image
							wp.customize.control( 'ctrl_front_page_featured_item_image' + i + '_' + j, function( control ) {
								var visibility = function() {
									if ( 'image' === setting_item_type.get() && 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
										control.container.slideDown( 300 );
									} else {
										control.container.slideUp( 300 );
									}
								};

								visibility();
								setting.bind( visibility );
								setting_item.bind( visibility );
								setting_item_type.bind( visibility );
							});

						});

						// Item header
						wp.customize.control( 'ctrl_front_page_featured_item_header' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});

						// Column
						wp.customize.control( 'ctrl_front_page_featured_item_column' + i, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});


						wp.customize.control( 'ctrl_front_page_featured_item' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});


						// Item Type
						wp.customize.control( 'ctrl_front_page_featured_item_type' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});

						// Title
						wp.customize.control( 'ctrl_front_page_featured_item_title' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});

						// Title Color
						wp.customize.control( 'ctrl_front_page_featured_item_title_color' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});


						// Text
						wp.customize.control( 'ctrl_front_page_featured_item_text' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});


						// Text Color
						wp.customize.control( 'ctrl_front_page_featured_item_text_color' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});


						// Button Text
						wp.customize.control( 'ctrl_front_page_featured_item_button_text' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});


						// Button Link
						wp.customize.control( 'ctrl_front_page_featured_item_button_link' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});


						// Button Text Color
						wp.customize.control( 'ctrl_front_page_featured_item_button_text_color' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});

						// Button Link Color
						wp.customize.control( 'ctrl_front_page_featured_item_button_link_color' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});

						// Button Link Color
						wp.customize.control( 'ctrl_front_page_featured_item_button_link_target' + i + '_' + j, function( control ) {
							var visibility = function() {
								if ( 'enabled' === setting_item.get() && 'custom' === setting.get() ) {
									control.container.slideDown( 180 );
								} else {
									control.container.slideUp( 180 );
								}
							};

							visibility();
							setting.bind( visibility );
							setting_item.bind( visibility );
						});




						j++;
					}

				});

			});
		}




		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		// wp.customize.section( 'section_front_page', function( section ) {
		// 	section.expanded.bind( function( isExpanding ) {
		// 		console.log(isExpanding);
		//
		// 		// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
		// 		wp.customize.previewer.send( 'section-highlight', { expanded: isExpanding });
		// 	} );
		// } );
	});
})( jQuery );
