<?php

/**
 * Plugin Name: Elementor Addon By Tanvir
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Tanvirul Karim
 * Author URI:  www.bengalcoder.com
 * Text Domain: elementor-addon
 */


// Custom CSS and
function widget_styles()
{

	// Enqueue jQuery
	// wp_enqueue_script('jquery');

	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.4.min.js', array(), null, true);

	wp_register_style('picchi-extension-style', plugins_url('assets/css/style.css', __FILE__));
	wp_enqueue_style('picchi-extension-style');

	wp_register_style('picchi-extension-responsive', plugins_url('assets/css/responsive.css', __FILE__));
	wp_enqueue_style('picchi-extension-responsive');




	// Enqueue script
	wp_register_script('picchi-extension-script', plugins_url('assets/js/main.js', __FILE__), array('jquery'), null, true);
	wp_enqueue_script('picchi-extension-script');
}
// Register Widget Styles
add_action('elementor/frontend/after_enqueue_styles', 'widget_styles');




// add ajax action 
$file_path = plugin_dir_path( __FILE__ ) . 'functions/ajax-action.php';
if ( file_exists( $file_path ) ) {
    require_once $file_path;
}



// the function for register wodgets 

function register_hello_world_widget($widgets_manager)
{
	require_once(__DIR__ . '/widgets/custom-bat-builder.php');
    
	

	
	$widgets_manager->register(new \Custom_Bat_Builder());
    

}
add_action('elementor/widgets/register', 'register_hello_world_widget');





// register new categories                
function add_elementor_widget_categories($elements_manager)
{


	$elements_manager->add_category(
		'custom-theme-agency',
		[
			'title' => esc_html__('Theme Section', 'textdomain'),
			'icon' => 'fa fa-plug',
		]
	);

	$elements_manager->add_category(
		'custom-theme-category',
		[
			'title' => esc_html__('Custom Theme', 'textdomain'),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');





