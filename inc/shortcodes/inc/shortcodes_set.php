<?php
/**
 * Shortcodes set
 * @package Alaya_framework
 * @since 1.0
 */

 /* TABLE OF CONTENTS
 *
 - alaya_feature_item
 - alaya_member 
 - alaya_one_half / alaya_one_half_last
 - alaya_one_third / alaya_one_third_last
 - alaya_two_third / two_third_last
 - alaya_one_fourth / alaya_one_fourth_last 
 - alaya_three_fourth / alaya_three_fourth_last
 - alaya_dropcap
 - alaya_line
 - alaya_clear
 - alaya_toggle
 - alaya_tab / alaya_tabs
 - alaya_list
 - alaya_skills
 - alaya_post_list
 - alaya_tagclouds
 - alaya_comments
 - alaya_button
 - alaya_heading
 - alaya_center
 - alaya_social_icon
 - alaya_spacing
 */


/*[alaya_row][/alaya_row]*/
add_shortcode('alaya_row', 'alaya_row_shortcode');
function alaya_row_shortcode( $atts, $content) {
   extract(shortcode_atts(array(
		'class' => '',
	), $atts));
   $str='<div class="section '.$class.'">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}

/*[alaya_feature_item][/alaya_feature_item]*/
add_shortcode('alaya_feature_item', 'alaya_feature_item_shortcode');
function alaya_feature_item_shortcode( $atts, $content) {
   extract(shortcode_atts(array(
		'title' => '',
		'image_url'=>'',
		'href' => '',
		'target' => '_self',
	), $atts));
	
   $str='<div class="alaya-feature-item">'.PHP_EOL;
   if($image_url<>''){
     $str.='<div class="icon">';
	 if($href<>''){
	   $str.='<a href="'.$href.'" target="'.$target.'">';
	 }
	 if($image_url<>''){
	    $str.='<img src="'.$image_url.'" alt="'.$title.'" />';
	 }
	 if($href<>''){
	   $str.='</a>';
	 }
	 $str.='</div>'.PHP_EOL;
   }
   if($title<>''){
     $str.='<strong>'.$title.'</strong>'.PHP_EOL;
   }
   $str.='<p>'.alaya_shortcode_filter($content).'</p>'.PHP_EOL;
   $str.='</div>'.PHP_EOL;
   return $str;
}

/*[alaya_member][/alaya_member]*/
add_shortcode('alaya_member', 'alaya_member_shortcode');
function alaya_member_shortcode( $atts, $content = "" ) {
   extract(shortcode_atts(array(
        'avatar'=>'',
		'name' => '',
		'job' => '',
		'gender' => 'gentle'
   ), $atts));		
   
   $str='<div class="alaya_member">';
   if($avatar==''){
   $str.='<img src="'.get_template_directory_uri().'/inc/shortcodes/images/member/avatar_'.$gender.'.png'.'" class="avatar" alt="'.$name.'" />';
   }else{
   $str.='<img src="'.$avatar.'" alt="'.$name.'" class="avatar" />';
   }
   $str.='<strong>'.esc_attr($name).'</strong>';
   $str.='<em>'.esc_attr($job).'</em>';
   $str.='<p>'.alaya_shortcode_filter($content).'</p>';
   $str.='</div>';
   return $str;
}

/*[alaya_one_half][/alaya_one_half]*/
add_shortcode('alaya_one_half', 'alaya_one_half_shortcode');
function alaya_one_half_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_one_half">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}
/*[alaya_one_half_last][/alaya_one_half_last]*/
add_shortcode('alaya_one_half_last', 'alaya_one_half_last_shortcode');
function alaya_one_half_last_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_one_half alaya_last">'.alaya_shortcode_filter($content).'</div>
         <div class="clear"></div>';
   return $str;
}

/*[alaya_one_third][/alaya_one_third]*/
add_shortcode('alaya_one_third', 'alaya_one_third_shortcode');
function alaya_one_third_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_one_third">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}
/*[alaya_one_third_last][/alaya_one_third_last]*/
add_shortcode('alaya_one_third_last', 'alaya_one_third_last_shortcode');
function alaya_one_third_last_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_one_third alaya_last">'.alaya_shortcode_filter($content).'</div>
         <div class="clear"></div>';
   return $str;
}

