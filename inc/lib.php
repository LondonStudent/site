<?php
/**
 * Common Functions Library
 * @package Alaya_framework
 * @since 1.0
 */

 /* TABLE OF CONTENTS
 *
 * - alaya_category_root_id($cat)
 * - alaya_cat_slug($cate_name)
 * - alaya_cat_name($cate_ID)
 * - alaya_truncate($full_str,$max_length) 
 * - alaya_pagenavi()
 * - alaya_format($content) 
 * - alaya_content()
 * - alaya_breadcrumbs()
 * - alaya_ad()
 * - alaya_category_tags($cate_slug,$number,$format)
 * - alaya_is_mobile()
 * - alaya_social()
 * - alaya_shortcode()
 * - alaya_strip_tags()
 * - alaya_random_string()
 * - alaya_color_hex2rgba()
 * - alaya_comments_popup_link()
 /

/*Get sub category ID
 * parameter:
 * $root_cat_id: The parent category id
*/
function alaya_category_root_id($root_cat_id)   {   
	$current_category = get_category($root_cat_id); 
	while($current_category->category_parent)  {   
	 $current_category = get_category($current_category->category_parent);  
	}
	$term_id=$current_category->term_id;
	$term_id = apply_filters('alaya_category_root_id', $term_id);
	return $term_id;
}

/*Get category slug
 * Parameter:
 * $cate_name: Category name
*/
function alaya_cat_slug($cate_name){
	$cat_ID = get_cat_ID($cate_name); 
	$thisCat = get_category($cat_ID);
	$cat_slug = $thisCat->slug;
	$cat_slug = apply_filters('alaya_cat_slug', $cat_slug);
	return $cat_slug;
}

/*Get category name
 *Parameter:
 *$cate_ID:Category id
*/
function alaya_cat_name($cate_ID){
	$current_cat = get_category($cate_ID);
	$cate_name = $current_cat->name;
	$cate_name = apply_filters('alaya_cat_name', $cate_name);
	return $cate_name;
}

/*Get category id
 *Parameter:
 *$cate_slug:Category slug
*/
function alaya_cat_id($cate_slug){
    $category=get_term_by('slug',$cate_slug,'category');
    if($category){
	 $cate_id = $category->term_id;
	 $cate_id = apply_filters('alaya_cat_id', $cate_id);
	 return $cate_id;
	}
}

/*Get page id by slug
 *Parameter:
 *$page_slug: Page slug
*/
function alaya_page_id($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

/*Truncate the long string
 *Parameter:
 *$full_start: The string you want to truncate.
 *$max_length: The max length of output. 
*/
function alaya_truncate($full_str,$max_length) {
	if (mb_strlen($full_str,'utf-8') > $max_length ) {
	  $full_str = mb_substr($full_str,0,$max_length,'utf-8').'...';
	}
	$full_str = apply_filters('alaya_truncate', $full_str);
return $full_str;
}

/*Output page navi
 *Parameter:
 *$p: Default page number
*/

function alaya_pagenavi(){
   global $wp_query;

	$big = 999999999; // need an unlikely integer
	$return_html='';
	$return_html.='<div class="alaya_pagenavi">';
	$return_html.= paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_text'    => '&lt;',
	    'next_text'    => '&gt;'
	) );
	$return_html.='</div>';
	
	return $return_html;
}

/*Output format content*/
function alaya_content($echo=true,$format=true){
      $content = get_the_content(__('Read More &raquo;','alaya'));
	  if($format){
	   global $more;
	   $more = 0;
	   $content = apply_filters('the_content', $content);
	   $content = str_replace(']]>', ']]&gt;', $content);
	  }
	  if($echo){
	    print do_shortcode($content);
	  }else{
	    return do_shortcode($content);
	  }
}

