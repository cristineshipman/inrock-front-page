<?php
/*=============================
	DEFAULT SINGLE
=============================*/
get_header();
the_post();
get_template_part( 'includes/title' );
?>
<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<?php
				if( has_post_thumbnail() ){
					$project_image = get_post( get_post_thumbnail_id( get_the_ID() ) );
					$image_data_full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

					?>
					<a href="<?php echo esc_url( $image_data_full[0] ) ?>" class="gallery-project project-image">
						<?php the_post_thumbnail( 'wrapit-col-7' ) ?>
						<?php if( !empty( $project_image->post_excerpt ) ): ?>
							<div class="project-img-caption">
								<?php echo  $project_image->post_excerpt; ?>
							</div>
						<?php endif; ?>
					</a>
					<?php
				}

				$project_images = get_post_meta( get_the_ID(), 'project_images' );
				if( !empty( $project_images ) ){
					foreach( $project_images as $project_image_id ){
						$project_image = get_post( $project_image_id );
						$image_data_full = wp_get_attachment_image_src( $project_image_id, 'full' );
						?>
						<a href="<?php echo esc_url( $image_data_full[0] ) ?>" class="gallery-project project-image">
							<?php echo  wp_get_attachment_image( $project_image_id, 'wrapit-col-7' ); ?>
							<?php if( !empty( $project_image->post_excerpt ) ): ?>
								<div class="project-img-caption">
									<?php echo  $project_image->post_excerpt; ?>
								</div>
							<?php endif; ?>
						</a>
						<?php
					}
				}
				?>
			</div>
			<div class="col-sm-5">
				<?php
				$project_details = get_post_meta( get_the_ID(), 'project_details' );
				if( !empty( $project_details ) ){
					?>
					<ul class="list-unstyled project-details">
						<?php
						foreach( $project_details as $project_detail ){
							echo '<li>';
								if( !empty( $project_detail['project_details_icon'] ) ){
									echo '<span><i class="ion-'.esc_attr( $project_detail['project_details_icon'] ).'"></i></span>';
								}
								echo '<div>';
								echo  $project_detail['project_details_name'];
								echo '</div>';
								echo ' <strong>'.$project_detail['project_details_value'].'</strong>';
							echo '</li>';
						}
						?>
					</ul>
					<?php
				}
				?>
				<div class="clearfix content-entry">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>