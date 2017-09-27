<?php
$site_logo = wrapit_get_option( 'site_logo' );
?>
<div class="logo">
	<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
		<?php if( !empty( $site_logo['url'] ) ): ?>
			<img src="<?php echo esc_url( $site_logo['url'] ) ?>" alt="" width="<?php echo esc_attr( $site_logo['width'] ) ?>" height="<?php echo esc_attr( $site_logo['height'] ) ?>"/>
		<?php else: ?>
			<h2><?php bloginfo( 'name' ); ?><h2>
		<?php endif; ?>
	</a>
</div>