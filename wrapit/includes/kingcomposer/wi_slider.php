<?php
extract( shortcode_atts( array(
	'id' => '',
), $atts ) );

if( !empty( $id ) ){
	$id = explode( ':', $id );
	$id = $id[0];
	if( function_exists('icl_object_id') ){
		$id = icl_object_id( $id, 'slider', true);
	}
	?>
	<div class="wrapit-slider">
		<?php
		$slides = get_post_meta( $id, 'slides' );
		if( !empty( $slides ) ){
			foreach( $slides as $slide ){
				?>
				<div class="ind-slide">
					<?php 
					$image_data =  wp_get_attachment_image_src( $slide['slide_image'], 'full' );
					if( !empty( $image_data ) ){
						echo '<img src="'.esc_url( $image_data[0] ).'" alt="">';
					}
					?>
					<div class="ind-slide-overlay"></div>
					<div class="ind-slide-caption">
						<?php if( !empty( $slide['slide_text'] ) ): ?>
							<h2><?php echo  $slide['slide_text'] ?></h2>
						<?php endif; ?>

						<?php if( !empty( $slide['slide_subtext'] ) ): ?>
							<p><?php echo  $slide['slide_subtext'] ?></p>
						<?php endif; ?>

						<?php if( !empty( $slide['slide_button_text'] ) ): ?>
							<a href="<?php echo esc_url( $slide['slide_button_link'] ) ?>">
								<?php echo  $slide['slide_button_text'] ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
	<?php
}
?>