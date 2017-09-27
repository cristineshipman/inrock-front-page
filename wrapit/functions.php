<?php

	/**********************************************************************
	***********************************************************************
	WRAPIT FUNCTIONS
	**********************************************************************/
if( is_dir( get_stylesheet_directory() . '/languages' ) ) {
	load_theme_textdomain('wrapit', get_stylesheet_directory() . '/languages');
}
else{
	load_theme_textdomain('wrapit', get_template_directory() . '/languages');
}


/*
Check for the required plugins
*/
if( !function_exists('wrapit_requred_plugins') ){
function wrapit_requred_plugins(){
	$plugins = array(
		array(
				'name'                 => esc_html__( 'Redux Framework', 'wrapit' ),
				'slug'                 => 'redux-framework',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),
		array(
				'name'                 => esc_html__( 'User Avatar', 'wrapit' ),
				'slug'                 => 'wp-user-avatar',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),
		array(
				'name'                 => esc_html__( 'Smeta', 'wrapit' ),
				'slug'                 => 'smeta',
				'source'               => get_template_directory() . '/lib/plugins/smeta.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),
		array(
				'name'                 => esc_html__( 'King Composer', 'wrapit' ),
				'slug'                 => 'kingcomposer',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),
		array(
				'name'                 => esc_html__( 'WrapIt CPT', 'wrapit' ),
				'slug'                 => 'wrapit-cpt',
				'source'               => get_template_directory() . '/lib/plugins/wrapit-cpt.zip',
				'required'             => true,
				'version'              => '',
				'force_activation'     => false,
				'force_deactivation'   => false,
				'external_url'         => '',
		),		
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
			'domain'           => 'wrapit',
			'default_path'     => '',
			'menu'             => 'install-required-plugins',
			'has_notices'      => true,
			'is_automatic'     => false,
			'message'          => ''
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'wrapit_requred_plugins' );
}

if (!isset($content_width)){
	$content_width = 1170;
}

	
/*
Register sidebars
*/
if( !function_exists('wrapit_widgets_init') ){
function wrapit_widgets_init(){

	register_sidebar(array(
		'name' => esc_html__('Blog Sidebar', 'wrapit') ,
		'id' => 'blog',
		'before_widget' => '<div class="widget clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => esc_html__('Appears on the right side of the blog single page.', 'wrapit')
	));	

	register_sidebar(array(
		'name' => esc_html__('Page Left Sidebar', 'wrapit') ,
		'id' => 'left',
		'before_widget' => '<div class="widget clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => esc_html__('Appears on the left side of the page.', 'wrapit')
	));	
	
	register_sidebar(array(
		'name' => esc_html__('Page Right Sidebar', 'wrapit') ,
		'id' => 'right',
		'before_widget' => '<div class="widget clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => esc_html__('Appears on the right side of the page.', 'wrapit')
	));

	register_sidebar(array(
		'name' => esc_html__('Bottom Sidebar 1', 'wrapit') ,
		'id' => 'bottom-1',
		'before_widget' => '<div class="widget clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => esc_html__('Appears on the right side of the page.', 'wrapit')
	));	

	register_sidebar(array(
		'name' => esc_html__('Bottom Sidebar 2', 'wrapit') ,
		'id' => 'bottom-2',
		'before_widget' => '<div class="widget clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => esc_html__('Appears on the right side of the page.', 'wrapit')
	));	

	register_sidebar(array(
		'name' => esc_html__('Bottom Sidebar 3', 'wrapit') ,
		'id' => 'bottom-3',
		'before_widget' => '<div class="widget clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => esc_html__('Appears on the right side of the page.', 'wrapit')
	));	

	register_sidebar(array(
		'name' => esc_html__('Shop Sidebar', 'wrapit') ,
		'id' => 'shop',
		'before_widget' => '<div class="widget clearfix %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
		'after_title' => '</h5></div>',
		'description' => esc_html__('Appears on the left side of the shop page.', 'wrapit')
	));	

	$mega_menu_sidebars = wrapit_get_option( 'mega_menu_sidebars' );
	if( !empty( $mega_menu_sidebars ) ){
		for( $i=1; $i <= $mega_menu_sidebars; $i++ ){
			register_sidebar(array(
				'name' => esc_html__('Mega Menu Sidebar ', 'wrapit').$i,
				'id' => 'mega-menu-'.$i,
				'before_widget' => '<div class="widget clearfix %2$s" >',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
				'after_title' => '</h5></div>',
				'description' => esc_html__('This will be shown as the dropdown menu in the navigation.', 'wrapit')
			));
		}	
	}

	$page_custom_sidebars = wrapit_get_option( 'page_custom_sidebars' );
	if( !empty( $page_custom_sidebars ) ){
		for( $i=1; $i <= $page_custom_sidebars; $i++ ){
			register_sidebar(array(
				'name' => esc_html__('Custom Sidebar ', 'wrapit').$i,
				'id' => 'custom-sidebar-'.$i,
				'before_widget' => '<div class="widget clearfix %2$s" >',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title-wrap"><h5 class="widget-title">',
				'after_title' => '</h5></div>',
				'description' => esc_html__('This will be shown as right or left sidebar.', 'wrapit')
			));
		}	
	}
		
}
add_action('widgets_init', 'wrapit_widgets_init');
}

/*
Default values of the theme options
*/
if( !function_exists('wrapit_defaults') ){
function wrapit_defaults( $id ){	
	$defaults = array(
		'site_logo' => array( 'url' => '' ),
		'home_slider' => '',
		'direction' => 'ltr',
		'enable_sticky' => 'yes',
		'header_style' => 'bottom',
		'custom_css' => '',
		'top_bar_message' => '',
		'top_bar_facebook' => '',
		'top_bar_google' => '',
		'top_bar_instagram' => '',
		'top_bar_linkedin' => '',
		'header_icon_1' => '',
		'header_icon_1_title' => '',
		'header_icon_1_subtitle' => '',
		'header_icon_2' => '',
		'header_icon_2_title' => '',
		'header_icon_2_subtitle' => '',
		'header_icon_3' => '',
		'header_icon_3_title' => '',
		'header_icon_3_subtitle' => '',
		'products_per_page' => '',
		'page_custom_sidebars' => '2',
		'page_breadcrumbs' => 'side',
		'mail_chimp_api' => '',
		'mail_chimp_list_id' => '',
		'header_bg_color' => '#ffffff',
		'header_box_icon_color' => '#F7C51D',
		'header_box_text_color' => '#202020',
		'show_breadcrumbs' => 'yes',
		'breadcrumbs_image' => array( 'url' => '' ),
		'breadcrumbs_font_color' => '#202020',
		'main_color' => '#F7C51D',
		'main_font_color' => '#202020',
		'text_font' => 'Open Sans',
		'title_font' => 'Roboto',
		'navigation_font' => 'Roboto Condensed',
		'top_bar_bg_color' => '#fff',
		'top_bar_font_color' => '#505050',
		'top_bar_icon_color' => '#202020',
		'copyrights_bg_color' => '#202020',
		'copyrights_font_color' => '#808080',
		'project_next_prev' => 'no',
		'project_orderby' => 'date',
		'project_order' => 'DESC',
		'project_slug' => '',
		'contact_form_email' => '',
		'markers' => '',
		'marker_icon' => '',
		'markers_max_zoom' => '',
		'google_api_key' => '',
		'copyrights' => '',
	);
	
	if( isset( $defaults[$id] ) ){
		return $defaults[$id];
	}
	else{
		
		return '';
	}
}
}

/*
Get value of the option
*/
if( !function_exists('wrapit_get_option') ){
function wrapit_get_option($id){
	global $wrapit_options;
	if( isset( $wrapit_options[$id] ) ){
		$value = $wrapit_options[$id];
		if( isset( $value ) ){
			return $value;
		}
		else{
			return '';
		}
	}
	else{
		return wrapit_defaults( $id );
	}
}
}

/*
Inital theme setup
*/
if( !function_exists('wrapit_setup') ){
function wrapit_setup(){
	add_theme_support('automatic-feed-links');
	add_theme_support( "title-tag" );
	add_theme_support('html5', array(
		'comment-form',
		'comment-list'
	));

	register_nav_menu('main-navigation', esc_html__('Main Navigation', 'wrapit'));
	
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	set_post_thumbnail_size( 900 );
	if (function_exists('add_image_size')){
		add_image_size( 'wrapit-box-thumb', 360, 203, true );
		add_image_size( 'wrapit-small-thumb', 100, 100, true );
		add_image_size( 'wrapit-half-tour', 471 );
		add_image_size( 'wrapit-col-7', 653 );
 	}
	add_editor_style();
}
add_action('after_setup_theme', 'wrapit_setup');
}


/*
Add custom image sizes to the list of the image details
*/
if( !function_exists('wrapit_custom_image_sizes') ){
function wrapit_custom_image_sizes($sizes) {
	$addsizes = array(
		'wrapit-half-tour' => esc_html__( 'WrapIt - 471px', 'wrapit' ),
		'wrapit-col-7' => esc_html__( 'WrapIt - 653px', 'wrapit' ),
	);
	$newsizes = array_merge( $sizes, $addsizes );
	return $newsizes;
}
add_filter('image_size_names_choose', 'wrapit_custom_image_sizes');
}

/*
Enqueue google fonts
*/
if( !function_exists('wrapit_enqueue_font') ){
function wrapit_enqueue_font() {
	$load_fonts = array(
		'title_font' => wrapit_get_option( 'title_font' ),
		'text_font' => wrapit_get_option( 'text_font' ),
		'navigation_font' => wrapit_get_option( 'navigation_font' ),
	);

	$list = array();
	$loaded_fonts = array();
	if( !empty( $load_fonts ) ){
		foreach( $load_fonts as $key => $value ){
			if( !empty($value) && !in_array( $value, $loaded_fonts ) ){
				$list[] = $value.':400,300,700&subset=all';
				$loaded_fonts[] = $value;
			}
		}

		$list = implode( '|', $list );

		$font_family = str_replace( '+', ' ', $list );
	    $font_url = '';
	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'wrapit' ) ) {
	        $font_url = add_query_arg( 'family', urlencode( $font_family ), "//fonts.googleapis.com/css" );
	    }

	    wp_enqueue_style( 'wrapit-fonts', $font_url, array(), '1.0.0' );

	}
}
}

