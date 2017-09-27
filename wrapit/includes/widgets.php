<?php

/*Fields array
array(
	array(
		'id' => ''
		'title' => ''
		'type' => ''
		if( type is select )
			'options' => array()
			'multiple' => false / true
		endif
		'default' => ''
	)
)
*/

if( !class_exists('WrapIt_Widget') ){
class WrapIt_Widget extends WP_Widget {
	
	public $properties;
	public $widget_instance;

	function __construct() {
		parent::__construct( 
			$this->properties['id'], 
			$this->properties['title'], 
			array('description' => $this->properties['description'] )
		);
	}

	function widget($args, $instance) {
		$defaults = array();
		if( !empty( $this->properties['fields'] ) ){
			foreach( $this->properties['fields'] as $field ){
				if( empty( $instance[$field['id']] ) ){
					if( !empty( $field['default'] ) ){
						$instance[$field['id']] = $field['default'];
					}
					else{
						if( $field['type'] == 'text' ){
							$instance[$field['id']] = '';
						}
						else if( $field['type'] == 'select' ){
							$instance[$field['id']] = array();	
						}
					}
				}

				if( !empty( $field['filter'] ) ){
					$instance[$field['id']] == apply_filters( $field['filter'], $instance[$field['id']], $instance, $this->id_base );
				}
			}
		}

		$this->widget_instance = $instance;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		if( !empty( $this->properties['fields'] ) ){
			foreach( $this->properties['fields'] as $field ){
				$instance[$field['id']] = strip_tags( $new_instance[$field['id']] );
			}
		}
		return $instance;
	}

	function form( $instance ) {
		if( !empty( $this->properties['fields'] ) ){
			foreach( $this->properties['fields'] as $field ){
				if( $field['type'] == 'text' ){
					$value = isset( $instance[$field['id']] ) ? $instance[$field['id']] : '';
					?>
					<p><label for="<?php echo esc_attr( $this->get_field_id( $field['id'] ) ); ?>"><?php echo  $field['title']; ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $field['id'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $field['id'] ) ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>" /></p>
					<?php
				}
				else if( $field['type'] == 'select' ){
					$values = isset( $instance[$field['id']] ) ? (array)$instance[$field['id']] : array();
					?>
					<p><label for="<?php echo esc_attr( $this->get_field_id( $field['id'] ) ); ?>"><?php echo  $field['title']; ?></label>
					<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( $field['id'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $field['id'] ) ); ?>" <?php echo !empty( $field['multiple'] ) && $field['multiple'] ? 'multiple="multiple"' : '' ?>>
						<?php
						if( !empty( $field['options'] ) ){
							foreach( $field['options'] as $value => $label ){
								?>
								<option value="<?php echo esc_attr( $value ) ?>" <?php echo in_array( $value, $values ) ? 'selected="selected"' : '' ?>><?php echo  $label ?></option>
								<?php
							}
						}
						?>
					</select></p>
					<?php
				}
			}
		}
	}

	function start_widget( $args, $title = '' ){
		extract( $args );
		echo  $before_widget;
		if ( $title ){
			echo  $before_title . $title . $after_title; 
		}
	}

	function end_widget( $args ){
		extract( $args );
		echo  $after_widget;
	}
}
}

