<div class="testimonials">
<?php
if( !empty( $atts['testimonials'] ) ){
	foreach( $atts['testimonials'] as $testimonial ){
		$empty = 5 - $testimonial->grade;
		$grade_html = '';
		for( $i=0; $i<$testimonial->grade; $i++ ){
			$grade_html .= '<i class="ion-android-star"></i>';
		}
		for( $i=0; $i<$empty; $i++ ){
			$grade_html .= '<i class="ion-android-star-outline"></i>';
		}
		echo '<div class="testimonial-item">
					'.wp_get_attachment_image( $testimonial->image, 'wrapit-small-thumb' ).'
					<p class="grade">'.$grade_html.'</p>						
					<div class="testimonial-content">'.$testimonial->testimonial.'</div>
					'.( !empty( $testimonial->name ) ? '<h5>'.$testimonial->name.'</h5>' : '' ).'
					'.( !empty( $testimonial->subtitle ) ? '<p class="subtitle">'.$testimonial->subtitle.'</p>' : '' ).'
				</div>';
	}
}
?>
</div>