/*
Load necessary scripts and styles
*/
if( !function_exists('wrapit_scripts_styles') ){
function wrapit_scripts_styles(){
	/* bootstrap */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);

	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css' );
	wp_enqueue_style( 'wrapit-woocommerce', get_template_directory_uri() . '/css/ind-woocommerce.css' );

	/*load selected fonts*/
	wrapit_enqueue_font();
	
	if (is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}

	/* OWL SLIDER */
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.css' );
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), false, true);

	/* custom */
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), false, true);

	if( is_page() && get_page_template_slug() == 'page-tpl_contact.php' ){
		$api = '';
		$google_api_key = wrapit_get_option( 'google_api_key' );
		if( !empty( $google_api_key ) ){
			$api = '&key='.$google_api_key;
		}
		wp_enqueue_script( 'wrapit-googlemap', '//maps.googleapis.com/maps/api/js?sensor=false'.$api, false, false, true );	
	}

	if( is_page() && get_page_template_slug() == 'page-tpl_projects.php' ){
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.min.js', array('jquery'), false, true);
		wp_enqueue_script('packery', get_template_directory_uri() . '/js/packery.min.js', array('jquery'), false, true);
	}
	
	wp_enqueue_script('counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array('jquery'), false, true);
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), false, true);

	wp_enqueue_script('wrapit-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true);
	wp_localize_script( 'wrapit-custom', 'wrapit_data', wrapit_get_js_options());

}
add_action('wp_enqueue_scripts', 'wrapit_scripts_styles', 11 );
}

