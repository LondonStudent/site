<?php
/**
 * Tag Page
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

   get_header();

   set_query_var( 'header_image', '');
   set_query_var( 'slider_shortcode', '');
   get_template_part( 'tpl/tpl', 'page-title');
   get_template_part('_archive','masonry-sidebar'); 
   get_template_part('tpl/tpl','bottom');       
   get_footer();
?>