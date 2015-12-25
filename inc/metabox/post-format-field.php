<?php
/**
 * Add Post Format field field in Post
 * @package Alaya_framework
 * @subpackage City News 
 * @since 1.0
 */

return array(
	'id'          => 'post_format_meta',
	'types'       => array('post'),
	'title'       => __('Embed Code Field', 'alaya'),
	'priority'    => 'high',
	'template'    => array(
        array(
			'type' => 'textarea',
			'name' => 'embed_code',
			'label' => __('Video/Audio Embed Code', 'alaya'),
			'description' => __('You can copy the embed code to this field from Youtube / Vimeo / SoundCloud.', 'alaya'),
		)
		
	),
);
?>