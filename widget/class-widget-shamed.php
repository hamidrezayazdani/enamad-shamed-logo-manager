<?php
add_action( 'widgets_init', function () {
	register_widget( 'YWP_Widget_Shamed' );
} );

class YWP_Widget_Shamed extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ywp-widget-shamed',
			'YWP - ابزارک لوگوی رسانه',
			array(
				'description' => 'کد رسانه خود را با استفاده از این ابزارک در ناحیه های ابزارک نمایش دهید',
				'classname'   => '',
			) 
		);
	}

	public function widget( $args, $instance ) {
		$code	= ! empty( $instance['code'] ) ? stripcslashes( $instance['code'] ) : '';

		if( empty( $code ) ) {
         	?>
            <img src="<?php echo YWP_ESL_IMG ?>shamed.png" style="cursor: pointer;" onclick="alert('لطفا کد رسانه را وارد نمائید')" alt="لوگوی رسانه" title="لوگوی رسانه">
        	<?php
		}

		echo $code;
	}

	public function form( $instance ) {
		$code	= ! empty( $instance['code'] ) ? stripcslashes( $instance['code'] ) : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>">کد رسانه:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'code' ) ); ?>" type="text" value="<?php echo esc_attr( $code ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance			= array();
		$instance['code']	= ( ! empty( $new_instance['code'] ) ) ? stripcslashes( $new_instance['code'] ) : '';

		return $instance;
	}
}