<?php
extract( shortcode_atts( array(
	'title' 			=> '',
	'subtext' 			=> '',
	'link' 				=> '',
	'image'				=> '',
	'image_position'	=> 'left'
), $atts ) );
?>
<div class="side-image-box flex-wrap <?php echo esc_attr( $image_position ) ?>">
	<div class="flex-left">
		<?php echo wp_get_attachment_image( $image, 'wrapit-box-thumb' ) ?>
	</div>
	<div class="flex-right">
		<i class="<?php echo  $image_position == 'left' ? esc_attr( 'ion-android-arrow-dropleft' ) : esc_attr( 'ion-android-arrow-dropright' ) ?> css-arrow"></i>
		<?php echo !empty( $title ) ? '<h5>'.$title.'</h5>' : '' ?>
		<?php echo !empty( $subtext ) ? '<p>'.$subtext.'</p>' : '' ?>
		<?php echo !empty( $link ) ? '<a href="'.esc_url( $link ).'" class="header-font">'.esc_html__( 'Read More', 'wrapit' ).' <i class="ion-ios-arrow-thin-right"></i></a>' : '' ?>
	</div>
</div>