<?php
extract( shortcode_atts( array(
	'title' 			=> '',
	'text_color' 	=> '',
	'btn_text' 		=> '',
	'btn_link' 		=> ''
), $atts ) );

echo '<div class="ind-cta">
	<h4 style="'.( !empty( $text_color ) ? 'color: '.$text_color.';' : '' ).'">'.$title.'</h4>
	<a href="'.esc_attr( $btn_link ).'" class="btn">'.$btn_text.'</a>
</div>';
?>