<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Plugin Name: Ninja Forms - Submission Display (Feature)
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

    if( ! function_exists( 'NF_SubmissionDisplay' ) ) {
        function NF_SubmissionDisplay()
        {
            static $instance;
            if( ! isset( $instance ) ) {
                require_once plugin_dir_path( __FILE__ ) . 'includes/plugin.php';
                $instance = new NF_SubmissionDisplay_Plugin( '3.0.0', __FILE__ );
            }
            return $instance;
        }
    }
    NF_SubmissionDisplay();
}