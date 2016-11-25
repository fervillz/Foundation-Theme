<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortnum
 */

$default_thumbnail = get_template_directory_uri().'/assets/images/default-thumbnail.jpg';

$custom_url = custom_url_get_meta( 'custom_url_custom_url' );
$custom_url_value = 0;

if ( empty($custom_url )) {
	$custom_url = get_permalink();
	$custom_url_value = 1;
} 

// Get current page URL 
$FortnumSocialShareURL = urlencode(get_permalink());

// Get current page title
$FortnumSocialShareTitle = str_replace( ' ', '%20', get_the_title());

// Get Post Thumbnail for pinterest
$FortnumSocialShareThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );


// Construct sharing URL without using any script
$twitterURL = 'https://twitter.com/intent/tweet?text='.$FortnumSocialShareTitle.'&amp;url='.$FortnumSocialShareURL.'&amp;via=FortnumSocialShare';
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$FortnumSocialShareURL;
$googleURL = 'https://plus.google.com/share?url='.$FortnumSocialShareURL;
$bufferURL = 'https://bufferapp.com/add?url='.$FortnumSocialShareURL.'&amp;text='.$FortnumSocialShareTitle;
$whatsappURL = 'whatsapp://send?text='.$FortnumSocialShareTitle . ' ' . $FortnumSocialShareURL;
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$FortnumSocialShareURL.'&amp;title='.$FortnumSocialShareTitle;

// Based on popular demand added Pinterest too
$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$FortnumSocialShareURL.'&amp;media='.$FortnumSocialShareThumbnail[0].'&amp;description='.$FortnumSocialShareTitle;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<div class="entry-thumbnail">

			<?php if ( has_post_thumbnail()) {
				the_post_thumbnail( 'media_thumbnail' );
			} 

			else { ?>
				<img src="<?php echo $default_thumbnail; ?>" alt="" />
			<?php } ?>

		</div><!-- .entry-thumbnail -->
		<div class="entry-meta">
			<?php fortnum_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_search()) {
				the_excerpt();
			}

			else {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fortnum' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			}
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fortnum' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->	

	<footer class="entry-footer">
		<div class="read-more">

			<a href="<?php echo $custom_url ; ?>" class="view-article" <?php if ( $custom_url_value == 0 ) { echo "target='_blank'"; } ?>>View article <sup><i class="fa fa-external-link"></i></sup> </a>
		</div><!-- .read-more -->

		<div class="share-article">

			<span class="share-label">share </span>			

			<span class="fb share-item">
				<a href="<?php echo $facebookURL; ?>" target="_blank" alt="Share on Facebook" <?php if ( $custom_url_value == 0 ) { echo "target='_blank'"; } ?>><i class="fa fa-facebook"></i></a>
			</span>

			<span class="fb share-item">
				<a href="<?php echo $twitterURL; ?>" target="_blank" alt="Share on Twitter" <?php if ( $custom_url_value == 0 ) { echo "target='_blank'"; } ?>><i class="fa fa-twitter"></i></a>
			</span>

			<span class="fb share-item">
				<a href="<?php echo $googleURL; ?>" target="_blank" alt="Share on Google Plus"><i class="fa fa-google-plus"></i></a>
			</span>
			
		</div><!-- .share-article -->
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->