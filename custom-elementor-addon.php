<?php
/**
 * Plugin Name: Custom Slider Elementor Addon
 * Description: Custom Slider addon for Elementor, WP Video Lightbox must be installed for the lightbox to work.
 * Version:     1.0.0
 * Author:      Julius Enriquez (Paperdino)
 * Text Domain: custom-elementor-addon
 * Author URI: https://paperdino.com.au/
 * Plugin URI: https://paperdino.com.au/
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 */

 /**
 * Register Elementor addon widgets.
 */
function register_elementor_widgets( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/slider.php' );

    $widgets_manager->register( new \Slider() );
}

add_action( 'elementor/widgets/register', 'register_elementor_widgets' );

/**
 * Register scripts and styles for Elementor addon widgets.
 */
function elementor_addon_widgets_dependencies() {
    // Register scripts
    wp_register_script( 'slick-script', plugins_url( 'assets/js/slick.min.js', __FILE__ ), array('jquery'), '1.8.1', true );
    wp_register_script( 'slider-init', plugins_url( 'assets/js/slide.js', __FILE__ ), array('jquery'), '1.8.1', true );

    // Register styles
    wp_register_style('slick-styles', plugins_url('assets/css/slick.css', __FILE__ ));
    wp_register_style('slider-theme-styles', plugins_url('assets/css/slick-theme.css', __FILE__ ));
     
}

add_action( 'wp_enqueue_scripts', 'elementor_addon_widgets_dependencies' );