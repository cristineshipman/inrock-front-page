<?php
extract( shortcode_atts( array(
	'projects' 		=> '',
	'items' 		=> '',
	'per_row' 		=> '4',
	'orderby' 		=> '',
	'order' 		=> '',
	'style' 		=> 'overlay_hover',
), $atts ) );

$args = array(
	'post_type' => 'project',
	'orderby' => $orderby,
	'order' => $order,
);

if( !empty( $projects ) ){
	$args['post__in'] = wrapit_prepare_autocomplete_results( $projects );
	$args['posts_per_page'] = sizeof( $args['post__in'] );
}
else{
	$args['posts_per_page'] = $items;
}


$projects = new WP_Query( $args );
$html = '';
if( $projects->have_posts() ){
	$html = '<div class="projects-wrap projects-'.esc_attr( $per_row ).' '.esc_attr( $style ).' clearfix">';
	while( $projects->have_posts() ){
		$projects->the_post();
		$cat = get_the_terms( get_the_ID(), 'project-cat' );
		if( !empty( $cat ) ){
			$cat = array_shift( $cat );
		}
		$html .= '<a href="'.get_permalink().'" class="project-item">
					'.get_the_post_thumbnail( get_the_ID(), 'wrapit-half-tour' ).'
					<div class="project-caption animation">
						<h5 class="animation">'.get_the_title().'</h5>
						'.( !empty( $cat ) ? '<p>'.$cat->name.'</p>' : '' ).'
					</div>
				  </a>';
	}
	$html .= '</div>';
}
wp_reset_postdata();

echo  $html;
?>