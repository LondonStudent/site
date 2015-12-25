<?php
/**
 * VC Extends
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */


/*-------------------------------------------------------
  Add Exist Shortcodes To Visual Composer
--------------------------------------------------------*/	
	require_once("custom_blog.php");
	require_once("custom_scroll_posts.php");
	require_once("custom_categories_loop.php");
	require_once("custom_recent_posts.php");
	require_once("custom_recent_comments.php");
	require_once("custom_sticky.php");
		
	/*Remove exist shortcode*/
	vc_remove_element("vc_images_carousel"); 
	vc_remove_element("vc_carousel");
	
	vc_remove_param( 'vc_row', 'full_width' ); 
	
	/*Load custom CSS*/
	add_action('wp_enqueue_scripts', 'vc_custom_css',30);
	function vc_custom_css(){
	   wp_enqueue_style("vc-custom", get_template_directory_uri()."/vc_extends/vc_custom.css", false, null, "all");
	}
	
	/*Disable frontend Interface*/
	//vc_disable_frontend();
	
	
	/*Set the default editor to Visual composer*/
	//add_action('vc_after_init','my_custom_function',100);
	function my_custom_function() {
	
		$vcGroupAccess = vc_settings()->get('groups_access_rules');
		$vcGroupAccess["administrator"]["show"] = "only";
		vc_settings()->set('groups_access_rules', $vcGroupAccess);
	}
?>