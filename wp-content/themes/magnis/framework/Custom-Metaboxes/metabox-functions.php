<?php



/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */







add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );



/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */



function cmb_sample_metaboxes( array $meta_boxes ) {







	// Start with an underscore to hide fields from custom fields list



	$prefix = '_cmb_';



	$meta_boxes[] = array(

        'id'         => 'page_setting',

        'title'      => 'Page Setting',

        'pages'      => array('page'), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox

        'fields' => array(

            array(

                'name' => 'Upload Background Image for Top Page',

                'desc' => 'Upload an image or enter an URL, Recommended Size: 2200 x 1348',

                'id' => $prefix . 'image_thumbnail',

                'type' => 'file',

                'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )

            ),   

            array(
                'name' => 'Select Page Layout',
                'desc' => 'Select Page Layout, only use for Default Template',
                'id'   => $prefix . 'page_layout',
                'type'    => 'select',
                'options' => array(
                        array( 'name' => 'Page Sidebar Right', 'value' => 'right_sidebar', ),
                        array( 'name' => 'Page Sidebar Left', 'value' => 'left_sidebar', ),
                        array( 'name' => 'Page Full Width', 'value' => 'no_sidebar', ),
                    ),
                'std' => 'right_sidebar'    
            ),   

        )

    );



	$meta_boxes[] = array(



		'id'         => 'post_options',



		'title'      => 'Post Options',



		'pages'      => array('post'), // Post type



		'context'    => 'normal',



		'priority'   => 'high',



		'show_names' => true, // Show field names on the left



		'fields'     => array(



            array(



                'name' => __( 'Link Audio', 'cmb' ),



                'desc' => __( 'Add link Audio Soundcloud. Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759', 'cmb' ),



                'id'   => $prefix . 'link_audio',



                'type' => 'text'



            ),



            array(



                'name' => __( 'Link Video', 'cmb' ),



                'desc' => __( 'Add link Video Youtube, Vimeo. Ex: http://www.youtube.com/embed/eP2VWNtU5rw or http://player.vimeo.com/video/20249835', 'cmb' ),



                'id'   => $prefix . 'link_video',



                'type' => 'text'



            ),



		),



	);



    // Add other metaboxes as needed



	



	$meta_boxes[] = array(



        'id'         => 'testimonial_setting',



        'title'      => 'Testimonial Setting',



        'pages'      => array('testimonial'), // Post type



        'context'    => 'normal',



        'priority'   => 'high',



        'show_names' => true, // Show field names on the left



        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox



        'fields' => array(



            array(



                'name' => 'Job Name',



                'desc' => 'Set Job Name',



                'id'   => $prefix . 'job_name',



                'type'    => 'text',



            ), 

            array(



                'name' => 'Website',



                'desc' => 'Set Website',



                'id'   => $prefix . 'website',



                'type'    => 'text',



            ),           



        )



    );



	// Add other metaboxes as needed



	



    $meta_boxes[] = array(



        'id'         => 'project_fields',



        'title'      => 'Setting Portfolio Post',



        'pages'      => array('portfolio'), // Post type



        'context'    => 'normal',



        'priority'   => 'high',



        'show_names' => true, // Show field names on the left



        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox



        'fields' => array(



            array(



                'name' => 'Link Audio',



                'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',



                'id'   => $prefix . 'portfolio_audio',



                'type' => 'text',



            ),



            array(



                'name' => 'Link Video',



                'desc' => 'Youtube or Vimeo, Example: http://www.youtube.com/embed/0ecv0bT9DEo',



                'id'   => $prefix . 'portfolio_video',



                'type' => 'text',



            ),



            array(



                'name' => __( 'Project Description', 'magnis' ),



                'desc' => __( '', 'magnis' ),



                'id'   => $prefix . 'portfolio_desc',



                'type' => 'textarea_code',



                'std'  => 'Nenean vitae nisi pharetra, condimentum arcu id, condimentum lectus. Donec velit diam, pellentesque a convallis nec, ullamcorper sit amet tortor. Pellentesque eros dolor, hendrerit semper nisi eu, lobortis tincidunt sem.'



            ),



            array(



                'name' => 'Project URL',



                'desc' => 'Enter your project detai URL',



                'id'   => $prefix . 'project_url',



                'type' => 'text',



            ),



			array(



			    'name' => __( 'Project Details', 'magnis' ),



			    'desc' => __( 'Example: &lt;p&gt;&lt;span&gt;client:&lt;/span&gt; John Doe&lt;/p&gt;', 'magnis' ),



			    'id'   => $prefix . 'portfolio_details',



			    'type' => 'textarea_code',



			    'std'  => '<p><span>agency:</span> "Quisque Quam Enim"</p>

                        <p><span>client:</span> John Doe</p>

                        <p><span>date:</span> 12 Jul, 2012</p>

                        <p><span>AD:</span> Praesent dictum lorem condimentum, rutrum sem.</p>'



			),



        )



    );

	// Add other metaboxes as needed
    $meta_boxes[] = array(



        'id'         => 'single_team',



        'title'      => 'Setting Team',



        'pages'      => array( 'team'), // Post type



        'context'    => 'normal',



        'priority'   => 'high',



        'show_names' => true, // Show field names on the left



        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox



        'fields' => array(



            array(



                'name' => 'Job',



                'desc' => '',



                'id'   => $prefix . 'team_job',



                'type'    => 'text',



            ),

            array(



                'name' => 'Icon 1',



                'desc' => 'Enter class icon social 1. Example: facebook. Find here: <a target="_blank" href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a>',



                'id'   => $prefix . 'team_icon1',



                'type'    => 'text',



            ),

            array(



                'name' => 'Link Social 1',



                'desc' => 'Enter link to social 1',



                'id'   => $prefix . 'team_link1',



                'type'    => 'text',



            ),

            array(



                'name' => 'Icon 2',



                'desc' => 'Enter class icon social 2. Example: facebook. Find here: <a target="_blank" href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a>',



                'id'   => $prefix . 'team_icon2',



                'type'    => 'text',



            ),

            array(



                'name' => 'Link Social 2',



                'desc' => 'Enter link to social 2',



                'id'   => $prefix . 'team_link2',



                'type'    => 'text',



            ),

            array(



                'name' => 'Icon 3',



                'desc' => 'Enter class icon social 3. Example: facebook. Find here: <a target="_blank" href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a>',



                'id'   => $prefix . 'team_icon3',



                'type'    => 'text',



            ),

            array(



                'name' => 'Link Social 3',



                'desc' => 'Enter link to social 3',



                'id'   => $prefix . 'team_link3',



                'type'    => 'text',



            ),

            

        )



    );

	

    //FAQs



    $meta_boxes[] = array(



        'id'         => 'single_faq',



        'title'      => 'Setting FAQs',



        'pages'      => array( 'faq'), // Post type



        'context'    => 'normal',



        'priority'   => 'high',



        'show_names' => true, // Show field names on the left



        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox



        'fields' => array(



            array(



                'name' => 'Icon',



                'desc' => 'Icon display in accordion. Find here: <a target="_blank" href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a>',



                'id'   => $prefix . 'faq_icon',



                'type'    => 'text',



            ),

        )



    );



	return $meta_boxes;



}







add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );



/**
 * Initialize the metabox class.
 */



function cmb_initialize_cmb_meta_boxes() {







	if ( ! class_exists( 'cmb_Meta_Box' ) )



		require_once 'init.php';







}



