<section class="section-fullwidth section-testimonials">
	<div class="row">
		<div class="columns small-12">
			<header class="section-header">
				<h4 class="sub-title">
					testimonials
				</h4><!-- .suv-title -->
				<h2 class="title">
					Adviser Testimonials
				</h2><!-- .title -->
				<div class="separator"></div><!-- .separator -->
			</header><!-- .section-header -->
		</div>
	</div><!-- .row -->

	<div class="section-content">
		<div class="row">
		<div class="owl-carousel-testimonials owl-theme">
		<?php 

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'testimonials' ),
			'post_status'            => array( 'publish' ),
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$name = name_location_get_meta( 'name_location_name' );
				$occupation = name_location_get_meta( 'name_location_location' );
				$rating =  name_location_get_meta( 'rating_description' );

		 ?> 

				<div class="columns small-12">
					<div class="testimonial-wrapper">
						<div class="content">
							<?php the_content(); ?>
						</div><!-- .content -->
						<div class="author">
							<div class="thumbnail">
								<?php if (has_post_thumbnail()) {
									the_post_thumbnail( 'thumbnail');
								} ?>
							</div><!-- .thumbnail -->
							<div class="author-bio">
								<?php if (!empty($name)): ?>
								<span class="name">
									<?php echo $name;?>
								</span><!-- .name -->
								<?php endif; ?>

								<?php if (!empty($occupation)): ?>
								<span class="span separator">/</span><!-- .span separator -->
								<span class="occupation"><?php echo $occupation;?></span>
								<?php endif; ?>
								<div class="rating">
									<?php for ($i=0; $i < $rating ; $i++) : ?>
										<i class="fa fa-star"></i>
									<?php endfor; ?>
								</div><!-- .rating -->
							</div><!-- .author-bio -->
						</div><!-- .author -->
					</div><!-- .testimonial-wrapper -->
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

	<div class="row">
		<div class="columns small-12">
			<header class="section-footer">
				<a href="<?php echo site_url(); ?>/testimonials" class="button primary ">read more testimonails <i class="fa fa-angle-right right"></i></a>
			</header><!-- .section-header -->
		</div>
	</div><!-- .row -->
	
</section><!-- .sectiom-fullwidth section-testimonials -->