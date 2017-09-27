<?php
/*
	Template Name: Left Sidebar
*/
get_header();
the_post();
get_template_part( 'includes/title' );
?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 left-sidebar">
				<?php
				$page_custom_sidebar = get_post_meta( get_the_ID(), 'page_custom_sidebar', true );
				if( !empty( $page_custom_sidebar ) ){
					if ( is_active_sidebar( $page_custom_sidebar ) ){
						dynamic_sidebar( $page_custom_sidebar );
					}
				}
				else{
					get_sidebar( 'left' );
				}
				?>
			</div>

			<div class="col-sm-9">
				<?php 
				$page_show_featured = get_post_meta( get_the_ID(), 'page_show_featured', true );
				if( has_post_thumbnail() && $page_show_featured == 'yes' ){
					the_post_thumbnail( 'post-thumbnail' );
				}
				?>

				<div class="post-content clearfix content-entry">
					<?php the_content(); ?>
					<div class="clearfix"></div>
				</div>

				<?php comments_template( '', true ) ?>

			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>