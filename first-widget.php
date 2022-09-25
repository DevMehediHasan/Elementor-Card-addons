<?php
/**
 * Plugin Name: First Card Widget
 * Description: First Card widget.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Mehedi Hasan
 * Author URI:  https://developers.elementor.com/
 * Text Domain: first-card-widget
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');
function callback_for_setting_up_scripts() {
    wp_register_style('card_style', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('card_style');

}
function my_plugin_frontend_stylesheets() {
	// Main Card
	wp_register_style( 'main-card', plugins_url( 'assets/css/main-card.css', __FILE__ ) );

	wp_enqueue_style( 'main-card' );
	// main carousel
	wp_register_style( 'main-carousel', plugins_url( 'assets/css/main-carousel.css', __FILE__ ) );

	wp_enqueue_style( 'main-carousel' );
	// theme slick
	wp_register_style( 'slick-theme', plugins_url( 'assets/css/slick.min.css', __FILE__ ) );

	wp_enqueue_style( 'slick-theme' );
	// slick min 
	wp_register_style( 'slick-min', plugins_url( 'assets/css/slick-theme.min.css', __FILE__ ) );

	wp_enqueue_style( 'slick-min' );
	// fontawesome
	wp_register_style( 'fontawesome-min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css' );

	wp_enqueue_style( 'fontawesome-min' );
	// fontawesome regular
	wp_register_style( 'fontawesome-regular', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' );

	wp_enqueue_style( 'fontawesome-regular' );
	// fontawesome solid 
	wp_register_style( 'solid-min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css' );

	wp_enqueue_style( 'solid-min' );
	// fontawesome brands
	wp_register_style( 'brands-min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css' );

	wp_enqueue_style( 'brands-min' );

}
add_action( 'elementor/frontend/after_enqueue_styles', 'my_plugin_frontend_stylesheets' );

function my_plugin_frontend_scripts() {

	wp_register_script( 'frontend-script-1', plugins_url( 'assets/js/jquery.min.js', __FILE__ ) );
	wp_register_script( 'frontend-script-2', plugins_url( 'assets/js/slick.min.js', __FILE__ ) );
	wp_register_script( 'slick-main', plugins_url( 'assets/js/slick-main.js', __FILE__ ) );


	wp_enqueue_script( 'frontend-script-1' );
	wp_enqueue_script( 'frontend-script-2' );
	wp_enqueue_script( 'slick-main' );

}
add_action( 'elementor/frontend/after_register_scripts', 'my_plugin_frontend_scripts' );



function register_first_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/card-widget.php' );
	require_once( __DIR__ . '/widgets/carousel-widget.php' );

	$widgets_manager->register( new \First_Card_Widget() );
	$widgets_manager->register( new \First_Carousel_Widget() );

}
add_action( 'elementor/widgets/register', 'register_first_widget' );