if( !class_exists('WrapIt_Widget_Posts') ){
class WrapIt_Widget_Posts extends WrapIt_Widget {
	function __construct(){
		$this->properties =	array(
			'id' => 'wrapit_custom_posts',
			'title' => esc_html__('WrapIt Recent Posts','wrapit'),
			'description' => esc_html__('Display recent posts','wrapit'),
			'fields' => array(
				array(
					'id' => 'title',
					'title' => esc_html__( 'Title', 'wrapit' ),
					'type' => 'text',
					'filter' => 'widget_title'
				),
				array(
					'id' => 'number',
					'title' => esc_html__( 'Number', 'wrapit' ),
					'type' => 'text'
				),
			)
		);
		parent::__construct();
	}

	function widget( $args, $instance ) {
		parent::widget( $args, $instance );
		extract( $this->widget_instance );

		$this->start_widget( $args, $title );

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()):
		?>
			<ul class="list-unstyled">
			<?php 
			while ( $r->have_posts() ) : 
				$r->the_post();
				?>
					<li class="flex-wrap">
						<div class="flex-left">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'wrapit-small-thumb' ); ?>
							</a>
						</div>
						<div class="flex-right">
							<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							<ul class="list-unstyled list-inline post-meta grey">
								<li>
									<i class="ion-clock"></i><?php the_time( 'F j, Y' ) ?>
								</li>
								<li>
									<i class="ion-ios-chatbubble-outline"></i><?php comments_number( esc_html__( '0', 'wrapit' ), esc_html__( '1', 'wrapit' ), esc_html__( '%', 'wrapit' ) ); ?>
								</li>								
							</ul>
						</div>
					</li>
				<?php
			endwhile; ?>
			</ul>
		<?php
		endif;

		wp_reset_postdata();
		$this->end_widget( $args );
	}
}
}

if( !class_exists('WrapIt_Widget_Recent_Comments') ){
class WrapIt_Widget_Recent_Comments extends WrapIt_Widget {
	function __construct(){
		$this->properties =	array(
			'id' => 'wrapit_recent_comments',
			'title' => esc_html__('WrapIt Recent Comments','wrapit'),
			'description' => esc_html__('Display recent comments','wrapit'),
			'fields' => array(
				array(
					'id' => 'title',
					'title' => esc_html__( 'Title', 'wrapit' ),
					'type' => 'text',
					'filter' => 'widget_title'
				),
				array(
					'id' => 'number',
					'title' => esc_html__( 'Number', 'wrapit' ),
					'type' => 'text'
				),
			)
		);
		parent::__construct();
	}

	function widget( $args, $instance ) {
		global $comments, $comment;
		parent::widget( $args, $instance );
		extract( $this->widget_instance );

		$this->start_widget( $args, $title );

		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $number,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );

		if ( $comments ) {

			foreach ( (array) $comments as $comment) {
				$comment_text = get_comment_text( $comment->comment_ID );
				if( strlen( $comment_text ) > 100 ){
					$comment_text = substr( $comment_text, 0, 100 );
					$comment_text = substr( $comment_text, 0, strripos( $comment_text, " "  ) );
					$comment_text .= "...";
				}
				$url  = wrapit_get_avatar_url( get_avatar( $comment, 60 ) );
				
				echo  '<div class="recent_comments_header">
								<div class="widget-image-thumb">
									<img src="'.esc_url( $url ).'" class="img-responsive" width="60" height="60" alt=""/>
								</div>
								
								<div class="widget-text">
									'.get_comment_author_link().'
									<p class="grey"><i class="ion-clock"></i>'.human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' '.esc_html__( 'ago', 'wrapit' ).'</p>
								</div>
							</div>
							<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' .$comment_text. '</a>';
			}
		}

		$this->end_widget( $args );
	}
}
}

