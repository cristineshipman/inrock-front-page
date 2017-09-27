<?php if( !is_front_page() ): ?>
	<?php
	$page_breadcrumbs = wrapit_get_option( 'page_breadcrumbs' );
	$show_breadcrumbs = wrapit_get_option( 'show_breadcrumbs' );
	if( $show_breadcrumbs == 'yes' ):
		$style = '';
		$breadcrumbs_image = wrapit_get_option( 'breadcrumbs_image' );
		if( is_page() || is_single() ){
			$breadcrumbs_image_meta = get_post_meta( get_the_ID(), 'breadcrumbs_image', true );
			if( !empty( $breadcrumbs_image_meta ) ){
				$image_data = wp_get_attachment_image_src( $breadcrumbs_image_meta, 'full' );
				$style = 'background-image: url('.esc_url( $image_data[0] ).')';
			}
		}
		if( empty( $style ) && !empty( $breadcrumbs_image['url'] ) ){
			$style = 'background-image: url('.esc_url( $breadcrumbs_image['url'] ).')';
		}
		?>
		<section class="page-title" style="<?php echo  $style ?>">
			<div class="container">
				<div class="clearfix">
					<div class="<?php echo  $page_breadcrumbs == 'side' ? 'pull-left' : '' ?>">
						<h1>
							<?php
								if( is_home() ){
									$page_for_posts = get_option( 'page_for_posts' );
									if( !empty( $page_for_posts ) ){
										echo get_the_title( $page_for_posts );
									}
									else{
										esc_html_e( 'Blog', 'wrapit' );
									}
								}
								else if( is_singular( 'product' ) ){
									the_title();
								}
								else if( is_tax( 'project-cat' ) ){
									echo get_queried_object()->name;
								}
								else if( function_exists( 'is_woocommerce' ) && is_woocommerce() ){
									woocommerce_page_title();
								}
								else if( is_category() ){
									echo single_cat_title( '', false );
								}
								else if( is_404() ){
									esc_html_e( '404', 'wrapit' );
								}
								else if( is_tag() || is_search() || is_tax() ){
									esc_html_e('Search Results', 'wrapit');
								}
								else if( is_archive() ){
									echo single_month_title(' ',false);
								}
								else{
									the_title();
								}
							?>
						</h1>
					</div>
					<div class="<?php echo  $page_breadcrumbs == 'side' ? 'pull-right' : '' ?>">
						<?php 
						if( function_exists('is_woocommerce') && is_woocommerce() ){
							woocommerce_breadcrumb(array(
								'wrap_before' => '<nav class="woocommerce-breadcrumb">'
							));
						}
						else{
							echo wrapit_breadcrumbs();
						}?>
					</div>
				</div>
			</div>
		</section>
	<?php else: ?>
	<section class="dummy-breadcrumbs"></section>
	<?php endif; ?>
<?php endif; ?>