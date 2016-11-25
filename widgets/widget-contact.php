<?php 

/**
 * Adds Fortnum_Details_Widget widget.
 */
class Fortnum_Details_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Fortnum_Details_widget', // Base ID
			__( 'Fortnum Contact Details', 'Fortnum' ), // Name
			array( 'description' => __( 'Location, Phone & Email', 'Fortnum' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 *  Contact
 * $fortnum_settings_options_contact = get_option( 'fortnum_settings_option_contact' ); // Array of All Options
 * $head_office_7 = $fortnum_settings_options_contact['head_office_7']; // head_office
 * $Address_7 = $fortnum_settings_options_contact['Address_7']; // head_office
 * $phone_8 = $fortnum_settings_options_contact['phone_8']; // Phone
 * $email_9 = $fortnum_settings_options_contact['email_9']; // Email
 * $gmap_altitude_8 = $fortnum_settings_options_contact['gmap_altitude_8']; // Phone
 * $gmap_longitude_8 = $fortnum_settings_options_contact['gmap_longitude_8']; // Phone
 * $fax_call_8 = $fortnum_settings_options_contact['fax_call_8']; // Phone
	*/
	public function widget( $args, $instance ) {

		//get values from option settings
		$Fortnum_settings_options_contact = get_option( 'Fortnum_settings_option_contact' ); // Array of All Options

		$head_office_value = $Fortnum_settings_options_contact['head_office_7']; // head_office
		$postal_value = $Fortnum_settings_options_contact['postal_7']; // head_office
		$other_offices_value = $Fortnum_settings_options_contact['other_offices_7']; // head_office
		

		$head_office_title = $instance['title1'];
		$head_office_value = $Fortnum_settings_options_contact['head_office_7'];

		$postal_title = $instance['title2'];
		$postal_value = $Fortnum_settings_options_contact['Address_7'];

		$other_offices_title = $instance['title3'];
		$other_offices_value = $Fortnum_settings_options_contact['Address_7'];

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo "<div class=\"widget-contact\">";
		echo "	<div class=\"head-office\">";
		echo "		<label for=\"\">".$head_office_title."</label>";
		echo "		<div class=\"value\">".$head_office_value."</div>";
		echo "	</div>";

		echo "	<div class=\"postal\">";
		echo "		<label for=\"\">".$postal_title."</label>";
		echo "		<div class=\"value\">".$postal_value."</div></div>";

		echo "	<div class=\"other-offices\">";
		echo "		<label for=\"\">".$other_offices_title."</label>";
		echo "		<div class=\"value\">".$other_offices_value."</div>";
		echo "	</div>";
		echo "</div>";

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Contact Details', 'Fortnum' );
		$title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : __( 'Head Office & Workshop:', 'Fortnum' );
		$title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : __( 'Postal:', 'Fortnum' );
		$title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : __( 'Offices also at:', 'Fortnum' );

		$Fortnum_settings_options_contact = get_option( 'Fortnum_settings_option_contact' ); // Array of All Options

		$head_office_value = $Fortnum_settings_options_contact['head_office_7']; // head_office
		$postal_value = $Fortnum_settings_options_contact['postal_7']; // head_office
		$other_offices_value = $Fortnum_settings_options_contact['other_offices_7']; // head_office

		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<div class="offices-wrapper">
				<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title1' ) ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>">
				<div class="widefat input_Fortnum_about_textarea" id="<?php echo 'widget-office'; ?>" >
					<?php echo $head_office_value; ?></div>
				</p>

				<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title2' ) ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>">
				<div class="widefat input_Fortnum_about_textarea" id="<?php echo 'widget-office'; ?>" >
					<?php echo $postal_value; ?></div>
				</p>

				<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title3' ) ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>">
				<div class="widefat input_Fortnum_about_textarea" id="<?php echo 'widget-office'; ?>" >
					<?php echo $other_offices_value; ?></div>
			</p>
		</div><!-- .offices-wrapper -->


		<p>If contact details are not showing - please add your information <a href="http://127.0.0.1/wordpress/wp-admin/admin.php?page=Fortnum-settings&tab=Fortnum_settings_contact_options" target="_blank">here</a>.</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['title1'] = ( ! empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
		$instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
		$instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';

		return $instance;
	}

} // class Fortnum_Details_Widget

// register Fortnum_Details_Widget widget
function register_Fortnum_Details_widget() {
    register_widget( 'Fortnum_Details_Widget' );
}
add_action( 'widgets_init', 'register_Fortnum_Details_widget' );

?>