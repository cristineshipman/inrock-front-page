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
<div class="container">
	<?php
	$pages_list = '';
	$posts_list = '';
	$projects_list = '';
	if( have_posts() ){
		while( have_posts() ){
			the_post(); 
			$post_type = get_post_type();
			$list_item = '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			if( $post_type == 'page' ){
				$pages_list .= $list_item;
			}
			else if( $post_type == 'project' ){
				$projects_list .= $list_item;
			}
			else if( $post_type == 'post' ){
				$posts_list .= $list_item;
			}
		}
		?>
		<div class="row">
			<?php if( !empty( $pages_list ) ): ?>
				<div class="col-sm-4">
					<div class="widget-title-wrap">
						<h5 class="widget-title">
							<?php esc_html_e( 'Pages', 'wrapit' ) ?>
						</h5>
					</div>
					<ul class="list-unstyled search-list">
						<?php echo  $pages_list; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if( !empty( $pages_list ) ): ?>
				<div class="col-sm-4">
					<div class="widget-title-wrap">
						<h5 class="widget-title">
							<?php esc_html_e( 'Posts', 'wrapit' ) ?>
						</h5>
					</div>
					<ul class="list-unstyled search-list">
						<?php echo  $posts_list; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if( !empty( $projects_list ) ): ?>
				<div class="col-sm-4">
					<div class="widget-title-wrap">
						<h5 class="widget-title">
							<?php esc_html_e( 'Projects', 'wrapit' ) ?>
						</h5>
					</div>
					<ul class="list-unstyled search-list">
						<?php echo  $projects_list; ?>
					</ul>
				</div>
			<?php endif; ?>
			
		</div>
		<?php
	}
	else{
		?>
		<!-- 404 -->
		<div class="widget">
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
</div>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>