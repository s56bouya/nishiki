<?php
if ( class_exists('WP_Customize_Control') ) {
	// Add Range Customizer
	class Nishiki_WP_Customize_Range extends WP_Customize_Control {
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
				<input class='range-slider' min="<?php echo absint( $this->min ); ?>" max="<?php echo absint( $this->max ); ?>" step="<?php echo absint( $this->step ); ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input <?php $this->link(); ?> onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='number' min="<?php echo absint( $this->min ); ?>" max="<?php echo absint( $this->max ); ?>" step="<?php echo absint( $this->step ); ?>" value='<?php echo esc_attr( $this->value() ); ?>'>
			</label>
			<?php
		}
	}

	// Add Content
	class Nishiki_WP_Customize_Content extends WP_Customize_Control {
	  public $content = '';
	  public $start_content = '';
	  public $end_content = '';

		public function render_content() {
			if ( isset( $this->start_content ) ) {
				echo esc_html( $this->start_content );
			}
			if ( isset( $this->label ) ) {
				echo '<span class="customize-control-title">' . wp_kses_post( $this->label ) . '</span>';
			}
			if ( isset( $this->content ) ) {
				echo wp_kses_post( $this->content );
			}
			if ( isset( $this->description ) ) {
				echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
			}
			if ( isset( $this->end_content ) ) {
				echo esc_html( $this->end_content );
			}
		}
	}
}
