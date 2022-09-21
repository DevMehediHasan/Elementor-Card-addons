<?php
/**
 * Plugin Name: First Card widget
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


function register_first_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/card-widget.php' );

	$widgets_manager->register( new \First_Card_Widget() );

}
add_action( 'elementor/widgets/register', 'register_first_widget' );