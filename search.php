<?php
/**
 * The template for displaying search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortnum
 */

get_header(); 

echo get_template_part( 'blocks/block', 'page-header' );

$slug = 'blocks/block' ?>

	<section class="section-fullwidth section-main">
		<div class="row">
			<div class="columns small-12 medium-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					if ( have_posts() ) : ?>
					
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'archive' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .columns medium-8 -->
			<div class="columns small-12 medium-4">
				<?php get_sidebar(); ?>
			</div><!-- .columns medium-4 -->
		</div><!-- .row -->
	</section><!-- .section-fullwidth section-main -->

<?php echo get_template_part( $slug, 'join-alt' ); ?>

<?php get_footer(); ?>