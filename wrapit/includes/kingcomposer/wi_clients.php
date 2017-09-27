<?php
extract( shortcode_atts( array(
	'rotate' 	=> ''
), $atts ) );
?>
<div class="clients" data-rotate="<?php esc_attr( $rotate ) ?>">
<?php
if( !empty( $atts['clients'] ) ){
	foreach( $atts['clients'] as $client ){
		echo '<div class="client animation">
		'.( !empty( $client->link ) ? '<a href="'.esc_attr( $client->link ).'">' : '' ).'
			'.wp_get_attachment_image( $client->image, 'full' ).'
		'.( !empty( $client->link ) ? '</a>' : '' ).'
		</div>';
	}
}
?>
</div>