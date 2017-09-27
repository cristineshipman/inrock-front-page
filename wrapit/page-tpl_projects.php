<?php
/*
	Template Name: All Projects
*/
get_header();
the_post();
get_template_part( 'includes/title' );
?>
<main>
	<div class="container">
		<?php
		$project_cats = get_terms( 'project-cat' );
		if( !empty( $project_cats ) ){
			?>
			<div class="project-filters">
				<a href="javascript:;" data-filter="*" class="active"><?php esc_html_e( 'All', 'wrapit' ) ?></a>
				<?php
				foreach( $project_cats as $project_cat ){
					if( !empty( $project_cat ) && !is_wp_error( $project_cat ) ){
						?>
						<a href="javascript:;" data-filter=".<?php echo esc_attr( $project_cat->slug ) ?>"><?php echo  $project_cat->name; ?></a>
						<?php
					}
				}
				?>
			</div>
			<?php
		}
		?>

		<div class="clearfix">
			<?php the_content(); ?>
		</div>

		<?php
		$projects = new WP_Query(array(
			'post_type' 		=> 'project',
			'posts_per_page' 	=> -1,
			'post_status' 		=> 'publish',
			'orderby' 			=> wrapit_get_option( 'project_orderby' ),
			'order' 			=> wrapit_get_option( 'project_order' ),
		));
		if( $projects->have_posts() ){
			?>
			<div class="row masonry project-masonry">
				<?php
				while( $projects->have_posts() ){
					$projects->the_post();
					$project_cats = get_the_terms( get_the_ID(), 'project-cat' );
					$project_cats_array = array();
					if( !empty( $project_cats ) ){
						foreach( $project_cats as $project_cat ){
							$project_cats_array[] = esc_attr( urldecode( $project_cat->slug ) );
						}
						$cat = array_shift( $project_cats );
					}
					?>
					<div class="col-sm-4 masonry-item <?php echo join( ' ', $project_cats_array ); ?>">
						<a href="<?php the_permalink(); ?>" class="project-item">
							<?php the_post_thumbnail( 'wrapit-half-tour' ) ?>
							<div class="project-caption animation">
								<h5 class="animation"><?php the_title() ?></h5>
								<?php echo !empty( $cat ) ? '<p>'.$cat->name.'</p>' : '' ?>
							</div>
						  </a>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		}

		wp_reset_postdata();
		?>

	</div>
</main>
<?php get_footer(); ?>