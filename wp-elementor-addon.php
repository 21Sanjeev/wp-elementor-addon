<?php
/**
* Plugin Name: WP Elementor Addon
* Plugin URI: https://www.stallioni.com
* Description: Elementor Custom Widget
* Author: Stallioni
* Version: 1.0
* Author URI: https://www.stallioni.com
* Text Domain: wpea
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register new Elementor widgets.
 */
function register_new_widgets( $widgets_manager ) {
    // Include custom widget files.
    require_once( __DIR__ . '/widgets/wpea-testimonial.php' );
    require_once( __DIR__ . '/widgets/wpea-image.php' );
    require_once( __DIR__ . '/widgets/wpea-timeline.php' );
    require_once( __DIR__ . '/widgets/wpea-button.php' );
    require_once( __DIR__ . '/widgets/wpea-image-hover-effect.php' );

    // Register custom widgets with Elementor.
    $widgets_manager->register( new \WPEA_Elementor_Testimonial() );
    $widgets_manager->register( new \WPEA_Elementor_Image() );
    $widgets_manager->register( new \WPEA_Elementor_Timeline() );
    $widgets_manager->register( new \WPEA_Elementor_Button() );
    $widgets_manager->register( new \WPEA_Elementor_Image_Effect() );
}
add_action( 'elementor/widgets/register', 'register_new_widgets' );

/**
 * Enqueue widget scripts and styles conditionally.
 */
function register_widget_scripts() {
    wp_enqueue_script('wpea-owl', plugin_dir_url(__FILE__) . 'assets/js/owl.carousel.min.js', array(), false, true);
    wp_enqueue_script('wpea-js', plugin_dir_url(__FILE__) . 'assets/js/wpea-widget.js', array(), false, true);
    wp_enqueue_style('owlcarousel',plugin_dir_url(__FILE__).'assets/css/owl.carousel.min.css',array(),false,'all');
    wp_enqueue_style('wpea-css',plugin_dir_url(__FILE__).'assets/css/style.css',array(),false,'all');
}
add_action( 'wp_enqueue_scripts', 'register_widget_scripts' );

// Register custom Elementor category
add_action('elementor/elements/categories_registered', function($elements_manager) {
    $elements_manager->add_category(
        'wpea-category',
        [
            'title' => __('WPEA', 'wpea'),
            // 'icon' => 'fa fa-plug',
        ]
    );
});

?>