/*[alaya_two_third][/alaya_two_third]*/
add_shortcode('alaya_two_third', 'alaya_two_third_shortcode');
function alaya_two_third_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_two_third">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}
/*[alaya_two_third_last][/alaya_two_third_last]*/
add_shortcode('alaya_two_third_last', 'alaya_two_third_last_shortcode');
function alaya_two_third_last_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_two_third alaya_last">'.alaya_shortcode_filter($content).'</div>
        <div class="clear"></div>';
   return $str;
}

/*[alaya_one_fourth][/alaya_one_fourth]*/
add_shortcode('alaya_one_fourth', 'alaya_one_fourth_shortcode');
function alaya_one_fourth_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_one_fourth">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}
/*[alaya_one_fourth_last][/alaya_one_fourth_last]*/
add_shortcode('alaya_one_fourth_last', 'alaya_one_fourth_last_shortcode');
function alaya_one_fourth_last_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_one_fourth alaya_last">'.alaya_shortcode_filter($content).'</div>
         <div class="clear"></div>';
   return $str;
}

/*[alaya_three_fourth][/alaya_three_fourth]*/
add_shortcode('alaya_three_fourth', 'alaya_three_fourth_shortcode');
function alaya_three_fourth_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_three_fourth">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}
/*[alaya_three_fourth_last][/alaya_three_fourth_last]*/
add_shortcode('alaya_three_fourth_last', 'alaya_three_fourth_last_shortcode');
function alaya_three_fourth_last_shortcode($atts, $content) {
   $str='<div class="alaya_column alaya_three_fourth alaya_last">'.alaya_shortcode_filter($content).'</div>
         <div class="clear"></div>';
   return $str;
}

/*[alaya_format][alaya_format]*/
add_shortcode('alaya_format', 'alaya_format_shortcode');
function alaya_format_shortcode($atts, $content) {
   $str='<div class="format">'.do_shortcode($content).'</div>';
   return $str;
}

/*[alaya_dropcap][/alaya_dropcap]*/
add_shortcode('alaya_dropcap', 'alaya_dropcap_shortcode');
function alaya_dropcap_shortcode($atts, $content) {
   $str='<div class="alaya_dropcap">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}

/*[alaya_line]*/
add_shortcode('alaya_line', 'alaya_line_shortcode');
function alaya_line_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'color'=>''
	), $atts));
	$style='';
	if($color<>''){$style='style:"border-color:'.$color.';"';}
   $str='<hr '.$style.'/>';
   return $str;
}

/*[alaya_clear]*/
add_shortcode('alaya_clear', 'alaya_clear_shortcode');
function alaya_clear_shortcode($atts, $content) {
   $str='<div class="clear"></div>';
   return $str;
}

/*[alaya_toggle title=''][/alaya_toggle]*/
add_shortcode('alaya_toggle', 'alaya_toggle_shortcode');
function alaya_toggle_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'title'=>'',
		'status'=>'off'
	), $atts));
   if($status=='off'){
      $class=' off';
	  $title_class=' fa-plus-square';
   }else{
      $class='';
	  $title_class=' fa-minus-square';
   }
   $str='<div class="alaya_toggle"><div class="alaya_toggle_title"><i class="fa'.$title_class.'"></i>'.$title.'</div><div class="alaya_toggle_content'.$class.'">'.alaya_shortcode_filter($content).'</div></div>';
   return do_shortcode($str);
}

/*[alaya_tab title=""][/alaya_tab]*/
add_shortcode('alaya_tab', 'alaya_tab_shortcode');
function alaya_tab_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => '',
    ), $atts));
    global $tab_item_array;
    $tab_item_array[] = array('title' => $title, 'content' => trim(alaya_shortcode_filter($content)));
    return $tab_item_array;
}

