<?php

class FortnumSettings {
	private $fortnum_settings_options;
	private $fortnum_settings_options_contact;
	private $fortnum_settings_options_social;
	private $fortnum_settings_options_display;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'fortnum_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'fortnum_settings_page_init' ) );
	}

	public function fortnum_settings_add_plugin_page() {
		add_menu_page(
			'Fortnum Settings', // page_title
			'Fortnum Settings', // menu_title
			'manage_options', // capability
			'fortnum-settings', // menu_slug
			array( $this, 'fortnum_settings_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			81 // position
		);
	}

	public function fortnum_settings_create_admin_page() {
		
		$this->fortnum_settings_options = get_option( 'fortnum_settings_option_general' );

		$this->fortnum_settings_options_contact = get_option( 'fortnum_settings_option_contact' );

		$this->fortnum_settings_options_social = get_option( 'fortnum_settings_option_social' ); 

		$this->fortnum_settings_options_display = get_option( 'fortnum_settings_option_display' ); ?>

		

		<div class="wrap">
		<div id="icon-themes" class="icon32"></div>
			<h2>Fortnum Settings</h2>
			<p>This are basic for atlex Website</p>
			<?php settings_errors(); ?>

			<?php  
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_options';  
        	?>  

			<h2 class="nav-tab-wrapper">
			    <a href="?page=fortnum-settings&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General Options</a>
			    <a href="?page=fortnum-settings&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Display Options</a>
			    <a href="?page=fortnum-settings&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Options</a>	
			    <a href="?page=fortnum-settings&tab=contact_options" class="nav-tab <?php echo $active_tab == 'contact_options' ? 'nav-tab-active' : ''; ?>">Contact Options</a>		
			</h2>

			<form method="post" action="options.php">

				<?php

				if( $active_tab == 'general_options' ) {
		            settings_fields( 'fortnum_settings_general_options' );
					do_settings_sections( 'fortnum_settings_general_options' );		
		        } 

		        elseif ( $active_tab == 'display_options' ) {
		            settings_fields( 'fortnum_settings_display_options' );
					do_settings_sections( 'fortnum_settings_display_options' );
		        } 

		        elseif ( $active_tab == 'social_options' ) {
		            settings_fields( 'fortnum_settings_social_options' );
					do_settings_sections( 'fortnum_settings_social_options' );
		        } 

		        elseif ( $active_tab == 'contact_options' ) {
		            settings_fields( 'fortnum_settings_contact_options' );
					do_settings_sections( 'fortnum_settings_contact_options' );
		        } // end if/else

		        ?>

				<?php submit_button(); ?>

			</form>
		</div>
	<?php }

	public function fortnum_settings_page_init() {

		//general
		register_setting(
			'fortnum_settings_general_options', // option_group
			'fortnum_settings_option_general', // option_name
			array( $this, 'fortnum_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'fortnum_settings_general_options', // id
			'General Options', // title
			array( $this, 'fortnum_settings_general_options_callback' ), // callback
			'fortnum_settings_general_options' // page
		);

		add_settings_field(
			'Enquire_url', // id
			'Enquire URL', // title
			array( $this, 'Enquire_url_callback' ), // callback
			'fortnum_settings_general_options', // page
			'fortnum_settings_general_options' // section
		);


		add_settings_field(
			'header_cta_5', // id
			'Contact URL', // title
			array( $this, 'header_cta_5_callback' ), // callback
			'fortnum_settings_general_options', // page
			'fortnum_settings_general_options' // section
		);

		add_settings_field(
			'terms_of_use_5', // id
			'Terms of Use', // title
			array( $this, 'terms_of_use_5_callback' ), // callback
			'fortnum_settings_general_options', // page
			'fortnum_settings_general_options' // section
		);

		add_settings_field(
			'privacy_policy_6', // id
			'Privacy Policy', // title
			array( $this, 'privacy_policy_6_callback' ), // callback
			'fortnum_settings_general_options', // page
			'fortnum_settings_general_options' // section
		);		

		add_settings_field(
			'blog_excerpt_10', // id
			'Blog Excerpt Count', // title
			array( $this, 'blog_excerpt_10_callback' ), // callback
			'fortnum_settings_general_options', // page
			'fortnum_settings_general_options' // section
		);

		add_settings_field(
			'Copyright_0', // id
			'Copyright text', // title
			array( $this, 'Copyright_0_callback' ), // callback
			'fortnum_settings_general_options', // page
			'fortnum_settings_general_options' // section
		);

		add_settings_field(
			'woo_featured_0', // id
			'Product Count', // title
			array( $this, 'woo_featured_0_callback' ), // callback
			'fortnum_settings_general_options', // page
			'fortnum_settings_general_options' // section
		);
		

		//end general
		
		//social
		register_setting(
			'fortnum_settings_social_options', // option_group
			'fortnum_settings_option_social', // option_name
			array( $this, 'fortnum_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'fortnum_settings_social_options', // id
			'Social Options', // title
			array( $this, 'fortnum_settings_section_social_callback' ), // callback
			'fortnum_settings_social_options' // page
		);

		add_settings_field(
			'facebook_0', // id
			'Facebook', // title
			array( $this, 'facebook_0_callback' ), // callback
			'fortnum_settings_social_options', // page
			'fortnum_settings_social_options' // section
		);

		add_settings_field(
			'twitter_1', // id
			'Twitter', // title
			array( $this, 'twitter_1_callback' ), // callback
			'fortnum_settings_social_options', // page
			'fortnum_settings_social_options' // section
		);

		add_settings_field(
			'linkedin_2', // id
			'Linkedin', // title
			array( $this, 'linkedin_2_callback' ), // callback
			'fortnum_settings_social_options', // page
			'fortnum_settings_social_options' // section
		);

		add_settings_field(
			'gplus_3', // id
			'Google Plus', // title
			array( $this, 'gplus_3_callback' ), // callback
			'fortnum_settings_social_options', // page
			'fortnum_settings_social_options' // section
		);

		add_settings_field(
			'Instagram_4', // id
			'Instagram', // title
			array( $this, 'instagram_4_callback' ), // callback
			'fortnum_settings_social_options', // page
			'fortnum_settings_social_options' // section
		);

		add_settings_field(
			'skype_3', // id
			'Skype', // title
			array( $this, 'skype_3_callback' ), // callback
			'fortnum_settings_social_options', // page
			'fortnum_settings_social_options' // section
		);

		add_settings_field(
			'rss_feeds_4', // id
			'RSS Feeds', // title
			array( $this, 'rss_feeds_4_callback' ), // callback
			'fortnum_settings_social_options', // page
			'fortnum_settings_social_options' // section
		);

		//end social
		
		
		//Contact
		register_setting(
			'fortnum_settings_contact_options', // option_group
			'fortnum_settings_option_contact', // option_name
			array( $this, 'fortnum_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'fortnum_settings_contact_options', // id
			'Social Options', // title
			array( $this, 'fortnum_settings_section_contact_callback' ), // callback
			'fortnum_settings_contact_options' // page
		);	

		add_settings_field(
			'phone_8', // id
			'Phone', // title
			array( $this, 'phone_8_callback' ), // callback
			'fortnum_settings_contact_options', // page
			'fortnum_settings_contact_options' // section
		);

		add_settings_field(
			'fax_call_8', // id
			'fax', // title
			array( $this, 'fax_call_8_callback' ), // callback
			'fortnum_settings_contact_options', // page
			'fortnum_settings_contact_options' // section
		);		

		add_settings_field(
			'email_9', // id
			'Email', // title
			array( $this, 'email_9_callback' ), // callback
			'fortnum_settings_contact_options', // page
			'fortnum_settings_contact_options' // section
		);

		add_settings_field(
			'head_office_7', // id
			'Head Office', // title
			array( $this, 'head_office_7_callback' ), // callback
			'fortnum_settings_contact_options', // page
			'fortnum_settings_contact_options' // section
		);

		add_settings_field(
			'Address_7', // id
			'Address', // title
			array( $this, 'Address_7_callback' ), // callback
			'fortnum_settings_contact_options', // page
			'fortnum_settings_contact_options' // section
		);

		add_settings_field(
			'gmap_altitude_8', // id
			'GMap Latitude', // title
			array( $this, 'gmap_altitude_8_callback' ), // callback
			'fortnum_settings_contact_options', // page
			'fortnum_settings_contact_options' // section
		);

		add_settings_field(
			'gmap_longitude_8', // id
			'GMap Longitude', // title
			array( $this, 'gmap_longitude_8_callback' ), // callback
			'fortnum_settings_contact_options', // page
			'fortnum_settings_contact_options' // section
		);
		
		//End Contact

		//Display Options
		register_setting(
			'fortnum_settings_display_options', // option_group
			'fortnum_settings_option_display', // option_name
			array( $this, 'fortnum_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'fortnum_settings_display_options', // id
			'Display Options', // title
			array( $this, 'fortnum_settings_section_display_callback' ), // callback
			'fortnum_settings_display_options' // page
		);

		add_settings_field(
			'opd', // id
			'Section 1', // title
			array( $this, 'opd_9_callback' ), // callback
			'fortnum_settings_display_options', // page
			'fortnum_settings_display_options' // section
		);

		add_settings_field(
			'products_9', // id
			'Section 2', // title
			array( $this, 'products_9_callback' ), // callback
			'fortnum_settings_display_options', // page
			'fortnum_settings_display_options' // section
		);

		add_settings_field(
			'projects_9', // id
			'Section 3', // title
			array( $this, 'projects_9_callback' ), // callback
			'fortnum_settings_display_options', // page
			'fortnum_settings_display_options' // section
		);

		add_settings_field(
			'videos_9', // id
			'Section 4', // title
			array( $this, 'videos_9_callback' ), // callback
			'fortnum_settings_display_options', // page
			'fortnum_settings_display_options' // section
		);

		add_settings_field(
			'blog_9', // id
			'Section 5', // title
			array( $this, 'blog_9_callback' ), // callback
			'fortnum_settings_display_options', // page
			'fortnum_settings_display_options' // section
		);

		//End Display Options
	}

	public function fortnum_settings_sanitize($input) {

		//Social
		$sanitary_values = array();
		if ( isset( $input['facebook_0'] ) ) {
			$sanitary_values['facebook_0'] = esc_url( $input['facebook_0'] );
		}

		if ( isset( $input['twitter_1'] ) ) {
			$sanitary_values['twitter_1'] = esc_url( $input['twitter_1'] );
		}

		if ( isset( $input['linkedin_2'] ) ) {
			$sanitary_values['linkedin_2'] = esc_url( $input['linkedin_2'] );
		}

		if ( isset( $input['gplus_3'] ) ) {
			$sanitary_values['gplus_3'] = esc_url( $input['gplus_3'] );
		}

		if ( isset( $input['instagram_4'] ) ) {
			$sanitary_values['instagram_4'] = esc_url( $input['instagram_4'] );
		}

		if ( isset( $input['skype_3'] ) ) {
			$sanitary_values['skype_3'] = esc_url( $input['skype_3'] );
		}

		if ( isset( $input['rss_feeds_4'] ) ) {
			$sanitary_values['rss_feeds_4'] = esc_url( $input['rss_feeds_4'] );
		}

		//General

		if ( isset( $input['Enquire_url'] ) ) {
			$sanitary_values['Enquire_url'] = esc_url( $input['Enquire_url'] );
		}

		if ( isset( $input['terms_of_use_5'] ) ) {
			$sanitary_values['terms_of_use_5'] = esc_url( $input['terms_of_use_5'] );
		}

		if ( isset( $input['header_cta_5'] ) ) {
			$sanitary_values['header_cta_5'] = esc_url( $input['header_cta_5'] );
		}

		if ( isset( $input['privacy_policy_6'] ) ) {
			$sanitary_values['privacy_policy_6'] = esc_url( $input['privacy_policy_6'] );
		}

		if ( isset( $input['blog_excerpt_10'] ) ) {
			$sanitary_values['blog_excerpt_10'] = sanitize_text_field( $input['blog_excerpt_10'] );
		}

		if ( isset( $input['Copyright_0'] ) ) {
			$sanitary_values['Copyright_0'] = esc_textarea( $input['Copyright_0'] );
		}

		if ( isset( $input['woo_featured_0'] ) ) {
			$sanitary_values['woo_featured_0'] = esc_textarea( $input['woo_featured_0'] );
		}

		//End General

		//Contact Details
		
		if ( isset( $input['head_office_7'] ) ) {
			$sanitary_values['head_office_7'] = esc_textarea( $input['head_office_7'] );
		}

		if ( isset( $input['Address_7'] ) ) {
			$sanitary_values['Address_7'] = esc_textarea( $input['Address_7'] );
		}

		if ( isset( $input['phone_8'] ) ) {
			$sanitary_values['phone_8'] = sanitize_text_field( $input['phone_8'] );
		}

		if ( isset( $input['fax_call_8'] ) ) {
			$sanitary_values['fax_call_8'] = sanitize_text_field( $input['fax_call_8'] );
		}

		if ( isset( $input['email_9'] ) ) {
			$sanitary_values['email_9'] = sanitize_email( $input['email_9'] );
		}

		if ( isset( $input['gmap_altitude_8'] ) ) {
			$sanitary_values['gmap_altitude_8'] = sanitize_text_field( $input['gmap_altitude_8'] );
		}

		if ( isset( $input['gmap_longitude_8'] ) ) {
			$sanitary_values['gmap_longitude_8'] = sanitize_text_field( $input['gmap_longitude_8'] );
		}

		//End Contact Details


		//Display options
				
		if ( isset( $input['opd_9'] ) ) { 
			$sanitary_values['opd_9'] = sanitize_text_field( $input['opd_9'] );
		}

		if ( isset( $input['opd_sub_9'] ) ) { 
			$sanitary_values['opd_sub_9'] = esc_textarea( $input['opd_sub_9'] );
		}

		if ( isset( $input['products_9'] ) ) { 
			$sanitary_values['products_9'] = sanitize_text_field( $input['products_9'] );
		}

		if ( isset( $input['products_sub_9'] ) ) { 
			$sanitary_values['products_sub_9'] = esc_textarea( $input['products_sub_9'] );
		}

		if ( isset( $input['projects_9'] ) ) { 
			$sanitary_values['projects_9'] = sanitize_text_field( $input['projects_9'] );
		}

		if ( isset( $input['projects_sub_9'] ) ) { 
			$sanitary_values['projects_sub_9'] = esc_textarea( $input['projects_sub_9'] );
		}

		if ( isset( $input['videos_9'] ) ) { 
			$sanitary_values['videos_9'] = sanitize_text_field( $input['videos_9'] );
		}

		if ( isset( $input['videos_sub_9'] ) ) { 
			$sanitary_values['videos_sub_9'] = esc_textarea( $input['videos_sub_9'] );
		}

		if ( isset( $input['blog_9'] ) ) { 
			$sanitary_values['blog_9'] = sanitize_text_field( $input['blog_9'] );
		}

		if ( isset( $input['blog_sub_9'] ) ) { 
			$sanitary_values['blog_sub_9'] = esc_textarea( $input['blog_sub_9'] );
		}

		//End Display options

		return $sanitary_values;
	}

	public function fortnum_settings_general_options_callback() {
		echo '<p>Enter the right information for each field</p>';
	}

	public function fortnum_settings_section_social_callback() {
		echo '<p>Provide the URL to the social networks you\'d like to display.</p>';
	}

	public function fortnum_settings_section_contact_callback() {
		echo '<p>Your Office head_office, Address, Phone, Email, Google Map</p>';
	}

	public function fortnum_settings_section_display_callback() {
		echo '<p>Section Titles and subtitles</p>';
	}


	//Social
	public function facebook_0_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_social[facebook_0]" id="facebook_0" value="%s">',
			isset( $this->fortnum_settings_options_social['facebook_0'] ) ? esc_attr( $this->fortnum_settings_options_social['facebook_0']) : ''
		);
	}

	public function twitter_1_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_social[twitter_1]" id="twitter_1" value="%s">',
			isset( $this->fortnum_settings_options_social['twitter_1'] ) ? esc_attr( $this->fortnum_settings_options_social['twitter_1']) : ''
		);
	}

	public function linkedin_2_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_social[linkedin_2]" id="linkedin_2" value="%s">',
			isset( $this->fortnum_settings_options_social['linkedin_2'] ) ? esc_attr( $this->fortnum_settings_options_social['linkedin_2']) : ''
		);
	}

	public function gplus_3_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_social[gplus_3]" id="gplus_3" value="%s">',
			isset( $this->fortnum_settings_options_social['gplus_3'] ) ? esc_attr( $this->fortnum_settings_options_social['gplus_3']) : ''
		);
	}

	public function instagram_4_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_social[instagram_4]" id="instagram_4" value="%s">',
			isset( $this->fortnum_settings_options_social['instagram_4'] ) ? esc_attr( $this->fortnum_settings_options_social['instagram_4']) : ''
		);
	}

	public function skype_3_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_social[skype_3]" id="skype_3" value="%s">',
			isset( $this->fortnum_settings_options_social['skype_3'] ) ? esc_attr( $this->fortnum_settings_options_social['skype_3']) : ''
		);
	}

	public function rss_feeds_4_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_social[rss_feeds_4]" id="rss_feeds_4" value="%s">',
			isset( $this->fortnum_settings_options_social['rss_feeds_4'] ) ? esc_attr( $this->fortnum_settings_options_social['rss_feeds_4']) : ''
		);
	}

	public function terms_of_use_5_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_general[terms_of_use_5]" id="terms_of_use_5" value="%s">',
			isset( $this->fortnum_settings_options['terms_of_use_5'] ) ? esc_attr( $this->fortnum_settings_options['terms_of_use_5']) : ''
		);
	}

	public function header_cta_5_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_general[header_cta_5]" id="header_cta_5" value="%s">',
			isset( $this->fortnum_settings_options['header_cta_5'] ) ? esc_attr( $this->fortnum_settings_options['header_cta_5']) : ''
		);
	}

	public function Enquire_url_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_general[Enquire_url]" id="Enquire_url" value="%s">',
			isset( $this->fortnum_settings_options['Enquire_url'] ) ? esc_attr( $this->fortnum_settings_options['Enquire_url']) : ''
		);
	}

	public function privacy_policy_6_callback() {
		printf(
			'<input class="regular-text" type="url" name="fortnum_settings_option_general[privacy_policy_6]" id="privacy_policy_6" value="%s">',
			isset( $this->fortnum_settings_options['privacy_policy_6'] ) ? esc_attr( $this->fortnum_settings_options['privacy_policy_6']) : ''
		);
	}


	//Contact
	public function head_office_7_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="fortnum_settings_option_contact[head_office_7]" id="head_office_7">%s</textarea>',
			isset( $this->fortnum_settings_options_contact['head_office_7'] ) ? esc_attr( $this->fortnum_settings_options_contact['head_office_7']) : ''
		);
	}

	public function Address_7_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="fortnum_settings_option_contact[Address_7]" id="Address_7">%s</textarea>',
			isset( $this->fortnum_settings_options_contact['Address_7'] ) ? esc_attr( $this->fortnum_settings_options_contact['Address_7']) : ''
		);
	}

	public function phone_8_callback() {
		printf(
			'<input class="regular-text" type="text" name="fortnum_settings_option_contact[phone_8]" id="phone_8" value="%s">',
			isset( $this->fortnum_settings_options_contact['phone_8'] ) ? esc_attr( $this->fortnum_settings_options_contact['phone_8']) : ''
		);
	}

	public function fax_call_8_callback() {
		printf(
			'<input class="regular-text" type="text" name="fortnum_settings_option_contact[fax_call_8]" id="fax_call_8" value="%s">',
			isset( $this->fortnum_settings_options_contact['fax_call_8'] ) ? esc_attr( $this->fortnum_settings_options_contact['fax_call_8']) : ''
		);
	}
	

	public function email_9_callback() {
		printf(
			'<input class="regular-text" type="email" name="fortnum_settings_option_contact[email_9]" id="email_9" value="%s">',
			isset( $this->fortnum_settings_options_contact['email_9'] ) ? esc_attr( $this->fortnum_settings_options_contact['email_9']) : ''
		);
	}

	public function gmap_altitude_8_callback() {
		printf(
			'<input class="regular-text" type="text" name="fortnum_settings_option_contact[gmap_altitude_8]" id="gmap_altitude_8" value="%s">',
			isset( $this->fortnum_settings_options_contact['gmap_altitude_8'] ) ? esc_attr( $this->fortnum_settings_options_contact['gmap_altitude_8']) : ''
		);
	}

	public function gmap_longitude_8_callback() {
		printf(
			'<input class="regular-text" type="text" name="fortnum_settings_option_contact[gmap_longitude_8]" id="gmap_longitude_8" value="%s">',
			isset( $this->fortnum_settings_options_contact['gmap_longitude_8'] ) ? esc_attr( $this->fortnum_settings_options_contact['gmap_longitude_8']) : ''
		);
	}
	//End Contact

	//general
	public function blog_excerpt_10_callback() {
		printf(
			'<input class="regular-text" type="number" name="fortnum_settings_option_general[blog_excerpt_10]" id="blog_excerpt_10" value="%s">',
			isset( $this->fortnum_settings_options['blog_excerpt_10'] ) ? esc_attr( $this->fortnum_settings_options['blog_excerpt_10']) : ''
		);
	}
	public function Copyright_0_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="fortnum_settings_option_general[Copyright_0]" id="Copyright_0">%s</textarea>',
			isset( $this->fortnum_settings_options['Copyright_0'] ) ? esc_attr( $this->fortnum_settings_options['Copyright_0']) : ''
		);
	}
	public function woo_featured_0_callback() {
		printf(
			'<input class="regular-text" type="number" name="fortnum_settings_option_general[woo_featured_0]" id="woo_featured_0" value="%s">',
			isset( $this->fortnum_settings_options['woo_featured_0'] ) ? esc_attr( $this->fortnum_settings_options['woo_featured_0']) : ''
		);
		echo ( '<small>Number of products featured in homepage.</small>' );
	}

	
	//end general
	

	//Display
	public function opd_9_callback() {
		printf(
			'<input class="regular-text" type="text" placeholder="Enter title here..." name="fortnum_settings_option_display[opd_9]" id="opd_9" value="%s">',
			isset( $this->fortnum_settings_options_display['opd_9'] ) ? esc_attr( $this->fortnum_settings_options_display['opd_9']) : ''
		);
		echo "<small/>Section Title</small>";
		echo "<br/><br/>";
		printf(
			'<textarea class="large-text" rows="3" placeholder="Enter sub-title here..." name="fortnum_settings_option_display[opd_sub_9]" id="opd_sub_9">%s</textarea>',
			isset( $this->fortnum_settings_options_display['opd_sub_9'] ) ? esc_attr( $this->fortnum_settings_options_display['opd_sub_9']) : ''
		);
		echo "<small/>Section Sub-Title</small>";
	}

	public function products_9_callback() {
		printf(
			'<input class="regular-text" type="text" placeholder="Enter title here..." name="fortnum_settings_option_display[products_9]" id="products_9" value="%s">',
			isset( $this->fortnum_settings_options_display['products_9'] ) ? esc_attr( $this->fortnum_settings_options_display['products_9']) : ''
		);
		echo "<small/>Section Title</small>";
		echo "<br/><br/>";
		printf(
			'<textarea class="large-text" rows="3" placeholder="Enter sub-title here..." name="fortnum_settings_option_display[products_sub_9]" id="products_sub_9">%s</textarea>',
			isset( $this->fortnum_settings_options_display['products_sub_9'] ) ? esc_attr( $this->fortnum_settings_options_display['products_sub_9']) : ''
		);
		echo "<small/>Section Sub-Title</small>";
	}

	public function projects_9_callback() {
		printf(
			'<input class="regular-text" type="text" placeholder="Enter title here..." name="fortnum_settings_option_display[projects_9]" id="projects_9" value="%s">',
			isset( $this->fortnum_settings_options_display['projects_9'] ) ? esc_attr( $this->fortnum_settings_options_display['projects_9']) : ''
		);
		echo "<small/>Section Title</small>";
		echo "<br/><br/>";
		printf(
			'<textarea class="large-text" rows="3" placeholder="Enter sub-title here..." name="fortnum_settings_option_display[projects_sub_9]" id="projects_sub_9">%s</textarea>',
			isset( $this->fortnum_settings_options_display['projects_sub_9'] ) ? esc_attr( $this->fortnum_settings_options_display['projects_sub_9']) : ''
		);
		echo "<small/>Section Sub-Title</small>";
	}

	public function videos_9_callback() {
		printf(
			'<input class="regular-text" type="text" placeholder="Enter title here..." name="fortnum_settings_option_display[videos_9]" id="videos_9" value="%s">',
			isset( $this->fortnum_settings_options_display['videos_9'] ) ? esc_attr( $this->fortnum_settings_options_display['videos_9']) : ''
		);
		echo "<small/>Section Title</small>";
		echo "<br/><br/>";
		printf(
			'<textarea class="large-text" rows="3" placeholder="Enter sub-title here..." name="fortnum_settings_option_display[videos_sub_9]" id="videos_sub_9">%s</textarea>',
			isset( $this->fortnum_settings_options_display['videos_sub_9'] ) ? esc_attr( $this->fortnum_settings_options_display['videos_sub_9']) : ''
		);
		echo "<small/>Section Sub-Title</small>";
	}

	public function blog_9_callback() {
		printf(
			'<input class="regular-text" type="text" placeholder="Enter title here..." name="fortnum_settings_option_display[blog_9]" id="blog_9" value="%s">',
			isset( $this->fortnum_settings_options_display['blog_9'] ) ? esc_attr( $this->fortnum_settings_options_display['blog_9']) : ''
		);
		echo "<small/>Section Title</small>";
		echo "<br/><br/>";
		printf(
			'<textarea class="large-text" rows="3" placeholder="Enter sub-title here..." name="fortnum_settings_option_display[blog_sub_9]" id="blog_sub_9">%s</textarea>',
			isset( $this->fortnum_settings_options_display['blog_sub_9'] ) ? esc_attr( $this->fortnum_settings_options_display['blog_sub_9']) : ''
		);
		echo "<small/>Section Sub-Title</small>";
	}
	//end display

}
if ( is_admin() )
	$fortnum_settings = new FortnumSettings();