/*
Get options for the marker
*/
if( !function_exists('wrapit_get_js_options') ){
function wrapit_get_js_options(){
	$marker_icon = wrapit_get_option( 'marker_icon' );
	$data =  array(
		'markers_max_zoom' 	=> wrapit_get_option( 'markers_max_zoom' ),
		'ajaxurl' 			=> admin_url('admin-ajax.php'),
		'marker_icon' 		=> '',
		'enable_sticky' 	=> wrapit_get_option( 'enable_sticky' )
	) ;

	if( !empty( $marker_icon['url'] ) )	{
		$data['marker_icon'] = $marker_icon['url'];
	}

	return $data;
}
}

/*
Load script and styles to the admin section
*/
if( !function_exists('wrapit_admin_scripts_styles') ){
function wrapit_admin_scripts_styles(){
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css' );
	if( isset( $_GET['taxonomy'] ) && stristr( $_GET['taxonomy'], 'pa_' ) ){
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );	
		wp_enqueue_style('wrapit-shortcodes-style', get_template_directory_uri() . '/css/admin.css' );
		wp_enqueue_script('wrapit-admin-script', get_template_directory_uri() . '/js/admin.js', array('jquery'), false, true);
	}
}
add_action('admin_enqueue_scripts', 'wrapit_admin_scripts_styles', 1);
}


/*
Add main style
*/
if( !function_exists('wrapit_add_main_style') ){
function wrapit_add_main_style(){
	wp_enqueue_style('wrapit-style', get_stylesheet_uri() );
	ob_start();
	include( get_template_directory().'/css/main-color.css.php' );
	$custom_css = ob_get_contents();
	ob_end_clean();
	$custom_css = str_replace(array("\n", "\t", "\r", "\n\r"), '', $custom_css);
	wp_add_inline_style( 'wrapit-style', $custom_css );	
}
add_action('wp_enqueue_scripts', 'wrapit_add_main_style', 13);
}

