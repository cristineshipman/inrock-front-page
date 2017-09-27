<?php
extract( shortcode_atts( array(
	'icon' 			=> '',
	'icon_color' 	=> '',
	'target' 		=> '',
	'target_color' 	=> '',
	'title' 		=> '',
	'title_color' 	=> '',
), $atts ) );

if( !empty( $target ) ){
	$id = wrapit_random_string();
	?>
	<div class="counter-wrap <?php echo esc_attr( $id ) ?>">
		<?php
		if( !empty( $icon ) ){
			echo '<i class="'.esc_attr( $icon ).'"></i>';
		}
		?>
		<div class="counter-caption <?php echo !empty( $icon ) ? esc_attr('has-icon') : '' ?>">
			<h4 class="counter" data-value="<?php echo esc_attr( $target ); ?>">0</h4>
			<?php echo !empty( $title ) ? '<p>'.$title.'</p>' : '' ?>
		</div>
	</div>
	<?php if( !empty( $icon_color ) || !empty( $target_color ) || !empty( $title_color ) ): ?>
		<style scoped>	
			<?php if( !empty( $icon_color ) ): ?>
				.counter-wrap.<?php echo esc_attr( $id ) ?> i{
					color: <?php echo  $icon_color ?>;
				}
			<?php endif; ?>
			<?php if( !empty( $target_color ) ): ?>
				.counter-wrap.<?php echo esc_attr( $id ) ?> h4{
					color: <?php echo  $target_color ?>;
				}
			<?php endif; ?>
			<?php if( !empty( $title_color ) ): ?>
				.counter-wrap.<?php echo esc_attr( $id ) ?> p{
					color: <?php echo  $title_color ?>;
				}
			<?php endif; ?>
		</style>
	<?php endif; ?>
	<?php
}
?>