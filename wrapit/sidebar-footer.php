<?php
if ( is_active_sidebar( 'bottom-1' ) || is_active_sidebar( 'bottom-2' ) || is_active_sidebar( 'bottom-3' ) ){
	?>
	<section class="footer_widget_section">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<?php
					if( is_active_sidebar( 'bottom-1' ) ){
						dynamic_sidebar( 'bottom-1' );
					}
					?>
				</div>
				<div class="col-md-4">
					<?php
					if( is_active_sidebar( 'bottom-2' ) ){
						dynamic_sidebar( 'bottom-2' );
					}
					?>
				</div>
				<div class="col-md-4">
					<?php
					if( is_active_sidebar( 'bottom-3' ) ){
						dynamic_sidebar( 'bottom-3' );
					}
					?>
				</div>				
			</div>
		</div>
	</section>
	<?php
}
?>