/* 
Add custom meta fields using smeta to post types
*/
if( !function_exists('wrapit_custom_meta') ){
function wrapit_custom_meta(){
	$slider_meta = array(
		array(
			'id' => 'slides',
			'name' => esc_html__( 'Images', 'wrapit' ),
			'type' => 'group',
			'sortable' => 1,
			'fields' => array(
				array(
					'id' => 'slide_image',
					'name' => esc_html__( 'Slide Background Image', 'wrapit' ),
					'type' => 'image',
				),
				array(
					'id' => 'slide_text',
					'name' => esc_html__( 'Slide Text', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'slide_subtext',
					'name' => esc_html__( 'Slide Subtext', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'slide_button_text',
					'name' => esc_html__( 'Slide Button Text', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'slide_button_link',
					'name' => esc_html__( 'Slide Button Link', 'wrapit' ),
					'type' => 'text',
				),				
			),
			'repeatable' => 1
		),
	);
	
	$meta_boxes[] = array(
		'title' => esc_html__( 'Slides', 'wrapit' ),
		'pages' => 'slider',
		'fields' => $slider_meta,
	);

	$page_meta = array(
		array(
			'id' => 'page_excerpt',
			'name' => esc_html__( 'Excerpt', 'wrapit' ),
			'type' => 'textarea',
		),
		array(
			'id' => 'page_custom_sidebar',
			'name' => esc_html__( 'Custom Sidebar', 'wrapit' ),
			'type' => 'select',
			'options' => wrapit_get_custom_sidebars()
		),
		array(
			'id' => 'page_show_featured',
			'name' => esc_html__( 'Show Featured Image On Single', 'wrapit' ),
			'type' => 'select',
			'options' => array(
				'yes' => esc_html__( 'Yes', 'wrapit' ),
				'no' => esc_html__( 'No', 'wrapit' ),
			)
		),
	);
	
	$meta_boxes[] = array(
		'title' => esc_html__( 'Page Excerpt', 'wrapit' ),
		'pages' => 'page',
		'fields' => $page_meta,
	);

	$project_meta = array(
		array(
			'id' => 'project_details',
			'name' => esc_html__( 'Details', 'wrapit' ),
			'type' => 'group',
			'repeatable' => 1,
			'sortable' => 1,
			'fields' => array(
				array(
					'id' => 'project_details_icon',
					'name' => esc_html__( 'Icon', 'wrapit' ),
					'type' => 'select',
					'options' => wrapit_ion_icons_list()
				),
				array(
					'id' => 'project_details_name',
					'name' => esc_html__( 'Name', 'wrapit' ),
					'type' => 'text',
				),
				array(
					'id' => 'project_details_value',
					'name' => esc_html__( 'Value', 'wrapit' ),
					'type' => 'text',
				)
			)
		),
		array(
			'id' => 'project_images',
			'name' => esc_html__( 'Images', 'wrapit' ),
			'type' => 'image',
			'repeatable' => 1,
			'sortable' => 1
		),
	);
	
	$meta_boxes[] = array(
		'title' => esc_html__( 'Project Description', 'wrapit' ),
		'pages' => 'project',
		'fields' => $project_meta,
	);

	$all_meta = array(
		array(
			'id' => 'breadcrumbs_image',
			'name' => esc_html__( 'Breadcrumbs Image', 'wrapit' ),
			'type' => 'image',
		)
	);
	
	$meta_boxes[] = array(
		'title' => esc_html__( 'Breadcrumbs', 'wrapit' ),
		'pages' => array( 'post', 'page', 'project' ),
		'fields' => $all_meta,
	);

	return $meta_boxes;
}

add_filter('cmb_meta_boxes', 'wrapit_custom_meta');
}

/*
Get list of custom sidebbars for the page meta
*/
if( !function_exists('wrapit_get_custom_sidebars') ){
function wrapit_get_custom_sidebars(){
	$page_custom_sidebars = wrapit_get_option( 'page_custom_sidebars' );
	$sidebars = array(
		'' => esc_html__( 'Page Default Sidebar', 'wrapit' )
	);
	if( !empty( $page_custom_sidebars ) ){
		for( $i=1; $i<=$page_custom_sidebars; $i++ ){
			$sidebars['custom-sidebar-'.$i] = esc_html__('Custom Sidebar ', 'wrapit').$i;
		}
	}

	return $sidebars;
}
}

/*
Shortcode box for the slider
*/
if( !function_exists('wrapit_metabox_slider_shortcode') ){
function wrapit_metabox_slider_shortcode() {
    add_meta_box(
        'slider_id',
        esc_html__( 'Shortcode', 'wrapit' ),
        'wrapit_shortcode_field',
        'slider',
        'side',
        'high'
    );
}
}
add_action( 'add_meta_boxes', 'wrapit_metabox_slider_shortcode' );

if( !function_exists('wrapit_shortcode_field') ){
function wrapit_shortcode_field( $post ){
	echo '<input type="text" value=\'[indslider id="'.esc_attr( $post->ID ).'"]\' readonly="readonly">';
}
}
/*
WrapIt menu walker
*/
if( !class_exists('wrapit_walker') ){
class wrapit_walker extends Walker_Nav_Menu {
  
	/**
	* @see Walker::start_lvl()
	* @since 3.0.0
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param int $depth Depth of page. Used for padding.
	*/
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	* @see Walker::start_el()
	* @since 3.0.0
	*
	* @param string $output Passed by reference. Used to append additional content.
	* @param object $item Menu item data object.
	* @param int $depth Depth of menu item. Used for padding.
	* @param int $current_page Menu item ID.
	* @param object $args
	*/
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		* Dividers, Headers or Disabled
		* =============================
		* Determine whether the item is a Divider, Header, Disabled or regular
		* menu item. To prevent errors we use the strcasecmp() function to so a
		* comparison that is not case sensitive. The strcasecmp() function returns
		* a 0 if the strings are equal.
		*/
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} 
		else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} 
		else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} 
		else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} 
		else {
			$mega_menu_custom = get_post_meta( $item->ID, 'mega-menu-set', true );
			$mega_menu_full = get_post_meta( $item->ID, 'mega-menu-full', true );
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			if( !empty( $mega_menu_custom ) ){
				$classes[] = 'mega_menu_li';
			}			
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			
			if ( $args->has_children || !empty( $mega_menu_custom ) ){
				$class_names .= ' dropdown';
			}
			
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title'] = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel'] = ! empty( $item->xfn )	? $item->xfn	: '';

			// If item has_children add atts to a.
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			if ( $args->has_children || !empty( $mega_menu_custom ) ) {
				$atts['class']	= 'dropdown-toggle';
				$atts['data-hover']	= 'dropdown';
				$atts['aria-haspopup']	= 'true';
			} 

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			* Glyphicons
			* ===========
			* Since the the menu item is NOT a Divider or Header we check the see
			* if there is a value in the attr_title property. If the attr_title
			* property is NOT null we apply it as the class name for the glyphicon.
			*/
			
			$item_output .= '<a'. $attributes .'>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if( !empty( $mega_menu_custom ) ){
				$registered_widgets = wp_get_sidebars_widgets();
				$item_output .= ' <i class="ion-ios-arrow-down"></i>';
				$item_output .= '</a>';
				$item_output .= '<div class="list-unstyled dropdown-menu mega_menu clearfix '.( $mega_menu_full == 'yes' ? 'full-width' : '' ).' col-'.( !empty( $registered_widgets[$mega_menu_custom] ) ? sizeof( $registered_widgets[$mega_menu_custom] ) : '1' ).'">';
				if( $mega_menu_full == 'yes' ){
					$item_output .= '<div class="container">';
				}
				ob_start();
				if( is_active_sidebar( $mega_menu_custom ) ){
					dynamic_sidebar( $mega_menu_custom );
				}
				$item_output .= ob_get_contents();
				ob_end_clean();
				if( $mega_menu_full == 'yes' ){
					$item_output .= '</div>';
				}				
				$item_output .= '</div>';
			}
			else{
				if( $args->has_children ){
					if( 0 === $depth ){
						$item_output .= ' <i class="ion-ios-arrow-down"></i>';
					}
					else{
						$item_output .= ' <i class="ion-ios-arrow-right"></i>';
					}
				}
				$item_output .= '</a>';
			}			
			$item_output .= $args->after;
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	* Traverse elements to create list from elements.
	*
	* Display one element if the element doesn't have any children otherwise,
	* display the element and its children. Will only traverse up to the max
	* depth and no ignore elements under that depth.
	*
	* This method shouldn't be called directly, use the walk() method instead.
	*
	* @see Walker::start_el()
	* @since 2.5.0
	*
	* @param object $element Data object
	* @param array $children_elements List of elements to continue traversing.
	* @param int $max_depth Max depth to traverse.
	* @param int $depth Depth of current element.
	* @param array $args
	* @param string $output Passed by reference. Used to append additional content.
	* @return null Null on failure with no changes to parameters.
	*/
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];

		// Display this element.
		if ( is_object( $args[0] ) ){
		   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	* Menu Fallback
	* =============
	* If this function is assigned to the wp_nav_menu's fallback_cb variable
	* and a manu has not been assigned to the theme location in the WordPress
	* menu manager the function with display nothing to a non-logged in user,
	* and will add a link to the WordPress menu manager if logged in as an admin.
	*
	* @param array $args passed from the wp_nav_menu function.
	*
	*/
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id ){
					$fb_output .= ' id="' . $container_id . '"';
				}

				if ( $container_class ){
					$fb_output .= ' class="' . $container_class . '"';
				}

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id ){
				$fb_output .= ' id="' . $menu_id . '"';
			}

			if ( $menu_class ){
				$fb_output .= ' class="' . $menu_class . '"';
			}

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container ){
				$fb_output .= '</' . $container . '>';
			}

			echo  $fb_output;
		}
	}
}
}

