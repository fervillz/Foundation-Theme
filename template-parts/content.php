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
	<header class="entry-header">
		<div class="entry-thumbnail">

			<?php if ( has_post_thumbnail()) {
				the_post_thumbnail( 'media_thumbnail' );
			} ?>

		</div><!-- .entry-thumbnail -->
		<div class="entry-meta">
			<?php fortnum_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fortnum' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fortnum' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fortnum_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->