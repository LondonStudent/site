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


function youtube( $attributes, $content = null) {
	$url = $attributes['src'];
	$caption = $attributes['caption'];
	$html = '';
	if ($url) {
		$html .= '<figure>';
		$html .= '	<div class="embed youtube__embed">';
		$html .= '		<iframe class="embed__elem youtube__embed__iframe" src=' . $url . ' frameborder="0" allowfullscreen></iframe>';
		$html .= '	</div>';
		if ($caption) {
			$html .= '	<figcaption class="embed__caption">' . $caption . '</figcaption>';
		}
		$html .= '</figure>';
	}

	return $html;
}
add_shortcode( 'youtube', 'youtube' );

?>
