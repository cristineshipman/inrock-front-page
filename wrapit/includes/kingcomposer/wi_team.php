<?php
extract( shortcode_atts( array(
	'image' 		=> '',
	'facebook' 		=> '',
	'twitter' 		=> '',
	'google' 		=> '',
	'title' 		=> '',
	'position' 		=> '',
	'description' 	=> ''
), $atts ) );

if( empty( $content ) ){
	$content = $description;
}

$social = '';
if( !empty( $facebook ) ){
	$social .= '<a href="'.esc_url( $facebook ).'" target="_blank"><i class="fa fa-facebook"></i></a>';
}
if( !empty( $twitter ) ){
	$social .= '<a href="'.esc_url( $twitter ).'" target="_blank"><i class="fa fa-twitter"></i></a>';
}
if( !empty( $google ) ){
	$social .= '<a href="'.esc_url( $google ).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
}

echo '
	<div class="team-member clearfix">
		<div class="team-member-avatar">
			'.wp_get_attachment_image( $image, 'full' ).'
			'.( !empty( $social ) ? '<p class="social animation"><span class="social-wrap">'.$social.'</span></p>' : '' ).'
		</div>
		<div class="team-member-caption">
			'.( !empty( $title ) ? '<h5>'.$title.'</h5>' : '' ).'
			'.( !empty( $position ) ? '<p class="position">'.$position.'</p>' : '' ).'
			'.( !empty( $content ) ? '<div class="description">'.apply_filters( 'the_content', $content ).'</div>' : '' ).'
		</div>
	</div>';
?>