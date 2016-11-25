<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fortnum
 */

get_header();

echo get_template_part( 'blocks/block', 'page-header' );

$slug = 'blocks/block' ?> 

	<section class="section-fullwidth section-main">
		<div class="row">
			<div class="columns small-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<div class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fortnum' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fortnum' ); ?></p>

								<?php
								get_search_form();

								?>

							</div><!-- .page-content -->
						</div><!-- .error-404 -->

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .columns small-12 -->
		</div><!-- .row -->
	</section><!-- .section-fullwidth section-main -->

	<?php  echo get_template_part( $slug, 'join' ); ?>

	<?php  echo get_template_part( $slug, 'testimonials' ); ?>

<?php get_footer(); ?>