<div class="footer_content">
	<div class="footer_inner">
		<?php
			if( get_theme_mod( 'setting_footer_main_text', __( 'Main Text', 'nishiki' ) ) ){
				echo '<h3>' . esc_html( get_theme_mod( 'setting_footer_main_text', __( 'Main Text', 'nishiki' ) ) ) . '</h3>';
			}
			if( get_theme_mod( 'setting_footer_main_button_text', __( 'Button Text', 'nishiki' ) ) ){
				$target = ( get_theme_mod( 'setting_footer_main_button_link_target', false ) == true ) ? ' target="_blank"' : '';
				echo '<a class="btn"' . esc_attr( $target ) . ' href="' . esc_url_raw( get_theme_mod( 'setting_footer_main_button_link' ) ) . '">' . esc_html( get_theme_mod( 'setting_footer_main_button_text', __( 'Button Text', 'nishiki' ) ) ) . '</a>';
			}
		?>
		<p class="copyright">
			<?php
			if( get_theme_mod( 'setting_footer_copyright', NISHIKI_CREDIT ) ){
				echo get_theme_mod( 'setting_footer_copyright', NISHIKI_CREDIT );
			}
			?>
		</p>
	</div>
</div>