/*Breadcrumbs navi*/
function alaya_breadcrumbs() {
  $delimiter = '<span class="sep">&raquo;</span>';
  $name = __('Home','alaya');
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
  if ( !is_home() && !is_front_page() || is_paged() ) {
    global $post;
    $home = esc_url(home_url('/'));
    echo '<i class="fa fa-home"></i><a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore;
      single_cat_title();
      echo $currentAfter;
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
    } elseif ( is_single() && !is_attachment() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search result &#39;' . get_search_query() . '&#39;' . $currentAfter;
    } elseif ( is_tag() ) {
      echo $currentBefore;
      single_tag_title();
      echo $currentAfter;
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Author:' . $userdata->display_name . $currentAfter;
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','alaya') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  }
}

/* Taxonomy Breadcrumb */
function be_taxonomy_breadcrumb() {
	// Get the current term
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	 
	// Create a list of all the term's parents
	$parent = $term->parent;
	while ($parent):
	$parents[] = $parent;
	$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
	$parent = $new_parent->parent;
	endwhile;
	if(!empty($parents)):
	$parents = array_reverse($parents);
	 
	// For each parent, create a breadcrumb item
	foreach ($parents as $parent):
	$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
	$url = esc_url(home_url('/')).'/'.$item->taxonomy.'/'.$item->slug;
	echo '<li><a href="'.$url.'">'.$item->name.'</a></li>';
	endforeach;
	endif;
	 
	// Display the current term in the breadcrumb
	echo '<li>'.$term->name.'</li>';
}

/*Get tags cloud in specified category
 *Parameter:
 *$cate_slug: category slug
 *$number: Number of ouput
 *$format: additional parameter, it will use for pass parameter to next page. 
*/
function alaya_category_tags($cate_slug='',$number=20,$label='') {
 query_posts('posts_per_page='.$number.'&category_name='.$cate_slug);
  if (have_posts()) :
			  $all_tags_arr=array(); 
			  $tagcloud='<div class="alaya_widget">';
			  while (have_posts()) :
				the_post();
				$posttags = get_the_tags();
				if ($posttags) {
				  foreach($posttags as $tag) {
				   if(in_array($tag->name,$all_tags_arr)){
					  continue;
				   }else{
					$all_tags_arr[] = $tag->name;
					if($cate_slug<>''){
		               $cat='&cat='.$cate_slug;
					}else{
					   $cat='';
					}
					if($label<>''){
					   $lab='&label='.$label;
					}else{
					   $lab='';
					}
					$tagcloud.='<a href ="'.esc_url(home_url('/')).'/?tag='.$tag->name.$cat.$lab.'" class="tagclouds-item">'.$tag->name.'</a>';
				   }
				  }
				}
			  endwhile;
			  $tagcloud.='</div>';
   endif;
   wp_reset_query();
   $tagcloud = apply_filters('alaya_category_tags', $tagcloud);
   return $tagcloud;
}

/*Check user's mobile device*/
function alaya_is_mobile() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
	$is_mobile = false;
	foreach ($mobile_agents as $device) {
		if (stristr($user_agent, $device)) {
			$is_mobile = true;
			break;
		}
	}
	$is_mobile = apply_filters('alaya_is_mobile', $is_mobile);
	return $is_mobile;
}

