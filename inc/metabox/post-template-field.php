<?php
/**
 * Add Post Template field field in Post
 * @package Alaya_framework
 * @subpackage City News 
 * @since 1.0
 */

return array(
	'id'          => 'post_template_meta',
	'types'       => array('post'),
	'title'       => __('Post Template Setting', 'alaya'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(
        array(
			'type' => 'select',
			'name' => 'post_template',
			'label' => __('Post Template', 'alaya'),
			'description' => __('Select a template for the single post.', 'alaya'),
			'items' => array(
	            array(
	                'value' => 'no-sidebar',
	                'label' => __('No Sidebar', 'alaya'),
	            ),
	            array(
	                'value' => 'with-sidebar',
	                'label' => __('With Sidebar', 'alaya'),
	            ),
	        ),
	        'default' => array(
	            'no-sidebar',
	        ),
		),
		 array(
			'type' => 'select',
			'name' => 'single_thumbnail',
			'label' => __('Display the Featured Image in the Single Post', 'alaya'),
	        'items' => array(
	            array(
	                'value' => 'no',
	                'label' => __('No', 'alaya'),
	            ),
	            array(
	                'value' => 'yes',
	                'label' => __('Yes', 'alaya'),
	            ),
	        ),
	        'default' => array(
	            'no',
	        ),
		)
		
	),
);
?>