<?php
/*=============================
	DEFAULT BLOG LISTING PAGE
=============================*/
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
	<div class="container">
		<div class="row">
			<div class="<?php echo is_active_sidebar( 'blog' ) ? esc_attr( 'col-sm-9' ) : esc_attr( 'col-sm-12' ) ?>">
			<?php
				if( have_posts() ){
					while( have_posts() ){
						the_post(); 
						?>
							<article <?php post_class( 'blog-item product-item' ) ?>>

								<?php if( has_post_thumbnail() ): ?>
									<div class="blog-media">
										<a href="<?php the_permalink() ?>">
											<?php the_post_thumbnail( 'post-thumbnail' ); ?>
										</a>
									</div>
								<?php endif; ?>

								<?php if( is_sticky() ): ?>
									<div class="sticky-wrap">
										<i class="ion-android-attach sticky-pin"></i>
									</div>
								<?php endif; ?>	

								<?php
								$extra_class = '';
								$words = explode( " ", get_the_title() );
								foreach( $words as $word ){
									if( strlen( $word ) > 25 ){
										$extra_class = 'break-word';
									}
								}
								?>
								<h5 class="animation">
									<a href="<?php the_permalink(); ?>" class="blog-title <?php echo esc_attr( $extra_class ); ?>">
										<?php the_title(); ?>
									</a>
								</h5>

								<?php the_excerpt() ?>

								<div>
									<a href="<?php the_permalink() ?>" class="read-more header-font">
										<i class="ion-android-arrow-dropright"></i> <?php esc_html_e( 'Continue reading', 'wrapit' ) ?>
									</a>
								</div>
							</article>
						<?php
					}
				}
				else{
					?>
					<!-- 404 -->
					<div class="widget white-block">
						<div class="widget-title-wrap">
							<h5 class="widget-title">
								<?php esc_html_e( 'Nothing Found', 'wrapit' ) ?>
							</h5>
						</div>							
						<p><?php esc_html_e( 'Sorry but we could not find anything which resembles you search criteria. Try again.', 'wrapit' ) ?></p>
						<?php get_search_form(); ?>
					</div>
					<!--.404 -->
					<?php
				}
				?>
				<?php
					if( !empty( $pagination ) ): ?>
						<div class="pagination">
							<?php echo  $pagination; ?>
						</div>	
					<?php
					endif;
				?>				
			</div>	
			<?php if( is_active_sidebar( 'blog' ) ): ?>
				<div class="col-sm-3 right-sidebar">
					<div class="sticky-sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php endif; ?>				
		</div>		
	</div>
</main>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>