/*
Generate random string
*/
if( !function_exists('wrapit_random_string') ){
function wrapit_random_string( $length = 10 ) {
	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$random = '';
	for ($i = 0; $i < $length; $i++) {
		$random .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $random;
}
}

/*
WrapIt link pages
*/
if( !function_exists('wrapit_link_pages') ){
function wrapit_link_pages( $post_pages ){
	/* format pages that are not current ones */
	$post_pages = str_replace( '<a', '<a class="btn btn-default "', $post_pages );
	$post_pages = str_replace( '</span></a>', '</a>', $post_pages );
	$post_pages = str_replace( '><span>', '>', $post_pages );
	
	/* format current page */
	$post_pages = str_replace( '<span>', '<a href="javascript:;" class="btn btn-default active">', $post_pages );
	$post_pages = str_replace( '</span>', '</a>', $post_pages );
	
	return $post_pages;	
}
}

/*
WrapIt tag list
*/
if( !function_exists('wrapit_the_tags') ){
function wrapit_the_tags(){
	$tags = get_the_tags();
	$list = array();
	if( !empty( $tags ) ){
		foreach( $tags as $tag ){
			$list[] = '<a href="'.esc_url( get_tag_link( $tag->term_id ) ).'">'.$tag->name.'</a>';
		}
	}
	
	return join( ", ", $list );
}
}

/*
Set cloud tag sies
*/
if( !function_exists('wrapit_cloud_sizes') ){
function wrapit_cloud_sizes($args) {
	$args['smallest'] = 11;
	$args['largest'] = 11;
	$args['unit'] = 'px';
	return $args; 
}
add_filter('widget_tag_cloud_args','wrapit_cloud_sizes');
add_filter('woocommerce_product_tag_cloud_widget_args','wrapit_cloud_sizes');
}

/*
Get list of categories
*/
if( !function_exists('wrapit_the_category') ){
function wrapit_the_category(){
	$list = '';
	$categories = get_the_category();
	if( !empty( $categories ) ){
		foreach( $categories as $category ){
			$list .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'">'.$category->name.'</a> ';
		}
	}
	
	return $list;
}
}

/*
Format pagination 
*/
if( !function_exists('wrapit_format_pagination') ){
function wrapit_format_pagination( $page_links ){
	$list = '';
	if( !empty( $page_links ) ){
		foreach( $page_links as $page_link ){
			$page_link = str_replace( "<span class='page-numbers current'>", '<a href="javascript:;" class="active">', $page_link );
			$page_link = str_replace( "<span class=\"page-numbers dots\">", '<a href="javascript:;">', $page_link );
			$page_link = str_replace( '</span>', '</a>', $page_link );
			$page_link = str_replace( array( 'class="', "class='" ), array( 'class="btn btn-default ', "class='btn btn-default " ), $page_link );
			$list .= $page_link." ";
		}
	}
	
	return $list;
}
}


/*
Send Subscription
*/
if( !function_exists('wrapit_send_subscription') ){
function wrapit_send_subscription( $email = '' ){
	$email = !empty( $email ) ? $email : $_POST["email"];
	$response = array();	
	if( filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
		if( class_exists('MailChimp') ){
			$chimp_api = wrapit_get_option("mail_chimp_api");
			$chimp_list_id = wrapit_get_option("mail_chimp_list_id");
			if( !empty( $chimp_api ) && !empty( $chimp_list_id ) ){
				$mc = new MailChimp( $chimp_api );
				$result = $mc->call('lists/subscribe', array(
					'id'                => $chimp_list_id,
					'email'             => array( 'email' => $email )
				));
				
				if( $result === false) {
					$response['error'] = esc_html__( 'There was an error contacting the API, please try again.', 'wrapit' );
				}
				else if( isset($result['status']) && $result['status'] == 'error' ){
					$response['error'] = json_encode($result);
				}
				else{
					$response['success'] = esc_html__( 'You have successfully subscribed to the newsletter.', 'wrapit' );
				}
				
			}
			else{
				$response['error'] = esc_html__( 'API data are not yet set.', 'wrapit' );
			}
		}
		else{
			$response['error'] = esc_html__( 'WrapIt CPT is not installed.', 'wrapit' );
		}
	}
	else{
		$response['error'] = esc_html__( 'Email is empty or invalid.', 'wrapit' );
	}
	
	echo json_encode( $response );
	die();
}
add_action('wp_ajax_subscribe', 'wrapit_send_subscription');
add_action('wp_ajax_nopriv_subscribe', 'wrapit_send_subscription');
}

/*
WrapIt convert hex color to rgb
*/
if( !function_exists('wrapit_hex2rgb') ){
function wrapit_hex2rgb( $hex ){
	$hex = str_replace("#", "", $hex);

	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
	return $r.", ".$g.", ".$b; 
}
}

/*
WrapIt extract avatar URL
*/
if( !function_exists('wrapit_get_avatar_url') ){
function wrapit_get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
	if( empty( $matches[1] ) ){
		preg_match("/src=\"(.*?)\"/i", $get_avatar, $matches);
	}
    return $matches[1];
}
}

