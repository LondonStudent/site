<?php
vc_map( array(
   "name" => __("CityNews Recent Comments","alaya"),
   "base" => "alaya_recent_comments",
   "class" => "wpb_alaya_recent_comments",
   "icon" =>"icon-wpb-alaya_recent_comments",
   "category" => __('CityNews',"alaya"),
   'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extends/vc_extends.js'),
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extends/vc_extends.css'),
   'custom_markup'=>'',
   "params" => array(
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_recent_comments_title",
         "heading" => __("Widget Title","alaya"),
         "param_name" => "title",
         "value" =>  'Recent Comments'
      ),
	 
	 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_recent_comments_number",
         "heading" => __("Number of comments to show","alaya"),
         "param_name" => "number",
         "value" =>  5,
         "description" => __('Number of comments you want to display.','alaya')
      )
	  
   )
) );


add_shortcode('alaya_recent_comments', 'alaya_recent_comments_shortcode');
function alaya_recent_comments_shortcode( $atts, $content = "" ) {
   extract(shortcode_atts(array(
        'title'=>'Recent comments',
		'number' => '5',
   ), $atts));		
   
   $str='<div class="widget widget_alaya_recent_comments">';
   $str.='<h6 class="widget_title">'.$title.'</h6>';
   $str.=alaya_recent_comment($number);
   $str.='</div>';
   return $str;
}
?>