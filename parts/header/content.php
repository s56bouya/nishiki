<body <?php body_class(); ?>>
<?php $fixed = ( get_theme_mod( 'setting_header_fixed', true ) ) ? 'fixed' : 'nofixed'; ?>
<?php do_action( 'nishiki_before_site_header' ); ?>
<div id="masthead" class="<?php echo esc_attr( $fixed ); ?>">
	<div class="flex container">
		<?php if( get_header_textcolor() !== 'blank' || has_custom_logo() ) { ?>
		<div class="site-info">
			<a href="<?php echo esc_url( home_url('/') ); ?>">
				<?php
				if ( has_custom_logo() ) {
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					echo '<img src="'. esc_url( $logo[0] ) .'" width="' . absint( $logo[1] ) . '" height="' . absint( $logo[2] ) . '" alt="' . esc_attr( get_bloginfo('name') ) . '">';
				} elseif ( get_header_textcolor() !== 'blank' ) {
					echo '<span class="site-title">' . esc_html( get_bloginfo('name') ) . '</span>';
				}
				?>
			</a>
		</div>
		<?php } ?>

			<nav class="global-nav" role="navigation">
				<?php if( has_nav_menu( 'global' ) && get_theme_mod( 'setting_header_menu_collapse', false ) ){ ?>
					<div class="menu-collapse panel" id="menu-collapse">
						<?php
						$nav_args = array(
							'theme_location' => 'global',
							'container_class' => '',
							'container' => '',
							'menu_id' => '',
							'items_wrap' => '<ul>%3$s</ul>',
						);
						wp_nav_menu($nav_args);
						?>
						<button id="close-panel-button" class="close"><i class="icomoon icon-close"></i></button>
					</div>
				<?php } ?>
				<?php if( get_theme_mod( 'setting_header_search_button', true ) ){ ?>
					<button id="search-button" class="icon">
						<i class="icomoon icon-search"></i>
					</button>
				<?php } ?>
				<?php if ( has_nav_menu( 'global' ) ) { ?>
					<?php if( get_theme_mod( 'setting_header_menu_collapse', false ) ) { ?>
						<button id="menu-collapse-button" class="icon" aria-controls="top-menu">
							<i class="icomoon icon-menu2"></i>
						</button>
					<?php } else { ?>
						<button id="menu-button" class="icon" aria-controls="top-menu">
							<i class="icomoon icon-menu2"></i>
						</button>
					<?php } ?>
				<?php } ?>
			</nav>
	</div>
</div>
<?php do_action( 'nishiki_after_site_header' ); ?>
<?php if( get_theme_mod( 'setting_header_search_button', true ) ){ ?>
<div id="search-overlay" class="overlay">
	<div class="overlay-inner centering">
		<?php get_search_form(); ?>
		<button class="close"><i class="icomoon icon-close"></i></button>
	</div>
</div>
<?php } ?>
<?php if( has_nav_menu( 'global' ) && get_theme_mod( 'setting_header_menu_collapse', false ) === false ){ ?>
<div id="menu-overlay" class="overlay">
	<div class="overlay-inner">
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
<?php } ?>
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
