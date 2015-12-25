<?php
/**
 * Shortcodes module
 * @package Alaya_framework
 * @since 1.0
 */


/*-----------------------
  Shortcodes Init
-----------------------*/
add_action('wp_footer', 'alaya_shortcode_script');
function alaya_shortcode_script(){
	wp_enqueue_script( 'alaya_shortcodes', get_template_directory_uri().'/inc/shortcodes/js/shortcodes.js', null, null, true );
	wp_enqueue_style("alaya_shortcodes", get_template_directory_uri().'/inc/shortcodes/css/shortcodes.css', false, null, "all");
}

include_once 'inc/shortcodes_set.php';
include_once 'inc/shortcodes_func.php';
include_once 'generator/shortcode-generator.php';
?>