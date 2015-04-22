<?php

function ls_attachment_attribution($form_fields, $post) {
	$form_fields['ls-attribution-name'] = array(
		'label' => 'Attribution',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'ls_attribution_name', true)
	);

	$form_fields['ls-attribution-url'] = array(
		'label' => 'Attribution URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'ls_attribution_url', true )
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'ls_attachment_attribution', 10, 2 );


function ls_attachment_attribution_save( $post, $attachment ) {
	if( isset( $attachment['ls-attribution-name'] ) )
		update_post_meta( $post['ID'], 'ls_attribution_name', $attachment['ls-attribution-name'] );

	if( isset( $attachment['ls-attribution-url'] ) )
		update_post_meta( $post['ID'], 'ls_attribution_url', esc_url( $attachment['ls-attribution-url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'ls_attachment_attribution_save', 10, 2 );

?>
