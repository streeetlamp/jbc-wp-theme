<?php

/**
 * James Branch Cabell functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package James_Branch_Cabell
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.20' );
}

if ( ! function_exists( 'jbc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jbc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on James Branch Cabell, use a find and replace
		 * to change 'jbc-wp-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jbc-wp-theme', get_template_directory() . '/languages' );

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
				'menu-1'  => esc_html__( 'Primary', 'jbc-wp-theme' ),
				'alt-nav' => esc_html( 'Alternative', 'jbc-wp-theme' ),
				'footer'  => esc_html( 'Footer', 'jbc-wp-theme' ),
			)
		);

		/*
		* ACF options page
		*/
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(
				array(
					'page_title' => 'Site Options',
					'menu_title' => 'Site Options',
					'menu_slug'  => 'options',
					'capability' => 'edit_posts',
					'redirect'   => false,
				)
			);
		}

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

		// Add theme support for selective refresh for widgets.
		// add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'jbc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jbc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jbc_content_width', 1200 );
}
add_action( 'after_setup_theme', 'jbc_content_width', 0 );

/**
 *
 * Removing customizer items that users should not need
 */

function jbc_remove_sections( $wp_customize ) {

	$wp_customize->remove_section( 'header_image' );
	// $wp_customize->remove_panel('nav_menus');
	// $wp_customize->remove_panel('widgets');
	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	// $wp_customize->remove_section('static_front_page');
	// $wp_customize->remove_section('title_tagline');
}
add_action( 'customize_register', 'jbc_remove_sections' );

add_action( 'admin_menu', 'jbc_remove_admin_menus' );
function jbc_remove_admin_menus() {
	 remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action( 'init', 'remove_comment_support', 100 );

function remove_comment_support() {
	 remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function jbctheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'jbctheme_admin_bar_render' );

// useful tool to check if live or local
// function we_are_live() {
// $current_server = wp_unslash( $_SERVER['HTTP_HOST'] );
// if ( $current_server == 'jbcdev.wpengine.com' ) {
// return true;
// } else {
// return false;
// }
// }


// Hide ACF from admin menu if live
// if (we_are_live()) {
// add_filter('acf/settings/show_admin', '__return_false');
// }


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function jbc_widgets_init() {
// register_sidebar(
// array(
// 'name'          => esc_html__( 'Sidebar', 'jbc' ),
// 'id'            => 'sidebar-1',
// 'description'   => esc_html__( 'Add widgets here.', 'jbc' ),
// 'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 'after_widget'  => '</section>',
// 'before_title'  => '<h2 class="widget-title">',
// 'after_title'   => '</h2>',
// )
// );
// }
// add_action( 'widgets_init', 'jbc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jbc_scripts() {
	wp_enqueue_style( 'jbc-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'jbc-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jbc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// if (is_singular() && comments_open() && get_option('thread_comments')) {
	// wp_enqueue_script('comment-reply');
	// }
}
add_action( 'wp_enqueue_scripts', 'jbc_scripts' );

function jbc_list_child_pages() { 
	global $post;

	if ( is_page() && $post->post_parent ) {
		$childpages = wp_list_pages( 'sort_order=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
	} else {
		$childpages = wp_list_pages( 'sort_order=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
	}

	if ( $childpages ) {
		$string = '<ul>' . $childpages . '</ul>';
	}

	return $string;
}

add_shortcode( 'jbc_childpages', 'jbc_list_child_pages' );


// Remove Open Sans that WP adds from frontend
if ( ! function_exists( 'remove_wp_open_sans' ) ) :
	function remove_wp_open_sans() {
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );
	}
	add_action( 'wp_enqueue_scripts', 'remove_wp_open_sans' );
endif;

// emoji's actually suck
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Fully Disable Gutenberg editor.
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
	wp_dequeue_style( 'wp-block-library' ); // WordPress core
	wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

/*
* Pullquotes in editor toolbar
*/
require 'inc/jbc-pullquote.php';

/*
* Customize menu thing is annoying
*/
add_action( 'wp_before_admin_bar_render', 'jbc_before_admin_bar_render' );

function jbc_before_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'customize' );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
 */
require get_template_directory() . '/post-types/quotes-post-type.php';
