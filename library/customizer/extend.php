<?php
// Add Rrange Customizer
if( class_exists( 'WP_Customize_Control' ) ) {
	class WP_Customize_Range extends WP_Customize_Control {
		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min' => 0,
				'max' => 10,
				'step' => 1
			);
			$args = wp_parse_args( $args, $defaults );

			$this->min = $args['min'];
			$this->max = $args['max'];
			$this->step = $args['step'];
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input class='range-slider' min="<?php echo intval( $this->min ); ?>" max="<?php echo intval( $this->max ); ?>" step="<?php echo intval( $this->step ); ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>'>

			</label>
			<?php
		}
	}
}

// Custom Background
$background_args = array(
	'default-color'     => '#ffffff',
	'wp-head-callback'  => 'custom_background_cb',
);

add_theme_support( "custom-background", $background_args );

// custom background callback
function custom_background_cb() {
	// $background is the saved custom image, or the default image.
	$background = set_url_scheme( get_background_image() );

	// $color is the saved custom color.
	// A default has to be specified in style.css. It will not be printed here.
	$color = get_background_color();

	if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
		$color = false;
	}

	if ( ! $background && ! $color ) {
		if ( is_customize_preview() ) {
			echo '<style type="text/css" id="custom-background-css"></style>';
		}
		return;
	}

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = ' background-image: url("' . esc_url_raw( $background ) . '");';

		// Background Position.
		$position_x = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
		$position_y = get_theme_mod( 'background_position_y', get_theme_support( 'custom-background', 'default-position-y' ) );

		if ( ! in_array( $position_x, array( 'left', 'center', 'right' ), true ) ) {
			$position_x = 'left';
		}

		if ( ! in_array( $position_y, array( 'top', 'center', 'bottom' ), true ) ) {
			$position_y = 'top';
		}

		$position = " background-position: $position_x $position_y;";

		// Background Size.
		$size = get_theme_mod( 'background_size', get_theme_support( 'custom-background', 'default-size' ) );

		if ( ! in_array( $size, array( 'auto', 'contain', 'cover' ), true ) ) {
			$size = 'auto';
		}

		$size = " background-size: $size;";

		// Background Repeat.
		$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );

		if ( ! in_array( $repeat, array( 'repeat-x', 'repeat-y', 'repeat', 'no-repeat' ), true ) ) {
			$repeat = 'repeat';
		}

		$repeat = " background-repeat: $repeat;";

		// Background Scroll.
		$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );

		if ( 'fixed' !== $attachment ) {
			$attachment = 'scroll';
		}

		$attachment = " background-attachment: $attachment;";

		$style .= $image . $position . $size . $repeat . $attachment;
	}

	return 'body{' . trim( $style ) . '}';
}

// Remove Custom-background Class
add_filter("body_class", "remove_custom_body_classes", 10, 2);
function remove_custom_body_classes( $classes ){
	foreach( $classes as &$str ){
		if( strpos( $str, "custom-background" ) > -1 ){
			$str = "";
		}
	}

	return $classes;
}
