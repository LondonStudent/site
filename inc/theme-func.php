<?php
/** 
 * Theme Functions
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

/** 
 * Display default primary menu
 * @since  1.0
 */

if( !function_exists( 'alaya_default_menu') ){
	function alaya_default_menu() {
		$default_menu='';
		$pages = get_pages('number=6');
		$count = count($pages);
		for($i = 0; $i < $count; $i++)
		{
			$default_menu.= '<li><a href="' . esc_url(get_home_url('/')). '/' . esc_html($pages[$i]->post_name) . '">' . esc_html($pages[$i]->post_title) . '</a></li>' . PHP_EOL;
		}
		$return_html = apply_filters('alaya_default_menu', $default_menu);
	    echo $return_html;
	}
}

/*Share icons*/
function alaya_share($id){
	    $return_html=' <a href="https://www.facebook.com/sharer/sharer.php?u='.esc_url(get_the_permalink()).'" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
		        <a href="http://twitter.com/share?text='.urlencode(get_the_title()).'&amp;url='.esc_url(get_the_permalink()).'" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
		        <a href="https://plus.google.com/share?url='.esc_url(get_the_permalink()).'" target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a>
		        <a href="https://pinterest.com/pin/create/button/?media='.esc_url(wp_get_attachment_url( get_post_thumbnail_id($id))).'&amp;description='. urlencode(get_the_title()).'&amp;url='.urlencode(get_the_permalink()).'" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a>
		        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;title='. urlencode(get_the_title()).'&amp;source='.urlencode(get_permalink()).'&amp;url='. urlencode(get_permalink()).'" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
';
       $return_html = apply_filters('alaya_share', $return_html);
       return $return_html;
}

/*Format icons*/
if( !function_exists( 'alaya_format_icon') ){
  function alaya_format_icon(){
       $format_icon='';
	   if(has_post_format( 'audio' )){
		 $format_icon='<i class="fa fa-music"></i>';
	   }elseif(has_post_format( 'video' )){
		 $format_icon='<i class="fa fa-play"></i>';
	   }elseif(has_post_format( 'gallery' )){
		 $format_icon='<i class="fa fa-photo"></i>';
	   }elseif(has_post_format( 'quote' )){
	     $format_icon='<i class="fa fa-quote-right"></i>';
	   }elseif(has_post_format( 'chat' )){
	     $format_icon='<i class="fa fa-comments-o"></i>';
	   }
	   $format_icon = apply_filters('alaya_format_icon', $format_icon);
	   return $format_icon;
  }
}

/*Post format media*/
if( !function_exists( 'alaya_format_media') ){
  function alaya_format_media($thumbnail='yes',$title="yes",$thumbnail_size='large'){
    $post_media=vp_metabox('post_format_meta.embed_code');
    $post_media=str_replace('&','&amp;',$post_media);
	$return_html='';
	
	if(has_post_format( 'video' ) && $post_media<>''){
        $return_html.='<div class="thumbnail">'.$post_media.'</div>';
        if(alaya_opt('format_icon')==1){
          $return_html.='<div class="post_format_icon">'.alaya_format_icon().'</div>';
        }
    }elseif(has_post_format( 'audio' ) && $post_media<>''){
        $return_html.='<div class="thumbnail">'.$post_media.'</div>';
        if(alaya_opt('format_icon')==1){
          $return_html.='<div class="post_format_icon">'.alaya_format_icon().'</div>';
        }
    }elseif(has_post_format( 'gallery' )){
              if ( $images = get_children(array(
              'post_parent' => get_the_ID(),
              'post_type' => 'attachment',
              'numberposts' => 50,
              'order' => 'ASC',
              'orderby' => 'menu_order',
              'post_mime_type' => 'image',)))
              {
                  $slider_id=get_the_ID().'-'.alaya_random_string(6,false);
				  $return_html.='<div id="slider-'.esc_html($slider_id).'" class="flexslider post_slider no_height"><div id="loader-'.esc_html($slider_id).'" class="alaya_loader"><i class="fa fa-spinner fa-spin"></i></div><ul class="slides">';
              
                   foreach( $images as $image ) {
                      $attachmenturl=wp_get_attachment_url($image->ID);
                      $attachmentimage=wp_get_attachment_image($image->ID, 'large' );
                      $return_html.= '<li><a href="'.esc_url($attachmenturl).'" class="lightbox">'.$attachmentimage.'</a></li>';
                   }
                
                  $return_html.='</ul></div>';
                  if(alaya_opt('format_icon')==1){
                    $return_html.='<div class="post_format_icon">'.alaya_format_icon().'</div>';	
                  }			  
                  $return_html.='<script type="text/javascript">
				    jQuery(document).ready(function($){
				                $(window).load(function(){
									$("#slider-'.esc_html($slider_id).'").flexslider({
									   slideshow:true,
									   video: true,
									   keyboard: true,
									   animation: "slide",
									   controlNav:true,
									   smoothHeight:false,
									   multipleKeyboard: true,
									   prevText:"",
									   nextText:"",
									   start: function(slider) {
										    $.flexloader(slider);
										    $("#slider-'.esc_html($slider_id).'").removeClass("no_height");

									   },
									   after: function(slider) {
										    $.flexloader(slider);
									   }
								    });
									$("#loader-'.esc_html($slider_id).'").fadeOut();
								});
					});
						        </script>';
			  }
    }else{
	  if(has_post_thumbnail() && $thumbnail=='yes'){
         $return_html.='<div class="thumbnail"><a title="'.esc_html(get_the_title()).'" href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail(get_the_ID(),'large',array('class'=>'featured_image','alt'=>esc_html(get_the_title()))).'</a></div>';
      }
    }
	
	$return_html = apply_filters('alaya_format_media', $return_html);
	return $return_html;
  }
}

