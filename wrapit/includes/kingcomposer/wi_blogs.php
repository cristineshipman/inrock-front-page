<?php
extract( shortcode_atts( array(
	'items_number' 		=> '',
	'blog_items' 		=> '',
	'title' 			=> '',
	'visible_items' 	=> '',
	'slider' 			=> 'yes'
), $atts ) );

$blogs_html = '';
$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => $items_number,
	'ignore_sticky_posts' => 1
);

if( !empty( $blog_items ) ){
	$args['posts_per_page'] = '-1';
	$args['post__in'] = wrapit_prepare_autocomplete_results( $blog_items );
}

$post = new WP_Query( $args );

if( $post->have_posts() ){
	while ( $post->have_posts() ) {
		$media = '';
		$post->the_post();

		$excerpt = get_the_excerpt();
		if( strlen( $excerpt ) > 100 ){
			$excerpt = substr( $excerpt, 0, 100 ).'...';
		}

		$media = '';
		if( has_post_thumbnail() ){
			$media = '<div class="blog-media">';
				$media .= '<a href="'.get_the_permalink().'">';
					$media .= get_the_post_thumbnail( get_the_ID(), 'wrapit-blog-slider' );
				$media .= '</a>';
			$media .= '</div>';
		}

		if( $slider == 'no' ){
			$blogs_html .= '<div class="product-list-item col-xs-'.( 12 / $visible_items ).'">';
		}
		$blogs_html .= '
			<div class="blog-item product-item">

				'.$media.'

				<a href="'.get_the_permalink().'" class="blog-title">
					<h4 class="animation">'.get_the_title().'</h4>
				</a>

				'.( !empty( $excerpt ) ? '<p>'.$excerpt.'</p>' : '' ).'

				<div>
					<a href="'.get_the_permalink().'">
						'.esc_html__( 'Continue reading...', 'wrapit' ).'
					</a>
				</div>

			</div>
		';
		if( $slider == 'no' ){
			$blogs_html .= '</div>';
		}
	}
}
wp_reset_postdata();

if( !empty( $title ) ){
	$title = '
		<div class="products-list-title">
			<h5>'.$title.'</h5>
		</div>
	';
}

if( $slider == 'yes' ){
	$blogs_html = '
		<div class="products-list '.( empty( $title ) ? esc_attr( 'controls-middle' ) : '' ).'" data-visible="'.esc_attr( $visible_items ).'">
			'.$blogs_html.'
		</div>
	';
}
else{
	$blogs_html = '
		<div class="products-list-static" data-visible="'.esc_attr( $visible_items ).'">
			<div class="row">
				'.$blogs_html.'
			</div>
		</div>
	';
}

return '<div class="row"><div class="col-xs-12">'.$title.$blogs_html.'</div></div>';
?>