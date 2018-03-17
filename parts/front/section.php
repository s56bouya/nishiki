<?php
$section_count = NISHIKI_SECTION_NUM;
for( $i = 1; $i <= $section_count; ++$i ){
	if( get_theme_mod( 'setting_front_page_section' . $i, 'disabled' ) !== 'disabled' ){
	  $image = '';
	  $image_output = '';
	  if( get_theme_mod( 'setting_front_page_image' . $i, '' ) ){
		  $image = get_theme_mod( 'setting_front_page_image' . $i, '' );
	    $image_id       = attachment_url_to_postid( $image );
	    $image_large = ' data-src="' . $image . '"';
	    $image_data     = wp_get_attachment_image_src( $image_id, 'nishiki-thumbnail' );
	    if( $image_data[3] === true && get_theme_mod( 'setting_front_page_image_placeholder_display' . $i ) ){
		    $image_thumbnail = esc_url( $image_data[0] );
		    $image_output = '<img class="img-placeholder" src="' . $image_thumbnail . '" alt="">';
	    }
	  } else {
		  $image_large = '';
	  }

		do_action( 'nishiki_before_front_page_section' . $i . '_content' );
		?>
			<section id="front-page-section<?php echo absint( $i ); ?>" class="front-page-section"<?php echo $image_large; ?>>
		  <?php
			if ( $image ) {
		  	echo $image_output;
		  }
		  ?>
				<div class="container">
			<?php
			if( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ){
				echo '<p class="main-text">' . esc_html( get_theme_mod( 'setting_front_page_main_text' . $i, __( 'Main Text', 'nishiki' ) ) ) . '</p>';
			}
			if( get_theme_mod( 'setting_front_page_sub_text' . $i, __( 'Sub Text', 'nishiki' ) ) ){
				echo '<p class="sub-text">' . esc_html( get_theme_mod( 'setting_front_page_sub_text' . $i, __( 'Sub Text', 'nishiki' ) ) ) . '</p>';
			}
			if( get_theme_mod( 'setting_front_page_button_text' . $i, __( 'Button Text', 'nishiki' ) ) ){
				?>
							<p class="main-button"><a <?php if( get_theme_mod( 'setting_front_page_button_link_target' . $i, false ) == true ){ ?>target="_blank"
				<?php }
				echo ' href="' . esc_url( get_theme_mod( 'setting_front_page_button_link' . $i, '#' ) ) . '">' . esc_html( get_theme_mod( 'setting_front_page_button_text' . $i,  __( 'Button Text', 'nishiki' ) ) ) . '</a></p>';
			}
			?>
				</div>
			</section>
		<?php
		do_action( 'nishiki_after_front_page_section' . $i . '_content' );
	}
}
