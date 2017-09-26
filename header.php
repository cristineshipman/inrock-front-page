<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$top_bar_message = wrapit_get_option( 'top_bar_message' );
$top_bar_facebook = wrapit_get_option( 'top_bar_facebook' );
$top_bar_twitter = wrapit_get_option( 'top_bar_twitter' );
$top_bar_google = wrapit_get_option( 'top_bar_google' );
$top_bar_instagram = wrapit_get_option( 'top_bar_instagram' );
$top_bar_linkedin = wrapit_get_option( 'top_bar_linkedin' );

if( !empty( $top_bar_message ) || !empty( $top_bar_facebook ) || !empty( $top_bar_twitter ) || !empty( $top_bar_google ) || !empty( $top_bar_instagram ) || !empty( $top_bar_linkedin ) || function_exists('icl_get_languages') ):
?>
<div class="top-bar">
	<div class="container">
		<div class="flex-wrap">
			<div class="flex-left">
				<?php echo  $top_bar_message ?>
			</div>
			<div class="flex-right">
				<?php if( !empty( $top_bar_facebook ) ): ?>
					<a href="<?php echo esc_url( $top_bar_facebook ) ?>">
						<i class="ion-social-facebook"></i>
					</a>
				<?php endif; ?>
				<?php if( !empty( $top_bar_twitter ) ): ?>
					<a href="<?php echo esc_url( $top_bar_twitter ) ?>">
						<i class="ion-social-twitter"></i>
					</a>
				<?php endif; ?>
				<?php if( !empty( $top_bar_google ) ): ?>
					<a href="<?php echo esc_url( $top_bar_google ) ?>">
						<i class="ion-social-google"></i>
					</a>
				<?php endif; ?>
				<?php if( !empty( $top_bar_instagram ) ): ?>
					<a href="<?php echo esc_url( $top_bar_instagram ) ?>">
						<i class="ion-social-instagram"></i>
					</a>
				<?php endif; ?>
				<?php if( !empty( $top_bar_linkedin ) ): ?>
					<a href="<?php echo esc_url( $top_bar_linkedin ) ?>">
						<i class="ion-social-linkedin"></i>
					</a>
				<?php endif; ?>
				<?php 
				if( function_exists('icl_get_languages') ){
					$languages = icl_get_languages();
					if( !empty( $languages ) ){
						echo '<div class="styled-select language-selector"><select>';
	                    foreach( $languages as $key => $language_data ){
	                    	echo '<option value="'.esc_attr( $language_data['url'] ).'" '.( $language_data['active'] == '1' ? 'selected="selected"' : '' ).'>'.$language_data['native_name'].'</option>';
	                    }
	                    echo '</select></div>';
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php
$header_style = wrapit_get_option( 'header_style' );
if( isset( $_GET['header_style'] ) ){
	$header_style = $_GET['header_style'];
}
?>
<header class="<?php echo esc_attr( $header_style ) ?>">
	<div class="container">
		<div class="header-top">
			<div class="flex-left">
				<?php include( get_theme_file_path( 'includes/header/logo.php' ) ); ?>
			</div>
			<div class="flex-right">
				<button class="navbar-toggle button-white menu" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'wrapit' ) ?></span>
					<i class="ion-navicon"></i>
				</button>
				<div class="hide-small">
				<?php 
					if( $header_style == 'bottom' ){
						include( get_theme_file_path('includes/header/infos.php') );
					}
					else{
						echo '<div class="fixed-responsive-nav">';
							include( get_theme_file_path('includes/header/navigation.php') );
						echo '</div>';
					}
				?>
				</div>
			</div>
		</div>
	</div>

	<div class="black"></div>

	<div class="navigation-wrap <?php echo  $header_style == 'bottom' ? esc_attr('') : esc_attr( 'show-small' ) ?>">
		<div class="container">		
			<?php include( get_theme_file_path('includes/header/navigation.php') ); ?>
		</div>
	</div>
</header>
<div class="fixed-responsive-nav animation sticky-nav">
	<div class="container">
		<div class="flex-wrap">
			<div class="flex-left">
				<?php include( get_theme_file_path( 'includes/header/logo.php' ) ) ?>
			</div>
			<div class="flex-right">
				<div class="nav-paste"></div>
			</div>
		</div>
	</div>
</div>
<?php if( $header_style == 'bottom' ): ?>
<div class="show-small">
	<?php include( get_theme_file_path('includes/header/infos.php') ); ?>
</div>
<?php endif; ?>
<?php 
if( is_front_page() && get_page_template_slug() !== 'page-tpl_home.php' ){
	$home_slider = wrapit_get_option( 'home_slider' );
	if( !empty( $home_slider ) ){
		echo do_shortcode( $home_slider );
	}
	else{
		echo '<div class="slider-gap"></div>';
	}
}
?>