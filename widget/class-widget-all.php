<?php
add_action( 'widgets_init', function () {
	register_widget( 'YWP_Widget_ESL_All' );
} );

class YWP_Widget_ESL_All extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ywp-widget-esl-all',
			'YWP - ابزارک  اعتماد',
			array(
				'description' => 'لوگوهای اینماد، رسانه و زرین پال خود را با استفاده از این ابزارک در ناحیه های ابزارک نمایش دهید',
				'classname'   => '',
			) 
		);
	}

	public function widget( $args, $instance ) {
		$show_enamad = ! empty( $instance['show_enamad'] ) ? 1 : 0;
		$show_shamed = ! empty( $instance['show_shamed'] ) ? 1 : 0;
		$show_zarrin = ! empty( $instance['show_zarrin'] ) ? 1 : 0;
		$code 		 = '';

		if( $show_enamad ) {
			$code = '[enamadlogo_shortcode]';
		}

		if( $show_shamed ) {
			$code .= '[shamedlogo_shortcode]';
		}

		if( $show_zarrin ) {
			$code .= '[zarrinpallogo_shortcode]';
		}

		if( empty( $code ) ) {
         	return;
		}

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo do_shortcode( $code );

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title		 = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$show_enamad = ! empty( $instance['show_enamad'] ) ? 1 : 0;
		$show_shamed = ! empty( $instance['show_shamed'] ) ? 1 : 0;
		$show_zarrin = ! empty( $instance['show_zarrin'] ) ? 1 : 0;
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">عنوان:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'show_enamad' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_enamad' ) ); ?>" type="checkbox" value="1" <?php echo checked( $show_enamad, 1 ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_enamad' ) ); ?>">نمایش لوگوی اینماد</label>
		</p>

		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'show_shamed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_shamed' ) ); ?>" type="checkbox" value="1" <?php echo checked( $show_shamed, 1 ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_shamed' ) ); ?>">نمایش لوگوی رسانه (شامد)</label>
		</p>

		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'show_zarrin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_zarrin' ) ); ?>" type="checkbox" value="1" <?php echo checked( $show_zarrin, 1 ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_zarrin' ) ); ?>">نمایش لوگوی زرین پال</label>
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance				 = array();

		$instance['title']		 = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['show_enamad'] = ( ! empty( $new_instance['show_enamad'] ) ) ? 1 : 0;
		$instance['show_shamed'] = ( ! empty( $new_instance['show_shamed'] ) ) ? 1 : 0;
		$instance['show_zarrin'] = ( ! empty( $new_instance['show_zarrin'] ) ) ? 1 : 0;

		return $instance;
	}
}