<?php
extract( shortcode_atts( array(
	'title' 		=> '',
	'title_color' 	=> '',
	'heading' 		=> '1',
	'icon'			=> ''
), $atts ) );

echo '<h'.esc_attr( $heading ).' style="'.( !empty( $title_color ) ? 'color: '.$title_color.';' : '' ).'" class="ind-title-icon"><i class="'.esc_attr( $icon ).'"></i>'.$title.'</h'.esc_attr( $heading ).'>';
?>