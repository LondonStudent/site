<?php
vc_map( array(
   "name" => __("CityNews Recent Posts","alaya"),
   "base" => "alaya_recent_posts",
   "class" => "wpb_alaya_recent_post",
   "icon" =>"icon-wpb-alaya_recent_post",
   "category" => __('CityNews',"alaya"),
   'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extends/vc_extends.js'),
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extends/vc_extends.css'),
   'custom_markup'=>'',
   "params" => array(
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_recent_post_title",
         "heading" => __("Widget Title","alaya"),
         "param_name" => "title",
         "value" =>  ''
      ),
	 
	 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_recent_post_number",
         "heading" => __("Number of posts to show","alaya"),
         "param_name" => "number",
         "value" =>  5,
         "description" => __('Number of posts you want to display.','alaya')
      ),
      
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_recent_post_thumbnail",
         "heading" => __("Show The Thumbnail?","alaya"),
         "param_name" => "thumbnail",
         "value" =>  array('yes','no'),
      ),
	  
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_recent_post_categories",
         "heading" => __("From which categories?","alaya"),
         "param_name" => "category_name",
         "value" => '',
         "description" => __('If you leave it empty, it will display the posts from all categories, Please note, you should add category slug here, please separate multiple category slugs with English commas,for example: slug-1,slug-2 ',"CityNews")
      ),
	  
   )
) );


add_shortcode('alaya_recent_posts', 'alaya_recent_posts_shortcode');
function alaya_recent_posts_shortcode( $atts, $content = "" ) {
   extract(shortcode_atts(array(
        'title'=>'',
		'number' => '5',
		'category_name' => '',
		'thumbnail' => 'yes'
   ), $atts));		
   
   $str='<div class="widget">';
   if($title<>''){
     $str.='<h6 class="widget_title">'.$title.'</h6>';
   }
   $str.=alaya_post_list($number,$thumbnail,$category_name);
   $str.='</div>';
   return $str;
}
?>