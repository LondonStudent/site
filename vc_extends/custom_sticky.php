<?php
vc_map( array(
   "name" => __("CityNews Sticky Posts","alaya"),
   "base" => "alaya_sticky_posts",
   "class" => "wpb_alaya_sticky",
   "icon" =>"icon-wpb-alaya_sticky",
   "category" => __('CityNews',"alaya"),
   'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extends/vc_extends.js'),
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extends/vc_extends.css'),
   'custom_markup'=>'',
   "params" => array(
	 
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_sticky_number",
         "heading" => __("Number Of Sticky Posts","alaya"),
         "param_name" => "post_number",
         "value" => '1',
      ),
      
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_sticky_template",
         "heading" => __("Sticky Posts Template","alaya"),
         "param_name" => "template",
         "value" =>  array('standard','masonry','list'),
         "description" => __('Choose the template for the blog posts.','alaya')
      ),
      
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_sticky_columns",
         "heading" => __("Masonry Columns","alaya"),
         "param_name" => "columns",
         "value" =>  array('3','2'),
         "description" => __('This option is only effect on the masonry template.','alaya')
      ),
      	  
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_sticky_categories",
         "heading" => __("From which categories?","alaya"),
         "param_name" => "category_name",
         "value" => '',
         "description" => __('If you leave it empty, it will display the posts from all categories, Please note, you should add category slug here, please separate multiple category slugs with English commas,for example: slug-1,slug-2 ',"CityNews")
      ),
	  
   )
) );


/*Blog loop*/
add_shortcode( 'alaya_sticky_posts', 'alaya_sticky_posts' );
function alaya_sticky_posts( $atts )
{
	
	static $alaya_custom_loop;
	if( !isset($alaya_custom_loop) )
		$alaya_custom_loop = 1;
	else
		$alaya_custom_loop ++;

	$atts = shortcode_atts( array(
		'post_type' 		=> 'post',
		'post_number' 	    => 2,
		'post_status' 		=> 'publish',
		'category_name'     => '',
		'columns'           => 3,
		'template'          => 'standard'
	), $atts );

	  
    $template = $atts['template'];
	unset( $atts['template'] );
	
	$post_number = $atts['post_number'];
	unset( $atts['post_number'] );		
	  
    $columns = $atts['columns'];
	unset( $atts['columns'] );
	
	$sticky = get_option( 'sticky_posts' );
	//$sticky = array_slice( $sticky, 0, $post_number );
    if($sticky){
	  $atts['post__in']=$sticky;
	  $atts['ignore_sticky_posts']=1;
	  $atts['showposts']=$post_number;
	}

	$custom_query = new WP_Query( $atts );
    
    $wrapper="";
    $post_class_ex="";
	
    if($template=='standard' || $template=='list'){
	    $wrapper='<div class="standard_blog">';
    }elseif($template=='masonry'){
       if($columns==3){
	      $wrapper='<div class="masonry_blog">';
	      $post_class_ex=' three_columns';
	   }elseif($columns==2){
		  $wrapper='<div class="masonry_blog_2">';
		  $post_class_ex=' two_columns';
	   }
    }
    

	if( $custom_query->have_posts() ):
		$html = $wrapper;
	    while( $custom_query->have_posts()) : $custom_query->the_post(); 
		    
			$thumbnail='';
			$excerpt=get_the_excerpt();
			
			$more='<a class="morelink" href="'.esc_url(get_permalink()).'">'.__('Continue to read','alaya').' <i class="fa fa-long-arrow-right"></i></a>';
			 
			$post_icon='<a class="overlay" href="'.esc_url(get_permalink()).'">'.alaya_format_icon().'</a>';
			
			if(has_post_format()==0){
				$post_icon='';
			}
			  
			if(has_post_thumbnail()){
			  $thumbnail='<div class="thumbnail">'.$post_icon.'
		    <a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail(get_the_ID(),'large').'</a></div>';
			}else{
			  $thumbnail='<div class="post_format_icon">'.alaya_format_icon().'</div>';
			}
			
						
			if($template=='list'){
		        $post_class_ex=' thumbnail_s';
		        $excerpt=alaya_truncate(get_the_excerpt(),150);
		    }
			
			$html .= sprintf( 
				'<article class="post'.esc_attr($post_class_ex).'">
				   %4$s  
				   <div class="entry-body">
				   	 <span class="category">%5$s</span>
				     <h4 class="entry-title"><a href="%1$s" title="%2$s">%2$s</a></h4>
				     <span class="title-divider"></span>
				     <div class="entry-content">%3$s</div>
				   
				   <footer class="entry-tools">
					    <span>%7$s</span>
					    %6$s
				   </footer>
				   </div>
				   <div class="clear"></div>
				  </article>',
				get_permalink(),
				get_the_title(),
				$excerpt,
				$thumbnail,
				get_the_category_list( ', ' ),
				$more,
				get_the_time(get_option('date_format'))
			);
	    endwhile;
		   
	   $html.='</div>';
	   
			
	endif;

	return $html;
}
?>