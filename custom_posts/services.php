<?php 

// Register Custom Post Type
function function_services() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'fortnum' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'fortnum' ),
		'menu_name'             => __( 'Services', 'fortnum' ),
		'name_admin_bar'        => __( 'Service', 'fortnum' ),
		'archives'              => __( 'Item Archives', 'fortnum' ),
		'parent_item_colon'     => __( 'Parent Item:', 'fortnum' ),
		'all_items'             => __( 'All Items', 'fortnum' ),
		'add_new_item'          => __( 'Add New Item', 'fortnum' ),
		'add_new'               => __( 'Add New', 'fortnum' ),
		'new_item'              => __( 'New Item', 'fortnum' ),
		'edit_item'             => __( 'Edit Item', 'fortnum' ),
		'update_item'           => __( 'Update Item', 'fortnum' ),
		'view_item'             => __( 'View Item', 'fortnum' ),
		'search_items'          => __( 'Search Item', 'fortnum' ),
		'not_found'             => __( 'Not found', 'fortnum' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'fortnum' ),
		'featured_image'        => __( 'Featured Image', 'fortnum' ),
		'set_featured_image'    => __( 'Set featured image', 'fortnum' ),
		'remove_featured_image' => __( 'Remove featured image', 'fortnum' ),
		'use_featured_image'    => __( 'Use as featured image', 'fortnum' ),
		'insert_into_item'      => __( 'Insert into item', 'fortnum' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'fortnum' ),
		'items_list'            => __( 'Items list', 'fortnum' ),
		'items_list_navigation' => __( 'Items list navigation', 'fortnum' ),
		'filter_items_list'     => __( 'Filter items list', 'fortnum' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'fortnum' ),
		'description'           => __( 'Service Description', 'fortnum' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'            => array( 'tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'fortnum_services', $args );

}
add_action( 'init', 'function_services', 0 );

//new taxonomy
// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Type', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'service_type', array( 'fortnum_services' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

?>