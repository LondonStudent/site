<?php
/** 
 * Theme Initialize
 * @package Alaya_framwork
 * @subpackage City News
 * @since 1.0
 */


/*Load Functions*/
require_once("lib.php");
require_once("theme-func.php");
require_once("custom-func.php");

/*Add customizer*/
require_once("customizer/customize.php");

/*Add Widgets*/
require_once("widgets/widgets-func.php");
require_once("widgets/alaya-flickr.php");
require_once("widgets/alaya-recent.php");
require_once("widgets/alaya-recent-comments.php");
require_once("widgets/alaya-author.php");
require_once("widgets/alaya-ad.php");

/*Add Shortcodes*/
require_once("shortcodes/shortcodes.php");

/*Add custom fields for category*/
require_once("metabox/category-field.php");

require_once("metabox/mega-menu-field.php");

/*Add plugins*/
require_once("plugins/plugins.php");

/*Include Scripts in backend*/
add_action('admin_enqueue_scripts', 'alaya_backend_script');
function alaya_backend_script(){
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'farbtastic' );
	wp_enqueue_script( 'farbtastic' );
	wp_enqueue_style("alaya_backend", get_template_directory_uri()."/inc/assets/backend.css", false, "1.0", "all");
	wp_enqueue_script("alaya_script", get_template_directory_uri()."/inc/assets/backend_script.js");
}
?>