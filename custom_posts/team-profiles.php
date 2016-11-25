<?php 

// Register Custom Post Type
function function_fortnum_team_profiles() {

	$labels = array(
		'name'                  => _x( 'Teams', 'Post Type General Name', 'fortnum' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'fortnum' ),
		'menu_name'             => __( 'Teams', 'fortnum' ),
		'name_admin_bar'        => __( 'Team', 'fortnum' ),
		'archives'              => __( 'Team Archives', 'fortnum' ),
		'parent_item_colon'     => __( 'Parent Item:', 'fortnum' ),
		'all_items'             => __( 'All Items', 'fortnum' ),
		'add_new_item'          => __( 'Add New Item', 'fortnum' ),
		'add_new'               => __( 'Add Team', 'fortnum' ),
		'new_item'              => __( 'New Item', 'fortnum' ),
		'edit_item'             => __( 'Edit Item', 'fortnum' ),
		'update_item'           => __( 'Update Item', 'fortnum' ),
		'view_item'             => __( 'View Item', 'fortnum' ),
		'search_items'          => __( 'Search Item', 'fortnum' ),
		'not_found'             => __( 'Not found', 'fortnum' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'fortnum' ),
		'featured_image'        => __( 'Featured Image', 'fortnum' ),
		'set_featured_image'    => __( 'Add Team Photo (min. 300 x 300 px)', 'fortnum' ),
		'remove_featured_image' => __( 'Remove featured image', 'fortnum' ),
		'use_featured_image'    => __( 'Use as featured image', 'fortnum' ),
		'insert_into_item'      => __( 'Insert into item', 'fortnum' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'fortnum' ),
		'items_list'            => __( 'Items list', 'fortnum' ),
		'items_list_navigation' => __( 'Items list navigation', 'fortnum' ),
		'filter_items_list'     => __( 'Filter items list', 'fortnum' ),
	);
	$args = array(
		'label'                 => __( 'Team', 'fortnum' ),
		'description'           => __( 'Team Description', 'fortnum' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt','thumbnail', ),
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
	register_post_type( 'teams', $args );

}
add_action( 'init', 'function_fortnum_team_profiles', 0 );


/**
 * Occupation
 */

function occupation_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function occupation_add_meta_box() {
	add_meta_box(
		'occupation-occupation',
		__( 'Additional Info', 'fortnum' ),
		'occupation_html',
		'teams',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'occupation_add_meta_box' );

function occupation_html( $post) {
	wp_nonce_field( '_occupation_nonce', 'occupation_nonce' ); ?>

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="occupation_occupation"><?php _e( 'Position', 'fortnum' ); ?></label>
					</th>
					<td>
						<input class="widefat" type="text" name="occupation_occupation" id="occupation_occupation" value="<?php echo occupation_get_meta( 'occupation_occupation' ); ?>">
					</td>
				</tr>
			</tbody>
		</table>
		<?php

}

function occupation_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['occupation_nonce'] ) || ! wp_verify_nonce( $_POST['occupation_nonce'], '_occupation_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['occupation_occupation'] ) )
		update_post_meta( $post_id, 'occupation_occupation', esc_attr( $_POST['occupation_occupation'] ) );
}
add_action( 'save_post', 'occupation_save' );

/*
	Usage: occupation_get_meta( 'occupation_occupation' )
*/

/**
 * Socials
 */

function social_links_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function social_links_add_meta_box() {
	add_meta_box(
		'social_links-social-links',
		__( 'Social Links', 'fortnum' ),
		'social_links_html',
		'teams',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'social_links_add_meta_box' );

function social_links_html( $post) {
	wp_nonce_field( '_social_links_nonce', 'social_links_nonce' ); ?>

	<p>Leave blank if there is no profile of a team member.</p>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label for="social_links_facebook"><?php _e( 'Linkedin', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" type="url" name="social_links_linkedin" id="social_links_linkedin" value="<?php echo social_links_get_meta( 'social_links_linkedin' ); ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="social_links_facebook"><?php _e( 'Facebook', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" type="url" name="social_links_facebook" id="social_links_facebook" value="<?php echo social_links_get_meta( 'social_links_facebook' ); ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="social_links_twitter"><?php _e( 'Twitter', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" type="url" name="social_links_twitter" id="social_links_twitter" value="<?php echo social_links_get_meta( 'social_links_twitter' ); ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="social_links_pinterest"><?php _e( 'Pinterest', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" type="url" name="social_links_pinterest" id="social_links_pinterest" value="<?php echo social_links_get_meta( 'social_links_pinterest' ); ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="social_links_google_plus"><?php _e( 'Google Plus', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" type="url" name="social_links_google_plus" id="social_links_google_plus" value="<?php echo social_links_get_meta( 'social_links_google_plus' ); ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="social_links_tumblr"><?php _e( 'Tumblr', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" type="url" name="social_links_tumblr" id="social_links_tumblr" value="<?php echo social_links_get_meta( 'social_links_tumblr' ); ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="social_links_dribbble"><?php _e( 'Dribbble', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" type="url" name="social_links_dribbble" id="social_links_dribbble" value="<?php echo social_links_get_meta( 'social_links_dribbble' ); ?>">
				</td>
			</tr>
		</tbody>
	</table>

		<?php
}

function social_links_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['social_links_nonce'] ) || ! wp_verify_nonce( $_POST['social_links_nonce'], '_social_links_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['social_links_linkedin'] ) )
		update_post_meta( $post_id, 'social_links_linkedin', esc_url( $_POST['social_links_linkedin'] ) );
	if ( isset( $_POST['social_links_facebook'] ) )
		update_post_meta( $post_id, 'social_links_facebook', esc_url( $_POST['social_links_facebook'] ) );
	if ( isset( $_POST['social_links_twitter'] ) )
		update_post_meta( $post_id, 'social_links_twitter', esc_url( $_POST['social_links_twitter'] ) );
	if ( isset( $_POST['social_links_pinterest'] ) )
		update_post_meta( $post_id, 'social_links_pinterest', esc_url( $_POST['social_links_pinterest'] ) );
	if ( isset( $_POST['social_links_google_plus'] ) )
		update_post_meta( $post_id, 'social_links_google_plus', esc_url( $_POST['social_links_google_plus'] ) );
	if ( isset( $_POST['social_links_tumblr'] ) )
		update_post_meta( $post_id, 'social_links_tumblr', esc_url( $_POST['social_links_tumblr'] ) );
	if ( isset( $_POST['social_links_dribbble'] ) )
		update_post_meta( $post_id, 'social_links_dribbble', esc_url( $_POST['social_links_dribbble'] ) );
}
add_action( 'save_post', 'social_links_save' );

/*Usage: social_links_get_meta( 'social_links_linkedin' )
	Usage: social_links_get_meta( 'social_links_facebook' )
	Usage: social_links_get_meta( 'social_links_twitter' )
	Usage: social_links_get_meta( 'social_links_pinterest' )
	Usage: social_links_get_meta( 'social_links_google_plus' )
	Usage: social_links_get_meta( 'social_links_tumblr' )
	Usage: social_links_get_meta( 'social_links_dribbble' )
*/


/**
 * Metabox
 */

function profiles_cta_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function profiles_cta_add_meta_box() {
	add_meta_box(
		'profiles_cta-welcome-cta',
		__( 'Contact Information', 'fortnum' ),
		'profiles_cta_html',
		'teams',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'profiles_cta_add_meta_box' );

function profiles_cta_html( $post) {
	wp_nonce_field( '_profiles_cta_nonce', 'profiles_cta_nonce' ); ?>

	<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="profiles_cta_text"><?php _e( 'Contact Number', 'fortnum' ); ?></label>
					</th>
					<td>
						<input class="widefat" type="text" name="profiles_cta_text" id="profiles_cta_text" value="<?php echo profiles_cta_get_meta( 'profiles_cta_text' ); ?>">
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="profiles_cta_url"><?php _e( 'Email', 'fortnum' ); ?></label>
					</th>
					<td>
						<input class="widefat" type="email" name="profiles_cta_url" id="profiles_cta_url" value="<?php echo profiles_cta_get_meta( 'profiles_cta_url' ); ?>">
					</td>
				</tr>
			</tbody>
		</table>
		<?php
}

function profiles_cta_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['profiles_cta_nonce'] ) || ! wp_verify_nonce( $_POST['profiles_cta_nonce'], '_profiles_cta_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['profiles_cta_text'] ) )
		update_post_meta( $post_id, 'profiles_cta_text', esc_attr( $_POST['profiles_cta_text'] ) );
	if ( isset( $_POST['profiles_cta_url'] ) )
		update_post_meta( $post_id, 'profiles_cta_url', esc_attr( $_POST['profiles_cta_url'] ) );
}
add_action( 'save_post', 'profiles_cta_save' );

/*
	Usage: profiles_cta_get_meta( 'profiles_cta_text' )
	Usage: profiles_cta_get_meta( 'profiles_cta_url' )
*/
?>