/*
WrapIt list comments
*/
if( !function_exists('wrapit_comments') ){
function wrapit_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$add_below = ''; 
	?>
	<!-- comment -->
	<div class="row comment-row <?php echo  $comment->comment_parent != '0' ? esc_attr( 'comment-margin-left' ) : ''; ?> " id="comment-<?php echo esc_attr( get_comment_ID() ) ?>">
		<!-- comment media -->
		<div class="col-sm-12">
			<div class="comment-avatar">
				<?php 
				$avatar = wrapit_get_avatar_url( get_avatar( $comment, 150 ) );
				if( !empty( $avatar ) ): ?>
					<img src="<?php echo esc_url( $avatar ); ?>" class="img-responsive" title="" alt="">
				<?php endif; ?>
			</div>
			<div class="comment-content-wrap">
				<div class="comment-name">
					<div class="pull-left">
						<h5>
							<?php comment_author(); ?>
						</h5>					
						<p><?php comment_time( 'F j, Y '.esc_html__('@','wrapit').' H:i' ); ?> </p>
					</div>
					<span class="pull-right">
					<?php
					comment_reply_link( 
						array_merge( 
							$args, 
							array( 
								'reply_text' => '<i class="ion-android-share"></i> <small>'.esc_html__( 'Reply', 'wrapit' ).'</small>', 
								'add_below' => $add_below, 
								'depth' => $depth, 
								'max_depth' => $args['max_depth'] 
							) 
						) 
					); 
					?>				
					</span>				
					<div class="clearfix"></div>
				</div>
				<?php 
				if ($comment->comment_approved != '0'){
				?>
					<?php comment_text(); ?>
				<?php 
				}
				else{ ?>
					<p><?php esc_html_e('Your comment is awaiting moderation.', 'wrapit'); ?></p>				
				<?php
				}
				?>	
			</div>		
		</div><!-- .comment media -->
	</div><!-- .comment -->
	<?php  
}
}

/*
WrapIt end comments
*/
if( !function_exists('wrapit_end_comments') ){
function wrapit_end_comments(){
	return "";
}
}

/*
Add wrapper for the embed
*/
if( !function_exists('wrapit_embed_html') ){
function wrapit_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'wrapit_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'wrapit_embed_html' ); // Jetpack
}

/*
New password form for the locked posts
*/
if( !function_exists('wrapit_password_form') ){
function wrapit_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form = '<form class="protected-post-form" action="' . site_url() . '/wp-login.php?action=postpass" method="post">
				' . esc_html__( "This post is password protected. To view it please enter your password below:", "wrapit" ) . '
				<label for="' . $label . '">' . esc_html__( "Password:", "wrapit" ) . ' </label><div class="wrapit-form"><input name="post_password" class="form-control" id="' . $label . '" type="password" /><a class="btn btn-default submit-live-form"><i class="ion-log-in"></i></a></div>
			</form>
	';
	return $form;
}
add_filter( 'the_password_form', 'wrapit_password_form' );
}

/*
Get list of custom post types
*/
if( !function_exists('wrapit_get_custom_list') ){
function wrapit_get_custom_list( $post_type, $args = array(), $direction = 'right' ){
	$post_array = array();
	$args = array( 'post_type' => $post_type, 'post_status' => 'publish', 'posts_per_page' => -1 ) + $args;
	$posts = get_posts( $args );
	
	foreach( $posts as $post ){
		if( $direction == 'right' ){
			$post_array[$post->ID] = $post->post_title;
		}
		else{
			$post_array[$post->post_title] = $post->ID;	
		}
	}
	
	return $post_array;
}
}