/*[alaya_tabs][/alaya_tabs]*/
add_shortcode('alaya_tabs', 'alaya_tabs_shortcode');
function alaya_tabs_shortcode( $atts, $content = null ) {
    global $tab_item_array;
    $tab_item_array = array(); 

    $tabs_nav = '<div class="clearfix"></div>';
    $tabs_nav .= '<div class="alaya_tab_box">';
    $tabs_nav .= '<div class="alaya_tab_items"><ul>';
	$tabs_content ='<div class="alaya_tab_content">';
    do_shortcode($content);
    foreach ($tab_item_array as $tab => $tab_attr_array) {
	  $tabs_nav .= '<li><a href="javascript:void(0)">'.$tab_attr_array['title'].'</a></li>';
	  $tabs_content .= '<div class="alaya_tab">'.$tab_attr_array['content'].'</div>';
    }
    $tabs_nav .= '</ul></div>';
	$tabs_content .='</div>';
    $str = $tabs_nav . $tabs_content;
    $str .= '</div>';
    $str .= '<div class="clearfix"></div>';
    return $str;
}

/*[alaya_list style=""][/alaya_list]*/
add_shortcode('alaya_list', 'alaya_list_shortcode');
function alaya_list_shortcode($atts, $content) {
	extract(shortcode_atts(array(
		'style'=>'',
	), $atts));
   
   switch($style){
      case 'correct':
	   $class=' class="alaya_widget alaya_correct"';
	  break;
	  
	  case 'error':
	   $class=' class="alaya_widget alaya_error"';
	  break;
	  
	  case 'download':
	   $class=' class="alaya_widget alaya_download"';
	  break;
	  
	  case 'star':
	   $class=' class="alaya_widget alaya_star"';
	  break;
   }
   
   $str='<div'.$class.'>'.$content.'</div>';
   return $str;
}

/*[alaya_skills][/alaya_skills]*/
add_shortcode('alaya_skills', 'alaya_skills_shortcode');
function alaya_skills_shortcode($atts, $content) {
   $str='<div class="alaya_skills"><ul>'.alaya_shortcode_filter($content).'</ul></div>';
   return $str;
}
/*[alaya_skill]*/
add_shortcode('alaya_skill', 'alaya_skill_shortcode');
function alaya_skill_shortcode($atts, $content) {
   extract(shortcode_atts(array(
		'title'=>'',
		'percent'=>'100%',
		'color'=>'#48A876',
		'hide_percent'=>0,
		'text'=>''
   ), $atts));
   if($hide_percent==1 && $text==''){
      $text='';
   }elseif($hide_percent==0 && $text==''){
      $text=$percent;
   }
   
   $str='<li><span style="background:'.$color.';width:'.$percent.';">'.$title.'</span><em>'.$text.'</em></li>';
   return $str;
}

/*[alaya_post_list]*/
add_shortcode('alaya_post_list', 'alaya_post_list_shortcode');
function alaya_post_list_shortcode($atts, $content) {
extract(shortcode_atts(array(
		'category'=>'',
		'number'=>'5',
		'thumbnail'=>'yes'
   ), $atts));
   $str=alaya_shortcodes_post_list($number,$thumbnail,$category);
   return $str;
}

/*[alaya_comments]*/
add_shortcode('alaya_comments', 'alaya_comments_shortcode');
function alaya_comments_shortcode($atts, $content) {
extract(shortcode_atts(array(
		'number'=>'5'
   ), $atts));
   $str=alaya_shortcodes_comments($number);
   return $str;
}

