<?php
/**
 * fortnum functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fortnum
 */


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * option-settings
 */
require get_template_directory() . '/inc/option-settings.php';

/**
 * Load testimonials file.
 */
require get_template_directory() . '/custom_posts/testimonials.php';

/**
 * Load team-profiles file.
 */
require get_template_directory() . '/custom_posts/team-profiles.php';

/**
 * Load services file.
 */
require get_template_directory() . '/custom_posts/services.php';

/**
 * Load welcome file.
 */
require get_template_directory() . '/custom_posts/welcome.php';

/**
 * Page header
 */
require get_template_directory() . '/metaboxes/metabox-page-header.php';

/**
 * Post URL
 */
require get_template_directory() . '/metaboxes/metabox-post-url.php';

/* WIDGETS */

/**
 * Widget - About
 */
require get_template_directory() . '/widgets/widget-about.php';

/**
 * Widget - Contact
 */
require get_template_directory() . '/widgets/widget-contact.php';

/**
 * Widget - Get in Touch
 */
require get_template_directory() . '/widgets/widget-get-in-touch.php';

/* WIDGETS END */

if ( ! function_exists( 'fortnum_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fortnum_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fortnum, use a find and replace
	 * to change 'fortnum' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fortnum', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fortnum' ),
		'footer' => esc_html__( 'Footer', 'fortnum' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fortnum_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_image_size( 'media_thumbnail', 769, 456, true );
	add_image_size('slider_thumbnail', 370, 256, true);
}
endif;
add_action( 'after_setup_theme', 'fortnum_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fortnum_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fortnum_content_width', 640 );
}
add_action( 'after_setup_theme', 'fortnum_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fortnum_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fortnum' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'fortnum' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'fortnum' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'fortnum' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'fortnum' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fortnum_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fortnum_scripts() {

	//font
	wp_enqueue_style( 'questrial-font', 'https://fonts.googleapis.com/css?family=Montserrat|Questrial' );


	// Enqueue the only styling file here that is build with Gulp
	wp_enqueue_style( 'fortnum-style', get_template_directory_uri() . '/assets/css/master.css', null, '1.3.4' );

	// And the only JS file that is build with Gulp
	wp_enqueue_script( 'fortnum-scripts', get_template_directory_uri() . '/assets/scripts/bundle.js', array( "jquery" ), '20151217', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fortnum_scripts' );


/**
 * Add style to backend
 */
/**
 * Add style to backend
 */
function fortnum_admin_enqueue($hook) {
	wp_enqueue_style( 'wpadmin', get_template_directory_uri() . '/assets/css/wpadmin.css' );

	//media upload
	wp_enqueue_script( 'fortnum-upload', get_template_directory_uri() . '/assets/scripts/media-upload.js', array('jquery'), '1.0.0', true );

	//scripts
	wp_enqueue_script( 'fortnum-scripts', get_template_directory_uri() . '/assets/scripts/scripts-backend.js', array('jquery'), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'fortnum_admin_enqueue' );


/**
 * Remove the margin-top styling added to the HTML tag by default from WordPress
 */
function fortnum_remove_html_margin() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'fortnum_remove_html_margin' );

function the_breadcrumb() {
		echo '<ul class="breadcrumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}

// Add info Shortcode
function info_shortcode( $atts , $content = null ) {
	$content = '<div class="box-info">'.$content.'</div>';
	
	return $content;
}
add_shortcode( 'info', 'info_shortcode' );