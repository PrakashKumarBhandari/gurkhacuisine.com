<?php
/**
 * gurkhacuisine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gurkhacuisine
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


add_image_size('popular_dish', 325, 203, true);
add_image_size('home_about_image', 570,325, true);
add_image_size('menu_thumb_image', 106,66, true);
add_image_size('slider_image', 1920, 850, true);



if ( ! function_exists( 'gurkhacuisine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gurkhacuisine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gurkhacuisine, use a find and replace
		 * to change 'gurkhacuisine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gurkhacuisine', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'gurkhacuisine' ),
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
				'gurkhacuisine_custom_background_args',
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
add_action( 'after_setup_theme', 'gurkhacuisine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gurkhacuisine_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gurkhacuisine_content_width', 640 );
}
add_action( 'after_setup_theme', 'gurkhacuisine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gurkhacuisine_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gurkhacuisine' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gurkhacuisine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gurkhacuisine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gurkhacuisine_scripts() {
	wp_enqueue_style( 'gurkhacuisine-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gurkhacuisine-style', 'rtl', 'replace' );

	wp_enqueue_script( 'gurkhacuisine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gurkhacuisine_scripts' );


/**
 * Custom option of website <> THEME OPTIONS <>
 */
require get_template_directory() . '/admin-templates/menu-custom.php';


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


function site_assets(){
	//$reCAPTCHA_site_key = '';
	// Linking Styles
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('core', get_template_directory_uri() . '/css/core.css');	
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');	
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('timecircles', get_template_directory_uri() . '/css/timecircles.css');
	//wp_enqueue_style('style-customizer', get_template_directory_uri() . '/css/style-customizer.css');
	wp_enqueue_style('style-color', get_template_directory_uri() . '/css/color/color-blue.css');	

	wp_enqueue_style('style_custom', get_template_directory_uri() . '/css/style-custom.css');	
	wp_enqueue_style('fontAwesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');	
	wp_enqueue_style('datePicker','https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css');	
	
	
	
	/* Linking Scripts */
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js',array('jquery'),'2.8.3',false);
	//wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-1.12.0.min.js',array('jquery'),'1.12.0',true);
	wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js',[],false,true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js',[],false,true);
	wp_enqueue_script('bootstrapDatepicker', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js',[],false,true);

	wp_enqueue_script('nivo.slider', get_template_directory_uri() . '/js/jquery.nivo.slider.pack.js',[],false,true);
	wp_enqueue_script('isotope.pkgd', get_template_directory_uri() . '/js/isotope.pkgd.min.js',[],false,true);
	wp_enqueue_script('ajax-mail', get_template_directory_uri() . '/js/ajax-mail.js',array('jquery'),'1.12.0',true);
	wp_enqueue_script('jquery.magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js',[],false,true);
	wp_enqueue_script('jquery.counterup.min', get_template_directory_uri() . '/js/jquery.counterup.min.js',[],false,true);
	wp_enqueue_script('animated-headlines', get_template_directory_uri() . '/js/animated-headlines.js',[],false,true);
	wp_enqueue_script('jquery.magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js',[],false,true);
	wp_enqueue_script('jquery.counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js',[],false,true);
	wp_enqueue_script('animated-headlines', get_template_directory_uri() . '/js/animated-headlines.js',[],false,true);
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js',[],false,true);
	wp_enqueue_script('jquery.collapse', get_template_directory_uri() . '/js/jquery.collapse.js',[],false,true);
	wp_enqueue_script('style-customizer', get_template_directory_uri() . '/js/style-customizer.js',[],false,true);
	wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js',[],false,true);
	wp_enqueue_script('timecircles', get_template_directory_uri() . '/js/timecircles.js',[],false,true);
	
	wp_enqueue_script('googleRecaptch', 'https://www.google.com/recaptcha/api.js?render='.GOOGLE_SITE_KEY,[],false,true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js',[],false,true);
			
}

add_action('wp_enqueue_scripts', 'site_assets');

function new_submenu_class($menu) {    
	$menu = preg_replace('/ class="sub-menu"/','/ class="dropdown_menu" /',$menu);        
	return $menu;      
}
add_filter('wp_nav_menu','new_submenu_class'); 




// Required Custom post type and taxonomies

function required_custom_post_type_and_taxonomies(){

	// whyus
	register_post_type('whyus', array(
		'labels' => array('name' => 'Why Us'),
		'public' => true,
		'menu_position'=> 23,
		'supports' => array('title','excerpt'),
		'rewrite'=> array('slug'=> 'why-us'),
		'menu_icon' => 'dashicons-megaphone'
	));
	
	// Services
	/*
	register_post_type('services', array(
		'labels' => array('name' => 'Our Services'),
		'public' => true,
		'menu_position'=> 24,
		'supports' => array('title','editor','thumbnail'),
		'rewrite'=> array('slug'=> 'services'),
		'menu_icon' => 'dashicons-admin-home'
	));
	*/
	// Works
	
	register_post_type('gallery', array(
		'labels' => array('name' => 'Gallery'),
		'public' => true,
		'menu_position'=> 22,
		'supports' => array('title'),
		'rewrite'=> array('slug'=> 'gallery'),
		'menu_icon' => 'dashicons-images-alt2'
	));
	

}
add_action('init','required_custom_post_type_and_taxonomies');

/**
 * Custom Testomonials.
 */
require get_template_directory() . '/admin-templates/testomonials-function.php';


/**
 * Image Slider
 */
require get_template_directory() . '/admin-templates/slider-manager.php';


/**
 * Menu Manager
 */
require get_template_directory() . '/admin-templates/menu-manager.php';



/**
 * Custom option of website <> THEME OPTIONS <>
 */
require get_template_directory() . '/admin-templates/theme_options.php';



/**
 * Custom form form submitting reservation content
 */
require get_template_directory() . '/admin-templates/custom_reservation.php';



function excerpt($limit)
{
    $excerpt = explode(' ', get_the_content(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}





/*
 * Change the featured image metabox title text
 */
function km_change_featured_image_metabox_title() {
    remove_meta_box( 'postimagediv', 'slider', 'side' );
    add_meta_box( 'postimagediv', __( 'New Slider[W:1920px X H:850px]', 'km' ), 'post_thumbnail_meta_box', 'slider', 'side' );
}
add_action('do_meta_boxes', 'km_change_featured_image_metabox_title' );
/*
 * Change the featured image metabox link text
 *
 * @param  string $content Featured image link text
 * @return string $content Featured image link text, filtered
 */
function km_change_featured_image_text( $content ) {
    if ( 'slider' === get_post_type() ) {
        $content = str_replace( 'Set featured image', __( 'New Slider <br/> [Width:1920px X Height:850px]', 'km' ), $content );
        $content = str_replace( 'Remove featured image', __( 'Remove Slider Image <br/> [Width:1920px X Height:850px]', 'km' ), $content );
    }
    return $content;
}
add_filter( 'admin_post_thumbnail_html', 'km_change_featured_image_text' );

show_admin_bar(false);

