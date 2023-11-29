<?php
// Add Costomizer CSS
function nishiki_customizer_css(){
	$output = '';

	/*****************
	* Title Tagline
	******************/

	// Site Contents Width
	$site_contents_width = absint( get_theme_mod( 'setting_site_contents_width', '1000' ) );
	$output .= "
		.container{max-width:{$site_contents_width}px;}
		
		.single .sidebar-none #main > .container > * > * > *:not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright):not(.is-style-wide):not(.author-info),
		.single .sidebar-bottom #main > .container > * > * > *:not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright):not(.is-style-wide):not(.author-info),
		.page .show-on-front-page #main > .container > * > * > *:not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright):not(.is-style-wide):not(.author-info),
		.page .sidebar-none #main > .container > * > * > *:not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright):not(.is-style-wide):not(.author-info),
		.page .sidebar-bottom #main > .container > * > * > *:not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright):not(.is-style-wide):not(.author-info){
			max-width:{$site_contents_width}px;width:90%;margin-left:auto;margin-right:auto;
		}
		";

	// Site Background Color
	$site_background_color = esc_html( get_theme_mod( 'setting_site_background_color', '#ffffff' ) );
	$output .= "
		body{background-color:{$site_background_color};}
		";

	// Site Main Text Color
	$site_main_text_color = esc_html( get_theme_mod( 'setting_site_main_text_color', '#333333' ) );
	$output .= "
		body,.articles a{color:{$site_main_text_color};}
		.articles header,.articles header a{color:{$site_main_text_color};}
		.nav_pc a{color:{$site_main_text_color};}
		input[type=\"submit\"],button[type=\"submit\"]{color:{$site_main_text_color};}
		input:hover[type=\"submit\"],button:hover[type=\"submit\"]{background:{$site_main_text_color};color:{$site_background_color};border-color:{$site_main_text_color}}
		";

	// Site Sub Text Color
	$site_sub_text_color = esc_html( get_theme_mod( 'setting_site_sub_text_color', '#aaaaaa' ) );
	$output .= "
		aside section a,aside section ul li,.comments-area .comment-list li .comment-body,.comments-area .comment-form-comment{border-color:{$site_sub_text_color};}
		.nav_pc a:hover{color:{$site_sub_text_color};}
		.comments-area .comment-list li .comment-date,.comments-area cite,.comments-area cite a{color:{$site_sub_text_color};}
		.comments-area .comment-form-comment{border-color:{$site_sub_text_color};}
		.single .entry-content table th,.single .entry-content table td,
		.page .entry-content table th,.page .entry-content table td{border-color:{$site_sub_text_color};}
		.entry-content table::-webkit-scrollbar-thumb:horizontal{background-color:{$site_sub_text_color};}
		input[type=\"submit\"][disabled]{border-color:{$site_sub_text_color};color:{$site_sub_text_color};pointer-events: none;}
		input:hover[type=\"submit\"][disabled]{background:none;color:{$site_sub_text_color};}
		";

	// Site Main Color
	$site_main_color = esc_html( get_theme_mod( 'setting_site_main_color', '#0a88cc' ) );
	$output .= "
		a{color:{$site_main_color};}
		aside .tagcloud a{border-color:{$site_main_color};}
		";

	// Site Sub Color
	$site_sub_color = esc_html( get_theme_mod( 'setting_site_sub_color', '#0044a3' ) );
	$output .= "
		a:hover{color:{$site_sub_color};}
		";

	// Site Font Size
	$site_font_size = absint( get_theme_mod( 'setting_site_font_size', '16' ) );
	$output .= "
		html,button,input[type=submit]{font-size:{$site_font_size}px;}
		";

	/*****************
	 * Top
	 ******************/

	// Recently Post background color
	$top_recently_article_sticky_background_color = esc_html( get_theme_mod( 'setting_top_recently_article_sticky_background_color', '#557c4c' ) );
	$output .= ".articles article.sticky::before{border-color:{$top_recently_article_sticky_background_color} transparent transparent transparent;}";

	/*****************
	 * Front
	 ******************/

	for( $i = 1; $i <= NISHIKI_SECTION_NUM; ++$i ) {
		// Text Color
		$front_page_text_color = esc_html( get_theme_mod( 'setting_front_page_text_color' . $i, '#333333' ) );
		$output .= "#front-page-section{$i}{color:{$front_page_text_color};}";

		// Text Align
		$front_page_text_align = esc_html( get_theme_mod( 'setting_front_page_text_align' . $i, 'left' ) );
		$output .= "#front-page-section{$i}{text-align:{$front_page_text_align};}";
		if( $front_page_text_align !== 'center' ){
			$output .= "#front-page-section{$i} .sub-text{padding-{$front_page_text_align}:0;}";
		}

		// Image Placeholder Grayscale
		$front_page_image_placeholder_grayscale = absint( get_theme_mod( 'setting_front_page_image_placeholder_grayscale' . $i, '100' ) );
		$output .= "#front-page-section{$i} img.img-placeholder{filter:blur(15px) grayscale({$front_page_image_placeholder_grayscale}%);}";

		// Background Color
		$front_page_background_color = esc_html( get_theme_mod( 'setting_front_page_background_color' . $i, '#333333' ) );
		$output .= "#front-page-section{$i}::after{background-color:{$front_page_background_color};}";

		// Background Opacity
		$front_page_background_opacity = absint( get_theme_mod( 'setting_front_page_background_opacity' . $i, '30' ) );
		$front_page_opacity = $front_page_background_opacity / 100;
		$output .= "#front-page-section{$i}::after{opacity:{$front_page_opacity};}";

		// Button Text Color
		$front_page_button_text_color = esc_html( get_theme_mod( 'setting_front_page_button_text_color' . $i, '#ffffff' ) );
		$output .= "#front-page-section{$i} .main-button a{color:{$front_page_button_text_color};}";

		// Button Link Color
		$front_page_button_link_color = esc_html( get_theme_mod( 'setting_front_page_button_link_color' . $i, '#333333' ) );
		$output .= "#front-page-section{$i} .main-button a{background-color:{$front_page_button_link_color};}";

		// Button Hover Color
		$output .= "#front-page-section{$i} .main-button a:hover{background-color:{$front_page_button_text_color};color:{$front_page_button_link_color};}";

		/*****************
		 * Featured Item
		 ******************/
		$j = 1;
		while ( $j <= NISHIKI_FEATURED_ITEM_NUM ) {
			// Item Icon Color
			$front_page_featured_item_icon_color = esc_html( get_theme_mod( 'setting_front_page_featured_item_icon_color' . $i . '_' . $j, '#333333' ) );
			$output .= "#front-page-section{$i} .featured-items .featured-item{$j} i{color:{$front_page_featured_item_icon_color};}";

			// Item Title Color
			$front_page_featured_item_title_color = esc_html( get_theme_mod( 'setting_front_page_featured_item_title_color' . $i . '_' . $j, '#333333' ) );
			$output .= "#front-page-section{$i} .featured-items .featured-item{$j} .featured-title{color:{$front_page_featured_item_title_color};}";

			// Item Text Color
			$front_page_featured_item_text_color = esc_html( get_theme_mod( 'setting_front_page_featured_item_text_color' . $i . '_' . $j, '#333333' ) );
			$output .= "#front-page-section{$i} .featured-items .featured-item{$j} .featured-text{color:{$front_page_featured_item_text_color};}";

			// Item Button Text Color
			$front_page_featured_item_button_text_color = esc_html( get_theme_mod( 'setting_front_page_featured_item_button_text_color' . $i . '_' . $j, '#ffffff' ) );
			$output .= "#front-page-section{$i} .featured-items .featured-item{$j} .featured-button a{color:{$front_page_featured_item_button_text_color};}";

			// Item Button Link Color
			$front_page_featured_item_button_link_color = esc_html( get_theme_mod( 'setting_front_page_featured_item_button_link_color' . $i . '_' . $j, '#333333' ) );
			$output .= "#front-page-section{$i} .featured-items .featured-item{$j} .featured-button a{background-color:{$front_page_featured_item_button_link_color};}";

			// Item Button Hover Color
			$output .= "#front-page-section{$i} .featured-items .featured-item{$j} .featured-button a:hover{background-color:{$front_page_featured_item_button_text_color};color:{$front_page_featured_item_button_link_color};}";

			$j++;
		}

	}

	/*****************
	 * Header
	 ******************/

	// Header Contents Width
	$header_contents_width = absint( get_theme_mod( 'setting_header_contents_width', '1000' ) );
	$output .= "
		#masthead .container{max-width:{$header_contents_width}px;}
		";

	// background color
	$header_background_color = esc_html( get_theme_mod( 'setting_header_background_color', '#ffffff' ) );
	$output .= "#masthead{background:{$header_background_color};}";

	// text color
	$header_text_color = ( ! get_header_textcolor() ) ? '#000000' : '#' . esc_html( get_theme_mod( 'header_textcolor', '333333' ) );

	$output .= "
		#masthead .site-info a{color:{$header_text_color};}
		#masthead button.icon{border-color:{$header_text_color};color:{$header_text_color};}
		#masthead button.icon:hover{color:{$header_background_color};background:{$header_text_color};}"
	;

	// Fixed Header Color
	$header_fixed = get_theme_mod( 'setting_header_fixed', true );
	if( $header_fixed == true ){
		$header_fixed_color = get_theme_mod( 'setting_header_fixed_color', 'dark' );
		if( $header_fixed_color == 'light' ){
			$output .= "
			#masthead.fixed{background:rgba(255,255,255,0.6);}
			#masthead.fixed .site-info a{color:#000;}
			#masthead.fixed .icon{border-color:#000;color:#000;}
			#masthead.fixed .icon:hover{background-color:#000;color:#fff;}
			@media only screen and (min-width: 769px){
			#masthead.fixed #menu-collapse a{color:#000;}
			#masthead.fixed #menu-collapse a:hover{background-color:rgba(255,255,255,0.5);}
			#masthead.fixed #menu-collapse > ul > li > a::after{border-color:#000;}
			#masthead.fixed #menu-collapse > ul > li > ul{background-color:rgba(255,255,255,0.8);}
			}
			";
		} elseif( $header_fixed_color == 'dark' ){
			$output .= "
			#masthead.fixed{background:rgba(0,0,0,0.2);}
			#masthead.fixed .site-info a{color:#fff;}
			#masthead.fixed .icon{border-color:#fff;color:#fff;}
			#masthead.fixed .icon:hover{background-color:#fff;color:#000;}
			@media only screen and (min-width: 769px){
			#masthead.fixed #menu-collapse a{color:#fff;}
			#masthead.fixed #menu-collapse a:hover{background-color:rgba(0,0,0,0.7);}
			#masthead.fixed #menu-collapse > ul > li > a::after{border-color:#fff;}
			#masthead.fixed #menu-collapse > ul > li > ul{background-color:rgba(0,0,0,0.4);}
			}
			";
		}
		$output .= "
		body.scrolled #masthead{background:{$header_background_color};}
		body.scrolled #masthead .site-info a{color:{$header_text_color};}
		body.scrolled #masthead .icon{border-color:{$header_text_color};color:{$header_text_color};}
		body.scrolled #masthead .icon:hover{color:{$header_background_color};background-color:{$header_text_color};}
		@media only screen and (min-width: 769px){
		body.scrolled #masthead #menu-collapse a{color:{$header_text_color};}
		body.scrolled #masthead #menu-collapse a:hover{color:{$header_background_color};background-color:{$header_text_color};}
		body.scrolled #masthead #menu-collapse > ul > li > a::after{border-bottom:1px solid {$header_text_color};}
		body.scrolled #masthead #menu-collapse > ul > li > ul{background-color:{$header_background_color}ee;}
		}
		";
	} else {
		$output .= "
		@media only screen and (min-width: 769px){
		body #masthead #menu-collapse a{color:{$header_text_color};}
		body #masthead #menu-collapse a:hover{color:{$header_background_color};background-color:{$header_text_color};}
		body #masthead #menu-collapse > ul > li > a::after{border-bottom:1px solid {$header_text_color};}
		body #masthead #menu-collapse > ul > li > ul{background-color:{$header_background_color}ee;background-image:none;}
		}
		";
	}

	/*****************
	 * Main Visual
	 ******************/

	// Text Color
	$top_main_visual_text_color = esc_html( get_theme_mod( 'setting_top_main_visual_text_color', '#ffffff' ) );
	$output .= ".main-visual{color:{$top_main_visual_text_color};}";

	// Image Placeholder Grayscale
	$main_visual_image_placeholder_grayscale = absint( get_theme_mod( 'setting_top_main_visual_image_placeholder_grayscale', '100' ) );
	$output .= ".main-visual img.img-placeholder{filter:blur(15px) grayscale({$main_visual_image_placeholder_grayscale}%);}";

	// Background Color
	$main_visual_background_color = esc_html( get_theme_mod( 'setting_top_main_visual_background_color', '#000000' ) );
	$output .= ".main-visual::after{background-color:{$main_visual_background_color};}";

	// Background Opacity
	$main_visual_background_opacity = absint( get_theme_mod( 'setting_top_main_visual_background_opacity', '30' ) );
	$main_visual_opacity = $main_visual_background_opacity / 100;
	$output .= ".main-visual::after{opacity:{$main_visual_opacity};}";

	// button text color
	$header_main_visual_main_button_text_color = esc_html( get_theme_mod( 'setting_top_main_visual_main_button_text_color', '#ffffff' ) );
	$output .= ".main-visual .main-visual-content a{color:{$header_main_visual_main_button_text_color};}";

	// button color
	$header_main_visual_main_button_color = esc_html( get_theme_mod( 'setting_top_main_visual_main_button_color', '#895892' ) );
	$output .= "
		.main-visual .main-visual-content a{background-color:{$header_main_visual_main_button_color};}
		.main-visual .main-visual-content a:hover{color:{$header_main_visual_main_button_color};background-color:{$header_main_visual_main_button_text_color};}";

	/*****************
	 * Post
	 ******************/

	// Title Background Color
	$post_title_background_color = esc_html( get_theme_mod( 'setting_post_title_background_color', '#333333' ) );
	$output .= ".single header::after{background-color:{$post_title_background_color};}";

	// Title Background Opacity
	$post_title_background_opacity = absint( get_theme_mod( 'setting_post_title_background_opacity', '90' ) );
	$post_header_opacity = $post_title_background_opacity / 100;
	$output .= ".single header::after{opacity:{$post_header_opacity};}";

	// Title Text Color
	$post_title_text_color = esc_html( get_theme_mod( 'setting_post_title_text_color', '#ffffff' ) );
	$output .= ".single .page-header,.single .page-header a{color:{$post_title_text_color};}";

	// Sidebar Width
	$post_sidebar_width = absint( get_theme_mod( 'setting_post_sidebar_width', '300' ) );
	$post_column = esc_html( get_theme_mod( 'setting_post_column', 'none' ) );
	$post_sidebar_margin = $post_sidebar_width + absint( get_theme_mod( 'setting_post_sidebar_margin', '20' ) );

	if ( ! is_page_template( 'templates/sidebar-none.php' ) ){
		if( is_page_template( 'templates/sidebar-right.php' ) ){
			$output .= ".post-template-sidebar-right #main .column { padding-right: {$post_sidebar_margin}px;}";
			$output .= "@media only screen and (max-width:768px) {.post-template-sidebar-right #main .column { padding:0;}}";
			$output .= ".post-template-sidebar-right aside.sidebar { width:{$post_sidebar_width}px; margin-right:-{$post_sidebar_margin}px;}";
		} elseif( is_page_template( 'templates/sidebar-left.php' ) ) {
			$output .= ".post-template-sidebar-left #main .column { padding-left: {$post_sidebar_margin}px;}";
			$output .= "@media only screen and (max-width:768px) {.post-template-sidebar-left #main .column { padding:0;}}";
			$output .= ".post-template-sidebar-left aside.sidebar { width:{$post_sidebar_width}px; margin-left:-{$post_sidebar_margin}px;}";
		} elseif( is_page_template( 'templates/sidebar-bottom.php' ) ) {
			$output .= ".post-template-sidebar-bottom aside.sidebar {width:100%;}";
		} elseif( $post_column !== 'none' ){
			$output .= ".single #main .column { padding-{$post_column}: {$post_sidebar_margin}px;}";
			$output .= "@media only screen and (max-width:768px) {.single #main .column { padding:0;}}";
			$output .= ".single aside.sidebar { width:{$post_sidebar_width}px; margin-{$post_column}:-{$post_sidebar_margin}px;}";
		}
	}

	/*****************
	 * Page
	 ******************/

	// Title Background Color
	$page_title_background_color = esc_html( get_theme_mod( 'setting_page_title_background_color', '#333333' ) );
	$output .= ".page header::after{background-color:{$page_title_background_color};}";

	// Title Background Opacity
	$page_title_background_opacity = absint( get_theme_mod( 'setting_page_title_background_opacity', '90' ) );
	$page_header_opacity = $page_title_background_opacity / 100;
	$output .= ".page header::after{opacity:{$page_header_opacity};}";

	// Title Text Color
	$page_title_text_color = esc_html( get_theme_mod( 'setting_page_title_text_color', '#ffffff' ) );
	$output .= ".page .page-header{color:{$page_title_text_color};}";

	// Sidebar Width
	$page_sidebar_width = absint( get_theme_mod( 'setting_page_sidebar_width','300' ) );
	$page_column = esc_html( get_theme_mod( 'setting_page_column', 'none' ) );
	$page_sidebar_margin = $page_sidebar_width + absint( get_theme_mod( 'setting_page_sidebar_margin', '20' ) );
	if ( ! is_page_template( 'templates/sidebar-none.php' ) ) {
		if( is_page_template( 'templates/sidebar-right.php' ) ){
			$output .= ".page-template-sidebar-right #main .column { padding-right: {$page_sidebar_margin}px;}";
			$output .= "@media only screen and (max-width:768px) {.page-template-sidebar-right #main .column { padding:0;}}";
			$output .= ".page-template-sidebar-right aside { width:{$page_sidebar_width}px; margin-right:-{$page_sidebar_margin}px;}";
		} elseif( is_page_template( 'templates/sidebar-left.php' ) ) {
			$output .= ".page-template-sidebar-left #main .column { padding-left: {$page_sidebar_margin}px;}";
			$output .= "@media only screen and (max-width:768px) {.page-template-sidebar-left #main .column { padding:0;}}";
			$output .= ".page-template-sidebar-left aside { width:{$page_sidebar_width}px; margin-left:-{$page_sidebar_margin}px;}";
		} elseif( is_page_template( 'templates/sidebar-bottom.php' ) ) {
			$output .= ".page-template-sidebar-bottom aside {width:100%;}";
		} elseif( $page_column !== 'none' ){
			$output .= ".page #main .column { padding-{$page_column}: {$page_sidebar_margin}px;}";
			$output .= "@media only screen and (max-width:768px) {.page #main .column { padding:0;}}";
			$output .= ".page aside { width:{$page_sidebar_width}px;margin-{$page_column}:-{$page_sidebar_margin}px;}";
		}
	}


	/*****************
	 * Archive
	 ******************/

	// Archive Contents Width
	$archive_contents_width = absint( get_theme_mod( 'setting_archive_contents_width', '1000' ) );
	$output .= "
		.archive #main .container.column, .search #main .container.column, .paged #main .container.column, .blog #main .container.column, .error404 #main .container.column{max-width:{$archive_contents_width}px;}
		";

	// Title Background Color
	$archive_title_background_color = esc_html( get_theme_mod( 'setting_archive_title_background_color', '#333333' ) );
	$output .= ".archive header::after,.error404 header::after,.search header::after,.paged header::after,.blog header::after{background-color:{$archive_title_background_color};}";

	// Title Background Opacity
	$archive_title_background_opacity = absint( get_theme_mod( 'setting_archive_title_background_opacity', '90' ) );
	$archive_header_opacity = $archive_title_background_opacity / 100;
	$output .= ".archive header::after,.error404 header::after,.search header::after,.paged header::after,.blog header::after{opacity:{$archive_header_opacity};}";

	// Title Text Color
	$archive_title_text_color = esc_html( get_theme_mod( 'setting_archive_title_text_color', '#ffffff' ) );
	$output .= ".archive .page-header,.error404 .page-header,.search .page-header,.paged .page-header,.blog .page-header{color:{$archive_title_text_color};}";

	// Sidebar Width
	$archive_sidebar_width = absint( get_theme_mod( 'setting_archive_sidebar_width','300' ) );
	$archive_column = esc_html( get_theme_mod( 'setting_archive_column', 'none' ) );
	$archive_sidebar_margin = $archive_sidebar_width + absint( get_theme_mod( 'setting_archive_sidebar_margin', '20' ) );
	if( $archive_column !== 'none' ){
		$output .= ".archive #main .column, .blog #main .column{ padding-{$archive_column}: {$archive_sidebar_margin}px;}";
		$output .= "@media only screen and (max-width:768px) {.archive #main .container.column, .blog #main .container.column {padding:0;}}";
		$output .= ".archive aside, .blog aside { width:{$archive_sidebar_width}px;margin-{$archive_column}:-{$archive_sidebar_margin}px;}";
	}

	/*****************
	 * Footer
	 ******************/

	// Footer Contents Width
	$footer_contents_width = absint( get_theme_mod( 'setting_footer_contents_width', '1000' ) );
	$output .= "
		#footer .footer-content .container{max-width:{$footer_contents_width}px;}
		";

	// Widget Text Color
	$footer_widget_text_color = esc_html( get_theme_mod( 'setting_footer_widget_text_color', '#333333' ) );
	$output .= ".footer-widget{color:{$footer_widget_text_color};}";

	// Widget Link Color
	$footer_widget_link_color = esc_html( get_theme_mod( 'setting_footer_widget_link_color', '#0a88cc' ) );
	$output .= ".footer-widget a{color:{$footer_widget_link_color};}";

	// Text Color
	$footer_text_color = esc_html( get_theme_mod( 'setting_footer_text_color', '#333333' ) );
	$output .= "#footer{color:{$footer_text_color};}";

	// Background Color
	$footer_background_color = esc_html( get_theme_mod( 'setting_footer_background_color', '#ffffff' ) );
	$output .= "#footer{background:{$footer_background_color};}";

	// Main Button Color
	$footer_main_button_color = esc_html( get_theme_mod( 'setting_footer_main_button_color', '#333333' ) );
	$output .= "#footer .btn{color:{$footer_main_button_color};border-color:{$footer_main_button_color};}#footer .btn:hover{color:{$footer_background_color};background:{$footer_main_button_color};}";

	// Link Color
	$footer_link_color = esc_html( get_theme_mod( 'setting_footer_link_color', '#0a88cc' ) );
	$output .= "#footer .copyright a{color:{$footer_link_color};}";

	/*****************
	 * Widget Search Box(legacy)
	 ******************/
	$output .= ".footer-widget .wp-block-search .wp-block-search__button{
		color:{$footer_widget_text_color};
		border-color:{$footer_widget_text_color};
		background: transparent;
		fill:{$footer_widget_text_color};
	}";

	$output .= ".footer-widget .wp-block-search .wp-block-search__button:hover{
		background-color:{$footer_widget_text_color};
	}";
	$output .= ".footer-widget .wp-block-search .wp-block-search__input,
	.footer-widget .wp-block-search div,
	.footer-widget thead,
	.footer-widget tr{
		color:{$footer_widget_text_color};
		border-color:{$footer_widget_text_color};
	}";

	$output .= ".footer-widget .wp-block-search .wp-block-search__input::placeholder{
		color:{$footer_widget_text_color}66;
	}";

	$output .= ".footer-widget .wp-block-search .wp-block-search__button:hover{
		color:{$footer_background_color};
		fill:{$footer_background_color};
	}";

	// Output
	if( $output == '' ) return false;
	$str = array( "\t", "\r\n", "\r", "\n" );
	$output = str_replace( $str, '', $output );

	return $output;
}

