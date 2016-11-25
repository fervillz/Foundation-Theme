<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortnum
 */

get_header(); 

	$slug = 'blocks/block' ?>

	<?php echo get_template_part( $slug, 'welcome' ); ?>
	
	<?php echo get_template_part( $slug, 'services' ); ?>

	<?php echo get_template_part( $slug, 'team' ); ?>

	<?php  echo get_template_part( $slug, 'join' ); ?>

	<?php  echo get_template_part( $slug, 'testimonials' ); ?>

<?php
get_footer();