if( !class_exists('WrapIt_Social') ){
class WrapIt_Social extends WrapIt_Widget{
	function __construct(){
		$this->properties =	array(
			'id' => 'widget_social',
			'title' => esc_html__('WrapIt Social Follow','wrapit'),
			'description' => esc_html__('Adds list of the social icons','wrapit'),
			'fields' => array(
				array(
					'id' => 'title',
					'title' => esc_html__( 'Title', 'wrapit' ),
					'type' => 'text',
					'filter' => 'widget_title'
				),
				array(
					'id' => 'facebook',
					'title' => esc_html__( 'Facebook', 'wrapit' ),
					'type' => 'text'
				),
				array(
					'id' => 'twitter',
					'title' => esc_html__( 'Twitter', 'wrapit' ),
					'type' => 'text'
				),
				array(
					'id' => 'google',
					'title' => esc_html__( 'Google+', 'wrapit' ),
					'type' => 'text'
				),
				array(
					'id' => 'linkedin',
					'title' => esc_html__( 'Linkedin', 'wrapit' ),
					'type' => 'text'
				),
				array(
					'id' => 'pinterest',
					'title' => esc_html__( 'Pinterest', 'wrapit' ),
					'type' => 'text'
				),
				array(
					'id' => 'youtube',
					'title' => esc_html__( 'YouTube', 'wrapit' ),
					'type' => 'text'
				),
				array(
					'id' => 'instagram',
					'title' => esc_html__( 'Instagram', 'wrapit' ),
					'type' => 'text'
				),
				array(
					'id' => 'skype',
					'title' => esc_html__( 'Skype', 'wrapit' ),
					'type' => 'text'
				),
			)
		);
		parent::__construct();
	}

	function widget($args, $instance) {
		parent::widget( $args, $instance );
		extract( $this->widget_instance );

		$this->start_widget( $args, $title );

		$facebook = !empty( $facebook ) ? '<a href="'.esc_url( $facebook ).'" target="_blank" class="btn"><span class="ion-social-facebook"></span></a>' : '';
		$twitter = !empty( $twitter ) ? '<a href="'.esc_url( $twitter ).'" target="_blank" class="btn"><span class="ion-social-twitter"></span></a>' : '';
		$google = !empty( $google ) ? '<a href="'.esc_url( $google ).'" target="_blank" class="btn"><span class="ion-social-google"></span></a>' : '';
		$linkedin = !empty( $linkedin ) ? '<a href="'.esc_url( $linkedin ).'" target="_blank" class="btn"><span class="ion-social-linkedin"></span></a>' : '';
		$pinterest = !empty( $pinterest ) ? '<a href="'.esc_url( $pinterest ).'" target="_blank" class="btn"><span class="ion-social-pinterest"></span></a>' : '';
		$youtube = !empty( $youtube ) ? '<a href="'.esc_url( $youtube ).'" target="_blank" class="btn"><span class="ion-social-youtube"></span></a>' : '';
		$instagram = !empty( $instagram ) ? '<a href="'.esc_url( $instagram ).'" target="_blank" class="btn"><span class="ion-social-instagram"></span></a>' : '';
		$skype = !empty( $skype ) ? '<a href="'.esc_url( $skype ).'" target="_blank" class="btn"><span class="ion-social-skype"></span></a>' : '';

		echo '<div class="widget-social">';
			echo  $facebook.$twitter.$google.$linkedin.$pinterest.$youtube.$instagram.$skype;
		echo '</div>';
		
		$this->end_widget( $args );
	}
}
}

if( !class_exists('WrapIt_Subscribe') ){
class WrapIt_Subscribe extends WrapIt_Widget{
	function __construct(){
		$this->properties =	array(
			'id' => 'widget_subscribe',
			'title' => esc_html__('WrapIt Subscribe','wrapit'),
			'description' => esc_html__('Adds subscribe form in the sidebar','wrapit'),
			'fields' => array(
				array(
					'id' => 'title',
					'title' => esc_html__( 'Title', 'wrapit' ),
					'type' => 'text',
					'filter' => 'widget_title'
				)
			)
		);
		parent::__construct();
	}

	function widget($args, $instance) {
		parent::widget( $args, $instance );
		extract( $this->widget_instance );

		$this->start_widget( $args, $title );

		echo '<div class="subscribe-form">
				<div class="wrapit-form">
					<input type="text" class="form-control email" placeholder="'.esc_attr__( 'Input email here...', 'wrapit' ).'">
					<a href="javascript:;" class="btn btn-default subscribe"><i class="ion-social-rss"></i></a>
				</div>
				<div class="sub_result"></div>
			  </div>';
		
		$this->end_widget( $args );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', 'wrapit') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>	
		<?php
	}
}
}

