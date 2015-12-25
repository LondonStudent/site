<?php
/**
 * Add Custom field in page
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

return array(
	'id'          => 'contact_meta',
	'types'       => array('page'),
	'title'       => __('contact Page Settings', 'alaya'),
	'priority'    => 'high',
	'template'    => array(
		array(
			'type'      => 'group',
			'repeating' => false,
			'name'      => 'contact_info',
			'title'     => __('Contact Information', 'alaya'),
			'fields'    => array(
			    array(
					'type' => 'textbox',
					'name' => 'contact_subheading',
					'label' => __('Subheading', 'alaya'),
				),
				array(
					'type' => 'textbox',
					'name' => 'contact_address',
					'label' => __('Contact Address', 'alaya'),
				),
				array(
					'type' => 'textbox',
					'name' => 'contact_email',
					'label' => __('Contact Email', 'alaya'),
				),
				array(
					'type' => 'textbox',
					'name' => 'contact_phone',
					'label' => __('Contact Phone', 'alaya'),
				),
				array(
					'type' => 'textarea',
					'name' => 'contact_map',
					'label' => __('Google Map', 'alaya'),
					'description' => __('You can get the google embed code from http://map.google.com or create a styling map on https://mapbuildr.com', 'alaya'),
				),
			),
		),
		
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'name'      => 'contact_form',
			'title'     => __('Contact Form Setting', 'alaya'),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'receive_email',
					'label' => __('Receiver Email Address', 'alaya'),
					'description' => __('The default contact form receiver\'s Email', 'alaya'),
					'default'=> get_option('admin_email')
				),
				array(
					'type' => 'textbox',
					'name' => 'contact_form_7',
					'label' => __('Contact Form 7 Shortcode', 'alaya'),
					'description' => __('You can use contact form 7 plugin to generate a custom form to instead of the default form.', 'alaya'),
				),
			),
		),

		
	),
);
?>