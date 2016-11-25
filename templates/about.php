<?php 
/**
Template Name: About
 *
Custom homepage template for the theme

@since  v1.0.0
@package fortnum
 */


get_header(); 

echo get_template_part( 'blocks/block', 'page-header' );

$slug = 'blocks/block' ?>

<section class="section-fullwidth section-about section-main"">
	<div class="row">
		<div class="columns small-12 medium-12 large-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<div class="about-main">
						<div class="">

							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

							endwhile; // End of the loop.
							?>
							
						</div><!-- .about-list -->
					</div><!-- .about-main -->

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .columns medium-8 -->

		<div class="columns small-12 medium-4">
				<?php get_sidebar(); ?>
			</div><!-- .columns medium-4 -->

	</div><!-- .row -->
</section><!-- .section-fullwidth section-main -->

<section class="section-fullwidth section-addon1 section-main"">
	<div class="row">
		<div class="columns small-12 medium-12">
			<div class="addon-content content-1">

				<?php
				while ( have_posts() ) : the_post(); ?>

				<?php if( get_field('title_1') ): ?>
					<h3><?php the_field('title_1'); ?></h3>
				<?php endif; ?>

				<?php if( get_field('content_1') ): ?>
					<div class="entry-content">
						<?php the_field('content_1'); ?>
					</div><!-- .entry-content -->
				<?php endif; ?>

				<?php endwhile; // End of the loop.
				?>
			</div><!-- .addon-content content-1 -->
		</div>
	</div>
</section>

<section class="section-fullwidth section-about about--addon2">
	<div class="row align-right">
	<?php
			while ( have_posts() ) : the_post(); ?>

			<?php if( get_field('feature_image_2') ): ?>
				<?php $background = get_field('feature_image_2'); ?>
			<?php endif; ?>

			<style>
				.about--addon2 {
					background-image: url('<?php echo $background; ?>');
				}
			</style>

			<div class="columns medium-12 large-6">

			<?php if( get_field('title_2') ): ?>
				<h3><?php the_field('title_2'); ?></h3>
			<?php endif; ?>

			<?php if( get_field('content_2') ): ?>
				<div class="entry-content">
					<?php the_field('content_2'); ?>
				</div><!-- .entry-content -->
			<?php endif; ?>

			</div>

	<?php endwhile; // End of the loop. ?>
	</div><!-- .row -->
</section>

<?php echo get_template_part( $slug, 'join' ); ?>

<?php get_footer(); ?>