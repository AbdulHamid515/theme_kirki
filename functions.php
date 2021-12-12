<?php
/**
 * kirki-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kirki-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'kirki_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kirki_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on kirki-theme, use a find and replace
		 * to change 'kirki-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kirki-theme', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu' => esc_html__( 'Primary', 'kirki-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'kirki_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'kirki_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kirki_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kirki_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'kirki_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kirki_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kirki-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kirki-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kirki_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 //<script src="assets/js/jquery-min.js"></script>
    // <script src="assets/js/popper.min.js"></script>
    // <script src="assets/js/bootstrap.min.js"></script>
    // <script src="assets/js/owl.carousel.min.js"></script>
    // <script src="assets/js/jquery.mixitup.js"></script>
    // <script src="assets/js/wow.js"></script>
    // <script src="assets/js/jquery.nav.js"></script>
    // <script src="assets/js/scrolling-nav.js"></script>
    // <script src="assets/js/jquery.easing.min.js"></script>
    // <script src="assets/js/jquery.counterup.min.js"></script>  
    // <script src="assets/js/nivo-lightbox.js"></script>     
    // <script src="assets/js/jquery.magnific-popup.min.js"></script>     
    // <script src="assets/js/waypoints.min.js"></script>   
    // <script src="assets/js/jquery.slicknav.js"></script>
    // <script src="assets/js/main.js"></script>
function kirki_theme_scripts() {
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css',true,'1.1','all' );
	wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/main.css',true,'1.1','all' );
	wp_enqueue_style( 'line-icons', get_template_directory_uri().'/assets/fonts/line-icons.css',true,'1.1','all' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri().'/assets/css/slicknav.css',true,'1.1','all' );
	wp_enqueue_style( 'carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css',true,'1.1','all' );
	wp_enqueue_style( 'owl', get_template_directory_uri().'/assets/css/owl.theme.css',true,'1.1','all' );
	wp_enqueue_style( 'magnific-popup',get_template_directory_uri().'/assets/css/magnific-popup.css',true,'1.1','all' );
	wp_enqueue_style( 'nivo-lightbox', get_template_directory_uri().'/assets/css/nivo-lightbox.css',true,'1.1','all' );
	wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/css/animate.css',true,'1.1','all' );
	wp_enqueue_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css',true,'1.1','all' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_style_add_data( 'kirki-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/assets/js/jquery.mixitup.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'nav', get_template_directory_uri() . '/assets/js/jquery.nav.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'scrolling-nav', get_template_directory_uri() . '/assets/js/scrolling-nav.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'nivo-lightbox', get_template_directory_uri() . '/assets/js/nivo-lightbox.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'),'4.4', true );
	wp_enqueue_script( 'kirki-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kirki_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

