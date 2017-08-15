<body <?php body_class(); ?>>
<?php $fixed = ( get_theme_mod( 'setting_header_fixed', true ) ) ? ' class="fixed"' : ''; ?>
<div id="masthead"<?php echo $fixed;?>>
	<div class="flex container">
		<div class="site_info">
			<a href="<?php echo esc_attr( get_home_url('/') ); ?>">
				<?php
				if( get_theme_mod( 'setting_site_display_title', true ) ){
					echo esc_html( get_bloginfo('name') );
				}
				?>
			</a>
		</div>
			<nav class="global_nav" role="navigation">
				<?php if( get_theme_mod( 'setting_header_search_button', true ) ){ ?>
					<button id="search_button" class="icon"><i class="material-icons">search</i></button>
				<?php } ?>
				<?php if ( has_nav_menu( 'global' ) ) { ?>
					<button id="menu_button" class="icon" aria-controls="top-menu"><i class="material-icons">menu</i></button>
				<?php } ?>
			</nav>
	</div>
</div>
<div id="search_overlay" class="overlay">
	<div class="overlay_inner centering">
		<?php echo get_search_form(); ?>
		<button class="close"><i class="material-icons">close</i></button>
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
		<button class="close"><i class="material-icons">close</i></button>
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
