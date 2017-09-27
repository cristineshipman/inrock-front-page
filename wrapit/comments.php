<?php if ( comments_open() ) :?>
	<?php if( get_comments_number() > 0 ): ?>
		<!-- title -->
		<div class="widget-title-wrap">
			<h5 class="widget-title">
				<?php comments_number( esc_html__( 'No Comments', 'wrapit' ), esc_html__( '1 Comment', 'wrapit' ), esc_html__( '% Comments', 'wrapit' ) ); ?>
			</h5>
		</div>
		<!--.title -->
	
		<!-- comments -->
		<div class="comment-content comments">
			<?php if( have_comments() ):?>
				<?php wp_list_comments( array(
					'callback' => 'wrapit_comments',
					'end-callback' => 'wrapit_end_comments',
					'style' => 'div'
				)); ?>
			<?php endif; ?>
			<!-- comments pagination -->
			<?php
				$comment_links = paginate_comments_links( 
					array(
						'echo' => false,
						'type' => 'array',
						'prev_next' => false,
						'separator' => ' ',
					) 
				);
				if( !empty( $comment_links ) ):
			?>
				<div class="comments-pagination-wrap">
					<div class="pagination">
						<?php echo wrapit_format_pagination( $comment_links ); ?>
					</div>
				</div>
			<?php endif; ?>
			<!-- .comments pagination -->			
		</div>
		<!-- .comments -->
	<?php endif; ?>
	<!-- leave comment form -->
	<!-- title -->
	<div class="widget-title-wrap">
		<h5 class="widget-title">
			<?php esc_html_e( 'Leave Comment', 'wrapit' ); ?>
		</h5>
	</div>

	<div id="contact_form">
		<?php
			$comments_args = array(
				'id_form'		=> 'comment-form',
				'label_submit'	=>	esc_html__( 'Send Comment', 'wrapit' ),
				'title_reply'	=>	'',
				'fields'		=>	apply_filters( 'comment_form_default_fields', array(
										'author' => '<div class="form-group has-feedback">
														<label for="name">'.esc_html__( 'Your Name', 'wrapit' ).'</label>
														<input type="text" class="form-control" id="name" name="author">
													</div>',
										'email'	 => '<div class="form-group has-feedback">
														<label for="name">'.esc_html__( 'Your Email', 'wrapit' ).'</label>
														<input type="email" class="form-control" id="email" name="email">
													</div>'
									)),
				'comment_field'	=>	'<div class="form-group has-feedback">
										<label for="name">'.esc_html__( 'Your Comment', 'wrapit' ).'</label>
										<textarea rows="10" cols="100" class="form-control" id="message" name="comment"></textarea>															
									</div>',
				'cancel_reply_link' => esc_html__( 'or cancel reply', 'wrapit' ),
				'comment_notes_after' => '',
				'comment_notes_before' => ''
			);
			comment_form( $comments_args );	
		?>
	</div>
	<!-- content -->
	<!-- .leave comment form -->

<?php endif; ?>