/*[alaya_button]*/
add_shortcode('alaya_button', 'alaya_button_function');
function alaya_button_function($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'left',
		'bg_color' => '#000',
		'text_color' => '#fff',
		'border_color' => 'none',
		'size' => 'small',
		'target' => '_self',
		'text' =>'Button',
		'color' => '',
		'anchor' => 0,
		'lightbox' => 0
	), $atts));
	
	if(!empty($color))
	{
		switch(strtolower($color))
		{
			case 'black':
				$bg_color = '#000000';
				$text_color = '#ffffff';
			break;
			case 'grey':
				$bg_color = '#666666';
				$text_color = '#ffffff';
			break;
			case 'white':
				$bg_color = '#f5f5f5';
				$text_color = '#444444';
			break;
			case 'blue':
				$bg_color = '#004a80';
				$text_color = '#ffffff';
			break;
			case 'yellow':
				$bg_color = '#f9b601';
				$text_color = '#ffffff';
			break;
			case 'red':
				$bg_color = '#9e0b0f';
				$text_color = '#ffffff';
			break;
			case 'orange':
				$bg_color = '#fe7201';
				$text_color = '#ffffff';
			break;
			case 'green':
				$bg_color = '#7aad34';
				$text_color = '#ffffff';
			break;
			case 'pink':
				$bg_color = '#d2027d';
				$text_color = '#ffffff';
			break;
			case 'purple':
				$bg_color = '#582280';
				$text_color = '#ffffff';
			break;
		}
	}
	
	if(!empty($size))
	{
		switch(strtolower($size))
		{
			case 'small':
				$btn_size = 'alaya_small_btn';
			break;
			case 'large':
				$btn_size = 'alaya_large_btn';
			break;
			case 'large-x':
				$btn_size = 'alaya_largex_btn';
			break;
		}
	}
	
	$center='';
	if($align=='center'){
	  $align='none';
	  $center='margin:auto;';
	}
	$class='';
	if($anchor==1){
	  $class=' anchor';
	}
	$lightbox_class='';
	if($lightbox==1){
	  $lightbox_class=' lightbox';
	}
	
	$str = '<a id="button-'.alaya_random_string(6,false).'" href="'.$href.'" class="alaya_btn '.$btn_size.$class.$lightbox_class.'" style="float:'.$align.';'.$center.'background:'.$bg_color.';color:'.$text_color.';border:2px solid '.$border_color.'" target="'.$target.'">'.$text.'</a>';
	return $str;
}

/*[alaya_heading]*/
add_shortcode('alaya_heading', 'alaya_heading_shortcode');
function alaya_heading_shortcode($atts, $content) {
	 //extract short code attr
   extract(shortcode_atts(array(
		'heading' => '<strong>HeadLine</strong> Example',
		'size' => 'h2',
		'desc' => 'You can expatiate on the section further',
		'top'=>'',
		'bottom'=>''
	), $atts));
	$space='';
    if($top<>'' || $bottom<>''){
	  $space=' style="margin:'.$top.' auto '.$bottom.'"';
	}
   $str='<'.$size.' class="alaya_heading"'.$space.'>
               <span>'.$heading.'</span>
          </'.$size.'>';
   return $str;
}

/*[alaya_center]*/
add_shortcode('alaya_center', 'alaya_center_shortcode');
function alaya_center_shortcode($atts, $content) {
	 //extract short code attr
   extract(shortcode_atts(array(
		'width' => '100%',
		'top'=>'',
		'bottom'=>''
	), $atts));
   $style=' style="width:'.$width.';margin:'.$top.' auto '.$bottom.'"';
   $str='<div'.$style.'>'.alaya_shortcode_filter($content).'</div>';
   return $str;
}

