<?php
if (!class_exists("Redux_Framework_sample_config")) {
    class Redux_Framework_sample_config {
        public $args = array();

        public $sections = array();

        public $theme;

        public $ReduxFramework;



        public function __construct() {

            // This is needed. Bah WordPress bugs.  ;)           

            $this->initSettings();           

        }



        public function initSettings() {



            if ( !class_exists("ReduxFramework" ) ) {

                return;

            }       

            

            // Just for demo purposes. Not needed per say.

            $this->theme = wp_get_theme();



            // Set the default arguments

            $this->setArguments();



            // Set a few help tabs so you can see how it's done

            $this->setHelpTabs();



            // Create the sections and fields

            $this->setSections();



            if (!isset($this->args['opt_name'])) { // No errors please

                return;

            }



            // If Redux is running as a plugin, this will remove the demo notice and links

            //add_action( 'redux/plugin/hooks', array( $this, 'remove_demo' ) );

            // Function to test the compiler hook and demo CSS output.

            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2); 

            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.

            // Change the arguments after they've been declared, but before the panel is created

            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

            // Change the default value of a field after it's been set, but before it's been useds

            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

            // Dynamically add a section. Can be also used to modify sections/fields

            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));



            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);

        }




        function compiler_action($options, $css) {

            //echo "<h1>The compiler hook has run!";

            //print_r($options); //Option values

            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )



            /*

              // Demo of how to use the dynamic CSS and write your own static CSS file

              $filename = dirname(__FILE__) . '/style' . '.css';

              global $wp_filesystem;

              if( empty( $wp_filesystem ) ) {

              require_once( ABSPATH .'/wp-admin/includes/file.php' );

              WP_Filesystem();

              }



              if( $wp_filesystem ) {

              $wp_filesystem->put_contents(

              $filename,

              $css,

              FS_CHMOD_FILE // predefined mode settings for WP files

              );

              }

             */

        }



    

        function dynamic_section($sections) {

            return $sections;

        }




        function change_arguments($args) {

            //$args['dev_mode'] = true;



            return $args;

        }



      

        function change_defaults($defaults) {

            $defaults['str_replace'] = "Testing filter hook!";



            return $defaults;

        }



        // Remove the demo link and the notice of integrated demo from the redux-framework plugin

        function remove_demo() {



            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.

            if (class_exists('ReduxFrameworkPlugin')) {

                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);

            }



            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.

            remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));

        }



        public function setSections() {




            // Background Patterns Reader

            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';

            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';

            $sample_patterns = array();



            if (is_dir($sample_patterns_path)) :



                if ($sample_patterns_dir = opendir($sample_patterns_path)) :

                    $sample_patterns = array();



                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {



                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {

                            $name = explode(".", $sample_patterns_file);

                            $name = str_replace('.' . end($name), '', $sample_patterns_file);

                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);

                        }

                    }

                endif;

            endif;



            ob_start();



            $ct = wp_get_theme();

            $this->theme = $ct;

            $item_name = $this->theme->get('Name');

            $tags = $this->theme->Tags;

            $screenshot = $this->theme->get_screenshot();

            $class = $screenshot ? 'has-screenshot' : '';



            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));

            ?>

            <div id="current-theme" class="<?php echo esc_attr($class); ?>">

            <?php if ($screenshot) : ?>

                <?php if (current_user_can('edit_theme_options')) : ?>

                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">

                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'redux-framework-demo'); ?>" />

                        </a>

                <?php endif; ?>

                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'redux-framework-demo'); ?>" />

            <?php endif; ?>



                <h4>

            <?php echo $this->theme->display('Name'); ?>

                </h4>



                <div>

                    <ul class="theme-info">

                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>

                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>

                        <li><?php echo '<strong>' . __('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>

                    </ul>

                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>

                <?php

                if ($this->theme->parent()) {

                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'magnis') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));

                }

                ?>



                </div>



            </div>



            <?php

            $item_info = ob_get_contents();



            ob_end_clean();



            $sampleHTML = '';

            if (file_exists(dirname(__FILE__) . '/info-html.html')) {

                /** @global WP_Filesystem_Direct $wp_filesystem  */

                global $wp_filesystem;

                if (empty($wp_filesystem)) {

                    require_once(ABSPATH . '/wp-admin/includes/file.php');

                    WP_Filesystem();

                }

                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');

            }

			

            // ACTUAL DECLARATION OF SECTIONS  
			
			$this->sections[] = array(

                'icon' => ' el-icon-picture',

                'title' => __('Logo & Favicon Settings', 'magnis'),

                'fields' => array(

					array(

                        'id' => 'favicon',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Custom Favicon', 'magnis'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('Upload your Favicon.', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'default' => array('url' => get_template_directory_uri().'/images/favicon.ico'),

                    ),

					
					array(

                        'id' => 'logo',

                        'type' => 'media',

                        'url' => true,

                        'title' => __('Logo', 'magnis'),

                        'compiler' => 'true',

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'desc' => __('Upload your logo.', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'default' => array('url' => get_template_directory_uri().'/images/site-logo-color-1.png'),

                    ),
                    array(

                        'id' => 'logocheck',

                        'type' => 'checkbox',

                        'title' => __('Enable or Disable Big Logo', 'magnis'),

                        'subtitle' => 'Default: Disable',

                        'desc' => '',

                        'default' => '0'// 1 = on | 0 = off

                    ),


					array(

                        'id' => 'site_name',

                        'type' => 'text',

                        'title' => __('Site Name', 'magnis'),

                        'subtitle' => __('Site Name, leave a blank do not show.', 'magnis'),

                        'default' => 'magnis',

                    ),

					array(

                        'id' => 'tagline',

                        'type' => 'textarea',

                        'title' => __('Tag Line', 'magnis'),

                        'subtitle' => __('Tag Line, leave a blank do not show.', 'magnis'),

                        'default' => 'Multipurpose Bussiness and Corporate',

                    ),

                )

            );

			

			

			$this->sections[] = array(

                'icon' => 'el-icon-qrcode',

                'title' => __('Header Settings', 'magnis'),

                'fields' => array(					

					array(

                        'id' => 'header_layout',

                        'type' => 'image_select',

                        'title' => __('Header Layout', 'magnis'),

                        'subtitle' => __('Select Your Header layout', 'magnis'),

                        'desc' => '',

                        'options' => array(

							'header1' => array(

					            'alt'   => 'Hlayout 1',

					            'img'   => ReduxFramework::$_url.'assets/img/hlayout1.png'

					        ),

							'header2' => array(

					            'alt'   => 'Hlayout 2',

					            'img'   => ReduxFramework::$_url.'assets/img/hlayout2.png'

					        ),  

							'header3' => array(

					            'alt'   => 'Hlayout 3',

					            'img'   => ReduxFramework::$_url.'assets/img/hlayout3.png'

					        ), 							

						), 

                        'default' => 'header1'

                    ),

					

					array(

                        'id' => 'top_info_phone',

                        'type' => 'text',

                        'title' => __('Top Contact Info Phone Number', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => '802-701-9763'

                    ),

					array(

                        'id' => 'top_info_email',

                        'type' => 'text',

                        'title' => __('Top Contact Info Email', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => 'support@magnis.com'

                    ),

					

				)

			);			

			

			 $this->sections[] = array(

                'icon' => 'el-icon-blogger',

                'title' => __('Blog Settings', 'magnis'),

                'fields' => array(

					array(

                        'id' => 'blog_title',

                        'type' => 'text',

                        'title' => __('Blog Title', 'magnis'),

                        'subtitle' => __('Input Blog Title', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => 'Blog'

                    ),

                    array(

                        'id' => 'blog_desc',

                        'type' => 'textarea',

                        'title' => __('Blog Description', 'magnis'),

                        'subtitle' => __('Input Blog Description', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => ''

                    ),

                    array(

                        'id' => 'single_title',

                        'type' => 'text',

                        'title' => __('Single Title', 'magnis'),

                        'subtitle' => __('Input Single Title', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => 'Blog Article'

                    ),

					array(

                        'id' => 'blog_img',

                        'type' => 'media',

                        'title' => __('Upload Header Image Background', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => array('url' => get_template_directory_uri().'/images/page-header-bg.jpg'),

                    ),      

					array(

                        'id' => 'blog_excerpt',

                        'type' => 'text',

                        'title' => __('Blog custom excerpt leng', 'magnis'),

                        'subtitle' => __('Input Blog custom excerpt leng', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => '30'

                    ),                    			

				 )

            );

             $this->sections[] = array(
                'icon' => 'el-icon-briefcase',
                'title' => __('Portfolio Settings', 'magnis'),

                'fields' => array(

					array(

                        'id' => 'portfolio_title',

                        'type' => 'text',

                        'title' => __('Title Portfolio Page ', 'magnis'),

                        'subtitle' => '',                                              

                        'default' => 'Our Portfolio'

                    ),

                    array(

                        'id' => 'portfolio_bg',

                        'type' => 'media',

                        'title' => __('Background Title Portfolio Page', 'magnis'),

                        'subtitle' => __('Upload an image', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => array('url' => get_template_directory_uri().'/images/page-header-bg.jpg'),

                    ),

                    array(

                        'id' => 'portfolio_desc',

                        'type' => 'textarea',

                        'title' => __('Portfolio Description', 'magnis'),

                        'subtitle' => __('Input Portfolio Description', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => ''

                    ),  

                    array(

                        'id' => 'portfolio_show',

                        'type' => 'text',

                        'title' => __('Show Posts', 'magnis'),

                        'subtitle' => 'Show number posts in portfolio page',                                              

                        'default' => '8'

                    ),

                    array(

                        'id' => 'portfolio_detail',

                        'type' => 'text',

                        'title' => __('Title Details Portfolio Single Page ', 'magnis'),

                        'subtitle' => '',                                              

                        'default' => 'Project Details'

                    ), 

                    array(

                        'id' => 'project_out',

                        'type' => 'text',

                        'title' => __('Text Button Link Out Projects ', 'magnis'),

                        'subtitle' => '',                                              

                        'default' => 'View Project'

                    ), 

					array(

                        'id' => 'portfolio_related',

                        'type' => 'text',

                        'title' => __('Title Related Portfolio Single Page ', 'magnis'),

                        'subtitle' => '',                                              

                        'default' => 'Related <strong>Projects</strong>'

                    ),
				)



			);	

			$this->sections[] = array(

                'icon' => 'el-icon-shopping-cart-sign',

                'title' => __('Shop Settings', 'magnis'),

                'fields' => array(

					array(

                        'id' => 'shop_bg',

                        'type' => 'media',

                        'title' => __('Background Title Shop Page', 'magnis'),

                        'subtitle' => __('Upload an image', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => array('url' => get_template_directory_uri().'/images/page-header-bg.jpg'),

                    ),  

					array(

                        'id' => 'product_related_title',

                        'type' => 'text',

                        'title' => __('Related Title', 'magnis'),

                        'subtitle' => '',

                        'desc' => __('Title Box Related Product on Single Page', 'magnis'),

                        'default' => 'Related Products'

                    ),

				)

			);	

			$this->sections[] = array(

                'icon' => 'el-icon-group',

                'title' => __('Social Settings', 'magnis'),

                'fields' => array(

					array(

                        'id' => 'facebook',

                        'type' => 'text',

                        'title' => __('Facebook Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://www.facebook.com/',

                    ),

					array(

                        'id' => 'google',

                        'type' => 'text',

                        'title' => __('Google+ Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),

					array(

                        'id' => 'twitter',

                        'type' => 'text',

                        'title' => __('Twitter Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => 'https://twitter.com/',

                    ),

					array(

                        'id' => 'youtube',

                        'type' => 'text',

                        'title' => __('Youtube Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),

					array(

                        'id' => 'linkedin',

                        'type' => 'text',

                        'title' => __('Linkedin Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),

					array(

                        'id' => 'dribbble',

                        'type' => 'text',

                        'title' => __('Dribbble Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => '',

                    ),

					array(

                        'id' => 'skype',

                        'type' => 'text',

                        'title' => __('Skype Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => ''

                    ),					

                    array(

                        'id' => 'rssfeed',

                        'type' => 'text',

                        'title' => __('RSS Feed Url', 'magnis'),

                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                        'default' => ''

                    ),

				)

			);

            $this->sections[] = array(

                'icon' => 'el-icon-hourglass',

                'title' => __('Coming Soon Settings', 'magnis'),

                'fields' => array(

                    array(

                        'id' => 'cs_bg',

                        'type' => 'media',

                        'title' => __('Background Image', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => array('url' => get_template_directory_uri().'/images/soon-bg.jpg')

                    ),      

                    array(

                        'id' => 'cs_title',

                        'type' => 'textarea',

                        'title' => __('Coming Soon Title', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => 'welcome!'

                    ),                              

                    array(

                        'id' => 'cs_stitle',

                        'type' => 'textarea',

                        'title' => __('Coming Soon Subtitle', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => 'Our website is coming soon. Stay turned.',

                    ),

                    array(

                        'id' => 'cs_letter',

                        'type' => 'textarea',

                        'title' => __('Title Newsletter', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'default' => 'Join our mailing list.',

                    ),

                    array(

                        'id' => 'letter_show',

                        'type' => 'checkbox',

                        'title' => __('Enable or Disable Newsletter', 'magnis'),

                        'subtitle' => 'Default: Enable',

                        'desc' => '',

                        'default' => '1'// 1 = on | 0 = off

                    ),

                    array(

                        'id' => 'cs_year',

                        'type' => 'text',

                        'title' => __('Year', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('Enter year will be ready', 'magnis'),

                        'default' => '2015',

                    ),

                    array(

                        'id' => 'cs_month',

                        'type' => 'text',

                        'title' => __('Month', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('Enter month will be ready', 'magnis'),

                        'default' => '5',

                    ),

                    array(

                        'id' => 'cs_day',

                        'type' => 'text',

                        'title' => __('Date', 'magnis'),

                        'subtitle' => __('', 'magnis'),

                        'desc' => __('Enter date will be ready', 'magnis'),

                        'default' => '1',

                    ),

                )    

            );

			$this->sections[] = array(

                'icon' => ' el-icon-credit-card',

                'title' => __('Footer Settings', 'magnis'),

                'fields' => array(					

					array(

                        'id' => 'footer_text',

                        'type' => 'editor',

                        'title' => __('Footer Text', 'magnis'),

                        'subtitle' => __('Copyright Text', 'magnis'),

                        'default' => '© Copyright 2015 by OceanThemes. All Rights Reserved.',

                    ),

				)

			);

            $this->sections[] = array(

                'icon' => 'el-icon-website',

                'title' => __('Styling Options', 'magnis'),

                'fields' => array(

					

                    array(

                        'id' => 'version_type',

                        'type' => 'select',

                        'title' => __('Theme Version', 'magnis'),

                        'subtitle' => __('Wide or Boxed', 'magnis'),

                        'desc' => __('', 'magnis'),

                        'options'  => array(

                            'wide' => 'Wide Version',

                            'boxed' => 'Boxed Version',

                        ),

                        'default' => 'wide',

                    ),

					

                    array(

                        'id' => 'main_color',

                        'type' => 'color',

                        'title' => __('Theme Main Color', 'magnis'),

                        'subtitle' => __('Pick the main color for the theme (default: #37c878).', 'magnis'),

                        'default' => '#37c878',

                        'validate' => 'color',

                    ),

                    array(

                        'id' => 'boxed_bg',

                        'type' => 'media',

                        'title' => __('Background Image', 'magnis'),

                        'subtitle' => __('Background Image for Boxed Version', 'magnis'),

                        'desc' => __('Background Image only for Boxed Version', 'magnis'),

                        'default' => array('url' => get_template_directory_uri().'/images/patterns/03.png')

                    ),  

                    array(

                        'id' => 'footer_bg',

                        'type' => 'color',

                        'title' => __('The Footer Background Color', 'magnis'),

                        'subtitle' => __('Pick a footer background color for theme (default: #333333).', 'magnis'),

                        'default' => '#333333',

                        'validate' => 'color',

                    ),

					array(

                        'id' => 'botfooter_bg',

                        'type' => 'color',

                        'title' => __('The Bottom Footer Background Color', 'magnis'),

                        'subtitle' => __('Pick a bottom footer background color for theme (default: #222222).', 'magnis'),

                        'default' => '#222222',

                        'validate' => 'color',

                    ),

                    array(

                        'id' => 'footer_color',

                        'type' => 'color',

                        'title' => __('The Bottom Footer Text Color', 'magnis'),

                        'subtitle' => __('Pick a footer color for theme (default: #777777).', 'magnis'),

                        'default' => '#777777',

                        'validate' => 'color',

                    ),


                    array(

                        'id' => 'body-font2',

                        'type' => 'typography',

						'output' => array('body'),

                        'title' => __('Body Font', 'magnis'),

                        'subtitle' => __('Specify the body font properties.', 'magnis'),

                        'google' => true,

                        'default' => array(

                            'color' => '',

                            'font-size' => '',

                            'line-height' => '',

                            'font-family' => "",

                        ),

                    ),

                     array(

                        'id' => 'custom-css',

                        'type' => 'ace_editor',

                        'title' => __('CSS Code', 'magnis'),

                        'subtitle' => __('Paste your CSS code here.', 'magnis'),

                        'mode' => 'css',

                        'theme' => 'monokai',

                        'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',

                        'default' => "#header{\nmargin: 0 auto;\n}"

                    ),

                )

            );

			

            $theme_info = '<div class="redux-framework-section-desc">';

            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'magnis') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';

            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'magnis') . $this->theme->get('Author') . '</p>';

            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'magnis') . $this->theme->get('Version') . '</p>';

            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';

            $tabs = $this->theme->get('Tags');

            if (!empty($tabs)) {

                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'magnis') . implode(', ', $tabs) . '</p>';

            }

            $theme_info .= '</div>';
        }



        public function setHelpTabs() {



            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.

            $this->args['help_tabs'][] = array(

                'id' => 'redux-opts-1',

                'title' => __('Theme Information 1', 'magnis'),

                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'magnis')

            );



            $this->args['help_tabs'][] = array(

                'id' => 'redux-opts-2',

                'title' => __('Theme Information 2', 'magnis'),

                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'magnis')

            );



            // Set the help sidebar

            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'magnis');

        }




        public function setArguments() {



            $theme = wp_get_theme(); // For use with some settings. Not necessary.



            $this->args = array(

                // TYPICAL -> Change these values as you need/desire

                'opt_name' => 'theme_option', // This is where your data is stored in the database and also becomes your global variable name.

                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel

                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel

                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)

                'allow_sub_menu' => true, // Show the sections below the admin menu item or not

                'menu_title' => __('Magnis Options', 'magnis'),

                'page' => __('Magnis Options', 'magnis'),

                // You will need to generate a Google API key to use this feature.

                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth

                'google_api_key' => 'AIzaSyBM9vxebWLN3bq4Urobnr6tEtn7zM06rEw', // Must be defined to add google fonts to the typography module

                //'admin_bar' => false, // Show the panel pages on the admin bar

                'global_variable' => '', // Set a different name for your global variable other than the opt_name

                'dev_mode' => false, // Show the time the page took to load, etc

                'customizer' => true, // Enable basic customizer support

                // OPTIONAL -> Give you extra features

                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.

                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters

                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.

                'menu_icon' => '', // Specify a custom URL to an icon

                'last_tab' => '', // Force your panel to always open to a specific tab (by id)

                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title

                'page_slug' => '_options', // Page slug used to denote the panel

                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not

                'default_show' => false, // If true, shows the default value next to each field that is not the default value.

                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *

                // CAREFUL -> These options are for advanced use only

                'transient_time' => 60 * MINUTE_IN_SECONDS,

                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output

                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.

                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.

                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

                'show_import_export' => true, // REMOVE

                'system_info' => false, // REMOVE

                'help_tabs' => array(),

                'help_sidebar' => '', // __( '', $this->args['domain'] );            

            );

            // Panel Intro text -> before the form

            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {

                if (!empty($this->args['global_variable'])) {

                    $v = $this->args['global_variable'];

                } else {

                    $v = str_replace("-", "_", $this->args['opt_name']);

                }

                $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'magnis'), $v);

            } else {

                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'magnis');

            }

            $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'magnis');

        }

    }
    new Redux_Framework_sample_config();

}


if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {

        print_r($field);

        print_r($value);

    }

endif;


if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {

        $error = false;

        $value = 'just testing';

        $return['value'] = $value;

        if ($error == true) {

            $return['error'] = $field;

        }

        return $return;

    }

endif;

