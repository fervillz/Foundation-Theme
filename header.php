<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fortnum
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php 

//General Settings
$fortnum_settings_options = get_option( 'fortnum_settings_option_general' ); 
$Enquire_url = $fortnum_settings_options['Enquire_url']; // Enquire_url


//Contact
$fortnum_settings_options_contact = get_option( 'fortnum_settings_option_contact' ); 
$phone_8 = $fortnum_settings_options_contact['phone_8']; // Phone
$email_9 = $fortnum_settings_options_contact['email_9']; // Email

//Social *
$fortnum_settings_options_social = get_option( 'fortnum_settings_option_social' ); // Array of All Options
$facebook = $fortnum_settings_options_social['facebook_0']; // facebook
$twitter = $fortnum_settings_options_social['twitter_1']; // Twitter
$linkedin = $fortnum_settings_options_social['linkedin_2']; // Linkedin
$gplus = $fortnum_settings_options_social['gplus_3']; // gplus
$instagram = $fortnum_settings_options_social['instagram_3']; // Skype
$skype = $fortnum_settings_options_social['skype_3']; // Skype
$rss_feeds = $fortnum_settings_options_social['rss_feeds_4']; // RSS Feeds

  ?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fortnum' ); ?></a>

	<header id="masthead" class="site-header">
	<div class="top-header-wrapper">
		<div class="row">
			<div class="columns small-12">
				<div class="top-header">
					<div class="social">

						<?php if ( !empty($facebook)): ?>
							<a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
						<?php endif; ?>

						<?php if ( !empty($twitter)): ?>
							<a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
						<?php endif; ?>

						<?php if ( !empty($linkedin)): ?>
							<a href="<?php echo $linkedin; ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a>
						<?php endif; ?>

						<?php if ( !empty($gplus)): ?>
							<a href="<?php echo $gplus; ?>" target="_blank"><i class="fa fa-google-plus-square"></i></a>
						<?php endif; ?>

						<?php if ( !empty($instagram)): ?>
							<a href="<?php echo $instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
						<?php endif; ?>

						<?php if ( !empty($skype)): ?>
							<a href="<?php echo $skype; ?>" target="_blank"><i class="fa fa-skype"></i></a>
						<?php endif; ?>

						<?php if ( !empty($rss_feeds)): ?>
							<a href="<?php echo $rss_feeds; ?>" target="_blank"><i class="fa fa-rss"></i></a>
						<?php endif; ?>

					</div><!-- .social -->		
					<div class="contact">
						<span class="phone">
							<i class="fa fa-phone"></i> Call Us:  <?php echo $phone_8; ?>
						</span><!-- .phone -->

						<span class="email">
							<i class="fa fa-envelope-o"></i> Email:  <?php echo $email_9; ?>
						</span><!-- .phone -->

						<span class="search">
							<i class="fa fa-search"></i>
							<?php get_search_form(); ?>
						</span><!-- .search -->
					</div><!-- .contact -->		
				</div><!-- .top-header -->				
			</div>
		</div>
	</div>
	<div class="main-header">
		<div class="row">
			<div class="columns small-12">
				<div class="site-branding">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="" />
						</a>
					</h1>		
					<div class="header-enquire">
						<a href="<?php echo $Enquire_url; ?>" class="button gray glass big">
							<i class="fa fa-lock left"></i> ENQUIRE ABOUT JOINING FORTNUM
						</a>
					</div><!-- .header-enquire -->	
				</div><!-- .site-branding -->
			</div>
		</div>
	</div><!-- .main-header -->

	<nav id="site-navigation" class="main-navigation">
		<div class="row">
			<div class="columns small-12">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<i class="fa fa-reorder"></i>
				</button>
				<div class="menu-primary-container">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</div><!-- .menu-primary-container -->
			</div><!-- .columns small-12 -->	
		</div><!-- .row -->
	</nav><!-- #site-navigation -->
	</header><!-- #site-header -->

	<?php if ( is_home()) {
		echo do_shortcode('[rev_slider fortnum_slider]');
	} ?>

	<div id="content" class="site-content">