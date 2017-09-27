<a href="javascript:void(0);" class="to_top btn">
	<span class="ion-ios-arrow-up"></span>
</a>

<?php 
$project_next_prev = wrapit_get_option( 'project_next_prev', 'wrapit' );
if( is_singular( 'project' ) && $project_next_prev == 'yes' ):
?>
<div class="next-prev">
	<div class="container">
		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		if( !empty( $prev_post ) || !empty( $next_post ) ):
		?>
			<div class="row">
				<div class="col-sm-5">
					<?php
					if( !empty( $next_post ) ){
						$has_media = has_post_thumbnail( $next_post->ID );
						?>
						<p>
							<a href="<?php echo get_permalink( $next_post->ID ) ?>" title="<?php esc_attr_e( 'Previous Project', 'wrapit' ) ?>">
								<i class="ion-ios-arrow-left"></i>

								<?php echo esc_html( $next_post->post_title ) ?>
							</a>
							
						</p>
						<?php
					}
					?>
				</div>
				<div class="col-sm-2">
					<div class="text-center">
						<p>
							<a href="<?php echo esc_url( wrapit_get_permalink_by_tpl('page-tpl_projects') ) ?>" title="<?php esc_attr_e( 'All Projects', 'wrapit' ) ?>">
								<i class="ion-android-apps"></i>
							</a>
						</p>
					</div>
				</div>
				<div class="col-sm-5 text-right">
					<?php
					if( !empty( $prev_post ) ){
						?>
						<p>
							<a href="<?php echo get_permalink( $prev_post->ID ) ?>" title="<?php esc_attr_e( 'Next Project', 'wrapit' ) ?>">
								<?php echo esc_html( $prev_post->post_title ) ?>
								<i class="ion-ios-arrow-right"></i>
							</a>
						</p>
						<?php
					}
					?>
				</div>
			</div>
		<?php endif; ?>	
	</div>	
</div>
<?php endif; ?>

<?php get_sidebar( 'footer' ); ?>

<?php
$copyrights = wrapit_get_option( 'copyrights' );
if( !empty( $copyrights ) ):
?>
	<div class="copyrights">
		<div class="container">
			<div class="text-center">
				<?php echo wp_kses_post( $copyrights ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>


<div class="modal fade qw-product">
  	<div class="modal-dialog">
   		<div class="modal-content">
    		<div class="modal-body">
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<div class="woocommerce">
        			<div class="product">
        				<div class="single-product-content">
			        		<div class="qw-content row">
		        			</div>
		        		</div>
		        	</div>
		        </div>
      		</div>
    	</div>
  	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>