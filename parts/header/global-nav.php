<?php do_action( 'nishiki_before_site_nav' ); ?>
<nav class="global-nav" role="navigation">
	<?php do_action( 'nishiki_before_site_nav_inner' ); ?>
	<?php if( has_nav_menu( 'global' ) && get_theme_mod( 'setting_header_menu_collapse', false ) ){ ?>
			<div class="menu-collapse panel" id="menu-collapse">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'global',
					'container_class' => '',
					'container' => '',
					'menu_id' => '',
					'items_wrap' => '<ul class="menu-items">%3$s</ul>',
				)
			);
			?>
				<button id="close-panel-button" class="close" aria-label="<?php esc_attr_e( 'close', 'nishiki' ); ?>"><i class="icomoon icon-close"></i></button>
			</div>
	<?php } ?>
	<?php if( get_theme_mod( 'setting_header_search_button', true ) ){ ?>
		<?php do_action( 'nishiki_before_site_nav_inner_search_button' ); ?>
			<button id="search-button" class="icon">
				<i class="icomoon icon-search"></i>
			</button>
		<?php do_action( 'nishiki_after_site_nav_inner_search_button' ); ?>
	<?php } ?>
	<?php if ( has_nav_menu( 'global' ) ) { ?>
		<?php if( get_theme_mod( 'setting_header_menu_collapse', false ) ) { ?>
			<?php do_action( 'nishiki_before_site_nav_inner_menu_collapse_button' ); ?>
				<button id="menu-collapse-button" class="icon" aria-controls="menu-overlay">
					<i class="icomoon icon-menu2"></i>
				</button>
			<?php do_action( 'nishiki_after_site_nav_inner_menu_collapse_button' ); ?>
		<?php } else { ?>
			<?php do_action( 'nishiki_before_site_nav_inner_menu_button' ); ?>
				<button id="menu-button" class="icon" aria-controls="menu-overlay">
					<i class="icomoon icon-menu2"></i>
				</button>
			<?php do_action( 'nishiki_after_site_nav_inner_menu_button' ); ?>
		<?php } ?>
	<?php } ?>
	<?php do_action( 'nishiki_after_site_nav_inner' ); ?>
</nav>
<?php do_action( 'nishiki_after_site_nav' ); ?>
