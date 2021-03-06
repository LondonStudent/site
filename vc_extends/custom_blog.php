<?php
vc_map( array(
   "name" => __("CityNews Blog Posts","alaya"),
   "base" => "alaya_post_loop",
   "class" => "wpb_alaya_blog",
   "icon" =>"icon-wpb-alaya_blog",
   "category" => __('CityNews',"alaya"),
   'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extends/vc_extends.js'),
   'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extends/vc_extends.css'),
   'custom_markup'=>'',
   "params" => array(

      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_blog_number",
         "heading" => __("Number of posts to show","alaya"),
         "param_name" => "posts_per_page",
         "value" =>  5,
         "description" => __('Number of posts you want to display.','alaya')
      ),

      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_blog_template",
         "heading" => __("Blog Template","alaya"),
         "param_name" => "template",
         "value" =>  array('standard','masonry','list'),
         "description" => __('Choose the template for the blog posts.','alaya')
      ),

      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_blog_columns",
         "heading" => __("Masonry Columns","alaya"),
         "param_name" => "columns",
         "value" =>  array('3','2'),
         "description" => __('This option is only effect on the masonry template.','alaya')
      ),

      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_blog_hide_sticky_posts",
         "heading" => __("Hide Sticky Posts","alaya"),
         "param_name" => "hide_sticky_posts",
         "value" =>  array('no','yes'),
         "description" => __('If you do not want to display the sticky posts, please select yes.','alaya')
      ),

      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_blog_pagination",
         "heading" => __("Show Pagination","alaya"),
         "param_name" => "pagination",
         "value" =>  array('yes','no')
      ),

      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "wpb_alaya_blog_orderby",
         "heading" => __("Order By","alaya"),
         "param_name" => "orderby",
         "value" =>  array('date','comment_count','rand'),
         "description" => __('Note, rand is means random.','alaya')
      ),

	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "wpb_alaya_blog_categories",
         "heading" => __("From which categories?","alaya"),
         "param_name" => "category_name",
         "value" => '',
         "description" => __('If you leave it empty, it will display the posts from all categories, Please note, you should add category slug here, please separate multiple category slugs with English commas,for example: slug-1,slug-2 ',"CityNews")
      ),

   )
) );


/*Blog loop*/
add_shortcode( 'alaya_post_loop', 'alaya_post_loop' );
function alaya_post_loop( $atts )
{

	static $alaya_custom_loop;
	if( !isset($alaya_custom_loop) )
		$alaya_custom_loop = 1;
	else
		$alaya_custom_loop ++;

    $sticky = get_option( 'sticky_posts' );

	$atts = shortcode_atts( array(
		'paging'		=> 'paginate'. $alaya_custom_loop,
		'post_type' 		=> 'post',
		'posts_per_page' 	=> '10',
		'post_status' 		=> 'publish',
		'category_name'     => '',
		'columns'           => 3,
		'template'          => 'standard',
		'hide_sticky_posts' => 'no',
		'pagination' => 'no',
		'orderby' => 'date'
	), $atts );

	$paging = $atts['paging'];
	unset( $atts['paging'] );

	$hide_sticky_posts = $atts['hide_sticky_posts'];
	unset( $atts['hide_sticky_posts'] );

	$pagination = $atts['pagination'];
	unset( $atts['pagination'] );

    $template = $atts['template'];
	unset( $atts['template'] );

    $columns = $atts['columns'];
	unset( $atts['columns'] );

	if( isset($_GET[$paging]) )
		$atts['paged'] = $_GET[$paging];
	else
		$atts['paged'] = 1;

	if($hide_sticky_posts=='yes'){
		$atts['post__not_in']=$sticky;
		$atts['ignore_sticky_posts']=1;
	}else{
		$atts['ignore_sticky_posts']=false;
	}

	$custom_query = new WP_Query( $atts );

	$pagination_base = add_query_arg( $paging, '%#%');

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

	   if($pagination=='yes'):
			$html .= '<div class="alaya_pagenavi">';
			$html .= paginate_links( array(
				'type' 		=> '',
				'base' 		=> $pagination_base,
				'format' 	=> '?'. $paging .'=%#%',
				'current' 	=> max( 1, $custom_query->get('paged') ),
				'total' 	=> $custom_query->max_num_pages
			));
			$html.='</div>';
		endif;

	endif;

	return $html;
}
?>
