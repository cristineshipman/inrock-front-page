<?php

if( !function_exists('wrapit_remove_default_elements') ){
function wrapit_remove_default_elements( $atts, $base ){
    if( in_array( 
    		$base, 
    		array( 
    			'kc_box', 
    			'kc_raw_code', 
    			'kc_image_gallery',
    			'kc_title',
    			'kc_twitter_feed',
    			'kc_instagram_feed',
    			'kc_fb_recent_post',
    			'kc_flip_box', 
    			'kc_counter_box',
    			'kc_post_type_list', 
    			'kc_carousel_images',
    			'kc_carousel_post',
    			'kc_coundown_timer',
    			'kc_divider',
    			'kc_testimonial', 
    			'kc_team',
    			'kc_pricing',
    			'kc_image_fadein',
    			'kc_image_hover_effects',
    			'kc_blog_posts',
    			'kc_nested',
    			'kc_creative_button'
    		) 
    	) )
    {
        return null;
    }

    return $atts;
}
add_filter('kc_add_map', 'wrapit_remove_default_elements', 1 , 2 );
}

if( !function_exists('wrapit_map_shortcodes') ){
function wrapit_map_shortcodes() {
	if ( function_exists( 'kc_add_map' ) ){ 
		global $kc;

		$shortcode_template = get_theme_file_path( 'includes/kingcomposer/' );
	    $kc->set_template_path( $shortcode_template );
		
	    kc_add_map(
	        array(
	            'wi_blogs' => array(
	                'name' 			=> esc_html__( 'Blogs', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'items_number',
	                        'label' 		=> esc_html__( 'Number Of Blogs', 'wrapit' ),
	                        'type' 			=> 'text',
	                        "description" 	=> esc_html__("Input number of blogs to display. (-1 to display all)","wrapit")
	                    ),
	                    array(
	                        'name' 			=> 'blog_items',
	                        'label' 		=> esc_html__("Blog","wrapit"),
	                        'type' 			=> 'autocomplete',
	                        'options'		=> array(
	                        	'multiple'		=> true,
	                        	'post_type'		=> 'post'
	                        )
	                    ),
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__("Title","wrapit"),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'visible_items',
	                        'label' 		=> esc_html__("Visible Items","wrapit"),
	                        'type' 			=> 'text',
	                        "description" 	=> esc_html__("Input number of blogs which are visible. If slider is set to no then this is used to define number of items in the row and in this case possible values are 1, 2, 3, 4, 6, 12","wrapit")
	                    ),
	                    array(
	                        'name' 			=> 'slider',
	                        'label' 		=> esc_html__("Use Slider","wrapit"),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'yes'	=> esc_html__( 'Yes', 'wrapit' ),
								'no'	=> esc_html__( 'No', 'wrapit' ),
	                        ),
	                        "description" 	=> esc_html__("Display posts in slider or in grid.","wrapit")
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_clients' => array(
	                'name' 			=> esc_html__( 'Clients', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'rotate',
	                        'label' 		=> esc_html__( 'Rotate Speed', 'wrapit' ),
	                        'type' 			=> 'text',
	                        "description" 	=> esc_html__("Input clients rotate speed in miliseconds or leave it empty to disable.","wrapit")
	                    ),
	                    array(
	                        'name' 			=> 'clients',
	                        'label' 		=> esc_html__("Clients","wrapit"),
	                        'options'		=> array('add_text' => esc_html__('Add new slide', 'wrapit')),
	                        'type' 			=> 'group',
	                        'params'		=> array(
			                    array(
			                        'name' 			=> 'image',
			                        'label' 		=> esc_html__("Client Logo","wrapit"),
			                        'type' 			=> 'attach_image',
			                    ),
			                    array(
			                        'name' 			=> 'link',
			                        'label' 		=> esc_html__("Client URL","wrapit"),
			                        'type' 			=> 'text',
			                    ),
	                        )
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_count' => array(
	                'name' 			=> esc_html__( 'Count', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'icon',
	                        'label' 		=> esc_html__( 'Icon', 'wrapit' ),
	                        'type' 			=> 'icon_picker',
	                    ),
	                    array(
	                        'name' 			=> 'icon_color',
	                        'label' 		=> esc_html__( 'Icon Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                    array(
	                        'name' 			=> 'target',
	                        'label' 		=> esc_html__( 'Target Number', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'target_color',
	                        'label' 		=> esc_html__( 'Target Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Title', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'title_color',
	                        'label' 		=> esc_html__( 'Title Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_cta' => array(
	                'name' 			=> esc_html__( 'Call To Action', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Title', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'text_color',
	                        'label' 		=> esc_html__( 'Title Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                    array(
	                        'name' 			=> 'btn_text',
	                        'label' 		=> esc_html__( 'Button Text', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'btn_link',
	                        'label' 		=> esc_html__( 'Button Link', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_pages' => array(
	                'name' 			=> esc_html__( 'Pages', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'id',
	                        'label' 		=> esc_html__( 'Page', 'wrapit' ),
	                        'type' 			=> 'autocomplete',
	                        'options'		=> array(
	                        	'multiple'		=> false,
	                        	'post_type'		=> 'page'
	                        )
	                    ),
	                    array(
	                        'name' 			=> 'style',
	                        'label' 		=> esc_html__( 'Box Style', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'top-media'		=> esc_html__( 'Top Media', 'wrapit' ),
								'side-media'	=> esc_html__( 'Side Media', 'wrapit' ),
	                        )
	                    ),
	                    array(
	                        'name' 			=> 'excerpt_length',
	                        'label' 		=> esc_html__( 'Excerpt Length', 'wrapit' ),
	                        'type' 			=> 'text',
	                        "description" 	=> esc_html__("Input number of chars for the excerpt or leave empty to display it all","wrapit")
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_projects' => array(
	                'name' 			=> esc_html__( 'Projects', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'projects',
	                        'label' 		=> esc_html__( 'Projects', 'wrapit' ),
	                        'type' 			=> 'autocomplete',
	                        'options'		=> array(
	                        	'multiple'		=> true,
	                        	'post_type'		=> 'project'
	                        )
	                    ),
	                    array(
	                        'name' 			=> 'items',
	                        'label' 		=> esc_html__( 'Number Of Projects', 'wrapit' ),
	                        'type' 			=> 'text',
	                        "description" 	=> esc_html__("Input number of items instead of comma separated list. ( -1 to display all )","wrapit")
	                    ),
	                    array(
	                        'name' 			=> 'orderby',
	                        'label' 		=> esc_html__( 'Order By', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'date'			=> esc_html__( 'Date', 'wrapit' ),
								'title'			=> esc_html__( 'Title', 'wrapit' ),
								'rand'			=> esc_html__( 'Random', 'wrapit' ),
								'post__in'		=> esc_html__( 'Respect Projects IDs', 'wrapit' ),
	                        ),
	                    ),
	                    array(
	                        'name' 			=> 'style',
	                        'label' 		=> esc_html__( 'Style', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'overlay_hover'			=> esc_html__( 'Caption On Hover', 'wrapit' ),
								'side_caption'			=> esc_html__( 'Side Caption', 'wrapit' ),
	                        ),
	                    ),	                    
	                    array(
	                        'name' 			=> 'order',
	                        'label' 		=> esc_html__( 'Order', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'ASC'	=> esc_html__( 'Ascending', 'wrapit' ),
								'DESC'	=> esc_html__( 'Descending', 'wrapit' ),
	                        ),
	                    ),
	                    array(
	                        'name' 			=> 'per_row',
	                        'label' 		=> esc_html__( 'Projects In Row', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'3' => '3',
								'4' => '4',
								'5' => '5',
	                        ),
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_service' => array(
	                'name' 			=> esc_html__( 'Service', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'icon',
	                        'label' 		=> esc_html__( 'Icon', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> wrapit_ionicons_list()
	                    ),
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Title', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'title_color',
	                        'label' 		=> esc_html__( 'Title Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                    array(
	                        'name' 			=> 'text',
	                        'label' 		=> esc_html__( 'Text', 'wrapit' ),
	                        'type' 			=> 'textarea',
	                    ),
	                    array(
	                        'name' 			=> 'text_color',
	                        'label' 		=> esc_html__( 'Text Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_slider' => array(
	                'name' 			=> esc_html__( 'Slider', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'id',
	                        'label' 		=> esc_html__( 'Slider', 'wrapit' ),
	                        'type' 			=> 'autocomplete',
	                        'options'		=> array(
	                        	'multiple'		=> false,
	                        	'post_type'		=> 'slider'
	                        )
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_team' => array(
	                'name' 			=> esc_html__( 'Team Member', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'image',
	                        'label' 		=> esc_html__( 'Team Avatar', 'wrapit' ),
	                        'type' 			=> 'attach_image',
	                    ),
	                    array(
	                        'name' 			=> 'facebook',
	                        'label' 		=> esc_html__( 'Facebook Link', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'twitter',
	                        'label' 		=> esc_html__( 'Twitter Link', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'google',
	                        'label' 		=> esc_html__( 'Google Link', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Team Member Name', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'position',
	                        'label' 		=> esc_html__( 'Team Member Position', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'description',
	                        'label' 		=> esc_html__( 'Team Member Description', 'wrapit' ),
	                        'type' 			=> 'textarea',
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_testimonials' => array(
	                'name' 			=> esc_html__( 'Testimonials', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'testimonials',
	                        'options'		=> array( 'add_text' => esc_html__( 'Add New Testimonial', 'wrapit' ) ),
	                        'label' 		=> esc_html__( 'Team Avatar', 'wrapit' ),
	                        'type' 			=> 'group',
	                        'params'		=> array(
			                    array(
			                        'name' 			=> 'image',
			                        'label' 		=> esc_html__( 'Select Avatar', 'wrapit' ),
			                        'type' 			=> 'attach_image',
			                    ),
			                    array(
			                        'name' 			=> 'testimonial',
			                        'label' 		=> esc_html__( 'Testimonial Text', 'wrapit' ),
			                        'type' 			=> 'textarea',
			                    ),
			                    array(
			                        'name' 			=> 'name',
			                        'label' 		=> esc_html__( 'Testimonial Name', 'wrapit' ),
			                        'type' 			=> 'text',
			                    ),
			                    array(
			                        'name' 			=> 'subtitle',
			                        'label' 		=> esc_html__( 'Testimonial Person Subtitle', 'wrapit' ),
			                        'type' 			=> 'text',
			                    ),
			                    array(
			                        'name' 			=> 'grade',
			                        'label' 		=> esc_html__( 'Testimonial Grade', 'wrapit' ),
			                        'type' 			=> 'select',
			                        'options'		=> array(
										'1' => '1',
										'2' => '2',
										'3' => '3',
										'4' => '4',
										'5' => '5',
			                        )
			                    ),
	                        )
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_title' => array(
	                'name' 			=> esc_html__( 'Title', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Title', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'title_color',
	                        'label' 		=> esc_html__( 'Title Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                    array(
	                        'name' 			=> 'heading',
	                        'label' 		=> esc_html__( 'Heading', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5',
								'6' => '6',
	                        )
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_title_icon' => array(
	                'name' 			=> esc_html__( 'Title Icon', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Title', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'title_color',
	                        'label' 		=> esc_html__( 'Title Color', 'wrapit' ),
	                        'type' 			=> 'color_picker',
	                    ),
	                    array(
	                        'name' 			=> 'heading',
	                        'label' 		=> esc_html__( 'Heading', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5',
								'6' => '6',
	                        )
	                    ),
	                    array(
	                        'name' 			=> 'icon',
	                        'label' 		=> esc_html__( 'Icon', 'wrapit' ),
	                        'type' 			=> 'icon_picker',
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_image_box' => array(
	                'name' 			=> esc_html__( 'Image Box', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Title', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'subtext',
	                        'label' 		=> esc_html__( 'Text', 'wrapit' ),
	                        'type' 			=> 'textarea',
	                    ),
	                    array(
	                        'name' 			=> 'link',
	                        'label' 		=> esc_html__( 'Link', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'image',
	                        'label' 		=> esc_html__( 'Background Image', 'wrapit' ),
	                        'type' 			=> 'attach_image',
	                    ),
	                )
	            ),
	        )
	    );

	    kc_add_map(
	        array(
	            'wi_side_image_box' => array(
	                'name' 			=> esc_html__( 'Side Image Box', 'wrapit' ),
	                'icon' 			=> 'sl-paper-plane',
	                'category' 		=> 'Content',
	                'params' 		=> array(
	                    array(
	                        'name' 			=> 'title',
	                        'label' 		=> esc_html__( 'Title', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'subtext',
	                        'label' 		=> esc_html__( 'Text', 'wrapit' ),
	                        'type' 			=> 'textarea',
	                    ),
	                    array(
	                        'name' 			=> 'link',
	                        'label' 		=> esc_html__( 'Link', 'wrapit' ),
	                        'type' 			=> 'text',
	                    ),
	                    array(
	                        'name' 			=> 'image',
	                        'label' 		=> esc_html__( 'Background Image', 'wrapit' ),
	                        'type' 			=> 'attach_image',
	                    ),
	                    array(
	                        'name' 			=> 'image_position',
	                        'label' 		=> esc_html__( 'Image Position', 'wrapit' ),
	                        'type' 			=> 'select',
	                        'options'		=> array(
	                        	'left'	=> esc_html__( 'Left', 'wrapit' ),
	                        	'right'	=> esc_html__( 'Right', 'wrapit' ),
	                        )
	                    ),
	                )
	            ),
	        )
	    );

	}
}  
add_action('init', 'wrapit_map_shortcodes', 99 );
}

if( !function_exists('wrapit_autocomplete_post_type') ){
function wrapit_autocomplete_post_type( $data ){

	$params = array(
		'post_type'			=> $_POST['post_type'],
		'posts_per_page'	=> '-1',
		'post_status'		=> 'publish',
		's'					=> $_POST['s']
	);

	if( !empty( $_POST['category'] ) ){
		$params['meta_query'] = array(
			array(
				'key' 		=> '_sale_price',
				'value' 	=> 0,
				'compare' 	=> '>',
				'type'		=> 'NUMERIC'
			)
		);
	}

	$posts = get_posts( $params );

	$result = array();
	if( !empty( $posts ) ){
		foreach( $posts as $post ){
			$result[] = $post->ID.':'.$post->post_title;
		}
	}

    return array( 'Results' => $result ); 
}
add_filter( 'kc_autocomplete_blog_items', 'wrapit_autocomplete_post_type' );
add_filter( 'kc_autocomplete_id', 'wrapit_autocomplete_post_type' );
add_filter( 'kc_autocomplete_projects', 'wrapit_autocomplete_post_type' );
add_filter( 'kc_autocomplete_slider', 'wrapit_autocomplete_post_type' );
}


if( !function_exists('wrapit_prepare_autocomplete_results') ){
function wrapit_prepare_autocomplete_results( $result ){
	$sanitized_result = array();
	$list = explode( ',', $result );
	if( !empty( $list ) ){
		foreach( $list as $item ){
			$temp = explode( ':', $item );
			$sanitized_result[] = $temp[0];
		}
	}

	return $sanitized_result;
}
}
?>