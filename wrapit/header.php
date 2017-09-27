<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


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