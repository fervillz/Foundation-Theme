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

					<?php if (is_archive()): ?>
						Media
					<?php endif; ?>

					<?php if (is_404()): ?>
						Error 404
					<?php endif; ?>

					</h2><!-- .title -->
					
					<div class="subtitle">
						 
						

						<?php if (is_404()): ?>
							<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fortnum' ); ?>
						<?php else: ?>
							<?php the_breadcrumb(); ?>
						<?php endif; ?>
					</div><!-- .subtitle -->
					
				</div><!-- .entry-item -->

				<div class="entry-cta">
					<a href="<?php echo $header_cta_5; ?>	" target="_blank" class="button primary glass alt2">Contact Us Now</a>
				</div><!-- .entry-cta -->

			</div><!-- .page-header-content -->
				
			</div>
		</div><!-- .row -->		
</section><!-- .section-page-header -->	