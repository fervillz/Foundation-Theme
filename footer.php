<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fortnum
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
		<div class="footer-main">
		 	<div class="row">
		 		<?php get_sidebar('footer'); ?>
		 	</div><!-- .row -->
		 	<div class="row">
		 		<div class="columns small-12">
		 		<div class="disclosure">
		 			<p><strong>ASFL DISCLOSURE:</strong> This website has been prepared by Fortnum Financial Group Limited ABN 75 139 889 688 and Fortnum Private Wealth Pty Ltd ABN 54 139 889 535 AFSL 357306 trading as Fortnum Financial Advisers (collectively Fortnum).</p>
		 		</div><!-- .disclosure -->
		 		</div>		 		
		 	</div><!-- .row -->
		</div><!-- .footer-main -->

		<div class="bottom-wrapper">
			<div class="row">
				<div class="columns small-12">
					<div class="bottom">
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png" alt="" />
							</a>
						</div><!-- .logo -->

						<nav class="footer-navigation">
							<div class="menu-primary-container">
								<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
							</div><!-- .menu-primary-container -->
						</nav><!-- #site-navigation -->
					</div><!-- .bottom -->					
				</div>
			</div>
		</div><!-- .bottom -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>