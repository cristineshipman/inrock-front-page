<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: https://docs.reduxframework.com
     * */   

    global $wrapit_opts;

    if ( ! class_exists( 'WrapIt_Options' ) ) {

        class WrapIt_Options {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                /**********************************************************************
                ***********************************************************************
                OVERALL
                **********************************************************************/
                $this->sections[] = array(
                    'title' => esc_html__('Overall', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('This is basic section where you can set up main settings for your website.', 'wrapit'),
                    'fields' => array(                  
                       
                        //Site Logo
                        array(
                            'id' => 'site_logo',
                            'type' => 'media',
                            'title' => esc_html__('Site Logo', 'wrapit') ,
                            'desc' => esc_html__('Upload site logo', 'wrapit')
                        ),

                        array(
                            'id' => 'home_slider',
                            'type' => 'text',
                            'title' => esc_html__('Home Page Slider', 'wrapit') ,
                            'desc' => esc_html__('Input shortcode of the slider if you are not using Home Page as page template', 'wrapit')
                        ),

                        array(
                            'id' => 'direction',
                            'type' => 'select',
                            'options' => array(
                                'ltr' => esc_html__('LTR', 'wrapit'),
                                'rtl' => esc_html__('RTL', 'wrapit')
                            ),
                            'title' => esc_html__('Choose Site Content Direction', 'wrapit'),
                            'desc' => esc_html__('Choose overall website text direction which can be RTL (right to left) or LTR (left to right).', 'wrapit'),
                            'default' => 'ltr'
                        ),

                        array(
                            'id' => 'enable_sticky',
                            'type' => 'select',
                            'options' => array(
                                'yes' => esc_html__( 'Yes', 'wrapit' ),
                                'no' => esc_html__( 'No', 'wrapit' )
                            ),
                            'title' => esc_html__('Sticky Menu', 'wrapit'),
                            'desc' => esc_html__('Enable or disable sticky menu', 'wrapit'),
                            'default' => 'yes'
                        ),

                        array(
                            'id' => 'header_style',
                            'type' => 'select',
                            'options' => array(
                                'bottom' => esc_html__( 'Bottom Navigation', 'wrapit' ),
                                'side' => esc_html__( 'Side Navigation', 'wrapit' ),
                                'center' => esc_html__( 'Center Navigation', 'wrapit' )
                            ),
                            'title' => esc_html__('Header Style', 'wrapit'),
                            'desc' => esc_html__('Select style of the header', 'wrapit'),
                            'default' => 'bottom'
                        ),

                        array(
                            'id' => 'custom_css',
                            'type' => 'ace_editor',
                            'mode' => 'css',
                            'title' => esc_html__('Custom CSS', 'wrapit'),
                            'desc' => esc_html__('Here you can add custom CSS.', 'wrapit'),
                        ),
                        
                    )
                );

                /**********************************************************************
                ***********************************************************************
                TOP BAR
                **********************************************************************/
                $this->sections[] = array(
                    'title' => esc_html__('Top Bar', 'wrapit') ,
                    'icon' => '',
                    'subsection' => true,
                    'desc' => esc_html__('Setup top bar of the site.', 'wrapit'),
                    'fields' => array(                  
                       
                        array(
                            'id' => 'top_bar_message',
                            'type' => 'text',
                            'title' => esc_html__('Message', 'wrapit') ,
                            'desc' => esc_html__('Input message which will be dispalyed on the right side of the top bar', 'wrapit')
                        ),

                        array(
                            'id' => 'top_bar_facebook',
                            'type' => 'text',
                            'title' => esc_html__('Facebook', 'wrapit') ,
                            'desc' => esc_html__('Input link to the facebook page which will be displayed on the right side of the top bar', 'wrapit')
                        ),
                        array(
                            'id' => 'top_bar_twitter',
                            'type' => 'text',
                            'title' => esc_html__('Twitter', 'wrapit') ,
                            'desc' => esc_html__('Input link to the twitter page which will be displayed on the right side of the top bar', 'wrapit')
                        ),
                        array(
                            'id' => 'top_bar_google',
                            'type' => 'text',
                            'title' => esc_html__('Google', 'wrapit') ,
                            'desc' => esc_html__('Input link to the google page which will be displayed on the right side of the top bar', 'wrapit')
                        ),
                        array(
                            'id' => 'top_bar_instagram',
                            'type' => 'text',
                            'title' => esc_html__('Instagram', 'wrapit') ,
                            'desc' => esc_html__('Input link to the instagram page which will be displayed on the right side of the top bar', 'wrapit')
                        ),
                        array(
                            'id' => 'top_bar_linkedin',
                            'type' => 'text',
                            'title' => esc_html__('LinkedIn', 'wrapit') ,
                            'desc' => esc_html__('Input link to the linkedin page which will be displayed on the right side of the top bar', 'wrapit')
                        ),
                    )
                );


                /**********************************************************************
                ***********************************************************************
                HEADER
                **********************************************************************/
                $this->sections[] = array(
                    'title' => esc_html__('Header', 'wrapit') ,
                    'icon' => '',
                    'subsection' => true,
                    'desc' => esc_html__('Setup header of the site.', 'wrapit'),
                    'fields' => array(                  
                       
                        array(
                            'id' => 'header_icon_1',
                            'type' => 'select',
                            'options' => wrapit_ion_icons_list(),
                            'title' => esc_html__('Icon 1', 'wrapit') ,
                            'desc' => esc_html__('Select icon for the header icon box', 'wrapit')
                        ),
                        array(
                            'id' => 'header_icon_1_title',
                            'type' => 'text',
                            'title' => esc_html__('Icon 1 Title', 'wrapit') ,
                            'desc' => esc_html__('Input title for the icon box', 'wrapit')
                        ),
                        array(
                            'id' => 'header_icon_1_subtitle',
                            'type' => 'text',
                            'title' => esc_html__('Icon 1 Subtitle', 'wrapit') ,
                            'desc' => esc_html__('Input subtitle for the icon box', 'wrapit')
                        ),

                        array(
                            'id' => 'header_icon_2',
                            'type' => 'select',
                            'options' => wrapit_ion_icons_list(),
                            'title' => esc_html__('Icon 2', 'wrapit') ,
                            'desc' => esc_html__('Select icon for the header icon box', 'wrapit')
                        ),
                        array(
                            'id' => 'header_icon_2_title',
                            'type' => 'text',
                            'title' => esc_html__('Icon 2 Title', 'wrapit') ,
                            'desc' => esc_html__('Input title for the icon box', 'wrapit')
                        ),
                        array(
                            'id' => 'header_icon_2_subtitle',
                            'type' => 'text',
                            'title' => esc_html__('Icon 2 Subtitle', 'wrapit') ,
                            'desc' => esc_html__('Input subtitle for the icon box', 'wrapit')
                        ),

                        array(
                            'id' => 'header_icon_3',
                            'type' => 'select',
                            'options' => wrapit_ion_icons_list(),
                            'title' => esc_html__('Icon 3', 'wrapit') ,
                            'desc' => esc_html__('Select icon for the header icon box', 'wrapit')
                        ),
                        array(
                            'id' => 'header_icon_3_title',
                            'type' => 'text',
                            'title' => esc_html__('Icon 3 Title', 'wrapit') ,
                            'desc' => esc_html__('Input title for the icon box', 'wrapit')
                        ),
                        array(
                            'id' => 'header_icon_3_subtitle',
                            'type' => 'text',
                            'title' => esc_html__('Icon 3 Subtitle', 'wrapit') ,
                            'desc' => esc_html__('Input subtitle for the icon box', 'wrapit')
                        ),
                    )
                );  

                /**********************************************************************
                ***********************************************************************
                SHOP
                **********************************************************************/
                
                $this->sections[] = array(
                    'title' => esc_html__('Shop', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('Set up shop options.', 'wrapit'),
                    'fields' => array(
                        // Mail Chimp API
                        array(
                            'id' => 'products_per_page',
                            'type' => 'text',
                            'title' => esc_html__('Products Per Page', 'wrapit') ,
                            'desc' => esc_html__('Input number of products to show per page.', 'wrapit'),
                            'default' => '9'
                        ) , 
                    )
                );


                /**********************************************************************
                ***********************************************************************
                Pages
                **********************************************************************/
                
                $this->sections[] = array(
                    'title' => esc_html__('Pages', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('Set up page options.', 'wrapit'),
                    'fields' => array(
                        array(
                            'id' => 'page_custom_sidebars',
                            'type' => 'text',
                            'title' => esc_html__('Custom Page Sidebar', 'wrapit') ,
                            'desc' => esc_html__('Input number of custom sidebars.', 'wrapit'),
                            'default' => '2'
                        ),
                        array(
                            'id' => 'page_breadcrumbs',
                            'type' => 'select',
                            'options'  => array(
                                'side' => esc_html__( 'Title Side', 'wrapit' ),
                                'bellow' => esc_html__( 'Bellow Title', 'wrapit' )
                            ),
                            'title' => esc_html__('Breadcrumbs Style', 'wrapit') ,
                            'desc' => esc_html__('Select type of breadcrumbs.', 'wrapit'),
                            'default' => 'side'
                        ),
                    )
                );
                /**********************************************************************
                ***********************************************************************
                SUBSCRIPTION
                **********************************************************************/
                
                $this->sections[] = array(
                    'title' => esc_html__('Subscription', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('Set up subscription API key and list ID.', 'wrapit'),
                    'fields' => array(
                        // Mail Chimp API
                        array(
                            'id' => 'mail_chimp_api',
                            'type' => 'text',
                            'title' => esc_html__('API Key', 'wrapit') ,
                            'desc' => esc_html__('Type your mail chimp api key.', 'wrapit')
                        ) , 
                        // Mail Chimp List ID
                        array(
                            'id' => 'mail_chimp_list_id',
                            'type' => 'text',
                            'title' => esc_html__('List ID', 'wrapit') ,
                            'desc' => esc_html__('Type here ID of the list on which users will subscribe.', 'wrapit')
                        ) ,
                    )
                );

                /***********************************************************************
                Appearance
                **********************************************************************/
                $this->sections[] = array(
                    'title' => esc_html__('Appearance', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('Set up the looks.', 'wrapit'),
                    'fields' => array(
                        array(
                            'id' => 'header_bg_color',
                            'type' => 'color',
                            'title' => esc_html__('Header Background Color', 'wrapit') ,
                            'desc' => esc_html__('Select background color of the header', 'wrapit'),
                            'transparent' => false,
                            'default' => '#ffffff'
                        ),
                        array(
                            'id' => 'header_box_icon_color',
                            'type' => 'color',
                            'title' => esc_html__('Header Box Icon Color', 'wrapit') ,
                            'desc' => esc_html__('Select color of the icon of header box', 'wrapit'),
                            'transparent' => false,
                            'default' => '#F7C51D'
                        ),
                        array(
                            'id' => 'header_box_text_color',
                            'type' => 'color',
                            'title' => esc_html__('Header Box Title Color', 'wrapit') ,
                            'desc' => esc_html__('Select color of the title of header box', 'wrapit'),
                            'transparent' => false,
                            'default' => '#202020'
                        ),
                        array(
                            'id' => 'show_breadcrumbs',
                            'type' => 'select',
                            'options' => array(
                                'yes' => esc_html__( 'Yes', 'wrapit' ),
                                'no' => esc_html__( 'No', 'wrapit' ),
                            ),
                            'title' => esc_html__('Show Breadcrumbs', 'wrapit') ,
                            'desc' => esc_html__('Show or hide breadcrumbs on inner pages', 'wrapit'),
                            'default' => 'yes'
                        ),
                        array(
                            'id' => 'breadcrumbs_image',
                            'type' => 'media',
                            'title' => esc_html__('Breadcrumbs Background Image', 'wrapit') ,
                            'desc' => esc_html__('Upload image which will be set as background of the breadcrumbs section', 'wrapit')
                        ),
                        array(
                            'id' => 'breadcrumbs_font_color',
                            'type' => 'color',
                            'title' => esc_html__('Breadcrumbs Font Color', 'wrapit'),
                            'desc' => esc_html__('Select breadcrumbs font color.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#202020'
                        ),
                        array(
                            'id' => 'main_color',
                            'type' => 'color',
                            'title' => esc_html__('Main Color', 'wrapit'),
                            'desc' => esc_html__('Select main color of the theme.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#F7C51D'
                        ),
                        array(
                            'id' => 'main_font_color',
                            'type' => 'color',
                            'title' => esc_html__('Main Font Color', 'wrapit'),
                            'desc' => esc_html__('Select font color of the elements which have main color as their background.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#202020'
                        ),
                        array(
                            'id' => 'text_font',
                            'type' => 'select',
                            'title' => esc_html__('Text Font', 'wrapit'),
                            'desc' => esc_html__('Select font for the regular text.', 'wrapit'),
                            'options' => wrapit_all_google_fonts(),
                            'default' => 'Open Sans'
                        ),
                        array(
                            'id' => 'navigation_font',
                            'type' => 'select',
                            'title' => esc_html__('Navigation Font', 'wrapit'),
                            'desc' => esc_html__('Select font for the navigation text.', 'wrapit'),
                            'options' => wrapit_all_google_fonts(),
                            'default' => 'Roboto Condensed'
                        ),
                        array(
                            'id' => 'title_font',
                            'type' => 'select',
                            'title' => esc_html__('Title Font', 'wrapit'),
                            'desc' => esc_html__('Select font for the title text.', 'wrapit'),
                            'options' => wrapit_all_google_fonts(),
                            'default' => 'Roboto'
                        ),
                        array(
                            'id' => 'top_bar_bg_color',
                            'type' => 'color',
                            'title' => esc_html__('Top Bar Background Color', 'wrapit'),
                            'desc' => esc_html__('Select background color of the top bar.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#fff'
                        ),
                        array(
                            'id' => 'top_bar_font_color',
                            'type' => 'color',
                            'title' => esc_html__('Top Bar Font Color', 'wrapit'),
                            'desc' => esc_html__('Select font color of the top bar.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#505050'
                        ), 
                        array(
                            'id' => 'top_bar_icon_color',
                            'type' => 'color',
                            'title' => esc_html__('Top Bar Icon Color', 'wrapit'),
                            'desc' => esc_html__('Select font color of the icons in top bar.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#202020'
                        ), 
                        array(
                            'id' => 'copyrights_bg_color',
                            'type' => 'color',
                            'title' => esc_html__('Copyrights Background Color', 'wrapit'),
                            'desc' => esc_html__('Select background color of the copyrights.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#202020'
                        ),
                        array(
                            'id' => 'copyrights_font_color',
                            'type' => 'color',
                            'title' => esc_html__('Copyrights Font Color', 'wrapit'),
                            'desc' => esc_html__('Select font color of the copyrights.', 'wrapit'),
                            'transparent' => false,
                            'default' => '#808080'
                        ), 
                    )
                );  

                /**********************************************************************
                ***********************************************************************
                PROJECTS
                **********************************************************************/
                
                $this->sections[] = array(
                    'title' => esc_html__('Projects', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('Set up project options.', 'wrapit'),
                    'fields' => array(
                        // Mail Chimp API
                        array(
                            'id' => 'project_next_prev',
                            'type' => 'select',
                            'options' => array(
                                'yes' => esc_html__( 'Yes', 'wrapit' ),
                                'no' => esc_html__( 'No', 'wrapit' )
                            ),
                            'title' => esc_html__('Show Next/Prev Links', 'wrapit') ,
                            'desc' => esc_html__('Show or hide next/prev link on project single page.', 'wrapit'),
                            'default' => 'no'
                        ) , 
                        array(
                            'id' => 'project_slug',
                            'type' => 'text',
                            'title' => esc_html__('Project Single Slug', 'wrapit') ,
                            'desc' => esc_html__('Input slug which you want to use for projects. You must resave permalinks in Settings->Permalinks after the change', 'wrapit'),
                        ),
                        array(
                            'id' => 'project_cat_slug',
                            'type' => 'text',
                            'title' => esc_html__('Project Category Slug', 'wrapit') ,
                            'desc' => esc_html__('Input slug which you want to use for projects category. You must resave permalinks in Settings->Permalinks after the change', 'wrapit'),
                        ),
                        array(
                            'id' => 'project_orderby',
                            'type' => 'select',
                            'options' => array(
                                'date' => esc_html__( 'Date', 'wrapit' ),
                                'title' => esc_html__( 'Title', 'wrapit' ),
                                'rand' => esc_html__( 'Random', 'wrapit' )
                            ),
                            'title' => esc_html__('Order Projects By', 'wrapit') ,
                            'desc' => esc_html__('Select by which field to order projects on All projects page', 'wrapit'),
                            'default' => 'date'
                        ),
                        array(
                            'id' => 'project_order',
                            'type' => 'select',
                            'options' => array(
                                'DESC' => esc_html__( 'Descending', 'wrapit' ),
                                'ASC' => esc_html__( 'Ascending', 'wrapit' ),
                            ),
                            'title' => esc_html__('Order Projects', 'wrapit') ,
                            'desc' => esc_html__('Select how to order projects', 'wrapit'),
                            'default' => 'DESC'
                        ),
                    )
                );

                /**********************************************************************
                ***********************************************************************
                CONTACT PAGE SETTINGS
                **********************************************************************/
                
                $this->sections[] = array(
                    'title' => esc_html__('Contact Page', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('Contact page settings.', 'wrapit'),
                    'fields' => array(
                        array(
                            'id' => 'contact_form_email',
                            'type' => 'text',
                            'title' => esc_html__('Email', 'wrapit') ,
                            'desc' => esc_html__('Input email where the messages should arive.', 'wrapit'),
                        ),
                        array(
                            'id' => 'markers',
                            'type' => 'multi_text',
                            'title' => esc_html__('Markers', 'wrapit') ,
                            'desc' => esc_html__('Input markers for contact page in form LATITUDE,LONGITUDE.', 'wrapit'),
                        ),
                        array(
                            'id' => 'marker_icon',
                            'type' => 'media',
                            'title' => esc_html__('Marker Icon', 'wrapit') ,
                            'desc' => esc_html__('Select marker icon for the contact page.', 'wrapit'),
                        ),
                        array(
                            'id' => 'markers_max_zoom',
                            'type' => 'text',
                            'title' => esc_html__('Markers Max Zoom', 'wrapit') ,
                            'desc' => esc_html__('Markers max zoom 0 - 19.', 'wrapit'),
                        ),
                        array(
                            'id' => 'google_api_key',
                            'type' => 'text',
                            'title' => esc_html__('Google API Key', 'wrapit') ,
                            'desc' => esc_html__('Input google API key', 'wrapit'),
                        ),
                    )
                );

                /**********************************************************************
                ***********************************************************************
                FOOTER COPYRIGHTS
                **********************************************************************/
                
                $this->sections[] = array(
                    'title' => esc_html__('Copyrights', 'wrapit') ,
                    'icon' => '',
                    'desc' => esc_html__('Copyrights settings.', 'wrapit'),
                    'fields' => array(
                        array(
                            'id' => 'copyrights',
                            'type' => 'text',
                            'title' => esc_html__('Copyrights', 'wrapit') ,
                            'desc' => esc_html__('Input copyrights text.', 'wrapit'),
                        ),
                    )
                );  

                $this->sections = apply_filters( 'wrapit_options', $this->sections );

            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'wrapit_options',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => esc_html__( 'WrapIt WP', 'wrapit' ),
                    'page_title'           => esc_html__( 'WrapIt WP', 'wrapit' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
                    // Show the time the page took to load, etc
                    'update_notice'        => true,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => '_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );


            }

        }

        global $wrapit_opts;
        $wrapit_opts = new WrapIt_Options();
        } else {
        echo "The class named WrapIt_Options has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }