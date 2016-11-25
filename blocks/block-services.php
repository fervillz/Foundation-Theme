<section class="section-fullwidth section-service">

<div class="service-wrapper">
	<div class="service-left">
		<div class="big-logo">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-big.png" alt="" />
		</div><!-- .big-logo -->
	</div><!-- .service-left -->

	<div class="service-right">
		<header class="section-header alt-left all-white">
			<h4 class="sub-title">
				What we do
			</h4><!-- .suv-title -->
			<h2 class="title">
				Fortnum Core Services 
			</h2><!-- .title -->
			<div class="separator"></div><!-- .separator -->
			<div class="addon-text">
			<?php

				$args = array (
					'post_type' => 'fortnum_services',          // name of post type.
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'service_type',   // taxonomy name
				            'field' => 'slug',           // term_id, slug or name
				            'terms' => 'core',                  // term id, term slug or term name
				        )
				    )
				);
				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						// do something
						?>

						<?php the_excerpt(); ?>

					<?php }
				} 

				// Restore original Post Data
				wp_reset_postdata();

				?>
			</div><!-- .addon-text -->
		</header><!-- .section-header -->

		<div class="service-lists">
			<?php

				$args = array (
					'post_type' => 'fortnum_services',          // name of post type.
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'service_type',   // taxonomy name
				            'field' => 'slug',           // term_id, slug or name
				            'terms' => 'core',                  // term id, term slug or term name
				        )
				    )
				);
				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						// do something
						?>

						<?php the_content(); ?>

					<?php }
				} 

				// Restore original Post Data
				wp_reset_postdata();

				?>

			<div class="service-button">
				<a href="#" class="button primary white">Discover More Services <i class="fa fa-long-arrow-right right"></i></a>
			</div><!-- .service-button -->
		</div><!-- .service-lists -->
	</div><!-- .service-right -->
</div><!-- .service-wrapper -->
</section><!-- .sectiom-fullwidth section-services -->