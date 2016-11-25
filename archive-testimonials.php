<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortnum
 */

get_header(); ?>

	<section class="section-fullwidth section-testimonials">
		<div class="section-content">
		<div class="row">
		
		<?php 

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'testimonials' ),
			'post_status'            => array( 'publsih' ),
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
									the_post_thumbnail( 'thummbnail');
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
			
		</div><!-- .row -->
	</div><!-- .section-content -->
	</section><!-- .section-fullwidth section-main -->

<?php get_footer(); ?>