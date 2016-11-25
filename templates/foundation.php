<?php 
/**
Template Name: Foundation
 *
Custom homepage template for the theme

@since  v1.0.0
@package fortnum
 */


get_header(); 

echo get_template_part( 'blocks/block', 'page-header' );

$slug = 'blocks/block' ?>

<section class="section-fullwidth section-contact">
	<div class="row">
		<div class="columns small-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>					

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .columns medium-8 -->
	</div><!-- .row -->
</section><!-- .section-fullwidth section-main -->

<section class="section-fullwidth section-charity section-carousel carousel-gray">

	<div class="row">
		<div class="columns small-12">
			<header>
				<h3 class="title">
					<?php if( get_field('section_title_1') ): ?>
						<?php the_field('section_title_1'); ?>
					<?php endif; ?></h3><!-- .title -->
				<p class="desc">
					<?php if( get_field('section_subtitle_2') ): ?>
						<?php the_field('section_subtitle_2'); ?>
					<?php endif; ?></h3><!-- .title -->
				</p><!-- .desc -->
			</header>
		</div>
	</div>

	<div class="row">
		<div class="owl-carousel-charity-1 owl-theme">

			<?php if( have_rows('slider_wrapper_1') ): ?>
				
				<?php while( have_rows('slider_wrapper_1') ): the_row();

					// vars					 
					$attachment_id = get_sub_field('feature_image');
					$size = "slider_thumbnail"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					$slider_title = get_sub_field('slider_title');
					$slider_link_text = get_sub_field('slider_link_text');
					$slider_link_url = get_sub_field('slider_link_url');
					$slider_content = get_sub_field('slider_content');
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
					?>
					<div class="columns small-12">
						<div class="carousel-slider-wrapper">
						<div class="thumbnail">
							<img class="slider-class" alt="" src="<?php echo $image[0]; ?>" />
						</div><!-- .thumbnail -->
						</div>	

						<div class="content-wrapper">
							<h6 class="title">
								<?php if( $slider_title ): ?>
									<?php echo $slider_title; ?>
								<?php endif; ?>
							</h6><!-- .title -->

							<div class="slider-link">
								<i class="fa fa-globe"></i>
									<a href="
									<?php if( $slider_link_url ): ?>
										<?php echo $slider_link_url; ?>
									<?php endif; ?>" target="_blank">
									<?php if( $slider_link_text ): ?>
										<?php echo $slider_link_text; ?>
									<?php endif; ?>										
									</a>
							</div><!-- .slider-link -->

							<div class="content">
								<?php if( $slider_content ): ?>
									<?php echo $slider_content; ?>
								<?php endif; ?>
							</div><!-- .content -->
						</div><!-- .content -->
					</div>
				<?php endwhile; ?>
					
			<?php endif; ?>

		
	 
		</div>
	</div>
</section><!-- .charity-slider -->

<section class="section-fullwidth section-charity section-carousel">
	<div class="row">
		<div class="owl-carousel-charity-1 owl-theme">
		
					

			<?php if( have_rows('slider_wrapper_2') ): ?>
				
				<?php while( have_rows('slider_wrapper_2') ): the_row();

					// vars					 
					$attachment_id = get_sub_field('feature_image');
					$size = "slider_thumbnail"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
					?>
					<div class="columns small-12">
						<div class="thumbnail">
						<img class="slider-class" alt="" src="<?php echo $image[0]; ?>" />
						</div><!-- .thumbnail -->
				</div>
				<?php endwhile; ?>
					
			<?php endif; ?>

				
		</div>
	</div>
</section>

<section class="section-fullwidth section-bottom-content">
	<div class="row">
		<div class="columns small-12 medium-12 large-4">
			<?php if( have_rows('bottom_content') ): ?>
				
				<?php while( have_rows('bottom_content') ): the_row();

					// vars
					$content_type = get_sub_field('content_select');
					$widget_background_color = get_sub_field('widget_background_color');
					$widget_background_image = get_sub_field('widget_background_image');
					$widget_type = get_sub_field('widget_type');
					$content = get_sub_field('content');
					

					if ( $content_type == 'widget') : ?>

					<div class="special_widget_wrapper <?php echo $widget_type; ?>" style="background-color: <?php echo $widget_background_color; ?>; background-image: url(<?php echo $widget_background_image; ?>); background-position: center; background-repeat: no-repeat;">

						<?php echo $content; ?>

					</div><!-- .special_widget -->

					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="columns small-12 medium-12 large-8">

			<?php if( have_rows('bottom_content') ): ?>
				
				<?php while( have_rows('bottom_content') ): the_row();

					// vars
					$content_type = get_sub_field('content_select');
					$content = get_sub_field('content');
					

					if ( $content_type == 'normal') : ?>

					<div class="special_content-wrapper">

						<?php echo $content; ?>

					</div><!-- .special_widget -->

					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php  echo get_template_part( $slug, 'join' ); ?>

<?php  echo get_template_part( $slug, 'testimonials' ); ?>

<?php get_footer(); ?>