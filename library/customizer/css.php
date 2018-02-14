<?php
// Add Costomizer CSS
function nishiki_customizer_css(){
	$output = '';

	/*****************
	* Title Tagline
	******************/

	// Site Contents Width
	$site_contents_width = absint( get_theme_mod( 'setting_site_contents_width', '1200' ) );
	$output .= "
		.container{max-width:{$site_contents_width}px;}
		";

	// Site Background Color
	$site_background_color = esc_html( get_theme_mod( 'setting_site_background_color', '#ffffff' ) );
	$output .= "
		body{background-color:{$site_background_color};}
		";

	// Site Main Text Color
	$site_main_text_color = esc_html( get_theme_mod( 'setting_site_main_text_color', '#000000' ) );
	$output .= "
		body,.articles a{color:{$site_main_text_color};}
		.articles header,.articles header a{color:{$site_main_text_color};}
		aside .search-box .input input{border-color:{$site_main_text_color};}
		.nav_pc a{color:{$site_main_text_color};}
		aside .search-box .submit button{border-color:{$site_main_text_color};color:{$site_main_text_color};}
		aside .search-box .submit button:hover{background:{$site_main_text_color};color:{$site_background_color};}
		.comments-area .submit{border-color:{$site_main_text_color};}
		.comments-area .submit:hover{background:{$site_main_text_color};color:{$site_background_color};}
		.comments-area .submit{color:{$site_main_text_color};}
		input[type=\"submit\"]{border-color:{$site_main_text_color};color:{$site_main_text_color};}
		input:hover[type=\"submit\"]{background:{$site_main_text_color};color:{$site_background_color};}
		";

	// Site Sub Text Color
	$site_sub_text_color = esc_html( get_theme_mod( 'setting_site_sub_text_color', '#aaaaaa' ) );
	$output .= "
		.articles footer,.articles footer a{color:{$site_sub_text_color};}
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
		.entry-content a,aside a,.comments-area a,.pagination a,.author-info a,.post-navigation a{color:{$site_main_color};}
		aside .tagcloud a{border-color:{$site_main_color};}
		";

	// Site Sub Color
	$site_sub_color = esc_html( get_theme_mod( 'setting_site_sub_color', '#0044a3' ) );
	$output .= "
		.entry-content a:hover,aside a:hover,.comments-area a:hover,.pagination a:hover,.author-info a:hover,.post-navigation a:hover{color:{$site_sub_color};}
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

	// Site Font Size
	for( $i = 1; $i <= NISHIKI_SECTION_NUM; ++$i ) {
		// Text Color
		$front_page_text_color = esc_html( get_theme_mod( 'setting_front_page_text_color' . $i, '#000000' ) );
		$output .= "#front-page-section{$i}{color:{$front_page_text_color};}";

		// Text Align
		$front_page_text_align = esc_html( get_theme_mod( 'setting_front_page_text_align' . $i, 'left' ) );
		$output .= "#front-page-section{$i}{text-align:{$front_page_text_align};}";
		if( $front_page_text_align !== 'center' ){
			$output .= "#front-page-section{$i} .sub-text{padding-{$front_page_text_align}:0;}";
		}

		// Background Color
		$front_page_background_color = esc_html( get_theme_mod( 'setting_front_page_background_color' . $i, '#000000' ) );
		$output .= "#front-page-section{$i}::after{background-color:{$front_page_background_color};}";

		// Background Opacity
		$front_page_background_opacity = absint( get_theme_mod( 'setting_front_page_background_opacity' . $i, '30' ) );
		$front_page_opacity = $front_page_background_opacity / 100;
		$output .= "#front-page-section{$i}::after{opacity:{$front_page_opacity};}";

		// Button Text Color
		$front_page_button_text_color = esc_html( get_theme_mod( 'setting_front_page_button_text_color' . $i, '#ffffff' ) );
		$output .= "#front-page-section{$i} .main-button a{color:{$front_page_button_text_color};}";

		// Button Link Color
		$front_page_button_link_color = esc_html( get_theme_mod( 'setting_front_page_button_link_color' . $i, '#000000' ) );
		$output .= "#front-page-section{$i} .main-button a{background-color:{$front_page_button_link_color};}";

		// Button Hover
		$output .= "#front-page-section{$i} .main-button a:hover{background-color:{$front_page_button_text_color};color:{$front_page_button_link_color};}";

	}

	/*****************
	 * Header
	 ******************/

	// background color
	$header_background_color = esc_html( get_theme_mod( 'setting_header_background_color', '#ffffff' ) );
	$output .= "#masthead{background:{$header_background_color};}";

	// text color
	$header_text_color = ( ! get_header_textcolor() ) ? '#000000' : '#' . esc_html( get_theme_mod( 'header_textcolor', '000000' ) );

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
			#masthead.fixed #menu-collapse a:hover{background-color:#ffffff88;}
			#masthead.fixed #menu-collapse > ul > li > a::after{border-color:#000;}
			#masthead.fixed #menu-collapse > ul > li > ul{background-color:#ffffffcc;}
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
			#masthead.fixed #menu-collapse a:hover{background-color:#000000aa;}
			#masthead.fixed #menu-collapse > ul > li > a::after{border-color:#fff;}
			#masthead.fixed #menu-collapse > ul > li > ul{background-color:#00000060;}
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
	$post_title_background_color = esc_html( get_theme_mod( 'setting_post_title_background_color', '#000000' ) );
	$output .= ".single header::after{background-color:{$post_title_background_color};}";

	// Title Background Opacity
	$post_title_background_opacity = absint( get_theme_mod( 'setting_post_title_background_opacity', '100' ) );
	$post_header_opacity = $post_title_background_opacity / 100;
	$output .= ".single header::after{opacity:{$post_header_opacity};}";

	// Title Text Color
	$post_title_text_color = esc_html( get_theme_mod( 'setting_post_title_text_color', '#ffffff' ) );
	$output .= ".single .page-header,.single .page-header a{color:{$post_title_text_color};}";

	// Sidebar Width
	$post_sidebar_width = absint( get_theme_mod( 'setting_post_sidebar_width', '300' ) );
	$post_column = esc_html( get_theme_mod( 'setting_post_column', 'none' ) );
	if( $post_column !== 'none' ){
		$post_sidebar_margin = $post_sidebar_width + absint( get_theme_mod( 'setting_post_sidebar_margin', '20' ) );
		$output .= ".single #main .column { padding-{$post_column}: {$post_sidebar_margin}px;}";
		$output .= "@media only screen and (max-width:1000px) {.single #main .column { padding:0;}}";
		$output .= ".single aside { width:{$post_sidebar_width}px; margin-{$post_column}:-{$post_sidebar_margin}px;}";
	}

	/*****************
	 * Page
	 ******************/

	// Title Background Color
	$page_title_background_color = esc_html( get_theme_mod( 'setting_page_title_background_color', '#000000' ) );
	$output .= ".page header::after{background-color:{$page_title_background_color};}";

	// Title Background Opacity
	$page_title_background_opacity = absint( get_theme_mod( 'setting_page_title_background_opacity', '100' ) );
	$page_header_opacity = $page_title_background_opacity / 100;
	$output .= ".page header::after{opacity:{$page_header_opacity};}";

	// Title Text Color
	$page_title_text_color = esc_html( get_theme_mod( 'setting_page_title_text_color', '#ffffff' ) );
	$output .= ".page .page-header{color:{$page_title_text_color};}";

	// Sidebar Width
	$page_sidebar_width = absint( get_theme_mod( 'setting_page_sidebar_width','300' ) );
	$page_column = esc_html( get_theme_mod( 'setting_page_column', 'none' ) );
	if( $page_column !== 'none' ){
		$page_sidebar_margin = $page_sidebar_width + absint( get_theme_mod( 'setting_page_sidebar_margin', '20' ) );
		$output .= ".page #main .column { padding-{$page_column}: {$page_sidebar_margin}px;}";
		$output .= "@media only screen and (max-width:1000px) {.page #main .column { padding:0;}}";
		$output .= ".page aside { width:{$page_sidebar_width}px;margin-{$page_column}:-{$page_sidebar_margin}px;}";
	}

	/*****************
	 * Archive
	 ******************/

	// Title Background Color
	$archive_title_background_color = esc_html( get_theme_mod( 'setting_archive_title_background_color', '#000000' ) );
	$output .= ".archive header::after,.error404 header::after,.search header::after,.paged header::after{background-color:{$archive_title_background_color};}";

	// Title Background Opacity
	$archive_title_background_opacity = absint( get_theme_mod( 'setting_archive_title_background_opacity', '100' ) );
	$archive_header_opacity = $archive_title_background_opacity / 100;
	$output .= ".archive header::after,.error404 header::after,.search header::after,.paged header::after{opacity:{$archive_header_opacity};}";

	// Title Text Color
	$archive_title_text_color = esc_html( get_theme_mod( 'setting_archive_title_text_color', '#ffffff' ) );
	$output .= ".archive .page-header,.error404 .page-header,.search .page-header,.paged .page-header{color:{$archive_title_text_color};}";

	/*****************
	 * Footer
	 ******************/

	// Text Color
	$footer_text_color = esc_html( get_theme_mod( 'setting_footer_text_color', '#000000' ) );
	$output .= "#footer{color:{$footer_text_color};}";

	// Background Color
	$footer_background_color = esc_html( get_theme_mod( 'setting_footer_background_color', '#ffffff' ) );
	$output .= "#footer{background:{$footer_background_color};}";

	// Main Button Color
	$footer_main_button_color = esc_html( get_theme_mod( 'setting_footer_main_button_color', '#000000' ) );
	$output .= "#footer .btn{color:{$footer_main_button_color};border-color:{$footer_main_button_color};}#footer .btn:hover{color:{$footer_background_color};background:{$footer_main_button_color};}";

	// Link Color
	$footer_link_color = esc_html( get_theme_mod( 'setting_footer_link_color', '#0a88cc' ) );
	$output .= "#footer .copyright a{color:{$footer_link_color};}";

	// Output
	if( $output == '' ) return false;
	$str = array( "\t", "\r\n", "\r", "\n" );
	$output = str_replace( $str, '', $output );

	return $output;
}

