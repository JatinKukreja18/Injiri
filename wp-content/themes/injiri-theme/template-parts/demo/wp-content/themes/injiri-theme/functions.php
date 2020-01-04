<?php
/**
 * Injiri Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Injiri_Theme
 */

if ( ! function_exists( 'injiri_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function injiri_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Injiri Theme, use a find and replace
		 * to change 'injiri-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'injiri-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'injiri-theme' ),
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
		add_theme_support( 'custom-background', apply_filters( 'injiri_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'injiri_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function injiri_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'injiri_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'injiri_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function injiri_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'injiri-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'injiri-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer-sidebar-1',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
	register_sidebar( array(
	'name' => 'Footer Sidebar 2',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array(
	'name' => 'Footer Sidebar 3',
	'id' => 'footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'injiri_theme_widgets_init' );



/* NEW POST CREATION - Collections */

function cw_post_type_collections() {

	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	// 'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	
	$labels = array(
	'name' => _x('collections', 'plural'),
	'singular_name' => _x('collection', 'singular'),
	'menu_name' => _x('Collections', 'admin menu'),
	'name_admin_bar' => _x('Collections', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Collection'),
	'new_item' => __('New Collection'),
	'edit_item' => __('Edit Collection'),
	'view_item' => __('View Collection'),
	'all_items' => __('All Collections'),
	'search_items' => __('Search Collections'),
	'not_found' => __('No Collections found.'),
	);
	
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'collections'),
	'has_archive' => true,
	'hierarchical' => false,
	// 'taxonomies'          => array( 'category' ),
	);
	// register_taxonomy_for_object_type( 'category', 'custom_collection' );
	register_post_type('collections', $args);
	
	}
	add_action('init', 'cw_post_type_collections');
function create_collection_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'type', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Types', 'textdomain' ),
		'all_items'         => __( 'All Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Type', 'textdomain' ),
		'update_item'       => __( 'Update Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Type', 'textdomain' ),
		'new_item_name'     => __( 'New Type Name', 'textdomain' ),
		'menu_name'         => __( 'Collection Set', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'type', array( 'collections' ), $args );
}
add_action( 'init', 'create_collection_taxonomies', 0 );


/*Custom Post type end*/

/* NEW POST CREATION - TECHNIQUES */

	function cw_post_type_techniques() {

	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	
	$labels = array(
	'name' => _x('techniques', 'plural'),
	'singular_name' => _x('technique', 'singular'),
	'menu_name' => _x('Techniques', 'admin menu'),
	'name_admin_bar' => _x('Techniques', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Technique'),
	'new_item' => __('New technique'),
	'edit_item' => __('Edit technique'),
	'view_item' => __('View technique'),
	'all_items' => __('All Techniques'),
	'search_items' => __('Search Techniques'),
	'not_found' => __('No techniques found.'),
	);
	
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'techniques'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('techniques', $args);
	}
	add_action('init', 'cw_post_type_techniques');
	
/*Custom Post type end*/


/* NEW POST CREATION - TECHNIQUES */

function cw_post_type_press() {

	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	
	$labels = array(
	'name' => _x('press', 'plural'),
	'singular_name' => _x('press', 'singular'),
	'menu_name' => _x('Press', 'admin menu'),
	'name_admin_bar' => _x('Press', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Press Release'),
	'new_item' => __('New Press Release'),
	'edit_item' => __('Edit Press Release'),
	'view_item' => __('View Press Release'),
	'all_items' => __('All Press Releases'),
	'search_items' => __('Search Press '),
	'not_found' => __('No press releases found.'),
	);
	
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'press'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('press', $args);
	}
add_action('init', 'cw_post_type_press');
	
/*Custom Post type end*/

/* NEW POST CREATION - Stockists */

function cw_post_type_stockists() {

	$supports = array(
	'title', // post title
	'editor', // post conten
		'author', // post author
	'thumbnail', // featured images
	// 'excerpt', // post excerpt
	'page-attributes',
	'custom-fields', // custom fields
	'revisions', // post revisions
	'post-formats', // post formats
	'page-attributes'
	);
	
	$labels = array(
	'name' => _x('stockists', 'plural'),
	'singular_name' => _x('stockist', 'singular'),
	'menu_name' => _x('Stockists', 'admin menu'),
	'name_admin_bar' => _x('Stockists', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New Stockist'),
	'new_item' => __('New stockist'),
	'edit_item' => __('Edit stockist'),
	'view_item' => __('View stockist'),
	'all_items' => __('All Stockists'),
	'search_items' => __('Search Stockists'),
	'not_found' => __('No stockists found.'),
	);
	
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'stockists'),
	'has_archive' => true,
	'hierarchical' => true,
	);
	register_post_type('stockists', $args);
	}
	add_action('init', 'cw_post_type_stockists');
	
/*Custom Post type end*/
// trying admin 
add_filter( 'manage_stockists_posts_columns', 'smashing_filter_posts_columns' );
function smashing_filter_posts_columns( $columns, $post_id ) {
  $columns['post_parent'] = __( 'Parent', 'smashing' );
  return $columns;
}
add_action( 'manage_stockists_posts_custom_column', 'smashing_realestate_column', 10, 2);
function smashing_realestate_column( $column, $post_id ) {
  // Image column
  if ( 'post_parent' === $column ) {
    echo get_the_title(wp_get_post_parent_id($post_id)) ;
  }
}
add_filter( 'manage_edit-stockists_sortable_columns', 'smashing_stockists_sortable_columns');
function smashing_stockists_sortable_columns( $columns ) {
  $columns['post_parent'] = 'post_parent';
  return $columns;
}
add_action( 'pre_get_posts', 'smashing_posts_orderby' );
function smashing_posts_orderby( $query ) {
  if( ! is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if ( 'post_parent' === $query->get( 'orderby') ) {
    $query->set( 'orderby', 'parent' );
  }
}
// trying admin ends
add_action( 'wp', 'deactivate_rocket_lazyload_on_single' );
function deactivate_rocket_lazyload_on_single() {
    if ( is_front_page() ) {
        add_filter( 'do_rocket_lazyload', '__return_false' );
    }
}
/**
 * Enqueue scripts and styles.
 */
function injiri_theme_scripts() {
	wp_enqueue_style( 'injiri-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'injiri-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'injiri-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'injiri_theme_scripts' );


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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}