/*[alaya_social_icon]*/
add_shortcode('alaya_social_icon', 'alaya_social_icon_shortcode');
function alaya_social_icon_shortcode($atts, $content) {
	 //extract short code attr
   extract(shortcode_atts(array(
		'facebook'=>'',
		'twitter'=>'',
		'dribbble'=>'',
		'flickr'=>'',
		'instagram'=>'',
		'googleplus'=>'',
		'linkedin'=>'',
		'tumblr'=>'',
		'deviantart'=>'',
		'behance'=>'',
		'pinterest'=>'',
		'youtube'=>'',
		'vimeo'=>'',
		'weibo'=>'',
		'vk'=>'',
		'yelp'=>'',
		'wechat'=>'',
		'github'=>'',
		'xing'=>'',
		'rss'=>'',
		'size'=>'small'
	), $atts));
	
	$style='';
    if($size=='small'){
	   $style="";
	}elseif($size=='big'){
	   $style=" big-size";
	}
   $str='<div class="social_icons'.$style.' clearfix">';
	   if($facebook<>''){
	   $str.='<a href="'.esc_attr($facebook).'" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
	   }
	   if($twitter<>''){
	   $str.='<a href="'.esc_attr($twitter).'" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
	   }
	   if($dribbble<>'') {
	   $str.='<a href="'.esc_attr($dribbble).'" class="dribbble" target="_blank"><i class="fa fa-dribbble"></i></a>';
	   }
	   if($flickr<>'') {
	   $str.='<a href="'.esc_attr($flickr).'" class="flickr" target="_blank"><i class="fa fa-flickr"></i></a>';
	   }
	   if($googleplus<>''){
	   $str.='<a href="'.esc_attr($googleplus).'" class="gplus" target="_blank"><i class="fa fa-google-plus"></i></a>';
	   }
	   if($linkedin<>''){
	   $str.='<a href="'.esc_attr($linkedin).'" class="linkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>';
	   }
	   if($tumblr<>''){
	   $str.='<a href="'.esc_attr($tumblr).'" class="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
	   }
	   if($deviantart<>''){
	   $str.='<a href="'.esc_attr($deviantart).'" class="deviantart" target="_blank"><i class="fa fa-deviantart"></i></a>';
	   }
	   if($behance<>''){
	   $str.='<a href="'.esc_attr($behance).'" class="behance" target="_blank"><i class="fa fa-behance"></i></a>';
	   }
	   if($pinterest<>''){
	   $str.='<a href="'.esc_attr($pinterest).'" class="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
	   }
	   if($youtube<>''){
	   $str.='<a href="'.esc_attr($youtube).'" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
	   }
	   if($vimeo<>''){
	   $str.='<a href="'.esc_attr($vimeo).'" class="vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
	   }
	   if($weibo<>''){
	   $str.='<a href="'.esc_attr($weibo).'" class="Weibo" target="_blank"><i class="fa fa-weibo"></i></a>';
	   }
	   if($vk<>''){
	   $str.='<a href="'.esc_attr($vk).'" class="VK" target="_blank"><i class="fa fa-vk"></i></a>';
	   }
	   if($yelp<>''){
	   $str.='<a href="'.esc_attr($yelp).'" class="Yelp" target="_blank"><i class="fa fa-yelp"></i></a>';
	   }
	   if($wechat<>''){
	   $str.='<a href="'.esc_attr($wechat).'" class="wechat" target="_blank"><i class="fa fa-wechat"></i></a>';
	   }
	   if($github<>''){
	   $str.='<a href="'.esc_attr($github).'" class="github" target="_blank"><i class="fa fa-github"></i></a>';
	   }
	   if($xing<>''){
	   $str.='<a href="'.esc_attr($xing).'" class="xing" target="_blank"><i class="fa fa-xing"></i></a>';
	   }
	   if($rss<>''){
	   $str.='<a href="'.esc_attr($rss).'" class="rss" target="_blank"><i class="fa fa-rss"></i></a>';
	   }
   $str.='</div>';
   return $str;
}

/*[alaya_spacing]*/
add_shortcode('alaya_spacing', 'alaya_spacing_shortcode');
function alaya_spacing_shortcode($atts, $content) {
	 //extract short code attr
   extract(shortcode_atts(array(
		'left' => '',
		'right' => '',
		'top'=>'',
		'bottom'=>''
	), $atts));
	$space='';
    if($top<>'' || $bottom<>'' || $left<>'' || $left<>''){
	  $space=' style="margin-top:'.$top.';margin-left:'.$left.';margin-bottom:'.$bottom.';margin-right:'.$right.';"';
	}
   $str='<div'.$space.'>'.alaya_shortcode_filter($content).'</div>';
   return $str;
}

/*[alaya_messagebox]*/
add_shortcode('alaya_messagebox', 'alaya_messagebox_shortcode');
function alaya_messagebox_shortcode($atts, $content) {
	 //extract short code attr
   extract(shortcode_atts(array(
		'type' => 'notification'
	), $atts));
   $str='<div class="alaya_alertbox '.$type.'">'.alaya_shortcode_filter($content).'</div>';
   return $str;
}
?>