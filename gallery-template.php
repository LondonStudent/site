<?php
/**
 * Template Name: Gallery Page
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
 
   get_header();
   
   if(alaya_opt('header_style')==2){
	   while ( have_posts() ) : the_post();
	     get_template_part('tpl/tpl','page-title');
	   endwhile;
   }
   get_template_part('tpl/tpl','gallery'); 
   get_template_part('tpl/tpl','bottom');       
   get_footer();
?>