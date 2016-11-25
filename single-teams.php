<?php
/**
 * The template for displaying all single posts.
 *
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortnum
 */

get_header();

$slug = 'blocks/block' ?>

<?php 

$header_title = fortnum_page_header_get_meta( 'fortnum_page_header_title' );
$header_desc = fortnum_page_header_get_meta( 'fortnum_page_header_short_description' );
$header_bg = fortnum_page_header_get_meta( 'fortnum_page_header_bg' ); 

//General Settings
$fortnum_settings_options = get_option( 'fortnum_settings_option_general' ); // Array of All Options
$header_cta_5 = $fortnum_settings_options['header_cta_5']; // service_area_5

if ( empty( $header_bg )) {
	$header_bg = get_template_directory_uri().'/images/header-default.jpg';
}

?>

<section class="section-page-header <?php echo basename(get_permalink()); ?>" style="background-image: url('<?php echo $header_bg; ?> ')">
		<div class="row">
			<div class="columns small-12">
			<div class="page-header-content">
				<div class="entry-item">
					<h2 class="title">	
					<?php if ( is_page() || is_single() ): ?>
						<?php if ( !empty( $header_title ) ): ?>
							<?php echo $header_title; ?>							
						<?php else: ?>
							<?php the_title(); ?>
						<?php endif; ?>
					<?php endif; ?>

					</h2><!-- .title -->
					
					<div class="subtitle">
						<ul class="breadcrumbs">
							<li><a href="http://127.0.0.1/wordpress">Home</a></li>
							<li><a href="<?php echo site_url(); ?>/teams">OUR TEAM</a></li>
							<li><?php echo the_title(); ?> </li>
						</ul>
					</div>
					
				</div><!-- .entry-item -->

				<div class="entry-cta">
					<a href="<?php echo $header_cta_5; ?>	" target="_blank" class="button primary glass alt2">Contact Us Now</a>
				</div><!-- .entry-cta -->

			</div><!-- .page-header-content -->
				
			</div>
		</div><!-- .row -->		
</section><!-- .section-page-header -->	

	<section class="section-fullwidth section-main section-single-team">
		
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'team' );

											

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .columns medium-8 -->		

	<?php  echo get_template_part( $slug, 'join' ); ?>

	<?php  echo get_template_part( $slug, 'testimonials' ); ?>

<?php get_footer(); ?>