<?php 

/**
 * Adds Fortnum_About_Widget widget.
 *
 * Contact
 * 
 * $fortnum_settings_options_contact = get_option( 'fortnum_settings_option_contact' ); // Array of All Options
 * $Address_7 = $fortnum_settings_options_contact['Address_7']; // head_office
 * $Address_7 = $fortnum_settings_options_contact['Address_7']; // head_office
 * $phone_8 = $fortnum_settings_options_contact['phone_8']; // Phone
 * $email_9 = $fortnum_settings_options_contact['email_9']; // Email
 * $gmap_altitude_8 = $fortnum_settings_options_contact['gmap_altitude_8']; // Phone
 * $gmap_longitude_8 = $fortnum_settings_options_contact['gmap_longitude_8']; // Phone
 * $fax_call_8 = $fortnum_settings_options_contact['fax_call_8']; // Phone
 * 
 */


class Fortnum_About_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Fortnum_About_widget', // Base ID
			__( 'Fortnum About', 'Fortnum' ), // Name
			array( 'description' => __( 'Short information', 'Fortnum' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		//get values from option settings
		$Fortnum_about_textarea =  $instance['Fortnum_about_textarea'];
		
		$Fortnum_settings_options_contact = get_option( 'Fortnum_settings_option_contact' ); // Array of All Options

		$Address_value = $Fortnum_settings_options_contact['Address_7']; // head_office
		$phone_value = $Fortnum_settings_options_contact['phone_8']; // head_office
		$email_value = $Fortnum_settings_options_contact['email_9']; // head_office
		

		$head_office_title = $instance['title1'];
		

		$postal_title = $instance['title2'];
		$phone_value = $Fortnum_settings_options_contact['phone_8'];

		$other_offices_title = $instance['title3'];
		$email_value = $Fortnum_settings_options_contact['email_9'];

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		//excerpt
		echo "<div class=\"widget-about-content\">";
		echo preg_replace( '/\n/', '<br />', $Fortnum_about_textarea );
		echo "</div>";

		echo "<div class=\"footer-contact\">";
			echo "<div class=\"info\"><i class=\"fa fa-map-marker\"></i><a href=\"".site_url()."/contact-us/\">".$Address_value."</a></div>";	
			echo "<div class=\"info\"><i class=\"fa fa-map-marker\"></i><a href=\"tel:".$phone_value."\">".$phone_value."</a></div>";	
			echo "<div class=\"info\"><i class=\"fa fa-map-marker\"></i><a href=\"mailto:".$email_value."\">".$email_value."</a></div>";	
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
		/* Set up some default widget settings. */
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'About Fortnum', 'Fortnum' );
		$blogname = get_bloginfo( 'name' );
		$defaults = array( 
			'Fortnum_about_textarea' => 'Fortnum Financial Advisers is Australia’s leading licensee for quality, client-centric advice businesses.',
		 );

		$title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : __( 'Address:', 'Fortnum' );
		$title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : __( 'Phone:', 'Fortnum' );
		$title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : __( 'Email:', 'Fortnum' );

		$Fortnum_settings_options_contact = get_option( 'Fortnum_settings_option_contact' ); // Array of All Options

		$Address_value = $Fortnum_settings_options_contact['Address_7']; // head_office
		$phone_value = $Fortnum_settings_options_contact['phone_8']; // head_office
		$email_value = $Fortnum_settings_options_contact['email_9']; // head_office

		$instance = wp_parse_args( (array) $instance, $defaults );


		if ($instance){

			//textarea
			$Fortnum_about_textarea = esc_attr($instance['Fortnum_about_textarea']);
		}

		else
		{
			$Fortnum_about_textarea = '';

		}

		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!-- About textbox -->
		<p class="Fortnum">
			<label for="<?php echo $this->get_field_id('Fortnum_about_textarea'); ?>" class="asterisk Fortnumsocial">
				About excerpt <i>(max 33 words)</i>
			</label>

			<textarea cols="30" rows="7" class="widefat input_Fortnum_about_textarea" id="<?php echo $this->get_field_id('Fortnum_about_textarea'); ?>"  
			name="<?php echo $this->get_field_name('Fortnum_about_textarea'); ?>"
			><?php echo $Fortnum_about_textarea; ?></textarea>

		</p>

		<div class="offices-wrapper">
				<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title1' ) ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>">
				<div class="widefat input_Fortnum_about_textarea" id="<?php echo 'widget-office'; ?>" >
					<?php echo $Address_value; ?></div>
				</p>

				<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title2' ) ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>">
				<div class="widefat input_Fortnum_about_textarea" id="<?php echo 'widget-office'; ?>" >
					<?php echo $phone_value; ?></div>
				</p>

				<p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title3' ) ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>">
				<div class="widefat input_Fortnum_about_textarea" id="<?php echo 'widget-office'; ?>" >
					<?php echo $email_value; ?></div>
			</p>
		</div><!-- .offices-wrapper -->


		<p>If contact details are not showing - please add your information <a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=Fortnum-settings&tab=Fortnum_settings_contact_options" target="_blank">here</a>.</p>
		
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
		$instance = $old_instance;
			//fields
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['Fortnum_about_textarea'] = strip_tags($new_instance['Fortnum_about_textarea']);
			
			return $instance;
	}

} // class Fortnum_About_Widget

// register Fortnum_About_Widget widget
function register_Fortnum_About_widget() {
    register_widget( 'Fortnum_About_Widget' );
}
add_action( 'widgets_init', 'register_Fortnum_About_widget' );

?>