/* 
 * Social * 
 * fortnum_settings_options_social = get_option( 'fortnum_settings_option_social' ); // Array of All Options
 * $facebook_0 = $fortnum_settings_options_social['facebook_0']; // facebook
 * $twitter_1 = $fortnum_settings_options_social['twitter_1']; // Twitter
 * $linkedin_2 = $fortnum_settings_options_social['linkedin_2']; // Linkedin
 * $gplus_3 = $fortnum_settings_options_social['gplus_3']; // gplus
 * $instagram_3 = $fortnum_settings_options_social['instagram_3']; // Skype
 * $skype_3 = $fortnum_settings_options_social['skype_3']; // Skype
 * $rss_feeds_4 = $fortnum_settings_options_social['rss_feeds_4']; // RSS Feeds
 *
 * Contact
 * $fortnum_settings_options_contact = get_option( 'fortnum_settings_option_contact' ); // Array of All Options
 * $head_office_7 = $fortnum_settings_options_contact['head_office_7']; // head_office
 * $Address_7 = $fortnum_settings_options_contact['Address_7']; // head_office
 * $phone_8 = $fortnum_settings_options_contact['phone_8']; // Phone
 * $email_9 = $fortnum_settings_options_contact['email_9']; // Email
 * $gmap_altitude_8 = $fortnum_settings_options_contact['gmap_altitude_8']; // Phone
 * $gmap_longitude_8 = $fortnum_settings_options_contact['gmap_longitude_8']; // Phone
 * $fax_call_8 = $fortnum_settings_options_contact['fax_call_8']; // Phone
 * 
 *
 * General Settings
 * $fortnum_settings_options = get_option( 'fortnum_settings_option_general' ); // Array of All Options
 * $Copyright_0 = $fortnum_settings_options['Copyright_0']; // Copyright
 * $terms_of_use_5 = $fortnum_settings_options['terms_of_use_5']; // Terms of Use
 * $privacy_policy_6 = $fortnum_settings_options['privacy_policy_6']; // Privacy Policy * 
 * $blog_excerpt_10 = $fortnum_settings_options['blog_excerpt_10']; // Google Map
 * $Enquire_url = $fortnum_settings_options['Enquire_url']; // Enquire_url
 * $header_cta_5 = $fortnum_settings_options['header_cta_5']; // Enquire_url
 * $woo_featured_0 = $fortnum_settings_options['woo_featured_0']; // woo_featured_0
 *
 *
 * Display
 * $fortnum_settings_options_display = get_option( 'fortnum_settings_option_display' ); // Array of All Options
 * $opd_9 = $fortnum_settings_options_display['opd_9'];
 * $opd_sub_9 = $fortnum_settings_options_display['opd_sub_9'];
 * $products_9 = $fortnum_settings_options_display['products_9'];
 * $products_sub_9 = $fortnum_settings_options_display['products_9'];
 * $projects_9 = $fortnum_settings_options_display['projects_9'];
 * $projects_sub_9 = $fortnum_settings_options_display['projects_sub_9'];
 * $videos_9 = $fortnum_settings_options_display['videos_9'];
 * $videos_sub_9 = $fortnum_settings_options_display['videos_sub_9'];
 * $blog_9 = $fortnum_settings_options_display['blog_9'];
 * $blog_sub_9 = $fortnum_settings_options_display['blog_sub_9'];
 */


?>