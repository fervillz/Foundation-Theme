<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fortnum
 */


if ( is_active_sidebar( 'footer-1' ) ): ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- #secondary -->
	</div>	
<?php else: ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<a href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" target="_blank">Add Widgets Here</a>
		</div><!-- #secondary -->
	</div>		
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-2' ) ): ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- #secondary -->
	</div>	
<?php else: ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<a href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" target="_blank">Add Widgets Here</a>
		</div><!-- #secondary -->
	</div>		
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-3' ) ): ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div><!-- #secondary -->
	</div>	
<?php else: ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<a href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" target="_blank">Add Widgets Here</a>
		</div><!-- #secondary -->
	</div>		
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-4' ) ): ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div><!-- #secondary -->
	</div>	
<?php else: ?>
	<div class="columns small-12 medium-6 large-3">
		<div class="widget-area" role="complementary">
			<a href="<?php echo get_site_url(); ?>/wp-admin/widgets.php" target="_blank">Add Widgets Here</a>
		</div><!-- #secondary -->
	</div>		
<?php endif; ?>