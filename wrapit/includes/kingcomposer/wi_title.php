<?php
extract( shortcode_atts( array(
	'title' 		=> '',
	'title_color' 	=> '',
	'heading' 		=> '1'
), $atts ) );

echo '<div class="ind-title-wrap"><h'.esc_attr( $heading ).' style="'.( !empty( $title_color ) ? 'color: '.$title_color.';' : '' ).'" class="ind-title">'.$title.'</h'.esc_attr( $heading ).'></div>';
?>