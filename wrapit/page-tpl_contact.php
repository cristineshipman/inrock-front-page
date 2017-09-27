<?php
/*
	Template Name: Page Contact
*/
get_header();
the_post();
get_template_part( 'includes/title' );
?>

<main>
	<div class="container">
		<?php
		$markers = wrapit_get_option( 'markers' );
		if( !empty( $markers ) ):
		?>
		<div class="contact-map hidden">
			<?php
			echo json_encode( $markers );
			?>
		</div>
		<?php endif; ?>

		<div class="clearfix">
			<?php the_content() ?>
		</div>

		<form id="comment-form" class="comment-form contact-form">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group has-feedback">
						<label for="name"><?php esc_html_e( 'Your name', 'wrapit' ) ?></label>
						<input type="text" class="form-control name" id="name" name="name" />
					</div>
					<div class="form-group has-feedback">
						<label for="email"><?php esc_html_e( 'Your email', 'wrapit' ) ?></label>
						<input type="text" class="form-control email" id="email" name="email" />
					</div>
					<div class="form-group has-feedback">
						<label for="subject"><?php esc_html_e( 'Message subject', 'wrapit' ) ?></label>
						<input type="text" class="form-control subject" id="subject" name="subject" />
					</div>						
				</div>
				<div class="col-sm-6">
					<div class="form-group has-feedback">
						<label for="subject"><?php esc_html_e( 'Your message', 'wrapit' ) ?></label>
						<textarea rows="10" cols="100" class="form-control message" id="message" name="message"></textarea>															
					</div>						
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<input type="hidden" name="action" value="contact">
					<p class="form-submit">
						<a href="javascript:;" class="send-contact btn"><?php esc_html_e( 'Send Message', 'wrapit' ) ?> </a>
					</p>
					<div class="send_result"></div>	
				</div>
			</div>
		</form>	
	</div>
</main>
<?php get_footer(); ?>