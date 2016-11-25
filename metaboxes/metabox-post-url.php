<?php 

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function custom_url_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function custom_url_add_meta_box() {
	add_meta_box(
		'custom_url-custom-url',
		__( 'Article Custom URL', 'fortnum' ),
		'custom_url_html',
		'post',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'custom_url_add_meta_box' );

function custom_url_html( $post) {
	wp_nonce_field( '_custom_url_nonce', 'custom_url_nonce' ); ?>

	<p>
		<input type="url" class="widefat" name="custom_url_custom_url" id="custom_url_custom_url" value="<?php echo custom_url_get_meta( 'custom_url_custom_url' ); ?>">
	</p><?php
}

function custom_url_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['custom_url_nonce'] ) || ! wp_verify_nonce( $_POST['custom_url_nonce'], '_custom_url_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['custom_url_custom_url'] ) )
		update_post_meta( $post_id, 'custom_url_custom_url', esc_url( $_POST['custom_url_custom_url'] ) );
}
add_action( 'save_post', 'custom_url_save' );

/*
	Usage: custom_url_get_meta( 'custom_url_custom_url' )
*/


 ?>