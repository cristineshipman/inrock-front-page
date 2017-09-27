<?php
get_header();
get_template_part( 'includes/title' );
?>
<div class="container">
	<div class="widget">
		<div class="widget-title-wrap">
			<h5 class="widget-title">
				<?php esc_html_e( 'Page Not Found', 'wrapit' ) ?>
			</h5>
		</div>							
		<p><?php esc_html_e( 'Page you are looking for is no longer available. Use search form bellow to find what you are looking for.', 'wrapit' ) ?></p>
		<?php get_search_form(); ?>
	</div>
</div>
<?php
get_footer();
?>