/*Social network icons*/
function alaya_social(){
  $social='<div class="social-icons clearfix">'.PHP_EOL;
 
  if(null!==alaya_opt('facebook') && alaya_opt('facebook')<>'')
	$social.='<a href="'.esc_url(alaya_opt('facebook')).'" title="Facebook" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a> '.PHP_EOL;
  if(null!==alaya_opt('twitter') && alaya_opt('twitter')<>'')
	$social.=' <a href="'.esc_url(alaya_opt('twitter')).'" title="Twitter" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a> '.PHP_EOL;
  if(null!==('googleplus') && alaya_opt('googleplus')<>'')
	$social.='<a href="'.esc_url(alaya_opt('googleplus')).'" title="Google+" class="gplus" target="_blank"><i class="fa fa-google-plus"></i></a> '.PHP_EOL;
    if(null!==alaya_opt('weibo') && alaya_opt('weibo')<>'')
	$social.='<a href="'.esc_url(alaya_opt('weibo')).'" title="Weibo" class="weibo" target="_blank"><i class="fa fa-weibo"></i></a> '.PHP_EOL;
  if(null!==alaya_opt('tumblr') && alaya_opt('tumblr')<>'')
	$social.='<a href="'.esc_url(alaya_opt('tumblr')).'" title="tumblr" class="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>  '.PHP_EOL;
  if(null!==alaya_opt('flickr') && alaya_opt('flickr')<>'')
	$social.='<a href="'.esc_url(alaya_opt('flickr')).'" title="Flickr" class="flickr" target="_blank"><i class="fa fa-flickr"></i></a> '.PHP_EOL;
  if(null!==alaya_opt('instagram') && alaya_opt('instagram')<>'')
	$social.='<a href="'.esc_url(alaya_opt('instagram')).'" title="instagram" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a> '.PHP_EOL;
  if(null!==('deviantart') && alaya_opt('deviantart')<>'')
	$social.='<a href="'.esc_url(alaya_opt('deviantart')).'" title="Deviantart" class="deviantart" target="_blank"><i class="fa fa-deviantart"></i></a>'.PHP_EOL;
  if(null!==('behance') && alaya_opt('behance')<>'')
	$social.='<a href="'.esc_url(alaya_opt('behance')).'" title="Behance" class="behance" target="_blank"><i class="fa fa-behance"></i></a> '.PHP_EOL;
  if(null!==alaya_opt('dribbble') && alaya_opt('dribbble')<>'')
	$social.='<a href="'.esc_url(alaya_opt('dribbble')).'" title="Dribbble" class="dribbble" target="_blank"><i class="fa fa-dribbble"></i></a> '.PHP_EOL;
  if(null!==alaya_opt('pinterest') && alaya_opt('pinterest')<>'')
	$social.='<a href="'.esc_url(alaya_opt('pinterest')).'" title="Pinterest" class="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>'.PHP_EOL;
  if(null!==alaya_opt('youtube') && alaya_opt('youtube')<>'')
	$social.='<a href="'.esc_url(alaya_opt('youtube')).'" title="Youtube" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>'.PHP_EOL;
  if(null!==alaya_opt('vimeo') && alaya_opt('vimeo')<>'')
	$social.='<a href="'.esc_url(alaya_opt('vimeo')).'" title="Vimeo" class="vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a>'.PHP_EOL;
  if(null!==alaya_opt('linkedIn') && alaya_opt('linkedIn')<>'')
	$social.='<a href="'.esc_url(alaya_opt('linkedIn')).'" title="linkedIn" class="linkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>'.PHP_EOL;
  if(null!==alaya_opt('github') && alaya_opt('github')<>'')
	$social.='<a href="'.esc_url(alaya_opt('github')).'" title="Github" class="github" target="_blank"><i class="fa fa-github"></i></a>'.PHP_EOL;
  if(null!==alaya_opt('xing') && alaya_opt('xing')<>'')
	$social.='<a href="'.esc_url(alaya_opt('xing')).'" title="Xing" class="xing" target="_blank"><i class="fa fa-xing"></i></a>'.PHP_EOL;
  if(null!==alaya_opt('yelp') && alaya_opt('yelp')<>'')
	$social.='<a href="'.esc_url(alaya_opt('yelp')).'" title="yelp" class="yelp" target="_blank"><i class="fa fa-yelp"></i></a>'.PHP_EOL;
  if(null!==alaya_opt('vk') && alaya_opt('vk')<>'')
	$social.='<a href="'.esc_url(alaya_opt('vk')).'" title="vk" class="vk" target="_blank"><i class="fa fa-vk"></i></a> '.PHP_EOL;
  if(null!==alaya_opt('bloglovin') && alaya_opt('bloglovin')<>'')
	$social.='<a href="'.esc_url(alaya_opt('bloglovin')).'" title="bloglovin" class="bloglovin" target="_blank"><i class="fa fa-bloglovin"></i></a> '.PHP_EOL;
  if(null!==alaya_opt('rss') && alaya_opt('rss')<>'')
	$social.='<a href="'.esc_url(alaya_opt('rss')).'" title="Feed" class="feed" target="_blank"><i class="fa fa-rss"></i></a> '.PHP_EOL;
  $social.='</div>'.PHP_EOL;
  $social = apply_filters('alaya_social', $social);
  return $social;
} 

