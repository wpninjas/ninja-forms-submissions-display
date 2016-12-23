<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Plugin Name: Ninja Forms - Submission Display
 * Description: [Feature Plugin] Display form submissions using a shortcode.
 * Version: 3.0.0
 * Author: The WP Ninjas
 * Author URI: http://ninjaforms.com
 * Text Domain: ninja-forms
 * Domain Path: /lang/
 *
 * Copyright 2016 WP Ninjas.
 */

if( version_compare( get_option( 'ninja_forms_version', '0.0.0' ), '3', '<' ) || get_option( 'ninja_forms_load_deprecated', FALSE ) ) {

    // This section intentionally left blank

} else {

    if( ! function_exists( 'NF_SubmissionsDisplay' ) ) {
        function NF_SubmissionsDisplay()
        {
            static $instance;
            if( ! isset( $instance ) ) {
                require_once plugin_dir_path( __FILE__ ) . 'includes/plugin.php';
                $instance = new NF_SubmissionsDisplay_Plugin( '3.0.0', __FILE__ );
            }
            return $instance;
        }
    }
    NF_SubmissionsDisplay();
}