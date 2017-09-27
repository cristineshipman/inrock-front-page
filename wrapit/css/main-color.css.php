<?php
	$header_bg_color = wrapit_get_option( 'header_bg_color' );
	$header_box_icon_color = wrapit_get_option( 'header_box_icon_color' );
	$header_box_text_color = wrapit_get_option( 'header_box_text_color' );
	$main_color = wrapit_get_option( 'main_color' );
	$main_font_color = wrapit_get_option( 'main_font_color' );
	$text_font = wrapit_get_option( 'text_font' );
	$title_font = wrapit_get_option( 'title_font' );
	$navigation_font = wrapit_get_option( 'navigation_font' );
	$breadcrumbs_font_color = wrapit_get_option( 'breadcrumbs_font_color' );
	$top_bar_bg_color = wrapit_get_option( 'top_bar_bg_color' );
	$top_bar_font_color = wrapit_get_option( 'top_bar_font_color' );
	$top_bar_icon_color = wrapit_get_option( 'top_bar_icon_color' );
	$copyrights_bg_color = wrapit_get_option( 'copyrights_bg_color' );
	$copyrights_font_color = wrapit_get_option( 'copyrights_font_color' );

	$custom_css = wrapit_get_option( 'custom_css' );
?>

a:hover, a:focus, a:active,
a.grey:hover,
.ind-slide-caption h2,
.ind-slide-caption a,
.blog-title:hover h5,
.breadcrumb a:hover,
.navigation .nav.navbar-nav li.open > a,
.navigation .nav.navbar-nav > li > a:hover,
.navigation .nav.navbar-nav > li > a:focus ,
.navigation .nav.navbar-nav > li > a:active,
.navigation .nav.navbar-nav > li.current > a,
.navigation .navbar-nav > li.current-menu-parent > a, 
.navigation .navbar-nav > li.current-menu-ancestor > a, 
.navigation .navbar-nav > li.current-menu-item  > a,
.fixed-responsive-nav .navigation .nav.navbar-nav ul li.open > a,
.widget_nav_menu .current-menu-item a,
.fake-thumb-holder .post-format,
.comment-reply-link:hover,
.footer_widget_section .widget a:not(.btn):hover,
.service span,
.ind-title-icon i,
.testimonial-item .grade,
.project-filters .active,
.team-member .social a,
.woocommerce ul.products li.product h3:hover,
.woocommerce a.button:hover, 
.woocommerce button.button:hover, 
.woocommerce input.button:hover,
.woocommerce .star-rating span,
.woocommerce p.stars a
{
	color: <?php echo  $main_color ?>;
}

.navigation .nav.navbar-nav .dropdown-menu li.open > a:before,
.navigation .nav.navbar-nav .dropdown-menu li > a:hover:before,
.navigation .nav.navbar-nav .dropdown-menu  li > a:focus:before,
.navigation .nav.navbar-nav .dropdown-menu  li > a:active:before,
.navigation .nav.navbar-nav .dropdown-menu  li.current > a:before,
.navigation .navbar-nav .dropdown-menu  li.current-menu-parent > a:before, 
.navigation .navbar-nav .dropdown-menu  li.current-menu-ancestor > a:before, 
.navigation .navbar-nav .dropdown-menu  li.current-menu-item  > a:before,
.fixed-responsive-nav .navigation .nav.navbar-nav > li > a:hover:after,
.fixed-responsive-nav .navigation .nav.navbar-nav > li > a:focus:after,
.fixed-responsive-nav .navigation .nav.navbar-nav > li > a:active:after,
.fixed-responsive-nav .navigation .nav.navbar-nav > li.current > a:after,
.fixed-responsive-nav .navigation .navbar-nav > li.current-menu-parent > a:after, 
.fixed-responsive-nav .navigation .navbar-nav > li.current-menu-ancestor > a:after, 
.fixed-responsive-nav .navigation .navbar-nav > li.current-menu-item  > a:after{
	background: <?php echo  $main_color ?>;
}

