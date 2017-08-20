<?php
// Add Costomizer CSS
function nishiki_customizer_css(){
	$bgcolor = get_background_color();
	$output = '';

	/*****************
	* Title Tagline
	******************/

	// Site Logo
	$site_logo = get_theme_mod( 'setting_site_logo', false );
	if( $site_logo ){
		$output .= "
		.site_info a{background-image:url({$site_logo});padding-left:70px;}
		@media only screen and (max-width:680px){.site_info a{background-image:url({$site_logo});padding-left:60px;}}
		";
	}

	// Site Contents Width
	$site_contents_width = get_theme_mod( 'setting_site_contents_width', '1200' );
	$output .= "
		.container{max-width:{$site_contents_width}px;}
		";

	// Site Main Text Color
	$site_main_text_color = get_theme_mod( 'setting_site_main_text_color', '#000000' );
	$output .= "
		body,.articles a{color:{$site_main_text_color};}
		.articles header,.articles header a{color:{$site_main_text_color};}
		aside .search_box .input input{border-color:{$site_main_text_color};}
		.nav_pc a{color:{$site_main_text_color};}
		.nav_pc ul{background-color:#{$bgcolor};}
		aside .search_box .submit button{border-color:{$site_main_text_color};color:{$site_main_text_color}}
		aside .search_box .submit button:hover{background:{$site_main_text_color};color:{$bgcolor};}
		.comments-area .submit{border-color:{$site_main_text_color};}
		.comments-area .submit:hover{background:{$site_main_text_color};color:{$bgcolor};}
		.comments-area .submit{color:{$site_main_text_color}}
		";

	// Site Sub Text Color
	$site_sub_text_color = get_theme_mod( 'setting_site_sub_text_color', '#aaaaaa' );
	$output .= "
		.articles footer,.articles footer a{color:{$site_sub_text_color};}
		aside section a,aside section ul li,.comments-area .comment-list li .comment-body,.comments-area .comment-form-comment{border-color:{$site_sub_text_color};}
		.nav_pc a:hover{color:{$site_sub_text_color};}
		.comments-area .comment-list li .comment-date,.comments-area cite,.comments-area cite a{color:{$site_sub_text_color};}
		.comments-area .comment-respond textarea,.comments-area .comment-respond input[type=text],.comments-area .comment-respond input[type=email],.comments-area .comment-respond input[type=url]{border-color:{$site_sub_text_color};}
		.comments-area .comment-form-comment{border-color:{$site_sub_text_color};}
		.single .entry-content table th,.single .entry-content table td,
		.page .entry-content table th,.page .entry-content table td{border-color:{$site_sub_text_color};}
		";

	// Site Main Color
	$site_main_color = get_theme_mod( 'setting_site_main_color', '#0a88cc' );
	$output .= "
		.entry-content a,aside a,.comments-area a,.pagination a,.author_info a,.post-navigation a{color:{$site_main_color};}
		aside .tagcloud a{border-color:{$site_main_color};}
		";

	// Site Sub Color
	$site_sub_color = get_theme_mod( 'setting_site_sub_color', '#0044a3' );
	$output .= "
		.entry-content a:hover,aside a:hover,.comments-area a:hover,.pagination a:hover,.author_info a:hover,.post-navigation a:hover{color:{$site_sub_color};}
		";

	// Site Font Size
	$site_font_size = get_theme_mod( 'setting_site_font_size', '16' );
	$output .= "
		html,button,input[type=submit]{font-size:{$site_font_size}px;}
		";

	$output .= nishiki_custom_background_cb();

	/*****************
	 * Top
	 ******************/

	// Recently Post background color
	$top_recently_article_sticky_background_color = get_theme_mod( 'setting_top_recently_article_sticky_background_color', '#557c4c' );
	$output .= ".articles article.sticky::before{border-color:{$top_recently_article_sticky_background_color} transparent transparent transparent;}";

	/*****************
	 * Front
	 ******************/

	// Site Font Size
	for( $i = 1; $i <= SECTION_NUM; ++$i ) {
		// Text Color
		$front_page_text_color = get_theme_mod( 'setting_front_page_text_color' . $i, '#ffffff' );
		$output .= "#front-page-section{$i}{color:{$front_page_text_color};}";

		// Text Align
		$front_page_text_align = get_theme_mod( 'setting_front_page_text_align' . $i, 'left' );
		$output .= "#front-page-section{$i}{text-align:{$front_page_text_align};}";
		if( $front_page_text_align !== 'center' ){
			$output .= "#front-page-section{$i} .sub_text{padding-{$front_page_text_align}:0;}";
		}

		// Background Color
		$front_page_background_color = get_theme_mod( 'setting_front_page_background_color' . $i, '#000000' );
		$output .= "#front-page-section{$i} .mask{background-color:{$front_page_background_color};}";

		// Background Opacity
		$front_page_background_opacity = get_theme_mod( 'setting_front_page_background_opacity' . $i, '30' );
		$front_page_opacity = $front_page_background_opacity / 100;
		$output .= "#front-page-section{$i} .mask{opacity:{$front_page_opacity};}";


		// Button Text Color
		$front_page_button_text_color = get_theme_mod( 'setting_front_page_button_text_color' . $i, '#ffffff' );
		$output .= "#front-page-section{$i} .main_button a{color:{$front_page_button_text_color};}";

		// Button Link Color
		$front_page_button_link_color = get_theme_mod( 'setting_front_page_button_link_color' . $i, '#000000' );
		$output .= "#front-page-section{$i} .main_button a{background-color:{$front_page_button_link_color};}";

		// Button Hover
		$output .= "#front-page-section{$i} .main_button a:hover{background-color:{$front_page_button_text_color};color:{$front_page_button_link_color};}";

	}


	/*****************
	 * Header
	 ******************/

	// background color
	$header_background_color = get_theme_mod( 'setting_header_background_color', '#ffffff' );
	$output .= "#masthead{background:{$header_background_color};}";

	// text color
	$header_text_color = get_theme_mod( 'setting_header_text_color', '#000000' );
	$output .= "
		#masthead .site_info a{color:{$header_text_color};}
		#masthead .icon{border-color:{$header_text_color};color:{$header_text_color}}
		#masthead .icon:hover{color:{$header_background_color};background:{$header_text_color};}"
	;

	// Fixed Header Color
	$header_fixed = get_theme_mod( 'setting_header_fixed', true );
	if( $header_fixed == true ){
		$header_fixed_color = get_theme_mod( 'setting_header_fixed_color', 'dark' );
		if( $header_fixed_color == 'light' ){
			$output .= "
			#masthead.fixed{background:rgba(255,255,255,0.6);}
			#masthead.fixed .site_info a{color:#000;}
			#masthead.fixed .icon{border-color:#000;color:#000;}
			#masthead.fixed .icon:hover{background-color:#000;color:#fff;}
			";
		} elseif( $header_fixed_color == 'dark' ){
			$output .= "
			#masthead.fixed{background:rgba(0,0,0,0.2);}
			#masthead.fixed .site_info a{color:#fff;}
			#masthead.fixed .icon{border-color:#fff;color:#fff;}
			#masthead.fixed .icon:hover{background-color:#fff;color:#000;}
			";
		}
		$output .= "
		body.scrolled #masthead{background:{$header_background_color};}
		body.scrolled #masthead .site_info a{color:{$header_text_color};}
		body.scrolled #masthead .icon{border-color:{$header_text_color};color:{$header_text_color}}
		body.scrolled #masthead .icon:hover{color:{$header_background_color};background:{$header_text_color};}
		";
	}


	/*****************
	 * Main Visual
	 ******************/

	// Text Color
	$top_main_visual_text_color = get_theme_mod( 'setting_top_main_visual_text_color', '#ffffff' );
	$output .= ".main_visual{color:{$top_main_visual_text_color};}";

	// Background Color
	$main_visual_background_color = get_theme_mod( 'setting_top_main_visual_background_color', '#000000' );
	$output .= ".main_visual .mask{background-color:{$main_visual_background_color};}";

	// Background Opacity
	$main_visual_background_opacity = get_theme_mod( 'setting_top_main_visual_background_opacity', '30' );
	$main_visual_opacity = $main_visual_background_opacity / 100;
	$output .= ".main_visual .mask{opacity:{$main_visual_opacity};}";

	// button text color
	$header_main_visual_main_button_text_color = get_theme_mod( 'setting_top_main_visual_main_button_text_color', '#ffffff' );
	$output .= ".main_visual .main_visual_content a{color:{$header_main_visual_main_button_text_color};}";

	// button color
	$header_main_visual_main_button_color = get_theme_mod( 'setting_top_main_visual_main_button_color', '#895892' );
	$output .= "
		.main_visual .main_visual_content a{background-color:{$header_main_visual_main_button_color};}
		.main_visual .main_visual_content a:hover{color:{$header_main_visual_main_button_color};background-color:{$header_main_visual_main_button_text_color};}";


	/*****************
	 * Post
	 ******************/

	// Title Background Color
	$post_title_background_color = get_theme_mod( 'setting_post_title_background_color', '#000000' );
	$output .= ".single header .mask{background-color:{$post_title_background_color};}";

	// Title Background Opacity
	$post_title_background_opacity = get_theme_mod( 'setting_post_title_background_opacity', '100' );
	$post_header_opacity = $post_title_background_opacity / 100;
	$output .= ".single header .mask{opacity:{$post_header_opacity};}";

	// Title Text Color
	$post_title_text_color = get_theme_mod( 'setting_post_title_text_color', '#ffffff' );
	$output .= ".single .page_header,.single .page_header a{color:{$post_title_text_color};}";

	// Sidebar Width
	$post_sidebar_width = get_theme_mod( 'setting_post_sidebar_width', '300' );
	$post_column = get_theme_mod( 'setting_post_column', 'none' );
	if( $post_column !== 'none' ){
		$post_sidebar_margin = $post_sidebar_width + get_theme_mod( 'setting_post_sidebar_margin', '20' );
		$output .= ".single #main .column { padding-{$post_column}: {$post_sidebar_margin}px;}";
		$output .= "@media only screen and (max-width:1000px) {.single #main .column { padding:0;}}";
		$output .= ".single aside { width:{$post_sidebar_width}px; margin-{$post_column}:-{$post_sidebar_margin}px;}";
	}

	/*****************
	 * Page
	 ******************/

	// Title Background Color
	$page_title_background_color = get_theme_mod( 'setting_page_title_background_color', '#000000' );
	$output .= ".page header .mask{background-color:{$page_title_background_color};}";

	// Title Background Opacity
	$page_title_background_opacity = get_theme_mod( 'setting_page_title_background_opacity', '100' );
	$page_header_opacity = $page_title_background_opacity / 100;
	$output .= ".page header .mask{opacity:{$page_header_opacity};}";

	// Title Text Color
	$page_title_text_color = get_theme_mod( 'setting_page_title_text_color', '#ffffff' );
	$output .= ".page .page_header{color:{$page_title_text_color};}";

	// Sidebar Width
	$page_sidebar_width = get_theme_mod( 'setting_page_sidebar_width','300' );
	$page_column = get_theme_mod( 'setting_page_column', 'none' );
	if( $page_column !== 'none' ){
		$page_sidebar_margin = $page_sidebar_width + get_theme_mod( 'setting_page_sidebar_margin', '20' );
		$output .= ".page #main .column { padding-{$page_column}: {$page_sidebar_margin}px;}";
		$output .= "@media only screen and (max-width:1000px) {.page #main .column { padding:0;}}";
		$output .= ".page aside { width:{$page_sidebar_width}px;margin-{$page_column}:-{$page_sidebar_margin}px;}";
	}

	/*****************
	 * Archive
	 ******************/

	// Title Background Color
	$archive_title_background_color = get_theme_mod( 'setting_archive_title_background_color', '#000000' );
	$output .= ".archive header .mask,.error404 header .mask,.search header .mask,.paged header .mask{background-color:{$archive_title_background_color};}";

	// Title Background Opacity
	$archive_title_background_opacity = get_theme_mod( 'setting_archive_title_background_opacity', '100' );
	$archive_header_opacity = $archive_title_background_opacity / 100;
	$output .= ".archive header .mask,.error404 header .mask,.search header .mask,.paged header .mask{opacity:{$archive_header_opacity};}";

	// Title Text Color
	$archive_title_text_color = get_theme_mod( 'setting_archive_title_text_color', '#ffffff' );
	$output .= ".archive .page_header,.error404 .page_header,.search .page_header,.paged .page_header{color:{$archive_title_text_color};}";

	/*****************
	 * Footer
	 ******************/

	// Text Color
	$footer_text_color = get_theme_mod( 'setting_footer_text_color', '#000000' );
	$output .= "#footer{color:{$footer_text_color};}";

	// Background Color
	$footer_background_color = get_theme_mod( 'setting_footer_background_color', '#ffffff' );
	$output .= "#footer{background:{$footer_background_color};}";

	// Main Button Color
	$footer_main_button_color = get_theme_mod( 'setting_footer_main_button_color', '#000000' );
	$output .= "#footer .btn{color:{$footer_main_button_color};border-color:{$footer_main_button_color};}#footer .btn:hover{color:{$footer_background_color};background:{$footer_main_button_color};}";

	// Link Color
	$footer_link_color = get_theme_mod( 'setting_footer_link_color', '#0a88cc' );
	$output .= "#footer .copyright a{color:{$footer_link_color};}";


	// outout
	if( $output == '' ) return false;
	$str = array( "\t", "\r\n", "\r", "\n" );
	$output = str_replace( $str, '', $output );

	return $output;
}

