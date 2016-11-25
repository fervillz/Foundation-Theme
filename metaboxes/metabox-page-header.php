<?php 

/**
 * Page Header
 */



function fortnum_page_header_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}


function fortnum_page_header_add_meta_box() {
	add_meta_box(
		'fortnum-page-header',
		__( 'Custom page header', 'fortnum' ),
		'fortnum_page_header_html',
		'post',
		'normal',
		'high'
	);

	add_meta_box(
		'fortnum-page-header',
		__( 'Custom page header', 'fortnum' ),
		'fortnum_page_header_html',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'fortnum_page_header_add_meta_box' );

function fortnum_page_header_html( $post) {
	wp_nonce_field( '_fortnum_page_header_nonce', 'fortnum_page_header_nonce' );

	$thumbnailSizeW = get_option( 'thumbnail_size_w' );
	$thumbnailSizeH = get_option( 'thumbnail_size_h' );?>

	<input id="thumbnailSizeW" type="hidden" name="thumbnailWidth" value="<?php echo $thumbnailSizeW; ?> " />
	<input id="thumbnailSizeH" type="hidden" name="thumbnailHeight" value="<?php echo $thumbnailSizeH; ?> " />

	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label for="fortnum_page_header_title"><?php _e( 'Title', 'fortnum' ); ?></label>
				</th>
				<td>
					<input class="widefat" placeholder="<?php the_title(); ?>" type="text" name="fortnum_page_header_title" id="fortnum_page_header_title" value="<?php echo fortnum_page_header_get_meta( 'fortnum_page_header_title' ); ?>">
				</td>
			</tr>

			<tr style="display: none;">
				<th scope="row">
					<label for="fortnum_page_header_short_description"><?php _e( 'Short description', 'fortnum' ); ?>
				</th>
				<td>					
					<textarea rows="5" placeholder="<?php the_title(); ?> excerpt" class="widefat" name="fortnum_page_header_short_description" row="7" id="fortnum_page_header_short_description" ><?php echo fortnum_page_header_get_meta( 'fortnum_page_header_short_description' ); ?></textarea>
				</td>
			</tr>

			<tr style="display: none;">
				<th scope="row">
					<label for="fortnum_page_header_bg"><?php _e( 'Background Image', 'fortnum' ); ?>
					
				</th>
				<td class="header-bg-upload">
					<a href="#" id="add-bg" class="button add_media add-page-header-bg"><?php _e( 'Add Image', 'fortnum') ?></a>
					<input class="widefat" type="text" name="fortnum_page_header_bg" id="fortnum_page_header_bg" value="<?php echo fortnum_page_header_get_meta( 'fortnum_page_header_bg' ); ?>">				</td>
			</tr>			
		</tbody>
	</table>
	<p style="display: none;">Custom page header are optional page title and hand-crafted summaries of your content. By default the pages uses the page menu title and excerpt of the content. <a href="https://developer.wordpress.org/reference/functions/wp_title/" target="_blank">Learn more about page titles</a> or  <a href="https://codex.wordpress.org/Excerpt" target="_blank">excerpts</a>.</p>
	<p><i style="display: none;" >Recommended size for background-image: <b>width 1800px</b> and <b>height 252</b></i></p>
		<?php
}

function fortnum_page_header_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['fortnum_page_header_nonce'] ) || ! wp_verify_nonce( $_POST['fortnum_page_header_nonce'], '_fortnum_page_header_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['fortnum_page_header_title'] ) )
		update_post_meta( $post_id, 'fortnum_page_header_title', esc_attr( $_POST['fortnum_page_header_title'] ) );
	if ( isset( $_POST['fortnum_page_header_short_description'] ) )
		update_post_meta( $post_id, 'fortnum_page_header_short_description', esc_attr( $_POST['fortnum_page_header_short_description'] ) );
	if ( isset( $_POST['fortnum_page_header_bg'] ) )
		update_post_meta( $post_id, 'fortnum_page_header_bg', esc_attr( $_POST['fortnum_page_header_bg'] ) );
}
add_action( 'save_post', 'fortnum_page_header_save' );

/*
	Usage: fortnum_page_header_get_meta( 'fortnum_page_header_title' )
	Usage: fortnum_page_header_get_meta( 'fortnum_page_header_short_description' )
	Usage: fortnum_page_header_get_meta( 'fortnum_page_header_bg' )
*/

 ?>