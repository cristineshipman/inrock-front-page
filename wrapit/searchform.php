<form method="get" class="searchform" action="<?php echo esc_url( home_url('/') ); ?>">
	<div class="wrapit-form">
		<input type="text" value="" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search for...', 'wrapit' ); ?>">
		<a class="btn btn-default submit_form"><i class="ion-ios-search"></i></a>
	</div>
</form>