/*
WrapIt get list of iamge sizes
*/
if( !function_exists('wrapit_get_image_sizes') ){
function wrapit_get_image_sizes(){
	$sizes = get_intermediate_image_sizes();
	$sizes_right = array();
	foreach( $sizes as $size ){
		$sizes_right[$size] = $size;
	}

	return $sizes_right;
}
}

/*
Get apge id by page template
*/
if( !function_exists('wrapit_get_page_id_by_tpl') ){
function wrapit_get_page_id_by_tpl( $template_name ){
	$page = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_name . '.php'
	));
	if(!empty($page)){
		return $page[0]->ID;
	}
	else{
		return '';
	}
}
}

/*
Get permalink by page template
*/
if( !function_exists('wrapit_get_permalink_by_tpl') ){
function wrapit_get_permalink_by_tpl( $template_name ){
	$page = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_name . '.php'
	));
	if(!empty($page)){
		return get_permalink( $page[0]->ID );
	}
	else{
		return "javascript:;";
	}
}
}

/*
Parse video URL
*/
if( !function_exists('wrapit_parse_video_url') ){
function wrapit_parse_video_url( $url ){
	if( stristr( $url, 'tube' ) ){
		$temp = explode( '?v=', $url );
		$url = 'http://www.youtube.com/embed/'.$temp[1].'?rel=0';
	}
	else if( stristr( $url, 'vimeo' ) ){
		$temp = explode( '/', $url );
		$url = 'http://player.vimeo.com/video/'.$temp[sizeof($temp)-1];
	}
	return $url;
}
}

if( !function_exists('wrapit_set_direction') ){
function wrapit_set_direction() {
	global $wp_locale, $wp_styles;

	$_user_id = get_current_user_id();
	$direction = wrapit_get_option( 'direction' );
	if( empty( $direction ) ){
		$direction = 'ltr';
	}

	if ( function_exists('icl_object_id') ) {
		if( ICL_LANGUAGE_CODE == 'ar' ){
			$direction = 'rtl';
		}
	}

	if ( $direction ) {
		update_user_meta( $_user_id, 'rtladminbar', $direction );
	} else {
		$direction = get_user_meta( $_user_id, 'rtladminbar', true );
		if ( false === $direction )
			$direction = isset( $wp_locale->text_direction ) ? $wp_locale->text_direction : 'ltr' ;
	}

	$wp_locale->text_direction = $direction;
	if ( ! is_a( $wp_styles, 'WP_Styles' ) ) {
		$wp_styles = new WP_Styles();
	}
	$wp_styles->text_direction = $direction;
}
add_action( 'init', 'wrapit_set_direction' );
}

/*
WrapIt breadcrumbs
*/
if( !function_exists('wrapit_breadcrumbs') ){
function wrapit_breadcrumbs(){
	$breadcrumb = '';
	if( is_front_page() || ( is_home() && !class_exists('ReduxFramework') ) ){
		return '';
	}
	$breadcrumb .= '<ul class="breadcrumb">';
	if( !is_front_page() ){
		$breadcrumb .= '<li><a href="'.esc_url( home_url('/') ).'">'.esc_html__( 'Home', 'wrapit' ).'</a></li>';
	}
	if( is_home() ){
		$page_for_posts = get_option( 'page_for_posts' );
		if( !empty( $page_for_posts ) ){
			$breadcrumb .= '<li>'.get_the_title( $page_for_posts ).'</li>';
		}
		else{
			$breadcrumb .= '<li>'.esc_html__( 'Blog', 'wrapit' ).'</li>';
		}
	}
	else if( is_tax('project-cat') ){
		$term = get_queried_object();
		$ancestors = get_ancestors( $term->term_id, 'project-cat' );
		if( !empty( $ancestors ) ){
			foreach( $ancestors as $ancestor ){
				$ancestor_term = get_term_by( 'term_id', $ancestor, 'project-cat' );
				if( !empty( $ancestor_term ) && !is_wp_error( $ancestor_term ) )
				$breadcrumb .= '<li><a href="'.get_term_link( $ancestor_term ).'">'.$ancestor_term->name.'</a></li>';
			}
		}
		$breadcrumb .= '<li>'.$term->name.'</li>';		
	}
	else if( is_category() ){
		$breadcrumb .= '<li>'.single_cat_title( '', false ).'</li>';
	}
	else if( is_404() ){
		$breadcrumb .= '<li>'.esc_html__( '404', 'wrapit' ).'</li>';
	}
	else if( is_tag() ){
		$breadcrumb .= '<li>'.esc_html__('Search by tag: ', 'wrapit'). get_query_var('tag').'</li>';
	}
	else if( is_author() ){
		$breadcrumb .= '<li>'.esc_html__('Posts by', 'wrapit').'</li>';
	}
	else if( is_archive() ){
		$breadcrumb .= '<li>'.esc_html__('Archive for:', 'wrapit'). single_month_title(' ',false).'</li>';
	}
	else if( is_search() ){
		$breadcrumb .= '<li>'.esc_html__('Search results for: ', 'wrapit').' '. get_search_query().'</li>';
	}
	else if( is_page() ){
		$ancestors = get_post_ancestors( get_the_ID() );
		if( !empty( $ancestors ) ){
			$ancestors = array_reverse( $ancestors );
			foreach( $ancestors as $ancestor ){
				$breadcrumb .= '<li><a href="'.get_the_permalink( $ancestor ).'">'.get_the_title( $ancestor ).'</a></li>';
			}
		}
		$breadcrumb .= '<li>'.get_the_title().'</li>';
	}
	else if( is_singular( 'project' ) ){
		$all_projects = wrapit_get_page_id_by_tpl( 'page-tpl_projects' );
		$cats = get_the_terms( get_the_ID(), 'project-cat' );
		if( !empty( $cats ) ){
			$cat = array_pop( $cats );
			$breadcrumb .= '<li><a href="'.( !empty( $all_projects ) ? get_the_permalink( $all_projects ).'#'.esc_attr( $cat->slug ) : get_term_link( $cat ) ).'">'.$cat->name.'</a></li>';
		}

		$breadcrumb .= '<li>'.get_the_title().'</li>';
	}
	else if( is_singular('post') ){
		$terms = get_the_category();
		if( !empty( $terms ) ){
			$last = array_pop( $terms );
			$breadcrumb .= '<li><a href="'.get_category_link( $last->term_id ).'">'.$last->name.'</a></li>';
		}
		$breadcrumb .= '<li>'.get_the_title().'</li>';
	}
	else{
		$breadcrumb .= '<li>'.get_the_title().'</li>';
	}
	$breadcrumb .= '</ul>';

	return $breadcrumb;
}
}


