<?php
/**
 * The block for displaying map.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Forttnum
 */

$fortnum_settings_options_contact = get_option( 'fortnum_settings_option_contact' ); // Array of All Options
$gmap_altitude = $fortnum_settings_options_contact['gmap_altitude_8']; // Phone
$gmap_longitude = $fortnum_settings_options_contact['gmap_longitude_8']; // Phone

?>

<div class="block block-gmap">

	<div id="map" class="map"></div>

	<!-- Customize script for graycale google map and custom marer -->
	 <script>

	 screenWidth = window.screen.availWidth;
			
			function initMap() {
				var image = '<?php echo get_template_directory_uri(); ?>/assets/images/map-marker.png';

				var mapDiv = document.getElementById('map');

				var myLatLng = {lat: <?php echo $gmap_altitude; ?>, lng: <?php echo $gmap_longitude; ?>};

				if ( screenWidth > 768 ) {					
					var myLatLngCenter = {lat: <?php echo $gmap_altitude; ?>, lng: <?php echo $gmap_longitude; ?>};
				}
				else {
					var myLatLngCenter = myLatLng;
				}

				

				var styles = [
						{
							"featureType": "water",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#e9e9e9"
								},
								{
									"lightness": 17
								}
							]
						},
						{
							"featureType": "landscape",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#f5f5f5"
								},
								{
									"lightness": 20
								}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "geometry.fill",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 17
								}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "geometry.stroke",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 29
								},
								{
									"weight": 0.2
								}
							]
						},
						{
							"featureType": "road.arterial",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 18
								}
							]
						},
						{
							"featureType": "road.local",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 16
								}
							]
						},
						{
							"featureType": "poi",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#f5f5f5"
								},
								{
									"lightness": 21
								}
							]
						},
						{
							"featureType": "poi.park",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#dedede"
								},
								{
									"lightness": 21
								}
							]
						},
						{
							"elementType": "labels.text.stroke",
							"stylers": [
								{
									"visibility": "on"
								},
								{
									"color": "#ffffff"
								},
								{
									"lightness": 16
								}
							]
						},
						{
							"elementType": "labels.text.fill",
							"stylers": [
								{
									"saturation": 36
								},
								{
									"color": "#333333"
								},
								{
									"lightness": 40
								}
							]
						},
						{
							"elementType": "labels.icon",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "transit",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#f2f2f2"
								},
								{
									"lightness": 19
								}
							]
						},
						{
							"featureType": "administrative",
							"elementType": "geometry.fill",
							"stylers": [
								{
									"color": "#fefefe"
								},
								{
									"lightness": 20
								}
							]
						},
						{
							"featureType": "administrative",
							"elementType": "geometry.stroke",
							"stylers": [
								{
									"color": "#fefefe"
								},
								{
									"lightness": 17
								},
								{
									"weight": 1.2
								}
							]
						}
					]

				var map = new google.maps.Map(mapDiv, {
					center: myLatLngCenter,
					zoom:15,
					scrollwheel: false,
					styles: styles,
					draggable: !("ontouchend" in document)
				});

				var marker = new google.maps.Marker({
					position: myLatLng,
					animation: google.maps.Animation.DROP,
					map: map,
					title: '45 Clarence Street',
					icon: image,
					
				});

				marker.addListener('click', toggleBounce);

				function toggleBounce() {
					if (marker.getAnimation() !== null) {
					  marker.setAnimation(null);
					} else {
					  marker.setAnimation(google.maps.Animation.BOUNCE);
					}
				  }

			}
	</script>

	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaYbjbhs2b3GBQx1Y_DM0hHlPNjlDREVM&callback=initMap">
	</script>
</div><!-- .block block-gmap -->