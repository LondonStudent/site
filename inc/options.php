<?php
/**
 * Common Functions Library
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

return array(
	'title' => __('Miao Option Panel', 'alaya'),
	'logo' => 'http://www.themevan.com/main/wp-content/uploads/2014/04/logo_black.png',
	'menus' => array(
		//General Settings
		array(
			'title' => __('General Settings', 'alaya'),
			'name' => 'general_settings_menu',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Site Information', 'alaya'),
					'fields' => array(
					    array(
							'type' => 'upload',
							'name' => 'custom_logo',
							'label' => __('Custom LOGO', 'alaya'),
							'description' => __('The standard size is 150x150px', 'alaya'),
							'default' => '',
						),

						array(
							'type' => 'textbox',
							'name' => 'copyright',
							'label' => __('Copyright text', 'alaya'),
							'description' => __('It will display in the footer area', 'alaya'),
							'default' => '',
						),
				      ),
			       ),  
			      
			     array(
					'type' => 'section',
					'title' => __('Site Initialization', 'alaya'),
					'fields' => array(
						
						array(
							'type' => 'radioimage',
							'name' => 'default_home_template',
							'item_max_height' => '150',
		                    'item_max_width' => '150',
							'label' => __('Default Homepage Template', 'alaya'),
							'description' => __('Just select a template for the default home page.', 'alaya'),
							'items' => array(
						            array(
						                'value' => 'standard',
						                'label' => __('Standard', 'alaya'),
						                'img' => get_template_directory_uri().'/inc/assets/images/standard.jpg',
						            ),
						            array(
						                'value' => 'standard-sidebar',
						                'label' => __('Standard with Sidebar', 'alaya'),
						                'img' => get_template_directory_uri().'/inc/assets/images/standard-sidebar.jpg',

						            ),
						            array(
						                'value' => 'masonry',
						                'label' => __('Masonry', 'alaya'),
						                'img' => get_template_directory_uri().'/inc/assets/images/masonry.jpg',

						            ),
						            array(
						                'value' => 'masonry-sidebar',
						                'label' => __('Masonry with Sidebar', 'alaya'),
						                'img' => get_template_directory_uri().'/inc/assets/images/masonry-sidebar.jpg',

						            ),
						        ),
					        'default' => array(
					                     'standard',
					                     ),
						 ),
						
						array(
							'type' => 'toggle',
							'name' => 'home_slider',
							'label' => __('Homepage Slider', 'alaya'),
							'description' => __(' for the default homepage.', 'alaya'),
					        'default' => '0'
						),
						
						array(
							'type' => 'textbox',
							'name' => 'home_slider_cat',
							'label' => __('The Category of Homepage Slider Posts', 'alaya'),
							'description' => __('Please add the category slug.', 'alaya'),
					        'default' => ''
						),

						
						array(
							'type' => 'toggle',
							'name' => 'search',
							'label' => __('Remove Search Icon', 'alaya'),
							'description' => __('Don\'t display the search icon on the top bar', 'alaya'),
					        'default' => '0'
						),
						
						array(
							'type' => 'toggle',
							'name' => 'mega_menu',
							'label' => __('Mega Menu', 'alaya'),
							'description' => __('Display 3 recent posts in the category submenu.', 'alaya'),
					        'default' => '1'
						),

												
				     ),
				  ),
   				
			),
		),
		//End General Settings
		
		//Blog Setting
		array(
			'title' => __('Blog Setting', 'alaya'),
			'name' => 'blog_setting_menu',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(

				array(
					'type' => 'section',
					'title' => __('Manage Blog Features', 'alaya'),
					'fields' => array(    
						
						array(
							'type' => 'toggle',
							'name' => 'format_icon',
							'label' => __('Post Format Icon', 'alaya'),
					        'default' => '1'
						),
						
						array(
							'type' => 'toggle',
							'name' => 'related_posts',
							'label' => __('Related Posts', 'alaya'),
							'description' => __('The related posts are depending on the common tags.', 'alaya'),
					        'default' => '1'
						),
						
						array(
							'type' => 'toggle',
							'name' => 'post_share',
							'label' => __('Post Share Icons', 'alaya'),
					        'default' => '1'
						),
						
						array(
							'type' => 'toggle',
							'name' => 'post_author',
							'label' => __('The Author Information in the Post', 'alaya'),
					        'default' => '1'
						),
						
				      ),
			       ),  
   				//End Blog Setting		
   				),
		),
		//End Blog Setting
		
		//Global Style
		array(
			'title' => __('Customize Style', 'alaya'),
			'name' => 'custom_style_menu',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(

				array(
					'type' => 'section',
					'title' => __('Global Style', 'alaya'),
					'fields' => array(    
						
						array(
							'type' => 'radioimage',
							'name' => 'header_style',
							'item_max_height' => '150',
		                    'item_max_width' => '150',
							'label' => __('Header Style', 'alaya'),
							'description' => __('Just select a header style for the home page.', 'alaya'),
							'items' => array(
						            array(
						                'value' => '1',
						                'label' => __('Header 1', 'alaya'),
						                'img' => get_template_directory_uri().'/inc/assets/images/header1.jpg',
						            ),
						            array(
						                'value' => '2',
						                'label' => __('Header 2', 'alaya'),
						                'img' => get_template_directory_uri().'/inc/assets/images/header2.jpg',

						            ),
						        ),
					        'default' => array(
					                     '1',
					                     ),
						 ),

						array(
							'type' => 'upload',
							'name' => 'top_banner',
							'label' => __('Top Banner', 'alaya'),
							'description' => __('The picture size is 760x80px.', 'alaya'),
							'default' => '',
						),
						
						array(
							'type' => 'textbox',
							'name' => 'top_banner_link',
							'label' => __('Top Banner Link', 'alaya'),
							'description' => __('Do not forget http://', 'alaya'),
							'default' => '',
						),
						
				      ),
			       ),  
   				//End Global Style		
   				),
		),
		//End Custom Style
		
		//Social Icons
		array(
			'title' => __('Social Media', 'alaya'),
			'name' => 'social_media_menu',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Show the social icons at the top right of header', 'alaya'),
					'fields' => array(
					    array(
							'type' => 'textbox',
							'name' => 'facebook',
							'label' => __('facebook', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter',
							'label' => __('Twitter', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'googleplus',
							'label' => __('Google Plus', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'tumblr',
							'label' => __('Tumblr', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'flickr',
							'label' => __('Flickr', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'instagram',
							'label' => __('Instagram', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'deviantart',
							'label' => __('Deviantart', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'behance',
							'label' => __('Behance', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'dribbble',
							'label' => __('Dribbble', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'pinterest',
							'label' => __('Pinterest', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'youtube',
							'label' => __('Youtube', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'vimeo',
							'label' => __('Vimeo', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'linkedin',
							'label' => __('LinkedIn', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'github',
							'label' => __('Github', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'xing',
							'label' => __('Xing', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'yelp',
							'label' => __('Yelp', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'vk',
							'label' => __('VK', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'weibo',
							'label' => __('Weibo', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'bloglovin',
							'label' => __('BlogLovin', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'rss',
							'label' => __('RSS', 'alaya'),
							'default' => '',
						),

				   ),
				),
			),
		),
		//End Social Icons
		
		//Custom Code
		array(
			'title' => __('Custom Codes', 'alaya'),
			'name' => 'custom_code_menu',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Custom Code', 'alaya'),
					'fields' => array(
					    array(
							'type' => 'codeeditor',
							'name' => 'css_code',
							'mode' => 'css',
							'label' => __('CSS Code', 'alaya'),
							'description' => __('The custom CSS code will imported between head tag.', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'javascript_code',
							'mode' => 'javascript',
							'label' => __('Javascript Code', 'alaya'),
							'description' => __('The javascript code will imported at the last of the web page document.', 'alaya'),
							'default' => '',
						),
				   ),
				),
			
			  array(
					'type' => 'section',
					'title' => __('Additional Code', 'alaya'),
					'description' => __('You can add some third-party embed codes like Google Analysis code.','alaya'),
					'fields' => array(
					    array(
							'type' => 'textarea',
							'name' => 'header_code',
							'label' => __('Header Code', 'alaya'),
							'description' => __('It will imported between head tag.', 'alaya'),
							'default' => '',
						),
						array(
							'type' => 'textarea',
							'name' => 'footer_code',
							'label' => __('Footer Code', 'alaya'),
							'description' => __('It will imported at the last of the web page document.', 'alaya'),
							'default' => '',
						),
				   ),
		      ),
		  ),
		),
		//End Custom Code
	)
);