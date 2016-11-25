<section class="section-fullwidth section-team">
	<div class="row">
		<div class="columns small-12">
			<header class="section-header">
				<h4 class="sub-title">
					The advisers
				</h4><!-- .suv-title -->
				<h2 class="title">
					The Team Behind Fortnum
				</h2><!-- .title -->
				<div class="separator"></div><!-- .separator -->
			</header><!-- .section-header -->
		</div>
	</div><!-- .row -->



	<div class="section-content">
		<div class="row">
		<div class="owl-carousel-team owl-theme">
		<?php 

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'teams' ),
			'post_status'            => array( 'publish' ),
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$occupation = occupation_get_meta( 'occupation_occupation' );
				$social_linkedin = social_links_get_meta( 'social_links_linkedin' );
				$phone = profiles_cta_get_meta( 'profiles_cta_text' );
				$email = profiles_cta_get_meta( 'profiles_cta_url' );

	 			?> 

				<div class="columns small-12">
					<div class="team-wrapper">
						 
						<div class="thumbnail">

							<a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {
								the_post_thumbnail( 'medium');
							} ?></a>			

							<div class="contact-details">
								<div class="details">
									<?php if (!empty($social_linkedin)): ?>
									<a href="<?php echo $social_linkedin; ?>" target="_blank"><i class="fa-social fa fa-linkedin-square"></i></a>
									<?php endif; ?>

									<?php if (!empty($phone)): ?>
									<a href="tel:<?php echo $phone; ?>"><i class="fa fa-phone margin-right"></i><?php echo $phone; ?></a>
									<?php endif; ?>


									<?php if (!empty($email)): ?>
									<a href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope-o margin-right"></i><?php echo $email; ?></a>
									<?php endif; ?>

								</div><!-- .details -->
							</div><!-- .contact-details -->
						</div><!-- .thumbnail -->

						<h3 class="title">
							
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>			

						</h3><!-- .title -->

						<?php if (!empty($occupation)): ?>
						<div class="position">
							<?php echo $occupation; ?>
						</div><!-- .position -->
						<?php endif; ?>

					</div><!-- .team-wrapper -->
				</div>

				<?php				
			}
		}

		// Restore original Post Data
		wp_reset_postdata();

		 ?>	
		</div>	
		</div><!-- .row -->	
	</div><!-- .section-content -->
</section><!-- .sectiom-fullwidth section-teams -->