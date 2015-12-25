<?php
/**
 * Archive Page
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

   get_header();
   
   $cat_id = get_query_var('cat');
   $cat_data = get_option("taxonomy_$cat_id");
   $cat_template=$cat_data['template'];
   $cat_slider=$cat_data['slider'];
   $cat_slider_post_number=$cat_data['slider_post_number'];
   $cat_slider_posts_per_slide=$cat_data['slider_posts_per_slide'];
   $cat_slider_effect=$cat_data['slider_effect'];
   

   set_query_var( 'enable_slider', $cat_slider);
   set_query_var( 'posts_number', $cat_slider_post_number);
   set_query_var( 'posts_per_slide', $cat_slider_posts_per_slide);
   set_query_var( 'slide_effect', $cat_slider_effect);
   set_query_var( 'cat_id', $cat_id);
   get_template_part( 'tpl/tpl', 'page-title');
   
   if($cat_template==''){
	   $cat_template='standard';
   }
   get_template_part('_archive',esc_attr($cat_template)); 
   get_template_part('tpl/tpl','bottom');       
   get_footer();
?>