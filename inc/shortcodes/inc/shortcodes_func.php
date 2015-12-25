<?php
/**
 * Shortcodes functions
 * @package Alaya_framework
 * @since 1.0
 */

/*Filter shortcode*/
function alaya_shortcode_filter($content){
   $content = apply_filters('alaya_shortcode_filter', $content);
   return do_shortcode(strip_tags($content, "<h1><h2><h3><h4><h5><h6><a><img><embed><iframe><form><input><button><object><div><ul><li><ol><table><td><th><span><p><br/><strong><em><del><hr/>"));
}