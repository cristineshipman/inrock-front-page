<?php
/*=============================
	DEFAULT SINGLE
=============================*/
get_header();
the_post();
get_template_part( 'includes/title' );

$post_pages = wp_link_pages( 
	array(
		'before' => '',
		'after' => '',
		'link_before'      => '<span>',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'nextpagelink'     => esc_html__( '&raquo;', 'wrapit' ),
		'previouspagelink' => esc_html__( '&laquo;', 'wrapit' ),			
		'separator'        => ' ',
		'echo'			   => 0
	) 
);
?>
<main class="single-blog">
	<div class="container">
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'blog' ) ? esc_attr( 'col-sm-9' ) : esc_attr( 'col-sm-12' ) ?>">

				<div class="blog-media">
					<?php
					if( has_post_thumbnail() ){
						the_post_thumbnail( 'post-thumbnail' );
					}
					?>
				</div>

				<div class="single-top-meta">
					<?php esc_html_e( 'Written by ', 'wrapit' ) ?>
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php echo get_the_author_meta('display_name'); ?></a>
					<?php esc_html_e( ' on ', 'wrapit' ) ?>
					<?php the_time( 'F j, Y' ) ?>
					<?php esc_html_e( ' in ', 'wrapit' ) ?>
					<?php echo wrapit_the_category(); ?>
				</div>				

				<div class="clearfix content-entry">
					<?php the_content(); ?>
				</div>

				<div class="bottom-meta">
					<?php 
					$tags = wrapit_the_tags();
					if( !empty( $tags ) ):
					?>
						<div class="widget-title-wrap">
							<h5 class="widget-title"><?php esc_html_e( 'Tags', 'wrapit' ) ?></h5>
						</div>
						<div class="post-tags">
							<?php echo  $tags; ?>
						</div>
					<?php
					endif;
					?>					
				</div>
				
				<?php if( !empty( $post_pages ) ): ?>
					<div class="pagination">
						<?php echo wrapit_link_pages( $post_pages ); ?>
					</div>
				<?php endif; ?>
				
				<?php comments_template( '', true ) ?>

			</div>
			<?php if(  is_active_sidebar( 'blog' ) ): ?>
				<div class="col-sm-3 right-sidebar">
					<div class="sticky-sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>