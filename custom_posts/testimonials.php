<?php 

// Register Custom Post Type
function fortnum_testimonial() {

	$labels = array(
		'name'                  => _x( 'fortnum Testimonial', 'Post Type General Name', 'fortnum' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'fortnum' ),
		'menu_name'             => __( 'Testimonials', 'fortnum' ),
		'name_admin_bar'        => __( 'Testimonial', 'fortnum' ),
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
		'label'                 => __( 'Testimonial', 'fortnum' ),
		'description'           => __( 'Testimonial Description', 'fortnum' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', ),
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
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'fortnum_testimonial', 0 );


/**
 * Load addon metabox
 */
require get_template_directory() . '/metaboxes/metabox-occupation.php';

?>