<?php
extract( shortcode_atts( array(
	'title' 		=> '',
	'subtext' 		=> '',
	'link' 			=> '',
	'image'			=> ''
), $atts ) );
?>
<div class="image-box">
	<div class="image-box-overlay animation"></div>
	<?php echo wp_get_attachment_image( $image, 'full' ) ?>
	<div class="image-box-caption">
		<?php echo !empty( $title ) ? '<h5>'.$title.'</h5>' : '' ?>
		<?php echo !empty( $subtext ) ? '<p>'.$subtext.'</p>' : '' ?>
		<?php echo !empty( $link ) ? '<a href="'.esc_url( $link ).'" class="btn">'.esc_html__( 'Read More', 'wrapit' ).' <i class="ion-ios-arrow-thin-right"></i></a>' : '' ?>
	</div>
</div>