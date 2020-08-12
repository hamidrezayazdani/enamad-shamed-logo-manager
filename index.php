<?php
/**
 * Plugin Name: E-namad & Shamed Logo Manager
 * Plugin URI: http://yazdaniwp.com/plugins/enamad-shamed-logo/
 * Description: نمایش لوگوی اینماد و رسانه بصورت کد کوتاه و ابزارک
 * Version: 1.0
 * Author: Hamid Reza Yazdani 😊
 * Author URI: https://yazdaniwp.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'YWP_Enamad_Shamed' ) ) {

    define( 'YWP_ESL_VERSION', '1.0' );

    define( 'YWP_ESL_DIR', plugin_dir_path( __FILE__ ) );
    define( 'YWP_ESL_URI', plugin_dir_url( __FILE__ ) );

    define( 'YWP_ESL_WIDGETS', trailingslashit( YWP_ESL_DIR . 'widget' ) );
    define( 'YWP_ESL_IMG', trailingslashit( YWP_ESL_URI . 'assets/img' ) );

    include_once( YWP_ESL_WIDGETS . 'class-widget-enamad.php' );
    include_once( YWP_ESL_WIDGETS . 'class-widget-shamed.php' );

    class YWP_Enamad_Shamed {


		public function __construct() {
            add_shortcode( 'enamadlogo_shortcode', array( $this, 'ywp_enamad_logo' ) );
            add_shortcode( 'shamedlogo_shortcode', array( $this, 'ywp_shamed_logo' ) );
        }

        function ywp_enamad_logo( $atts, $content = "" ) {
            if( empty( $content ) ) {
                ?>
                <img src="<?php YWP_ESL_IMG ?>enamad.png" style="cursor: pointer;" onclick="alert('لطفا کد اینماد را وارد نمائید')" alt="لوگوی اینماد" title="لوگوی اینماد">
                <?php
            }

            return stripcslashes( $content );
        }

        function ywp_shamed_logo( $atts, $content = "" ) {
            if( empty( $content ) ) {
                ?>
                <img src="<?php YWP_ESL_IMG ?>shamed.png" style="cursor: pointer;" onclick="alert('لطفا کد رسانه را وارد نمائید')" alt="لوگوی رسانه" title="لوگوی رسانه">
                <?php
            }

            return stripcslashes( $content );
        }
	}

    new YWP_Enamad_Shamed();
}