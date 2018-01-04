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
							console.log('test');
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
