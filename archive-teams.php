<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortnum
 */

get_header(); ?>

<section class="section-page-header <?php echo basename(get_permalink()); ?>" style="background-image: url('<?php echo $header_bg; ?> ')">
		<div class="row">
			<div class="columns small-12">
			<div class="page-header-content">
				<div class="entry-item">
					<h2 class="title">	
						Meet Our Team
					</h2><!-- .title -->
					
					<div class="subtitle">
						<ul class="breadcrumbs">
							<li><a href="<?php echo site_url(); ?>">Home</a></li>
							<li><a href="<?php echo site_url(); ?>/about-us">About us</a></li>
							<li>Our Team</li>
						</ul>
					</div><!-- .subtitle -->
					
				</div><!-- .entry-item -->

				<div class="entry-cta">
					<a href="<?php echo $header_cta_5; ?>	" target="_blank" class="button primary glass alt2">Contact Us Now</a>
				</div><!-- .entry-cta -->

			</div><!-- .page-header-content -->
				
			</div>
		</div><!-- .row -->		
</section><!-- .section-page-header -->	

<section class="section-fullwidth section-teams">
<div class="section-content">
		<div class="row">
		
		<?php 

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'teams' ),
			'post_status'            => array( 'publsih' ),
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

				<div class="columns small-12 medium-4 large-3">
					<div class="team-wrapper">

						<div class="thumbnail">
							 <a href="<?php the_permalink(); ?>">
								 <?php if (has_post_thumbnail()) {
										the_post_thumbnail( 'medium');
									} ?>	
							 </a>						
						</div><!-- .thumbnail -->

						<header class="team-header">
							<h3 class="title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>	
							</h3><!-- .title -->

							<?php if (!empty($occupation)): ?>
							<div class="position">
								<?php echo $occupation; ?>
							</div><!-- .position -->
							<?php endif; ?>
						</header><!-- .team-header -->

						<div class="content">
							<?php if (has_excerpt()): ?>
								<?php remove_filter ('the_excerpt', 'wpautop'); ?>
								<p><?php the_excerpt(); ?></p>

							<?php else: ?>
								<?php echo wp_trim_words( get_the_content( 'null', 15 ) ); ?>
							<?php endif; ?>

							<?php if (!empty($social_linkedin)): ?>
							<div class="social">
							<i class="fa-social fa fa-linkedin-square"></i> Connect with 	
							<a href="<?php echo $social_linkedin; ?>" target="_blank"><?php $value = get_the_title(); echo strtok($value, " "); ?></a> on Linkedin	
							</div><!-- .social -->
							<?php endif; ?>


							<?php if (!empty($email)): ?>
							<div class="email">
								<i class="fa fa-envelope-o margin-right">
								<a href="mailto:<?php echo $email; ?>"></i><?php echo $email; ?></a>
							</div><!-- .email -->							
							<?php endif; ?>
						</div><!-- .content -->

					</div><!-- .team-wrapper -->
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