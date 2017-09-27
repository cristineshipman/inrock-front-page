<?php
extract( shortcode_atts( array(
	'icon' 				=> '',
	'title' 			=> '',
	'title_color' 		=> '',
	'text' 				=> '',
	'text_color' 		=> ''
), $atts ) );

$rnd = wrapit_random_string();

if( !empty( $title ) ){
	$title = '<h5>'.$title.'</h5>';
}

if( !empty( $icon ) ){
	$icon = '<div class="service-icon-wrap"><span class="'.esc_attr( $icon ).' animation"></span></div>';
}

if( !empty( $text ) ){
	$text = '<p>'.$text.'</p>';
}

echo '
<div class="service '.esc_attr( $rnd ).'" data-colors="'.esc_attr( $rnd ).'|'.esc_attr( $title_color ).'|'.esc_attr( $text_color ).'">
	'.$icon.'
	<div class="service-body">
		'.$title.'
		'.$text.'
	</div>
</div>';
?>