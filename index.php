<?php
/**
 * Plugin Name: E-namad & Shamed Logo Manager
 * Plugin URI: http://yazdaniwp.com/plugins/enamad-shamed-logo/
 * Description: نمایش لوگوی اینماد، رسانه و زرین پال بصورت کد کوتاه و ابزارک
 * Version: 2.2
 * Author: Hamid Reza Yazdani 😊
 * Author URI: https://yazdaniwp.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'YWP_Enamad_Shamed' ) ) {

    define( 'YWP_ESL_VERSION', '1.0' );

    define( 'YWP_ESL_NAME', plugin_basename( __FILE__ ) );
    define( 'YWP_ESL_DIR', plugin_dir_path( __FILE__ ) );
    define( 'YWP_ESL_URI', plugin_dir_url( __FILE__ ) );

    define( 'YWP_ESL_WIDGETS', trailingslashit( YWP_ESL_DIR . 'widget' ) );
    define( 'YWP_ESL_TPL', trailingslashit( YWP_ESL_DIR . 'templates' ) );

    include_once( YWP_ESL_WIDGETS . 'class-widget-enamad.php' );
    include_once( YWP_ESL_WIDGETS . 'class-widget-shamed.php' );
    include_once( YWP_ESL_WIDGETS . 'class-widget-zarrin.php' );
    include_once( YWP_ESL_WIDGETS . 'class-widget-all.php' );

    class YWP_Enamad_Shamed {

		public function __construct() {
            // Add option page
            add_action( 'admin_menu', array( $this, 'ywp_esl_option_page' ) );

            // Register settings
            add_action( 'admin_init', array( $this, 'ywp_esl_register_settings' ) );

            // Add settings link
            add_filter( 'plugin_action_links_' . YWP_ESL_NAME, array( $this, 'ywp_esl_add_settings_link' ) );

            // Add Shortcodes
            add_shortcode( 'enamadlogo_shortcode', array( $this, 'ywp_enamad_logo' ) );
            add_shortcode( 'shamedlogo_shortcode', array( $this, 'ywp_shamed_logo' ) );
            add_shortcode( 'zarrinpallogo_shortcode', array( $this, 'ywp_zarrinpal_logo' ) );
            add_shortcode( 'ywp_esl_logos', array( $this, 'ywp_esl_all_logos' ) );

            // Avoid Text widget rel changes
            add_filter( 'wp_targeted_link_rel', array( $this, 'ywp_avoid_text_widget_rel' ) , 99, 2 );
        }

        function ywp_esl_option_page() {
            add_submenu_page(
                'options-general.php',
                'تنظیمات لوگوی اینماد',
                'تنظیمات لوگوی اینماد',
                'manage_options',
                'enamad-logo-manager-options',
                array( 
                    $this,
                    'ywp_esl_option_page_callback'
                ) 
            );
        }

        function ywp_esl_register_settings() {
            register_setting( 'ywp-esl-settings-group', 'ywp_esl_e_code' );
            register_setting( 'ywp-esl-settings-group', 'ywp_esl_s_code' );
            register_setting( 'ywp-esl-settings-group', 'ywp_esl_z_code' );
        }

        function ywp_esl_option_page_callback() {
            include YWP_ESL_TPL . 'option-page.php';
        }

        function ywp_esl_add_settings_link( $links ) {
            $links[] = '<a href="' . admin_url( 'options-general.php?page=enamad-logo-manager-options' ) . '">تنظیمات</a>';

            return $links;
        }

        function ywp_enamad_logo( $atts, $content = "" ) {
            return stripcslashes( get_option( 'ywp_esl_e_code' ) );
        }

        function ywp_shamed_logo( $atts, $content = "" ) {
            return stripcslashes( get_option( 'ywp_esl_s_code' ) );
        }

        function ywp_zarrinpal_logo( $atts, $content = "" ) {
            return stripcslashes( get_option( 'ywp_esl_z_code' ) );
        }

        function ywp_esl_all_logos( $atts, $content = "" ) {
            return array( $this, 'ywp_enamad_logo' ) . array( $this, 'ywp_shamed_logo' ) . array( $this, 'ywp_zarrinpal_logo' );
        }

        function ywp_avoid_text_widget_rel( $rel, $link_html ) {
            if( strpos( $link_html, 'trustseal.enamad.ir' ) || strpos( $link_html, 'logo.samandehi.ir' ) ) {
                return '';
            }

            return $rel;
        }
	}

    new YWP_Enamad_Shamed();
}