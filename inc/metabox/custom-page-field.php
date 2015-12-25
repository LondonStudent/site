<?php
/**
 * Add Custom field in custom page template
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

return array(
	'id'          => 'custom_page_meta',
	'types'       => array('page'),
	'title'       => __('Custom Page Settings', 'alaya'),
	'priority'    => 'high',
	'template'    => array(
			
		array(
			'type'      => 'group',
			'repeating' => false,
			'name'      => 'content',
			'title'     => __('Slider Setting', 'alaya'),
			'fields'    => array(
				array(
					'type' => 'toggle',
					'name' => 'enable_slider',
					'label' => __('Enable Slider', 'alaya'),
					'description' => __('Show a fullwidth post slider under the navigation bar.', 'alaya'),
					'default' => '0'
				),
				
				array(
					'type' => 'textbox',
					'name' => 'posts_number',
					'label' => __('Posts Number', 'alaya'),
					'description' => __('The total number of posts in the slider.', 'alaya'),
					'default' => '6'
				),
				
				array(
					'type' => 'textbox',
					'name' => 'posts_per_slide',
					'label' => __('Posts per Slide', 'alaya'),
					'description' => __('The number of posts in a slide.', 'alaya'),
					'default' => '3'
				),
				
				array(
					'type' => 'textbox',
					'name' => 'slider_cat',
					'label' => __('The Category of Slider Posts', 'alaya'),
					'description' => __('If you leave it empty, the posts will from all categories.', 'alaya'),
					'default' => ''
				),
				
				array(
					'type' => 'select',
					'name' => 'slide_effect',
					'label' => __('Slide Effect', 'alaya'),
					'items' => array(
			            array(
			                'value' => 'slide',
			                'label' => __('Slide', 'alaya'),
			            ),
			            array(
			                'value' => 'fade',
			                'label' => __('Fade', 'alaya'),
			            ),
			            array(
			                'value' => 'cube',
			                'label' => __('3D Cube', 'alaya'),
			            ),
			            array(
			                'value' => 'coverflow',
			                'label' => __('3D Coverflow', 'alaya'),
			            ),
			        ),
			        'default' => array(
			            'slide',
			        ),
			        
				),
			),
		),

		
	),
);
?>