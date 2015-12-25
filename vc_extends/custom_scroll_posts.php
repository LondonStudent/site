<?php
vc_map( array(
   "name" => __("CityNews Scroll Posts","alaya"),
   "base" => "alaya_scroll_posts",
   "class" => "wpb_alaya_scroll_post",
   "icon" =>"icon-wpb-alaya_scroll_post",
   "category" => __('CityNews',"alaya"),
   'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extends/vc_extends.js'),
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extends/vc_extends.css'),
   'custom_markup'=>'',
   "params" => array(
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_scroll_post_title",
         "heading" => __("Section Heading","alaya"),
         "param_name" => "title",
         "value" =>  'The Latest Posts'
      ),
	 
	 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_scroll_post_number",
         "heading" => __("Number of posts to show","alaya"),
         "param_name" => "number",
         "value" =>  6,
         "description" => __('Number of posts you want to display.','alaya')
      ),
      
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_scroll_post_header",
         "heading" => __("Header Style","alaya"),
         "param_name" => "header",
         "value" =>  array('horizontal','vertical'),
         "description" => __('Choose the header style for the scroll posts section.','alaya')
      ),
      
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_scroll_post_columns",
         "heading" => __("Columns","alaya"),
         "param_name" => "columns",
         "value" =>  array('1','2','3','4','5'),
         "description" => __('Number of posts per slide','alaya')
      ),
      
       array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_scroll_post_only_sticky",
         "heading" => __("Only Sticky Posts?","alaya"),
         "param_name" => "only_sticky",
         "value" =>  array('no','yes'),
         "description" => __('Only show the sticky posts in the post slider.','alaya')
      ),
      	  
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_scroll_post_categories",
         "heading" => __("From which categories?","alaya"),
         "param_name" => "category_name",
         "value" => '',
         "description" => __('If you leave it empty, it will display the posts from all categories, Please note, you should add category slug here, please separate multiple category slugs with English commas,for example: slug-1,slug-2 ',"CityNews")
      ),
	  
   )
) );