/*Mega Menu Walker*/
class alaya_mega_menu extends Walker_Nav_Menu {
		
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
	
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
	
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
        global $ti_option;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		
		if ( alaya_opt('mega_menu') == 1 ) {
			if ( $depth == 0 && 'category' == $item->object ){
				$item_output  .= '<div class="sub-menu mega-menu '.$item->custom.'">';
			}
		}
				
        $item_output .= $args->after;
		
		
		/* Add Mega menu only for: 
		 * Parent category if the option is enabled in Theme Options
		 */
		if ( alaya_opt('mega_menu') == 1 ) {

			if ( $depth == 0 && $item->object == 'category' ) {
				
				$item_output .= '<ul class="mega-menu-posts">';
								
					global $post;
					$menuposts = get_posts( array( 'posts_per_page' => 3, 'category' => $item->object_id ) );
					
					foreach( $menuposts as $post ):
					
						$post_title = esc_html(get_the_title());
						$post_link = esc_url(get_permalink());
						$post_image = wp_get_attachment_image_src( get_post_thumbnail_id(), "medium" );
						
						if ( $post_image != ''){
							$menu_post_image = '<img src="' . esc_url($post_image[0]). '" alt="' . $post_title . '" width="' . esc_html($post_image[1]). '" height="' . esc_html($post_image[2]). '" />';
						} else {
							$menu_post_image = __( 'No image','alaya');
						}
						
						$item_output .= '
								<li>
									<div class="thumbnail">
										<a href="'  .$post_link . '">' . $menu_post_image . '</a>
									</div>
									<h6><a href="' . $post_link . '">' . $post_title . '</a></h6>
								</li>';
						
					endforeach;

					wp_reset_postdata();
					
				$item_output .= '</ul>';
				
			}

		}
		
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
	
	
    function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
		global $ti_option;
		if ( alaya_opt('mega_menu') == 1) {	
			if ( $depth == 0 && 'category' == $item->object ){
				$output .= "</div>\n";
			}
		}
		
		$output .= "</li>\n";
    }
	
}

add_filter('nav_menu_item_id', 'alaya_css_attributes_filter', 100, 1);
function alaya_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

/*Remove the widgets from page builder*/
function alaya_remove_panels_widgets( $widgets ){
	unset($widgets['alaya_flickr']);
	return $widgets;
}
add_filter( 'siteorigin_panels_widgets', 'alaya_remove_panels_widgets', 11);


