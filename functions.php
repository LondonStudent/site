<?php
/**
 * Theme related functions.
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

$tmp_dir = get_template_directory();

// Set the theme's content width.
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

if ( ! function_exists( 'alaya_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
function alaya_theme_setup() {
    
    /*Add Title Tag*/
    add_theme_support( "title-tag" );


	/*
	 * Makes theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 */
	 
	load_theme_textdomain( 'alaya', get_template_directory().'/languages' ); 
	$locale = get_locale(); 
	$locale_file = get_template_directory_uri()."/languages/$locale.php"; 
	if ( is_readable($locale_file) ) require_once($locale_file);

	// This theme uses wp_nav_menu() in following locations.
	register_nav_menus( array(
		'primary_navi' => __( 'Primary Menu', 'alaya' ),
		'footer_navi'  => __( 'Footer Menu', 'alaya' ),
		'lang_navi'  => __( 'Language List', 'alaya' )
	) );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_image_size')){  
	    add_image_size('blog_thumbnail', 600, 400,true);
    }
	
	/**
	 * Since WordPress 4.1, you can use add_theme_support to output the title tag in HTML.
	 */
	//add_theme_support( "title-tag" );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/*Add post format support*/
    add_theme_support( 'post-formats', array( 'audio','video','gallery' ) );

	/*Remove the default gallery style*/
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	/*Add shortcode support for widget text*/
	add_filter('widget_text', 'do_shortcode');
	
	/*Add nofollow to Read More link for SEO*/
	function alaya_add_nofollow_to_link($link) {
		return str_replace('<a', '<a rel="nofollow"', $link);
	}
	add_filter('the_content_more_link','alaya_add_nofollow_to_link', 0);
	
	/*Declare WooCommerce support*/
	add_theme_support('woocommerce');

	/*Change excerpt more string*/
	function van_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'van_excerpt_more' );

}
endif; // alaya_theme_setup
add_action( 'after_setup_theme', 'alaya_theme_setup' );

/**
* Register widget areas and widgets.
*
* @since 1.0
*/
function alaya_sidebar_init() {

	// Register widget areas
	register_sidebar(array(
		'name'          => __( 'Home Sidebar Widget Area', 'alaya' ),
		'id'            => 'home_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
		'description'   => __( 'Home Sidebar Widgets.', 'alaya' )
	));
	
	register_sidebar(array(
		'name'          => __( 'Archive Sidebar Widget Area', 'alaya' ),
		'id'            => 'archive_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
		'description'   => __( 'Archive Sidebar Widgets.', 'alaya' )
	));
	
	register_sidebar(array(
		'name'          => __( 'Post Sidebar Widget Area', 'alaya' ),
		'id'            => 'post_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
		'description'   => __( 'Post Sidebar Widgets.', 'alaya' )
	));


	register_sidebar(array(
		'name'          => __( '#1 Bottom Widget Area', 'alaya' ),
		'id'            => 'bottom_widget_1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
		'description'   => __( '#1 Sitewide footer widgets.', 'alaya' )
	));
	
	register_sidebar(array(
		'name'          => __( '#2 Bottom Widget Area', 'alaya' ),
		'id'            => 'bottom_widget_2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
		'description'   => __( '#2 Sitewide footer widgets.', 'alaya' )
	));
	
	register_sidebar(array(
		'name'          => __( '#3 Bottom Widget Area', 'alaya' ),
		'id'            => 'bottom_widget_3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
		'description'   => __( '#3 Sitewide footer widgets.', 'alaya' )
	));
	
	register_sidebar(array(
		'name'          => __( '#4 Bottom Widget Area', 'alaya' ),
		'id'            => 'bottom_widget_4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget_title">',
		'after_title'   => '</h6>',
		'description'   => __( '#4 Sitewide footer widgets.', 'alaya' )
	));
	
}
add_action( 'widgets_init', 'alaya_sidebar_init' );

/**
 * Load CSS Files
*/
add_action('wp_enqueue_scripts', 'alaya_css');
function alaya_css(){

    //CSS Files
	wp_enqueue_style("style", get_stylesheet_uri(), false, null, "all");
	wp_enqueue_style("custom", get_template_directory_uri()."/custom.css", false, null, "all");
     
    //Responsive
    wp_enqueue_style("responsive", get_template_directory_uri()."/assets/css/responsive.css", false, null, "all");
    
    //CustomPanel
    wp_enqueue_style("van-customPanel", get_template_directory_uri()."/assets/css/customPanel.css", false, null, "all");
}


/**
 * Load scripts
 */
