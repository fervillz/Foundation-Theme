<?php 
/**
Template Name: Contact
 *
Custom homepage template for the theme

@since  v1.0.0
@package fortnum
 */


get_header(); 

echo get_template_part( 'blocks/block', 'page-header' );

$slug = 'blocks/block' ?>

<?php echo get_template_part( $slug, 'gmap' ); 

//Contact
$fortnum_settings_options_contact = get_option( 'fortnum_settings_option_contact' ); // Array of All Options
$head_office_7 = $fortnum_settings_options_contact['head_office_7']; // head_office
$Address_7 = $fortnum_settings_options_contact['Address_7']; // head_office
$phone_8 = $fortnum_settings_options_contact['phone_8']; // Phone
$email_9 = $fortnum_settings_options_contact['email_9']; // Email
$fax_call_8 = $fortnum_settings_options_contact['fax_call_8']; // Phone

 ?>

<section class="section-fullwidth section-contact">
	<div class="row">
		<div class="columns medium-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>

					<!-- Dynamic Content -->
					<div class="head-office-wrapper">
						<h5>Head Office</h5>
						<p><?php echo $head_office_7; ?> </p>
					</div><!-- .head-office-wrapper -->

					<div class="primary-details">
						<div class="contact-item contact-address">
							<i class="fa fa-map-marker"></i>
							<?php echo preg_replace( '/\n/', '<br />', $Address_7 ); ?>
						</div><!-- .contact-item contact-address -->

						<div class="contact-item contact-infos">
							
							<div class="c-item email">
								<i class="fa fa-envelope"></i><?php echo $email_9; ?>
							</div><!-- .email -->
							<div class="c-item phone">
								<i class="fa fa-phone"></i><?php echo $phone_8; ?>
							</div><!-- .email -->
							<div class="c-item email">
								<i class="fa fa-fax"></i><?php echo $fax_call_8; ?>
							</div><!-- .email -->
						</div><!-- .contact-item contact-address -->
					</div><!-- .primary-details -->

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .columns medium-8 -->
	</div><!-- .row -->
</section><!-- .section-fullwidth section-main -->

<section class="section-fullwidth section-contact-form">
	<div class="row">
		<div class="columns medium-12">
			<div class="contact-wrapper">
				<div class="form">
					<?php echo do_shortcode('[contact-form-7 id="1436" title="fornum-contact-main"]' ); ?>
				</div><!-- .form -->
				<div class="team-bg">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-team.jpg" alt="" />
				</div><!-- .team-bg -->
			</div><!-- .form-wrapper -->
		</div>
	</div><!-- .row -->	
</section><!-- .section-fullwidth section-contact-form -->

<?php echo get_template_part( $slug, 'join-alt' ); ?>

<?php get_footer(); ?>