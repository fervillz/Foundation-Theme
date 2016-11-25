<section class="section-fullwidth section-welcome welcome-main">
	<div class="row">
		<div class="columns small-12">
			<header class="section-header alt-left">
				<h4 class="sub-title">
					Who is Fortnum?
				</h4><!-- .suv-title -->
				<h2 class="title">
					<sup class="sup-important" style="color: red;">*</sup>Fortnum Financial Advisers 
				</h2><!-- .title -->
				<div class="separator"></div><!-- .separator -->
			</header><!-- .section-header -->
		</div>
	</div><!-- .row -->

	<div class="section-content">
		<div class="row">

		<?php 

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'fortnum_welcome' ),
			'post_status'            => array( 'publish' ),
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$cta_text = welcome_cta_get_meta( 'welcome_cta_text' );
				$cta_url =  welcome_cta_get_meta( 'welcome_cta_url' ); 
				$featured =  feature_article_get_meta( 'feature_article_feature_this_article' );


				?>
				
				<?php if ( $featured == "not-featured" ) : ?>

				<div class="columns small-12 medium-6">			 
					<div class="content-left">
						<?php 
							if ( has_excerpt( )) {
								the_excerpt();
							}

							else {
								the_content();
							} ?>

						<div class="welcome-main-button">
							<?php if ( !empty($cta_text) ) : ?>
								<a href="<?php echo $cta_url ?>" class="button primary glass alt">
									<?php echo $cta_text ?><i class="fa fa-long-arrow-right right"></i>
								</a>
							<?php endif; ?>
						</div><!-- .welcome-main-button -->

						<div class="addon-info">Explore <a href="http://awards.fortnum.com.au/" target="_blank">www.awards.fortnum.com.au</a></div><!-- .addon-info -->
					</div><!-- .content-left -->
				</div>


				<?php endif; ?>

			<?php }
		}

		// Restore original Post Data
		wp_reset_postdata();

		?>	
		
		<div class="columns small-12 medium-6 medium-centered">	
			<section class="section-welcome welcome-featured alt-left">
	

		<?php 

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'fortnum_welcome' ),
			'post_status'            => array( 'publish' ),
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$cta_text = welcome_cta_get_meta( 'welcome_cta_text' );
				$cta_url =  welcome_cta_get_meta( 'welcome_cta_url' ); 
				$featured =  feature_article_get_meta( 'feature_article_feature_this_article' );
				?>

				<?php if ( $featured == "feature-this-article" ) : ?>

				
				<?php if (has_post_thumbnail()) {
					the_post_thumbnail();
				} ?>
								
				<header class="section-header alt-left all-white">
					<h2 class="sub-title">
						<i class="fa fa-edit"></i> <?php the_title(); ?>
					</h2><!-- .title -->

					<h4 class="title">
						
						<?php the_content(); ?>
					</h4><!-- .suv-title -->					
					
					<?php if ( !empty($cta_text) ) : ?>
						<a href="<?php echo $cta_url ?>" class="welcome-feature-button button primary glass">
							<i class="fa fa-unlock-alt left"></i><?php echo $cta_text ?>
						</a>
					<?php endif; ?>
				</header><!-- .section-header -->

				<?php endif; ?>

			<?php }
		}

		// Restore original Post Data
		wp_reset_postdata();

		?>	

	
</section><!-- .sectiom-fullwidth section-welcomes -->
		</div>

		</div>		
	</div><!-- .section-content -->
</section><!-- .sectiom-fullwidth section-welcomes -->