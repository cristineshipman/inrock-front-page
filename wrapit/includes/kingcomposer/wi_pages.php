<?php
extract( shortcode_atts( array(
	'id' 				=> '',
	'style' 			=> 'top-media',
	'excerpt_length' 	=> ''
), $atts ) );

if( !empty( $id ) ){
	$id = explode( ':', $id );
	$id = $id[0];
	
	$page = get_page( $id );
	$excerpt = get_post_meta( $id, 'page_excerpt', true );
	if( !empty( $excerpt_length ) ){
		$excerpt = substr( $excerpt, 0, $excerpt_length );
	}
	if( $style == 'top-media' ){
		$title = '<h5>'.get_the_title( $id ).'</h5>';
		$read_more = '<a href="'.get_permalink( $id ).'" class="read-more header-font"><i class="ion-android-arrow-dropright"></i> '.esc_html__( 'Continue Reading', 'wrapit' ).'</a>';
	}
	else{
		$title = '<h5><a href="'.get_permalink( $id ).'">'.get_the_title( $id ).'</a></h5>';
		$read_more = '';
	}
	$page_media = '';
	if( has_post_thumbnail( $id ) ){
		$page_media = '<a href="'.get_permalink( $id ).'" class="page-media">'.get_the_post_thumbnail( $id, $style == 'top-media' ? 'wrapit-box-thumb' : 'wrapit-small-thumb' ).'</a>';
	}
	if( !empty( $page ) ){
		echo '<div class="page-item '.esc_attr( $style ).'">
			'.$page_media.'
			<div class="page-item-content">
				'.$title.'
				'.( !empty( $excerpt ) ? '<p>'.$excerpt.'</p>' : '' ).'
				'.$read_more.'
			</div>
		</div>';
	}
}
?>