<?php
/**
 * Template Name: Contact Page
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

   get_header();
   while ( have_posts() ) : the_post();
   get_template_part('tpl/tpl','map'); 
   endwhile;
   get_template_part('tpl/tpl','bottom');       
   get_footer();
?>