<?php
/**
 * Widgets Functions
 * @package Alaya Framework
 * @subpackage City News
 * @since 1.0
 */

/*Recent Posts Widget*/
if( !function_exists( 'alaya_post_list') ){
	function alaya_post_list($number=5,$thumbnail='yes',$category_slug=''){
	    global $post;
		$tmp_post = $post;
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
		}else{
		  $args = array(
			'numberposts' => $number,
			'orderby' => 'post_date',
			'order'=>'DESC'
		  );
		}
		$posts = get_posts($args);
		$date='';
		$post_list='';
		$post_list.='<ul class="post_list">';
		foreach($posts as $post){
		    setup_postdata($post);
			$url=get_permalink($post->ID);
			$title=$post->post_title;

			$post_list.='<li class="post-list-'.$post->ID.'">';
			if($thumbnail=='yes'){
				if(has_post_thumbnail($post->ID)){
					  $image_id = get_post_thumbnail_id($post->ID);
					  $thumbnail_url = wp_get_attachment_image_src($image_id, 'thumbnail', true);
					  $post_list.='<a href="'.esc_url($url).'" class="thumbnail"><img src="'.esc_url($thumbnail_url[0]).'" alt="'.esc_attr($title).'" /></a>';
				}
			$date='<p>'.get_the_time(get_option('date_format')).'</p>';
			}
			$post_list.='<a href="'.esc_url($url).'" class="post_title">'.esc_attr(alaya_truncate($title,45)).'</a>';
			$post_list.=$date;
			$post_list.='<div class="clear"></div></li>';
		 }
		$post_list.='</ul>';
		$post = $tmp_post;
	    return $post_list;
	}
}

/*Recent Comment With Avatar*/
function alaya_recent_comment($number){
    $commentNum = 1;

    // Get the comments
	$recent_comments = get_comments( array(
	  'number' => $number,
	  'status' => 'approve',
	  'type' => 'comment'
	) );
	$commentList='<ul>';
		foreach ($recent_comments as $comment){
		$commentList.='<li>
	             <header class="clearfix">
	                	<figure>
	                        <a href="'.get_permalink( $comment->comment_post_ID ).'">
	                            '.get_avatar( $comment->comment_author_email, '40' ).'
	                        </a>
	                        <span class="comment-author-name">
	                        '.$comment->comment_author.'
	                        </span>
	                        <div class="comment-order">'.$commentNum.'</div>
	                    </figure>

	                    <a class="comment-post" href="'.esc_url(get_permalink( $comment->comment_post_ID )).'#comment-'.esc_attr($comment->comment_ID).'">
	                       '.esc_attr(get_the_title( $comment->comment_post_ID )).'
	                    </a>
	                </header>

	                <div class="comment-text">
	                    <div class="up-arrow"></div>
	                	'.wp_trim_words( $comment->comment_content, 30 ).'
	                </div>
				</li>';
		$commentNum++;
		}

		$commentList.='</ul>';

		return $commentList;
}
?>