.ind-slide-caption a:hover,
.tagcloud a, .btn, a.btn, a.btn:active, a.btn.active,
.ind-cta a.btn:hover,
.sticky-wrap,
.widget_widget_file_download i:after,
.widget_widget_file_download a:hover,
.widget_widget_file_download a:hover,
section.footer_widget_section .widget.widget_widget_file_download a:hover,
.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt[disabled]:disabled, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover,
.woocommerce #respond input#submit,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
body .flex-control-paging li a.flex-active,
body .theme-default .nivo-controlNav a.active
{
	background: <?php echo  $main_color ?>;
	color: <?php echo  $main_font_color ?>;
}

.btn.btn-inv:hover, .btn.btn-inv:focus, .btn.btn-inv:active,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce nav.woocommerce-pagination ul li a, 
.woocommerce nav.woocommerce-pagination ul li span
{
	background-color: <?php echo  $main_color ?>;
	color: <?php echo  $main_font_color ?>;	
}


.ind-slide-caption a,
input.form-control, .form-control, .form-control:focus, .form-control:active, .form-control:focus:active, 
#commentform input:not(#submit), #commentform textarea,
.widget_widget_file_download  a,
.widget_categories li:hover span,
.widget_product_categories li:hover span,
.widget_layered_nav li:hover span,
.widget_archive li:hover span,
.widget-title,
.service:hover .service-icon-wrap,
.ind-title-wrap h1,
.ind-title-wrap h2,
.ind-title-wrap h3,
.ind-title-wrap h4,
.ind-title-wrap h5,
.ind-title-wrap h6,
.testimonials .owl-dot.active,
.clients.owl-carousel .client:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-billing-fields h3,
.woocommerce-order-received h2,
.woocommerce-order-received h3,
.woocommerce-account h2,
.woocommerce-account h3,
.checkout.woocommerce-checkout h3,
#ship-to-different-address,
.related.products h2,
.cart_totals h2,
.upsells.products h2,
.projects-wrap.side_caption .project-caption
{
	border-color: <?php echo  $main_color ?>;
}

@media only screen and (max-width: 769px) {
	.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, 
	.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus,
	.navbar-default .navbar-nav .open .dropdown-menu > li > a:active
	.navbar-default .navbar-nav .open .dropdown-menu > li.current > a,
	.navbar-default .navbar-nav .open .dropdown-menu > li.current-menu-ancestor > a,
	.navbar-default .navbar-nav .open .dropdown-menu > li.current-menu-item > a,
	.navbar-default .navbar-nav .open .dropdown-menu > li.current-menu-parent > a{
		color: <?php echo  $main_color ?>;
	}
}


body{
	font-family: "<?php echo  $text_font ?>", sans-serif;
}

body .kc_vertical_tabs>.kc_wrapper>ul.ui-tabs-nav,
.header-font,
h1, h2, h3, h4, h5, h6,
.ind-slide-caption a,
.tagcloud a, .btn, a.btn, a.btn:active, a.btn.active,
.nav.navbar-nav li a{
	font-family: "<?php echo  $title_font ?>", sans-serif;
}

.nav.navbar-nav li a{
	font-family: "<?php echo  $navigation_font ?>", sans-serif;
}

.page-title h1,
.page-title h1 a,
.woocommerce .woocommerce-breadcrumb,
.woocommerce .woocommerce-breadcrumb a,
.breadcrumb,
ul.breadcrumb a,
.breadcrumb > li + li:before {
	color: <?php echo  $breadcrumbs_font_color ?>;
}


header{
	background-color: <?php echo  $header_bg_color ?>;
}

header .header-boxes i{
	color: <?php echo  $header_box_icon_color; ?>;
}

header .header-boxes h5,
header .icon-details p{
	color: <?php echo  $header_box_text_color; ?>;
}


.top-bar
{
	background: <?php echo  $top_bar_bg_color ?>;
}

.top-bar{
	color: <?php echo  $top_bar_font_color ?>;
}

.top-bar a{
	color: <?php echo  $top_bar_icon_color ?>;
}

.copyrights{
	background: <?php echo  $copyrights_bg_color ?>;
	color: <?php echo  $copyrights_font_color ?>;
}

<?php if( !empty( $custom_css ) ){
	echo  $custom_css;
} ?>