<?php

/**
 * Plugin Name: Elementor Addon By Tanvir
 * Description: Simple widgets for Elementor AZ BT.
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





// create porducte taxonomy name size 
// Register Custom Taxonomy size
function custom_size_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Sizes', 'Taxonomy General Name', 'gota' ),
        'singular_name'              => _x( 'Size', 'Taxonomy Singular Name', 'gota' ),
        'menu_name'                  => __( 'Size', 'gota' ),
        'all_items'                  => __( 'All Sizes', 'gota' ),
        'parent_item'                => __( 'Parent Size', 'gota' ),
        'parent_item_colon'          => __( 'Parent Size:', 'gota' ),
        'new_item_name'              => __( 'New Size Name', 'gota' ),
        'add_new_item'               => __( 'Add New Size', 'gota' ),
        'edit_item'                  => __( 'Edit Size', 'gota' ),
        'update_item'                => __( 'Update Size', 'gota' ),
        'view_item'                  => __( 'View Size', 'gota' ),
        'separate_items_with_commas' => __( 'Separate sizes with commas', 'gota' ),
        'add_or_remove_items'        => __( 'Add or remove sizes', 'gota' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'gota' ),
        'popular_items'              => __( 'Popular Sizes', 'gota' ),
        'search_items'               => __( 'Search Sizes', 'gota' ),
        'not_found'                  => __( 'Not Found', 'gota' ),
        'no_terms'                   => __( 'No sizes', 'gota' ),
        'items_list'                 => __( 'Sizes list', 'gota' ),
        'items_list_navigation'      => __( 'Sizes list navigation', 'gota' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'size', array( 'product' ), $args );
}
add_action( 'init', 'custom_size_taxonomy', 0 );



// Register Custom Taxonomy weight
function custom_taxonomy_weight() {

    $labels = array(
        'name'                       => _x( 'Weights', 'Taxonomy General Name', 'gota' ),
        'singular_name'              => _x( 'Weight', 'Taxonomy Singular Name', 'gota' ),
        'menu_name'                  => __( 'Weight', 'gota' ),
        'all_items'                  => __( 'All Weights', 'gota' ),
        'parent_item'                => __( 'Parent Weight', 'gota' ),
        'parent_item_colon'          => __( 'Parent Weight:', 'gota' ),
        'new_item_name'              => __( 'New Weight Name', 'gota' ),
        'add_new_item'               => __( 'Add New Weight', 'gota' ),
        'edit_item'                  => __( 'Edit Weight', 'gota' ),
        'update_item'                => __( 'Update Weight', 'gota' ),
        'view_item'                  => __( 'View Weight', 'gota' ),
        'separate_items_with_commas' => __( 'Separate weights with commas', 'gota' ),
        'add_or_remove_items'        => __( 'Add or remove weights', 'gota' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'gota' ),
        'popular_items'              => __( 'Popular Weights', 'gota' ),
        'search_items'               => __( 'Search Weights', 'gota' ),
        'not_found'                  => __( 'Not Found', 'gota' ),
        'no_terms'                   => __( 'No weights', 'gota' ),
        'items_list'                 => __( 'Weights list', 'gota' ),
        'items_list_navigation'      => __( 'Weights list navigation', 'gota' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array( 'slug' => 'weight' ),
    );
    register_taxonomy( 'weight', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy_weight', 0 );



// Register custom taxonomy position
function custom_taxonomy_position() {
    $labels = array(
        'name'                       => _x( 'Positions', 'Taxonomy General Name', 'gota' ),
        'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'gota' ),
        'menu_name'                  => __( 'Position', 'gota' ),
        'all_items'                  => __( 'All Positions', 'gota' ),
        'parent_item'                => __( 'Parent Position', 'gota' ),
        'parent_item_colon'          => __( 'Parent Position:', 'gota' ),
        'new_item_name'              => __( 'New Position Name', 'gota' ),
        'add_new_item'               => __( 'Add New Position', 'gota' ),
        'edit_item'                  => __( 'Edit Position', 'gota' ),
        'update_item'                => __( 'Update Position', 'gota' ),
        'view_item'                  => __( 'View Position', 'gota' ),
        'separate_items_with_commas' => __( 'Separate positions with commas', 'gota' ),
        'add_or_remove_items'        => __( 'Add or remove positions', 'gota' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'gota' ),
        'popular_items'              => __( 'Popular Positions', 'gota' ),
        'search_items'               => __( 'Search Positions', 'gota' ),
        'not_found'                  => __( 'Not Found', 'gota' ),
        'no_terms'                   => __( 'No positions', 'gota' ),
        'items_list'                 => __( 'Positions list', 'gota' ),
        'items_list_navigation'      => __( 'Positions list navigation', 'gota' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'position', array( 'product' ), $args );
}
add_action( 'init', 'custom_taxonomy_position', 0 );



// Register Custom Taxonomy shape
function custom_taxonomy_shape() {

    $labels = array(
        'name'                       => _x( 'Shapes', 'Taxonomy General Name', 'gota' ),
        'singular_name'              => _x( 'Shape', 'Taxonomy Singular Name', 'gota' ),
        'menu_name'                  => __( 'Shape', 'gota' ),
        'all_items'                  => __( 'All Shapes', 'gota' ),
        'parent_item'                => __( 'Parent Shape', 'gota' ),
        'parent_item_colon'          => __( 'Parent Shape:', 'gota' ),
        'new_item_name'              => __( 'New Shape Name', 'gota' ),
        'add_new_item'               => __( 'Add New Shape', 'gota' ),
        'edit_item'                  => __( 'Edit Shape', 'gota' ),
        'update_item'                => __( 'Update Shape', 'gota' ),
        'view_item'                  => __( 'View Shape', 'gota' ),
        'separate_items_with_commas' => __( 'Separate shapes with commas', 'gota' ),
        'add_or_remove_items'        => __( 'Add or remove shapes', 'gota' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'gota' ),
        'popular_items'              => __( 'Popular Shapes', 'gota' ),
        'search_items'               => __( 'Search Shapes', 'gota' ),
        'not_found'                  => __( 'Not Found', 'gota' ),
        'no_terms'                   => __( 'No items', 'gota' ),
        'items_list'                 => __( 'Shapes list', 'gota' ),
        'items_list_navigation'      => __( 'Shapes list navigation', 'gota' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'shape', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy_shape', 0 );



// Register Custom Taxonomy scoop
function custom_taxonomy_scoop() {

    $labels = array(
        'name'                       => _x( 'Scoops', 'Taxonomy General Name', 'gota' ),
        'singular_name'              => _x( 'Scoop', 'Taxonomy Singular Name', 'gota' ),
        'menu_name'                  => __( 'Scoop', 'gota' ),
        'all_items'                  => __( 'All Scoops', 'gota' ),
        'parent_item'                => __( 'Parent Scoop', 'gota' ),
        'parent_item_colon'          => __( 'Parent Scoop:', 'gota' ),
        'new_item_name'              => __( 'New Scoop Name', 'gota' ),
        'add_new_item'               => __( 'Add New Scoop', 'gota' ),
        'edit_item'                  => __( 'Edit Scoop', 'gota' ),
        'update_item'                => __( 'Update Scoop', 'gota' ),
        'view_item'                  => __( 'View Scoop', 'gota' ),
        'separate_items_with_commas' => __( 'Separate scoops with commas', 'gota' ),
        'add_or_remove_items'        => __( 'Add or remove scoops', 'gota' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'gota' ),
        'popular_items'              => __( 'Popular Scoops', 'gota' ),
        'search_items'               => __( 'Search Scoops', 'gota' ),
        'not_found'                  => __( 'Not Found', 'gota' ),
        'no_terms'                   => __( 'No scoops', 'gota' ),
        'items_list'                 => __( 'Scoops list', 'gota' ),
        'items_list_navigation'      => __( 'Scoops list navigation', 'gota' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array( 'slug' => 'scoop' ), // You can customize the slug here
    );
    register_taxonomy( 'scoop', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy_scoop', 0 );



// Register Custom Taxonomy edge shape
function custom_taxonomy_edge_shape() {

    $labels = array(
        'name'                       => _x( 'Edge Shapes', 'Taxonomy General Name', 'gota' ),
        'singular_name'              => _x( 'Edge Shape', 'Taxonomy Singular Name', 'gota' ),
        'menu_name'                  => __( 'Edge Shape', 'gota' ),
        'all_items'                  => __( 'All Edge Shapes', 'gota' ),
        'parent_item'                => __( 'Parent Edge Shape', 'gota' ),
        'parent_item_colon'          => __( 'Parent Edge Shape:', 'gota' ),
        'new_item_name'              => __( 'New Edge Shape Name', 'gota' ),
        'add_new_item'               => __( 'Add New Edge Shape', 'gota' ),
        'edit_item'                  => __( 'Edit Edge Shape', 'gota' ),
        'update_item'                => __( 'Update Edge Shape', 'gota' ),
        'view_item'                  => __( 'View Edge Shape', 'gota' ),
        'separate_items_with_commas' => __( 'Separate edge shapes with commas', 'gota' ),
        'add_or_remove_items'        => __( 'Add or remove edge shapes', 'gota' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'gota' ),
        'popular_items'              => __( 'Popular Edge Shapes', 'gota' ),
        'search_items'               => __( 'Search Edge Shapes', 'gota' ),
        'not_found'                  => __( 'Not Found', 'gota' ),
        'no_terms'                   => __( 'No edge shapes', 'gota' ),
        'items_list'                 => __( 'Edge Shapes list', 'gota' ),
        'items_list_navigation'      => __( 'Edge Shapes list navigation', 'gota' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array(
            'slug' => 'edge-shape', // Change this slug as needed
        ),
    );
    register_taxonomy( 'edge_shape', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy_edge_shape', 0 );



// Register Custom Taxonomy
function custom_taxonomy_toe_size() {

    $labels = array(
        'name'                       => _x( 'Toe Sizes', 'Taxonomy General Name', 'gota' ),
        'singular_name'              => _x( 'Toe Size', 'Taxonomy Singular Name', 'gota' ),
        'menu_name'                  => __( 'Toe Size', 'gota' ),
        'all_items'                  => __( 'All Toe Sizes', 'gota' ),
        'parent_item'                => __( 'Parent Toe Size', 'gota' ),
        'parent_item_colon'          => __( 'Parent Toe Size:', 'gota' ),
        'new_item_name'              => __( 'New Toe Size Name', 'gota' ),
        'add_new_item'               => __( 'Add New Toe Size', 'gota' ),
        'edit_item'                  => __( 'Edit Toe Size', 'gota' ),
        'update_item'                => __( 'Update Toe Size', 'gota' ),
        'view_item'                  => __( 'View Toe Size', 'gota' ),
        'separate_items_with_commas' => __( 'Separate toe sizes with commas', 'gota' ),
        'add_or_remove_items'        => __( 'Add or remove toe sizes', 'gota' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'gota' ),
        'popular_items'              => __( 'Popular Toe Sizes', 'gota' ),
        'search_items'               => __( 'Search Toe Sizes', 'gota' ),
        'not_found'                  => __( 'Not Found', 'gota' ),
        'no_terms'                   => __( 'No toe sizes', 'gota' ),
        'items_list'                 => __( 'Toe sizes list', 'gota' ),
        'items_list_navigation'      => __( 'Toe sizes list navigation', 'gota' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array( 'slug' => 'toe-size' ), // Change 'toe-size' to the desired slug
    );
    register_taxonomy( 'toe_size', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy_toe_size', 0 );


