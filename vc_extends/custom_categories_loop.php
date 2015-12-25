<?php
/**
 * VC block: Category sections
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

vc_map( array(
   "name" => __("CityNews Category Sections","alaya"),
   "base" => "alaya_category_loop",
   "class" => "wpb_alaya_categories_post",
   "icon" =>"icon-wpb-alaya_categories_post",
   "category" => __('CityNews',"alaya"),
   'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extends/vc_extends.js'),
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extends/vc_extends.css'),
   'custom_markup'=>'',
   "params" => array( 
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_category_template",
         "heading" => __("Columns","alaya"),
         "param_name" => "columns",
         "value" =>  array('1','2','3'),
         "description" => __('Choose the template for the blog posts.','alaya')
      ),
	  
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_categories_post_categories",
         "heading" => __("From which categories?","alaya"),
         "param_name" => "category_slug",
         "value" => '',
         "description" => __('If you leave it empty, it will display all categories, Please note, you should add category slug here, and separate multiple category slugs with English commas,for example: slug-1,slug-2 ',"CityNews")
      ),
	  
   )
) );


/* Category loop */
add_shortcode('alaya_category_loop', 'alaya_category_loop');   
function alaya_category_loop($atts, $content){   
    ob_start();  
    extract(shortcode_atts(array(
		'columns' => 3,
		'category_slug' => ''
	), $atts));
	$col_class='three_columns';
	$channel_id="masonry_channel_3col";
	if($columns==2){
		$col_class='two_columns';
		$channel_id="masonry_channel";
	}elseif($columns==1){
		$col_class='one_column';
		$channel_id="normal_channel";
	}
    set_query_var( 'columns_class', $col_class);
    set_query_var( 'category', $category_slug);
    get_template_part('tpl/tpl', 'category-loop');  
    $ret = '<div id="'.esc_attr($channel_id).'" class="masonry_channel">';
    $ret .= ob_get_contents();  
    $ret .= '</div>';
    ob_end_clean();  
    return $ret;    
}
?>