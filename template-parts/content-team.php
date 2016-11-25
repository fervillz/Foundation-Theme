<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortnum
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

<div class="row">
	<div class="columns small-12 medium-4">
		<div class="thumbnail">
			<?php if ( has_post_thumbnail()) {
				the_post_thumbnail( 'media_thumbnail' );
		} ?>
		</div><!-- .thumbnail -->		

		<div class="addon-info">
		<?php 

		$occupation = occupation_get_meta( 'occupation_occupation' );
				$social_linkedin = social_links_get_meta( 'social_links_linkedin' );
				$phone = profiles_cta_get_meta( 'profiles_cta_text' );
				$email = profiles_cta_get_meta( 'profiles_cta_url' );

				 ?>
			<?php if (!empty($social_linkedin)): ?>
			<div class="social">
			<i class="fa-social fa fa-linkedin-square"></i> Connect with 	
			<a href="<?php echo $social_linkedin; ?>" target="_blank"><?php $value = get_the_title(); echo strtok($value, " "); ?></a> on Linkedin	
			</div><!-- .social -->
			<?php endif; ?>

			<?php if (!empty($phone)): ?>
			<div class="phone">
				<i class="fa fa-phone margin-right"></i>	
				<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
			</div><!-- .phone -->
			<?php endif; ?>


			<?php if (!empty($email)): ?>
			<div class="email">
				<i class="fa fa-envelope-o margin-right">
				<a href="mailto:<?php echo $email; ?>"></i><?php echo $email; ?></a>
			</div><!-- .email -->							
			<?php endif; ?>
		</div><!-- .addon-info -->
	</div>

	<div class="columns small-12 medium-8">
		<header class="entry-header">
		<h2 class="member-name">
			<?php the_title(); ?>
		</h2><!-- .member-name -->

		<div class="founder"> <?php echo occupation_get_meta( 'occupation_occupation' ); ?></div><!-- .founder -->	

	</header><!-- .entry-header -->

	<div class="member-bio">
		<?php the_content(); ?>
	</div><!-- .member-bio -->
	</div>

	</div><!-- .row -->

</article><!-- #post-## -->