if( !function_exists('wrapit_cat_count_span') ){
function wrapit_cat_count_span($links) {
	if( !stristr( $links, 'count' ) ){
  		$links = str_replace('</a> (', '</a> <span>', $links);
  		$links = str_replace(')', '</span>', $links);
  	}
  	else{
  		$links = str_replace('(', '', $links);
  		$links = str_replace(')', '', $links);
  	}
  	return $links;
}
add_filter('wp_list_categories', 'wrapit_cat_count_span');
}

if( !function_exists('wrapit_archive_count_inline') ){
function wrapit_archive_count_inline($links) {
	if( !stristr( $links, 'count' ) ){
		$links = str_replace('&nbsp;(', ' <span>', $links);
		$links = str_replace(')', '</span>', $links);
	}
	else{
  		$links = str_replace('(', '', $links);
  		$links = str_replace(')', '', $links);
	}
	return $links;
}
add_filter('get_archives_link', 'wrapit_archive_count_inline');
}

/*
If is basic search then get all and limit only on page post and project
*/
function wrapit_pre_get_posts( $query ) {
    if( isset( $_GET['s'] ) && empty( $_GET['post_type'] ) ){
        $query->set( 'posts_per_page', '-1' );
        $query->set( 'psot_type', array('page', 'post', 'project') );
    }
}
add_action( 'pre_get_posts', 'wrapit_pre_get_posts' );

/* WOOCOMMERCE */
/* Add container warpper and divide columns */
if( !function_exists('wrapit_before_main_content') ){
function wrapit_before_main_content(){
	get_template_part( 'includes/title' );
	echo '<div class="container"><div class="row"><div class="col-sm-9">';
}
add_action( 'woocommerce_before_main_content', 'wrapit_before_main_content', 5 );
}

/* add widghet wrapper */
if( !function_exists('wrapit_after_main_content') ){
function wrapit_after_main_content(){
	echo '</div><div class="col-sm-3">';
}
add_action( 'woocommerce_after_main_content', 'wrapit_after_main_content', 11 );
}

/* close columns and wrapper */
if( !function_exists('wrapit_sidebar') ){
function wrapit_sidebar(){
	echo '</div></div></div>';
}
add_action( 'woocommerce_sidebar', 'wrapit_sidebar', 11 );
}

/* put produts in 3 columns */
if( !function_exists('wrapit_loop_shop_columns') ){
function wrapit_loop_shop_columns( $columns ){
	return 3;
}
add_filter( 'loop_shop_columns', 'wrapit_loop_shop_columns' );
}

/*
Disable redirect if single product is result of the search
*/
add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );

/*
Retuern full images for the product categories
*/
if( !function_exists('wrapit_full_category_image') ){
function wrapit_full_category_image(){
	return 'full';
}
}

/*
Add args for the related products
*/
if( !function_exists('wrapit_related_products_args') ){
function wrapit_related_products_args( $args ) {

	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'wrapit_related_products_args' );
}

/*
Set number par page for the product listing
*/
if( !function_exists('wrapit_products_per_page') ){
function wrapit_products_per_page(){
	$products_per_page = wrapit_get_option( 'products_per_page' ) ;
	return !empty( $products_per_page ) ? $products_per_page : 9;
}
add_filter( 'loop_shop_per_page', 'wrapit_products_per_page' );
}

/* 
Change args for pagination
*/
if( !function_exists('wrapit_woocommerce_pagination_args') ){
function wrapit_woocommerce_pagination_args( $args ){
	$args['prev_next'] = false;
	$args['end_size'] = 2;
	$args['mid_size'] = 2;
	return $args;
}
}
add_filter( 'woocommerce_pagination_args', 'wrapit_woocommerce_pagination_args' );

if( !function_exists('wrapit_product_loop_title') ){
	function wrapit_product_loop_title(){
		echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
	}
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'wrapit_product_loop_title', 10 );
}


/* END WOOCOMMERCE */

include( get_theme_file_path( 'includes/class-tgm-plugin-activation.php' ) );
include( get_theme_file_path( 'includes/widgets.php' ) );
include( get_theme_file_path( 'includes/fonts.php' ) );
include( get_theme_file_path( 'includes/font-icons.php' ) );
include( get_theme_file_path( 'includes/theme-options.php' ) );
include( get_theme_file_path( 'includes/shortcodes.php' ) );
?>