<?php
/**
 * Single Post
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
 
   get_header();
   set_query_var( 'single_thumbnail',vp_metabox('post_template_meta.single_thumbnail'));
   $post_template='no-sidebar';
   if(!null==vp_metabox('post_template_meta.post_template') && vp_metabox('post_template_meta.post_template')<>''){
       $post_template=vp_metabox('post_template_meta.post_template');
   }
   get_template_part('_post',esc_attr($post_template)); 
  
   
   get_template_part('tpl/tpl','bottom');       
   get_footer();
?>