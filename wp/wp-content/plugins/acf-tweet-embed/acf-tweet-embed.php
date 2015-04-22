<?php

/*
Plugin Name: Advanced Custom Fields: Tweet embed
Plugin URI: http://github.com/mcky/acf-tweet-embed
Description: Allows easy embedding of tweets
Version: 0.0.1
Author: Ross Mackay
Author URI: http://rossmackay.co
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/




// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf-tweet', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );




// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_tweet( $version ) {

	include_once('acf-tweet-v5.php');

}

add_action('acf/include_field_types', 'include_field_types_tweet');




// 3. Include field type for ACF4
function register_fields_tweet() {

	include_once('acf-tweet-v4.php');

}

add_action('acf/register_fields', 'register_fields_tweet');




?>