/*Filter shortcode*/
function alaya_shortcode($content){
   $content = apply_filters('alaya_shortcode', $content);
   return do_shortcode(strip_tags($content, "<h1><h2><h3><h4><h5><h6><a><img><embed><iframe><form><input><button><object><div><ul><li><ol><table><tbody><tr><td><th><span><p><br/><strong><em><del>"));
}

/*Filter string*/
function alaya_strip_tags($tagsArr,$str) {   
	foreach ($tagsArr as $tag) {  
		$p[]="/(<(?:\/".$tag."|".$tag.")[^>]*>)/i";  
	}  
	$return_str = preg_replace($p,"",$str);
	$return_str = apply_filters('alaya_strip_tags', $return_str);
	return $return_str;  
}  

/*Random string*/
function alaya_random_string($length, $max=FALSE){
  if (is_int($max) && $max > $length){
    $length = mt_rand($length, $max);
  }
  $output = '';
  
  for ($i=0; $i<$length; $i++){
    $which = mt_rand(0,2);
    
    if ($which === 0){
      $output .= mt_rand(0,9);
    }
    elseif ($which === 1){
      $output .= chr(mt_rand(65,90));
    }else{
      $output .= chr(mt_rand(97,122));
    }
  }
  $output = apply_filters('alaya_random_string', $output);
  return $output;
  
}

/*Color code convert to rgba*/
function alaya_color_hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
		$output = apply_filters('alaya_color_hex2rgba', $output);
        return $output;
}

function alaya_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments','alaya' );
    if ( false === $one ) $one = __( '1 Comment' ,'alaya');
    if ( false === $more ) $more = __( '% Comments' ,'alaya');
    if ( false === $none ) $none = __( 'Comments Off' ,'alaya');
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = __('Enter your password to view comments.','alaya');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = esc_url(home_url('/'));
        else
            $home = esc_url(get_option('siteurl'));
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s','alaya'), $title ) ) . '">';
    $str .= alaya_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
	$str = apply_filters('alaya_comments_popup_link', $str);
    return $str;
}

function alaya_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments','alaya') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __('No Comments','alaya') : $zero;
    else // must be one
        $output = ( false === $one ) ? __('1 Comment','alaya') : $one;
 
    return apply_filters('comments_number', $output, $number);
}

/*Strip Out the marks*/
function alaya_filter_mark($text){ 
	if(trim($text)=='')return ''; 
	$text=preg_replace("/[[:punct:]\s]/",' ',$text); 
	$text=urlencode($text); 
	$text=preg_replace("/(%7E|%60|%21|%40|%23|%24|%25|%5E|%26|%27|%2A|%28|%29|%2B|%7C|%5C|%3D|\-|_|%5B|%5D|%7D|%7B|%3B|%22|%3A|%3F|%3E|%3C|%2C|\.|%2F|%A3%BF|%A1%B7|%A1%B6|%A1%A2|%A1%A3|%A3%AC|%7D|%A1%B0|%A3%BA|%A3%BB|%A1%AE|%A1%AF|%A1%B1|%A3%FC|%A3%BD|%A1%AA|%A3%A9|%A3%A8|%A1%AD|%A3%A4|%A1%A4|%A3%A1|%E3%80%82|%EF%BC%81|%EF%BC%8C|%EF%BC%9B|%EF%BC%9F|%EF%BC%9A|%E3%80%81|%E2%80%A6%E2%80%A6|%E2%80%9D|%E2%80%9C|%E2%80%98|%E2%80%99|%EF%BD%9E|%EF%BC%8E|%EF%BC%88)+/",' ',$text); 
	$text=urldecode($text); 
	return trim($text); 
} 
?>