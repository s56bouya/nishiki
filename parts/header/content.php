<body <?php body_class(); ?>>
<?php $fixed = ( get_theme_mod( 'setting_header_fixed', true ) ) ? 'fixed' : 'nofixed'; ?>
<div id="masthead" class="<?php echo esc_attr( $fixed ); ?>">
	<div class="flex container">
		<?php
		if( get_header_textcolor() !== 'blank' ){
		?>
		<div class="site_info">
			<a href="<?php echo esc_url( home_url('/') ); ?>">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$site_title = get_theme_mod( 'setting_site_display_title', true );
				if( has_custom_logo() && $site_title ){
					$logo_class = 'display_logo_text';
				} else {
					$logo_class = 'display_title';
				}

				if ( has_custom_logo() ) {
					echo '<img class="' . esc_attr( $logo_class ) . '" src="'. esc_url( $logo[0] ) .'" width="' . absint( $logo[1] ) . '" height="' . absint( $logo[2] ) . '" alt="' . esc_attr( get_bloginfo('name') ) . '">';
				}
				if ( $site_title ) {
					echo '<span class="site_title">' . esc_html( get_bloginfo('name') ) . '</span>';
				}
				?>
			</a>
		</div>
		<?php } ?>
			<nav class="global_nav" role="navigation">
				<?php if( get_theme_mod( 'setting_header_search_button', true ) ){ ?>
					<button id="search_button" class="icon">
						<i class="icomoon icon-search"></i>
					</button>
				<?php } ?>
				<?php if ( has_nav_menu( 'global' ) ) { ?>
					<button id="menu_button" class="icon" aria-controls="top-menu">
						<i class="icomoon icon-menu2"></i>
					</button>
				<?php } ?>
			</nav>
	</div>
</div>
<div id="search_overlay" class="overlay">
	<div class="overlay_inner centering">
		<?php get_search_form(); ?>
		<button class="close"><i class="icomoon icon-close"></i></button>
	</div>
</div>
<div id="menu_overlay" class="overlay">
	<div class="overlay_inner">
		<?php
		$nav_args = array(
			'theme_location' => 'global',
			'container_class' => '',
			'container' => '',
			'menu_id' => '',
			'items_wrap' => '<ul class="container">%3$s</ul>',
		);
		wp_nav_menu($nav_args);
		?>
		<button class="close"><i class="icomoon icon-close"></i></button>
	</div>
</div>
<?php
if( is_single() && get_theme_mod( 'setting_post_column', 'none' ) !== 'none' ){
	$column = ' sidebar-' . get_theme_mod( 'setting_post_column', 'none' );
} else if( is_page() && get_theme_mod( 'setting_page_column' , 'none' ) !== 'none' ){
	$column = ' sidebar-' . get_theme_mod( 'setting_page_column' , 'none' );
} else {
	$column = '';
}
?>
<div id="page" class="site">
	<div class="content<?php echo esc_attr( $column ); ?>">
		<div id="content" class="site-content">
