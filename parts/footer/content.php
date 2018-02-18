<div class="footer-content">
	<div class="footer-inner container">
		<?php
			if( get_theme_mod( 'setting_footer_main_text' ) == true ){
				echo '<h3>' . esc_html( get_theme_mod( 'setting_footer_main_text', __( 'Main Text', 'nishiki' ) ) ) . '</h3>';
			}
			if( get_theme_mod( 'setting_footer_main_button_text' ) == true && get_theme_mod( 'setting_footer_main_button_link' ) == true ){
				?>
					<a class="btn" <?php if( get_theme_mod( 'setting_footer_main_button_link_target', false ) == true ){ ?>target="_blank"
				<?php }
				echo 'href="' . esc_url( get_theme_mod( 'setting_footer_main_button_link' ) ) . '">' . esc_html( get_theme_mod( 'setting_footer_main_button_text', __( 'Button Text', 'nishiki' ) ) ) . '</a>';
			}
		?>
		<p class="copyright">
			<?php
			if( get_theme_mod( 'setting_footer_copyright', NISHIKI_CREDIT ) ){
				echo wp_kses_post( get_theme_mod( 'setting_footer_copyright', NISHIKI_CREDIT ) );
			}
			?>
		</p>
	</div>
</div>