if( !class_exists('WrapIt_Image_Banner') ){
class WrapIt_Image_Banner extends WrapIt_Widget{
	function __construct(){
		$this->properties =	array(
			'id' => 'widget_image_banner',
			'title' => esc_html__('WrapIt Image Banner','wrapit'),
			'description' => esc_html__('Add image with link','wrapit'),
			'fields' => array(
				array(
					'id' => 'title',
					'title' => esc_html__( 'Title', 'wrapit' ),
					'type' => 'text',
					'filter' => 'widget_title'
				),
				array(
					'id' => 'link',
					'title' => esc_html__( 'Link', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'image',
					'title' => esc_html__( 'Image ID', 'wrapit' ),
					'type' => 'text',
				)
			)
		);
		parent::__construct();
	}

	function widget( $args, $instance ) {
		parent::widget( $args, $instance );
		extract( $this->widget_instance );

		$this->start_widget( $args, $title );

		echo '<div class="widget-content">';
			echo '<a href="'.esc_url( $link ).'">';
			echo wp_get_attachment_image( $image, 'full' );
			echo '</a>';
		echo '</div>';
		
		$this->end_widget( $args );
	}
}
}

if( !class_exists('WrapIt_File_Download') ){
class WrapIt_File_Download extends WrapIt_Widget{
	function __construct(){
		$this->properties =	array(
			'id' => 'widget_file_download',
			'title' => esc_html__('WrapIt File Download','wrapit'),
			'description' => esc_html__('Add file to download from the site','wrapit'),
			'fields' => array(
				array(
					'id' => 'title',
					'title' => esc_html__( 'Title', 'wrapit' ),
					'type' => 'text',
					'filter' => 'widget_title'
				),
				array(
					'id' => 'file_link_1',
					'title' => esc_html__( 'Link or attachment ID 1', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_text_1',
					'title' => esc_html__( 'Text 1', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_link_2',
					'title' => esc_html__( 'Link or attachment ID  2', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_text_2',
					'title' => esc_html__( 'Text 2', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_link_3',
					'title' => esc_html__( 'Link or attachment ID  3', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_text_3',
					'title' => esc_html__( 'Text 3', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_link_4',
					'title' => esc_html__( 'Link or attachment ID  4', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_text_4',
					'title' => esc_html__( 'Text 4', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_link_5',
					'title' => esc_html__( 'Link or attachment ID  5', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'file_text_5',
					'title' => esc_html__( 'Text 5', 'wrapit' ),
					'type' => 'text',
				),
			)
		);
		parent::__construct();
	}

	function widget($args, $instance) {
		parent::widget( $args, $instance );
		extract( $this->widget_instance );

		$this->start_widget( $args, $title );

		for( $i=1; $i<=5; $i++ ){
			$file_link = 'file_link_'.$i;
			$file_text = 'file_text_'.$i;

			if( !empty( $$file_link ) ){
				if( is_numeric( $$file_link ) ){
					if( function_exists('icl_object_id') ){
						$$file_link = icl_object_id( $$file_link, 'attachment', true );
					}

					$$file_link = wp_get_attachment_url( $$file_link );
				}
				echo '<div class="widget-content">';
					echo '<a href="'.esc_url( $$file_link ).'" target="_blank"><i class="ion-android-attach"></i>';
					echo  $$file_text;
					echo '</a>';
				echo '</div>';
			}
		}	

		$this->end_widget( $args );
	}
}
}

if( !function_exists('wrapit_widgets_register') ){
function wrapit_widgets_register() {
	if ( !is_blog_installed() ){
		return;
	}	
	/* register new ones */
	register_widget('WrapIt_Widget_Posts');
	register_widget('WrapIt_Widget_Recent_Comments');
	register_widget('WrapIt_Social');
	register_widget('WrapIt_Subscribe');
	register_widget('WrapIt_Image_Banner');
	register_widget('WrapIt_File_Download');
}

add_action('widgets_init', 'wrapit_widgets_register', 20);
}
?>