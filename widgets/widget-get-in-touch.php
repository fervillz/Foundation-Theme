<?php 

/**
 * Adds Fortnum_Touch_Widget widget.
 */
class Fortnum_Touch_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Fortnum_Touch_widget', // Base ID
			__( 'Fortnum Get In Touch', 'Fortnum' ), // Name
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
	 * $head_office_7 = $fortnum_settings_options['head_office_7']; // head_office
	 * $postal_7 = $fortnum_settings_options['postal_7']; // head_office
	 * $other_offices_7 = $fortnum_settings_options['other_offices_7']; // head_office
	 * $phone_8 = $fortnum_settings_options['phone_8']; // Phone
	 * $email_9 = $fortnum_settings_options['email_9']; // Email
	 * $gmap_altitude = $fortnum_settings_options['gmap_altitude']; // Phone
	 * $gmap_longitude = $fortnum_settings_options['gmap_longitude']; // Phone
	*/
	public function widget( $args, $instance ) {

		//get values from option settings
		$fortnum_settings_options = get_option( 'Fortnum_settings_option_general' );
		$phone_title = $instance['phone_title'];
		$contact_text =  $instance['contact_text'];
		$contact_url =  $instance['contact_url'];

		$fortnum_settings_options_contact = get_option( 'Fortnum_settings_option_contact' ); // Array of All Options
		$gmap_altitude = $fortnum_settings_options_contact['gmap_altitude_8']; // Phone
		$gmap_longitude = $fortnum_settings_options_contact['gmap_longitude_8']; // Phone

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo "<div class=\"widge-get-in-touch\">";
		echo "	<div class=\"gmap-wrapper\"><div class=\"gmap\">";
		echo "		<div class=\"view-large\">";
		echo "			view in google map";
		echo "			<a href=\"https://www.google.com/maps/place/Fortnum+Stockyards/@".$gmap_altitude.",".$gmap_longitude.",18z/data=!4m5!3m4!1s0x0:0x2748bc200d6ed78f!8m2!3d".$gmap_altitude."!4d".$gmap_longitude."\" target=\"_blank\"><i class=\"fa fa-expand\"></i></a>";

		echo "		</div><!-- .view-large -->";
		echo "	<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4775.607971760099!2d".$gmap_longitude."!3d".$gmap_altitude."!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDEwJzUwLjMiUyAxNDjCsDM3JzIxLjUiRQ!5e0!3m2!1sen!2s!4v1474071381203\" width=\"715\" height=\"420\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe></div>";	
		echo "		<div class=\"phone-details\">";
		echo "			".$phone_title." <span class=\"bold\">1800 805 292 </span>";
		echo "		</div><!-- .phone-details -->";
		echo "		<div class=\"contact-button\">";
		echo "			<a href=\"".$contact_url."\" class=\"button big yellow\">".$contact_text."</a>";
		echo "		</div><!-- .contact-button -->";
		echo "	</div><!-- .gmap -->";
		echo "</div><!-- .get-in-touch -->";

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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Get In Touch', 'Fortnum' );
		$phone_title = ! empty( $instance['phone_title'] ) ? $instance['phone_title'] : __( 'Call us direct at', 'Fortnum' );
		$contact_text = ! empty( $instance['contact_text'] ) ? $instance['contact_text'] : __( 'Contact us now', 'Fortnum' );
		$contact_url = ! empty( $instance['contact_url'] ) ? $instance['contact_url'] : __( '#', 'Fortnum' );

		//get values from option settings
		$fortnum_settings_options = get_option( 'Fortnum_settings_option_general' );

		$phone_8 = $fortnum_settings_options['phone_8'];
		$gmap_altitude = $fortnum_settings_options['gmap_altitude']; 
		$gmap_longitude = $fortnum_settings_options['gmap_longitude'];

		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<div class="contact-wrapper">
			<p>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d844.2188932911877!2d<?php echo $gmap_longitude; ?>!3d-<?php echo $gmap_altitude; ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDEwJzUwLjMiUyAxNDjCsDM3JzIxLjUiRQ!5e0!3m2!1sen!2s!4v1474070311279" style="width: 100%" height="107" frameborder="0" style="border:0" allowfullscreen></iframe>
			</p>
			<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_title' ) ); ?>" type="text" value="<?php echo esc_attr( $phone_title ); ?>">				
				<span class="phone_value" >
					<?php echo $phone_8; ?></span>
				</p>

				<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contact_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_text' ) ); ?>" type="text" value="<?php echo esc_attr( $contact_text ); ?>">
				<small class="widefat input_Fortnum_contact" id="<?php echo 'widget-office'; ?>" >
					<i>Links to: </i><input class="widefat contact_url" id="<?php echo esc_attr( $this->get_field_id( 'contact_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_url' ) ); ?>" type="url" value="<?php echo esc_attr( $contact_url ); ?>"></small>
				</p>
			</p>
		</div><!-- .offices-wrapper -->


		<p>If phone is not showing - please add your information <a href="http://127.0.0.1/wordpress/wp-admin/admin.php?page=Fortnum-settings&tab=Fortnum_settings_contact_options" target="_blank">here</a>.</p>
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
		$instance['phone_title'] = ( ! empty( $new_instance['phone_title'] ) ) ? strip_tags( $new_instance['phone_title'] ) : '';
		$instance['contact_text'] = ( ! empty( $new_instance['contact_text'] ) ) ? strip_tags( $new_instance['contact_text'] ) : '';
		$instance['contact_url'] = ( ! empty( $new_instance['contact_url'] ) ) ? strip_tags( $new_instance['contact_url'] ) : '';

		return $instance;
	}

} // class Fortnum_Touch_Widget

// register Fortnum_Touch_Widget widget
function register_Fortnum_Touch_widget() {
	register_widget( 'Fortnum_Touch_Widget' );
}
add_action( 'widgets_init', 'register_Fortnum_Touch_widget' );

?>