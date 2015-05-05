<?php
/**
 * LondonStudent functions and definitions
 *
 * @package LondonStudent
 */

if ( ! function_exists( 'londonstudent_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function londonstudent_setup() {


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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'londonstudent' ),
	) );


	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

}
endif; // londonstudent_setup
add_action( 'after_setup_theme', 'londonstudent_setup' );


/**
 * Enqueue scripts and styles.
 */
function londonstudent_scripts() {

	wp_enqueue_style( 'londonstudent-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fonts-merriweather', 'http://fonts.googleapis.com/css?family=Merriweather:400,700' );

	wp_enqueue_script( 'londonstudent-js', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'londonstudent_scripts' );

function get_author_fullname($userID) {
	$first = get_the_author_meta('first_name', $userID);
	$last = get_the_author_meta('last_name', $userID);
	$full = $first . ' ' . $last;
	$nickname = get_the_author_meta('nickname', $userID);
	if ($first && $last) {
		return $full;
	} else {
		return $nickname;
	}
}

function the_author_fullname($userID) {
	echo get_author_fullname($userID);
}

/*  COMMENTED THIS OUT COZ IT BROKE THE SITE
    function get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}
*/

/**
 * Load shortcodes
 */
require get_template_directory() . '/functions/shortcodes.php';

/**
 * Image attachment attribution
 */
require get_template_directory() . '/functions/attribution.php';

?>
