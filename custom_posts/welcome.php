<?php 

// Register Custom Post Type
function function_welcome() {

	$labels = array(
		'name'                  => _x( 'Welcomes', 'Post Type General Name', 'fortnum' ),
		'singular_name'         => _x( 'Welcome', 'Post Type Singular Name', 'fortnum' ),
		'menu_name'             => __( 'Welcomes', 'fortnum' ),
		'name_admin_bar'        => __( 'Welcome', 'fortnum' ),
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
		'label'                 => __( 'Welcome', 'fortnum' ),
		'description'           => __( 'Welcome Description', 'fortnum' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
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
	register_post_type( 'fortnum_welcome', $args );

}
add_action( 'init', 'function_welcome', 0 );

//cta metabox

function welcome_cta_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function welcome_cta_add_meta_box() {
	add_meta_box(
		'welcome_cta-welcome-cta',
		__( 'Call to Action', 'fortnum' ),
		'welcome_cta_html',
		'fortnum_welcome',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'welcome_cta_add_meta_box' );

function welcome_cta_html( $post) {
	wp_nonce_field( '_welcome_cta_nonce', 'welcome_cta_nonce' ); ?>

	<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="welcome_cta_text"><?php _e( 'CTA text', 'fortnum' ); ?></label>
					</th>
					<td>
						<input class="widefat" type="text" name="welcome_cta_text" id="welcome_cta_text" value="<?php echo welcome_cta_get_meta( 'welcome_cta_text' ); ?>">
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="welcome_cta_url"><?php _e( 'CTA url', 'fortnum' ); ?></label>
					</th>
					<td>
						<input class="widefat" type="url" name="welcome_cta_url" id="welcome_cta_url" value="<?php echo welcome_cta_get_meta( 'welcome_cta_url' ); ?>">
					</td>
				</tr>
			</tbody>
		</table>
		<?php
}

function welcome_cta_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['welcome_cta_nonce'] ) || ! wp_verify_nonce( $_POST['welcome_cta_nonce'], '_welcome_cta_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['welcome_cta_text'] ) )
		update_post_meta( $post_id, 'welcome_cta_text', esc_attr( $_POST['welcome_cta_text'] ) );
	if ( isset( $_POST['welcome_cta_url'] ) )
		update_post_meta( $post_id, 'welcome_cta_url', esc_attr( $_POST['welcome_cta_url'] ) );
}
add_action( 'save_post', 'welcome_cta_save' );

/*
	Usage: welcome_cta_get_meta( 'welcome_cta_text' )
	Usage: welcome_cta_get_meta( 'welcome_cta_url' )
*/


/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function feature_article_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return 'not-featured';
	}
}

function feature_article_add_meta_box() {
	add_meta_box(
		'feature_article-feature-article',
		__( 'Feature Article', 'fortnum' ),
		'feature_article_html',
		'fortnum_welcome',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'feature_article_add_meta_box' );

function feature_article_html( $post) {
	wp_nonce_field( '_feature_article_nonce', 'feature_article_nonce' ); ?>

	<p>

		<input type="checkbox" name="feature_article_feature_this_article" id="feature_article_feature_this_article" value="feature-this-article" <?php echo ( feature_article_get_meta( 'feature_article_feature_this_article' ) === 'feature-this-article' ) ? 'checked' : ''; ?>>
		<label for="feature_article_feature_this_article"><?php _e( 'Feature This Article', 'feature_article' ); ?></label>	</p>
		 <small>This is the block with blue background </small><?php
}

function feature_article_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['feature_article_nonce'] ) || ! wp_verify_nonce( $_POST['feature_article_nonce'], '_feature_article_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['feature_article_feature_this_article'] ) )
		update_post_meta( $post_id, 'feature_article_feature_this_article', esc_attr( $_POST['feature_article_feature_this_article'] ) );
	else
		update_post_meta( $post_id, 'feature_article_feature_this_article', null );
}
add_action( 'save_post', 'feature_article_save' );

/*
	Usage: feature_article_get_meta( 'feature_article_feature_this_article' )
*/

?>