add_action('wp_enqueue_scripts', 'alaya_scripts');
function alaya_scripts(){
	
    wp_enqueue_script( 'modernizr-custom', get_template_directory_uri() . '/assets/js/modernizr.custom.41385.js', array( 'jquery' ), null, false );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', null, null, true );
	wp_enqueue_script( 'masonry-self', get_template_directory_uri() . '/assets/js/jquery.masonry.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'justifiedGallery', get_template_directory_uri() . '/assets/js/jquery.justifiedGallery.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'jflickrfeed', get_template_directory_uri() . '/assets/js/jflickrfeed.min.js', array( 'jquery' ), null, false );
	wp_enqueue_script( 'colorbox', get_template_directory_uri() . '/assets/js/jquery.colorbox.js', array( 'jquery' ), null, false );
	wp_enqueue_script( 'pushy', get_template_directory_uri() . '/assets/js/pushy.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'flexloader', get_template_directory_uri() . '/assets/js/jquery.flexloader.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'send-mail', get_template_directory_uri() . '/assets/js/send-mail.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'simpleWeather', get_template_directory_uri() . '/assets/js/jquery.simpleWeather.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.jquery.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'geoplugin','http://www.geoplugin.net/javascript.gp
', array( 'jquery' ), null, true );
    wp_enqueue_script( 'hoverdelay',get_template_directory_uri() . '/assets/js/jquery.hoverdelay.js
', array( 'jquery' ), null, true );
	wp_enqueue_script( 'cityNews', get_template_directory_uri() . '/assets/js/citynews.js', array('jquery'), null, true );
}

add_action('wp_footer', 'alaya_js_arguments');
function alaya_js_arguments(){
   echo '<script type="text/javascript">
   var comment_title="'.esc_js(__("COMMENT ON THIS POST","alaya")).'";
   </script>';
}

/**
 * Load Fonts
 */
 
function alaya_fonts_url() {
    $fonts_url = '';
    $source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'alaya' );
    $pt_serif = _x( 'on', 'PT Serif font: on or off', 'alaya' );
    $roboto_slab = _x( 'on', 'Roboto Slab font: on or off', 'alaya' );
    $voltaire = _x( 'on', 'Voltaire font: on or off', 'alaya' );
    
    if ( 'off' !== $source_sans_pro || 'off' !== $pt_serif || 'off' !== $roboto_slab || 'off' !== $voltaire ) {
	    $font_families = array();
	 
	    if ( 'off' !== $source_sans_pro ) {
	        $font_families[] = 'Source Sans Pro:400,600,700,900,400italic,600italic,700italic,900italic';
	    }
	 
	    if ( 'off' !== $pt_serif ) {
	        $font_families[] = 'PT Serif:400,700,400italic,700italic';
	    }
	    
	    if ( 'off' !== $roboto_slab ) {
	        $font_families[] = 'Roboto Slab:400,700,300,100';
	    }
	    
	    if ( 'off' !== $voltaire ) {
	        $font_families[] = 'Voltaire';
	    }
	    
	    $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext,vietnamese,cyrillic-ext,cyrillic,greek,greek-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
    
    return esc_url_raw( $fonts_url );
}

function alaya_font_styles() {
    wp_enqueue_style( 'citynews-default-fonts', alaya_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'alaya_font_styles' );
 

/**
 * Include VC Extends
 */
if ( function_exists( 'vc_map')){
include_once ( $tmp_dir . '/vc_extends/vc_extends.php' );
}


/**
 * Include Framework Options
 */
include_once ( $tmp_dir . '/framework/bootstrap.php');
include_once ( $tmp_dir . '/inc/data_source.php');

/**
 * Create instance of Options
 */
$alaya_opt  = $tmp_dir."/inc/options.php";

$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'alaya_opt',                           // options key in db, required
	'page_slug'             => 'alaya_options',                           // options page slug, required
	'template'              => $alaya_opt,                              // template file path or array, required
	'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fixed',                                // fluid or fixed, default to fixed
	'page_title'            => __( 'Theme Options', 'alaya' ), // page title
	'menu_label'            => __( 'Theme Options', 'alaya' ), // menu label
));

function alaya_opt( $name ){
    return vp_option( "alaya_opt." . $name );
}

/**
 * MetaBox Options
 */
$alaya_post_format_metabox  = $tmp_dir . '/inc/metabox/post-format-field.php';
$alaya_contact_metabox  = $tmp_dir . '/inc/metabox/contact-field.php';
$alaya_custom_page_metabox  = $tmp_dir . '/inc/metabox/custom-page-field.php';

$post_format_field = new VP_Metabox($alaya_post_format_metabox);
$contact_field = new VP_Metabox($alaya_contact_metabox);
$custom_page_metabox = new VP_Metabox($alaya_custom_page_metabox);

$alaya_post_template_metabox  = $tmp_dir . '/inc/metabox/post-template-field.php';
$post_template_field = new VP_Metabox($alaya_post_template_metabox);


/**
 * Include theme partials: library, widgets, metaboxes and rest.
 */
include_once ( $tmp_dir . '/inc/init.php' );
