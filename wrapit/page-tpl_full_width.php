<?php
/*
	Template Name: Full Width
*/
get_header();
the_post();
get_template_part( 'includes/title' );
?>

<main>
	<div class="container">
		<?php 
		$page_show_featured = get_post_meta( get_the_ID(), 'page_show_featured', true );
		if( has_post_thumbnail() && $page_show_featured == 'yes' ){
			the_post_thumbnail( 'wrapit-page-full' );
		}
		?>

		<div class="post-content clearfix content-entry">
			<?php the_content(); ?>
			<div class="clearfix"></div>
		</div>
		<?php comments_template( '', true ) ?>
	</div>
</main>
<?php get_footer(); ?>