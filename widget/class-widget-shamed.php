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
				'description' => 'لوگوی رسانه خود را با استفاده از این ابزارک در ناحیه های ابزارک نمایش دهید',
				'classname'   => '',
			) 
		);
	}

	public function widget( $args, $instance ) {
		$code = stripcslashes( get_option( 'ywp_esl_s_code' ) );

		if( empty( $code ) ) {
         	return;
		}

		echo $code;
	}

	public function form( $instance ) {

	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}