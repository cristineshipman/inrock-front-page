<?php
$header_icon_1 = wrapit_get_option( 'header_icon_1' );
$header_icon_1_title = wrapit_get_option( 'header_icon_1_title' );
$header_icon_1_subtitle = wrapit_get_option( 'header_icon_1_subtitle' );

$header_icon_2 = wrapit_get_option( 'header_icon_2' );
$header_icon_2_title = wrapit_get_option( 'header_icon_2_title' );
$header_icon_2_subtitle = wrapit_get_option( 'header_icon_2_subtitle' );

$header_icon_3 = wrapit_get_option( 'header_icon_3' );
$header_icon_3_title = wrapit_get_option( 'header_icon_3_title' );
$header_icon_3_subtitle = wrapit_get_option( 'header_icon_3_subtitle' );
?>
<ul class="list_unstyled list-inline header-boxes no-margin clearfix">
	<?php if( !empty( $header_icon_1 ) ): ?>
		<li>
			<i class="ion-<?php echo esc_attr( $header_icon_1 ) ?>"></i>
			<div class="icon-details">
				<h5><?php echo  $header_icon_1_title ?></h5>
				<p><?php echo  $header_icon_1_subtitle ?></p>
			</div>
			<div class="clearfix"></div>
		</li>
	<?php endif; ?>
	<?php if( !empty( $header_icon_2 ) ): ?>
		<li>
			<i class="ion-<?php echo esc_attr( $header_icon_2 ) ?>"></i>
			<div class="icon-details">
				<h5><?php echo  $header_icon_2_title ?></h5>
				<p><?php echo  $header_icon_2_subtitle ?></p>
			</div>
			<div class="clearfix"></div>
		</li>
	<?php endif; ?>
	<?php if( !empty( $header_icon_3 ) ): ?>
		<li>
			<i class="ion-<?php echo esc_attr( $header_icon_3 ) ?>"></i>
			<div class="icon-details">
				<h5><?php echo  $header_icon_3_title ?></h5>
				<p><?php echo  $header_icon_3_subtitle ?></p>
			</div>
			<div class="clearfix"></div>
		</li>
	<?php endif; ?>
</ul>