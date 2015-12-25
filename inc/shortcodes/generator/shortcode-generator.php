<?php
/**
 * Shortcodes generator module
 * @package Alaya_framework
 * @since 1.0
 */


/* ---------------------------------------------- */

	function alayashortcodes_register( $plugin_array )
	{
		$url =  get_template_directory_uri().'/inc/shortcodes/generator/shortcode-generator.js';
	 
		$plugin_array['alayashortcodes'] = $url;
		
		return $plugin_array;
	}
	
	function alayashortcodes_add_button( $buttons )
	{
		array_push( $buttons, 'separator', 'alayashortcodes' );
		
		return $buttons;
	}

/* ---------------------------------------------- */
	
	add_filter( 'mce_external_plugins', 'alayashortcodes_register' );
	add_filter( 'mce_buttons', 'alayashortcodes_add_button', 0 );

/* --------------------------------------------- */

?>