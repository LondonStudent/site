<?php
/**
 * Default Homepage
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

   get_header();
   get_template_part('_archive',esc_attr(alaya_opt('default_home_template'))); 
   get_template_part('tpl/tpl','bottom');   
   get_footer();
?>