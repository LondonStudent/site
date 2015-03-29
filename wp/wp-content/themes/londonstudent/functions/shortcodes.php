<?php

function quote( $attributes, $content = null) {
	$class = 'quote quote--' . $attributes['align'];
	$html = '';
	$html .= '<blockquote class="'. $class .'">';
	$html .= $content;
	$html .= '</blockquote>';
	// $html = '<p>'. $content .'</p>';
	return $html;
}
add_shortcode( 'quote', 'quote' );

?>