/*Scrolling posts*/
if( !function_exists( 'alaya_scrolling_posts') ){
	function alaya_scrolling_posts($title='The Latest Posts',$columns=3,$header="horizontal",$number=6,$category_slug='',$only_sticky){
	    global $post,$more;
		$tmp_post = $post;
		$tmp_more = $more;
		
		$args = array( 
			'numberposts' => $number, 
			'orderby' => 'post_date',
			'order'=>'DESC',
		);
		
		if($category_slug<>''){
		  $category_array=explode(',',$category_slug);
		  $args = array( 
			'numberposts' => $number, 
			'orderby' => 'post_date',
			'order'=>'DESC',
			'tax_query' => array(
				array(
				  'taxonomy' => 'category',
				  'field' => 'slug',
				  'terms' => $category_array,
				  'include_children' => false
				)
			  ));
		}
		
		if($only_sticky=='yes'){
		  $sticky = get_option( 'sticky_posts' );
		  $args['post__in']=$sticky;
		  $args['ignore_sticky_posts']=false;
		}
		
		$posts = get_posts($args);
		$i=0;
		$section_id='scrolling_posts_'.alaya_random_string(6,false);
		$post_slide='<section id="'.$section_id.'" class="scrolling_posts flexslider">'.PHP_EOL;
		$post_slide.='<header class="'.$header.'">
		              <h5 class="archive_title"><span>'.esc_attr($title).'</span></h5>'.PHP_EOL;
		if($number>3 && count($posts)>3){
		  $post_slide.='<div class="controlNav"><a href="javascript:void(0);" id="prev_'.$section_id.'" class="prev"><i class="fa fa-chevron-left"></i></a> <a href="javascript:void(0);" class="next" id="next_'.$section_id.'"><i class="fa fa-chevron-right"></i></a></div>';
		}              
		$post_slide.='</header>'.PHP_EOL;
		$post_slide.='<ul class="slides columns'.$columns.'">'.PHP_EOL;
		if($i<>count($posts)){
	      $post_slide.='<li>'.PHP_EOL;
		}
		foreach($posts as $post){
		  setup_postdata($post);
		  $image_id = get_post_thumbnail_id($post->ID);
		  $thumbnail_url = wp_get_attachment_image_src($image_id, 'blog_thumbnail', true);
		  $more = 0;
		  $url=get_permalink($post->ID);
		  $title=$post->post_title;
          
		  $post_slide.='<div class="blog-post post">';
		  if(has_post_thumbnail()){
              $post_slide.='<div class="thumbnail"><a href="'.$url.'" title="'.$title.'"><img src="'.$thumbnail_url[0].'" class="featured_image" alt="'.$title.'" /></a></div>';
		  }
		  $post_slide.='<span>'.get_the_category_list( ', ' ).'</span>';
          $post_slide.= '<h4><a href="'.$url.'" title="'.$title.'">'.$title.'</a></h4>';
          $post_slide.= '<p>'.alaya_truncate(get_the_excerpt(),150).'</p>';		
          $post_slide.= '</div>'.PHP_EOL;
			
		    $i++;		 
		    if($i%$columns==0){
			  $post_slide.='</li>'.PHP_EOL;
			  if($i<>count($posts)){
			   $post_slide.='<li>'.PHP_EOL;
			  }
			}
			
		 }
		 $post_slide.='</ul><div class="clearfix"></div>';
		 $post_slide.='<div class="'.$section_id.'_alaya_loader alaya_loader" style="top:50%;left:47%;"><i class="fa fa-spinner fa-spin"></i></div>'.PHP_EOL;
		$post_slide.='</section>';
		
		$post_slide.="<script type='text/javascript'>
		jQuery(document).ready(function($){
			/*Scrolling Posts*/
			$(window).load(function(){
				$('#".$section_id."').flexslider({
				   slideshow:true,
				   video: true,
				   keyboard: true,
				   animation: 'slide',
				   directionNav: false, 
				   controlNav:false,
				   smoothHeight:false,
				   mousewheel: false, 
				   multipleKeyboard: true,    
				   animationLoop: false, 
				   pauseOnHover:true,
				   slideshowSpeed: 20000,
				   prevText:'',
				   nextText:'',
				   start:function(){
					  $('.".$section_id."_alaya_loader').hide();
					  $('#".$section_id." .thumbnail').each(function(){
						 var overlay_width,overlay_height,marginTop,marginLeft;
					     var wrapper_width=$(this).width();var wrapper_height=$(this).height(); 
						 if($(this).children('img').height()<wrapper_height){
						   $(window).load(function(){
							wrapper_height=$(this).children('img').height();
						    if(wrapper_height==0){
							    wrapper_height=200;
						    }
							$(this).css('height',wrapper_height);
						   })					   
						 }	 
						 if($(window).width()>800){
					       overlay_width=wrapper_width-20;
						   overlay_height=wrapper_height-20;
						 }else{
						   overlay_width=wrapper_width;
						   overlay_height=wrapper_height;
						 }
						   marginTop=overlay_height/2;
						   marginLeft=overlay_width/2;
					     $(this).children('.overlay').css({
						   width:overlay_width+'px',
						   height:overlay_height+'px',
						   marginTop:'-'+marginTop+'px',
						   marginLeft:'-'+marginLeft+'px'
					     });
						 $(this).children('.overlay').children('i').css({
						   width:'20px',
						   height:'20px',
						   display:'block',
						   left:'50%',
						   top:'50%',
						   position:'absolute',
						   marginTop:'-10px',
						   marginLeft:'-10px'
					     });
					 });
				   }
			     });
			 });
			 $('#prev_".$section_id.", #next_".$section_id."').on('click', function(){
			    var action = $(this).attr('class');
			    $('#".$section_id."').flexslider(action);
			    return false;
		    });
	    });
	     </script>";
		
		$post = $tmp_post;
		$more = $tmp_more;
	    return $post_slide;
	}
}

add_shortcode('alaya_scroll_posts', 'alaya_scroll_posts_shortcode');
function alaya_scroll_posts_shortcode( $atts, $content = "" ) {
   extract(shortcode_atts(array(
        'title'=>'The Latest Posts',
		'header' => 'horizontal',
		'number' => '6',
		'category_name' => '',
		'columns' => 3,
		'only_sticky' => 'yes'
   ), $atts));		
   
   $str=alaya_scrolling_posts($title,$columns,$header,$number,$category_name,$only_sticky);
   return $str;
}
?>