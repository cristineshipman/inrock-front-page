<?php
get_header();

get_template_part( 'includes/title' );
global $wp_query;

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page
$page_links_total =  $wp_query->max_num_pages;
$page_links = paginate_links( 
	array(
		'prev_next' => true,
		'end_size' => 2,
		'mid_size' => 2,
		'total' => $page_links_total,
		'current' => $cur_page,	
		'prev_next' => false,
		'type' => 'array'
	)
);
$pagination = wrapit_format_pagination( $page_links );
?>
<main>
	<?php if( have_posts() ): ?>
		<div class="container">
			<div class="row masonry">
				<?php
				while( have_posts() ){
					the_post();
					?>
					<div class="col-sm-3 masonry-item">
						<div class="blog-item product-item">

							<?php if( has_post_thumbnail() ): ?>
								<div class="blog-media">
									<a href="<?php the_permalink() ?>">
										<?php the_post_thumbnail( 'wrapit-box-thumb' ); ?>
									</a>
								</div>
							<?php endif; ?>

							<h5 class="animation">
								<a href="<?php the_permalink(); ?>" class="blog-title">
									<?php the_title(); ?>
								</a>
							</h5>

							<?php the_excerpt() ?>						
							
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<?php if( !empty( $pagination ) ): ?>
				<div class="pagination">
					<?php echo  $pagination; ?>
				</div>	
			<?php endif; ?>
		</div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>