/*Ajaxify Comments*/
function ajaxify_comments_list($comment_ID, $comment_status) {
	global $post;
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        //If AJAX Request Then
        switch ($comment_status) {
            case '0':
                //notify moderator of unapproved comment
                wp_notify_moderator($comment_ID);
            case '1': //Approved comment
                echo "success";
                $commentdata = get_comment($comment_ID, ARRAY_A);
				//print_r( $commentdata);
              $permaurl = esc_url(get_permalink( $post->ID ));
              $url = str_replace('http://', '/', $permaurl);
			  
			  if($commentdata['comment_parent'] == 0){
				$output = '<li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1" id="comment-' . esc_url($commentdata['comment_ID']) . '">
				<div id="div-comment-' . esc_attr($commentdata['comment_ID']) . '" class="comment-body">
				<div class="comment-author vcard">'.
				 get_avatar($commentdata['comment_author_email'],80) 
					.'<cite class="fn">' . sanitize_text_field($commentdata['comment_author']) . '</cite> <span class="says">says:</span>
			   </div>
           

<div class="comment-meta commentmetadata">' .
	get_comment_date( 'F j, Y \a\t g:i a', esc_attr($commentdata['comment_ID'])) .'&nbsp;&nbsp;';
            if ( is_user_logged_in() ){
			 $output .=  '<a class="comment-edit-link" href="'. esc_url(home_url('/')) .'/wp-admin/comment.php?action=editcomment&amp;c='. esc_attr($commentdata['comment_ID']) .'">
			(Edit)</a>';
				}
		   $output .= '</div>
			        <p>' . esc_attr($commentdata['comment_content']) . '</p>           
					<div class="reply">
						<a class="comment-reply-link" href="'. esc_url($url) . '&amp;replytocom='. esc_attr($commentdata['comment_ID']) .'#respond" 
						onclick="return addComment.moveForm(&quot;div-comment-'. esc_attr($commentdata['comment_ID'])  .'&quot;, &quot;'. esc_attr($commentdata['comment_ID']) . '&quot;, &quot;respond&quot;, &quot;1&quot;)">Reply</a>
					</div>                   
				</div>
			 </li>' ;     
                          
               echo $output;
			   
			   }
			   else{			 
			 
			   $output = '<ul class="children"> <li class="comment byuser comment-author-admin bypostauthor even depth-2" id="comment-' . esc_attr($commentdata['comment_ID']) . '">
            <div id="div-comment-' . esc_url($commentdata['comment_ID']) . '" class="comment-body">
            <div class="comment-author vcard">'.
             get_avatar($commentdata['comment_author_email']) 
                .'<cite class="fn">' . esc_url($commentdata['comment_author']) . '</cite> <span class="says">says:</span>           </div>           

<div class="comment-meta commentmetadata"><a href="http://localhost/WordPress_Code/?p=1#comment-'. esc_attr($commentdata['comment_ID']).'">' .
	get_comment_date( 'F j, Y \a\t g:i a', esc_attr($commentdata['comment_ID'])) .'</a>&nbsp;&nbsp;';
            if ( is_user_logged_in() ){
         $output .=  '<a class="comment-edit-link" href="'. esc_url(home_url('/')) .'/wp-admin/comment.php?action=editcomment&amp;c='. esc_attr($commentdata['comment_ID']).'">
        (Edit)</a>';
            }
			
       $output .= '</div>
                <p>' . sanitize_text_field($commentdata['comment_content']) . '</p>           
				<div class="reply">
					<a class="comment-reply-link" href="'. esc_url($url) .'&amp;replytocom='. esc_attr($commentdata['comment_ID']).'#respond" 
					onclick="return addComment.moveForm(&quot;div-comment-'. esc_attr($commentdata['comment_ID']).'&quot;, &quot;'. esc_attr($commentdata['comment_ID']). '&quot;, &quot;respond&quot;, &quot;1&quot;)">Reply</a>
				</div>                   
            </div>
            </li></ul>' ; 

			echo $output;
			   }
				 
           $post = get_post($commentdata['comment_post_ID']);
                wp_notify_postauthor($comment_ID);
                break;
            default:
                echo "error";
        }
        exit;
    }
}

add_action('comment_post', 'ajaxify_comments_list', 25, 2);


/*Integration Head*/
add_action('wp_head', 'alaya_head');
function alaya_head(){
	alaya_custom_css();
	alaya_additional_code();
	if ( is_singular() && get_option('thread_comments'))wp_enqueue_script( 'comment-reply' );
}

/*Integration Footer*/
add_action('wp_footer', 'alaya_footer',22);
function alaya_footer(){
   alaya_footer_code();
}

/*Add Cunstom CSS*/
function alaya_custom_css() {
    $custom_css='';

	$custom_css_before='<style type="text/css">';
	$custom_css_after='</style>';
	
	$custom_css.=$custom_css_before.PHP_EOL;
	   
	if(null!==alaya_opt('css_code') && alaya_opt('css_code') <> ""){  
	$custom_css.= '/*Custom CSS*/'.PHP_EOL;
	$custom_css.= stripslashes(esc_attr(alaya_opt('css_code'))).PHP_EOL; 
    }
	$custom_css.=$custom_css_after.PHP_EOL;
	
    $custom_css = apply_filters('alaya_custom_css', $custom_css);
    echo $custom_css;
}

/*Add additional codes to head*/
function alaya_additional_code() {
   if(null!==alaya_opt('header_code')&&alaya_opt('header_code') <> ""){  
     echo stripslashes(alaya_opt('header_code')).PHP_EOL;  
   }
}

/*Add additional/js codes to footer*/
function alaya_footer_code() {
   if(null!==alaya_opt('javascript_code')&&alaya_opt('javascript_code') <> ""){  
     echo '<script type="text/javascript">'.PHP_EOL;
	 echo '//Custom javascript'.PHP_EOL;
     echo stripslashes(esc_js(alaya_opt('javascript_code'))).PHP_EOL;  
	 echo '</script>'.PHP_EOL;
   }
   if(null!==alaya_opt('footer_code')&&alaya_opt('footer_code') <> ""){  
     echo stripslashes(alaya_opt('footer_code')); 
   } 
}

/*Automatically get the first picture to be the featured image */
function alaya_auto_featured_image() { 
  global $post;  
  if(!is_admin()){
	  if (!has_post_thumbnail($post->ID)) { 
	    $attached_image = get_children( 'post_parent='.$post->ID.'&post_type=attachment&post_mime_type=image&numberposts=1' );  
	    if ($attached_image) { 
	      foreach ($attached_image as $attachment_id => $attachment){ 
	        set_post_thumbnail($post->ID, $attachment_id); 
	    } 
	   } 
	  } 
  }
} 
add_action('the_post', 'alaya_auto_featured_image'); 
add_action('save_post', 'alaya_auto_featured_image'); 
add_action('draft_to_publish', 'alaya_auto_featured_image'); 
add_action('new_to_publish', 'alaya_auto_featured_image'); 
add_action('pending_to_publish', 'alaya_auto_featured_image'); 
add_action('future_to_publish', 'alaya_auto_featured_image');
?>