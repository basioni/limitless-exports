<?php 
/**
 * magnis functions and definitions
 */
global $theme_option;
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' );
}

 require_once dirname( __FILE__ ) . '/framework/bfi_thumb-master/BFI_Thumb.php';	
 require_once dirname( __FILE__ ) . '/framework/Custom-Metaboxes/metabox-functions.php';
 require_once dirname( __FILE__ ) . '/shortcodes.php';
 require_once dirname( __FILE__ ) . '/framework/widget/widget.php';
 require_once dirname( __FILE__ ) . '/framework/wp_bootstrap_navwalker.php';

 function magnis_setup() {
    if ( ! isset( $content_width ) ){
        $content_width = 900;
    }

	load_theme_textdomain( 'magnis', get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-header' );
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'magnis-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
    
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 'video', 'audio', 'gallery', 'quote', 'image') );
  
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'magnis_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

    register_nav_menus( array(
        'primary'   => __( 'Primary menu', 'magnis' ),
        'secondary' => __( 'Footer menu','magnis' ),
    ) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
    add_shortcode('gallery', '__return_false'); 
}
add_action( 'after_setup_theme', 'magnis_setup' );

// Reqire File Style and JS
function magnis_theme_scripts_styles(){
	 global $theme_option;	
   	 $protocol = is_ssl() ? 'https' : 'http';
   	 /**** Google fonts ****/
     wp_enqueue_style( 'fonts-Nothing', "$protocol://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700,700italic,300,300italic", true);
     wp_enqueue_style( 'fonts-Yanone', "$protocol://fonts.googleapis.com/css?family=Euphoria+Script", true);
	 
	 /****Bootstrap****/
	 wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css','','3.2');
	 wp_enqueue_style( 'tango-css', get_template_directory_uri().'/css/tango/skin.css','','3.2');
     wp_enqueue_style( 'newsletter-css', get_template_directory_uri().'/css/quick_newsletter.css','','3.2');
	 wp_enqueue_style( 'awesome-css', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css','','3.2');
	 wp_enqueue_style( 'colorbox-css', get_template_directory_uri().'/css/colorbox.css','','3.2');
	 wp_enqueue_style( 'flexslider-css', get_template_directory_uri().'/css/flexslider.css','','3.2');
     wp_enqueue_style( 'contact-css', get_template_directory_uri().'/css/contact.css','','3.2');
     wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2014-12-05' );
     wp_enqueue_style( 'settings-css', get_template_directory_uri().'/css/responsive.css','','3.2');
     wp_enqueue_style( 'layerslider-css', get_template_directory_uri().'/css/layerslider/layerslider.css','','3.2');

     //theme option for color
     wp_enqueue_style( 'color', get_template_directory_uri() .'/framework/color.php');
    
    /** Js for comment on single post **/    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    }

    /**** Bootstrap core and JavaScript's ****/ 
    wp_enqueue_script("modernizr", get_template_directory_uri()."/js/modernizr.js",array(),false,false);
    
    if ( !is_home() ) {
        wp_enqueue_script("easing", get_template_directory_uri()."/js/jquery-easing-1.3.js",array(),false,false);
    }    

    if(is_page_template('page-templates/coming-soon.php')){
        wp_enqueue_script("countdown", get_template_directory_uri()."/js/jsfunctions.js",array(),false,false);
    }

    wp_enqueue_script("gmap", "$protocol://maps.googleapis.com/maps/api/js",array(),false,false);
    wp_enqueue_script("modified-js", get_template_directory_uri()."/js/jquery-transit-modified.js",array(),false,true);
	wp_enqueue_script("colorbox-js", get_template_directory_uri()."/js/jquery.colorbox-min.js",array(),false,true);
	wp_enqueue_script("twitter-js", get_template_directory_uri()."/js/twitterFetcher_v10_min.js",array(),false,false);
	wp_enqueue_script("jcarousel-js", get_template_directory_uri()."/js/jquery.jcarousel.min.js",array(),false,true);
	wp_enqueue_script("flexslider-js", get_template_directory_uri()."/js/jquery.flexslider.js",array(),false,true);
    wp_enqueue_script("fitvid-js", get_template_directory_uri()."/js/jquery.fitvids.js",array(),false,true);
    wp_enqueue_script("custom-js", get_template_directory_uri()."/js/custom.js",array(),false,true); 
}
add_action( 'wp_enqueue_scripts', 'magnis_theme_scripts_styles' );

//css For Option Header Layout and Footer Layout
function magnis_customize_css() {
	global $theme_option;
	if(isset($theme_option['custom-css'])) {
		echo htmlspecialchars_decode( '<style type="text/css">'.$theme_option['custom-css'].'</style>' );
	}
}
add_action( 'wp_head', 'magnis_customize_css');

//JS Google Analytics In footer
function magnis_code_js() {
	global $theme_option;
	if(isset($theme_option['google_id'])) {
		echo htmlspecialchars_decode( $theme_option['google_id'] );
	}
}
add_action( 'wp_footer', 'magnis_code_js');

function magnis_theme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <li class="comment-item">
    	<figure class="comment-author"><?php echo get_avatar($comment,$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=100' ); ?></figure>
        <div class="comment-entry">
            <p class="meta"><span class="author"><a href="#comments"><?php printf( '%s', get_comment_author()) ?></a>,</span> <span class="date"><?php _e('posted on', 'magnis') ?> <a><?php printf(get_comment_date('d M, Y'));?></a></span></p>
            <?php if ($comment->comment_approved == '0') { ?>
            <em><?php _e('Your comment is awaiting moderation.','magnis') ?></em>
            <?php } else {?>
            <p><?php comment_text() ?></p>
            <p class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'reply_text'=>'<i class="fa fa-reply"></i> Reply', 'max_depth' => $args['max_depth']))) ?></p>
            <?php } ?>
        </div>
    </li> 
<?php
}
        
// Form Search        
function magnis_search_form( $form ) {
    $form = '<form role="search" method="get" class="sidebar-search search" action="' . home_url( '/' ) . '" >  
    	<i class="fa fa-search"></i>
    	<input class="form-control" type="text" value="' . get_search_query() . '" name="s" placeholder="'. esc_attr__( 'type to search...', 'magnis' ) .'" />
    	<input type="submit" class="search_btn" value="'. esc_attr__( 'Search', 'magnis' ) .'" /> 
        <input type="hidden" value="post" name="post_type" id="post_type" />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'magnis_search_form' );

// Page Pagani (Note: $wp_query, magnis_numeric_posts_nav(); )
function magnis_numeric_posts_nav() {
     
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('Prev') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('Next') );
 
    echo '</ul>' . "\n";
 
}

// Remove Background and Header setting in Appearance
add_action( 'after_setup_theme','remove_magnis_options', 100 );
function remove_magnis_options() {
	remove_theme_support( 'custom-background' );
	remove_theme_support( 'custom-header' );
}

// Widget Sidebar
function magnis_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'magnis' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'magnis' ),
		'before_widget' => '<div class="magnis-widget %2$s main-content-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'magnis' ),
		'id'            => 'sidebar-shop',
		'description'   => __( 'Shop sidebar that appears on the left.', 'magnis' ),
		'before_widget' => '<div class="main-content-block %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="main-content-block-entry">',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer One Widget Area', 'magnis' ),
		'id'            => 'footer-area-1',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'magnis' ),
		'before_widget' => '<div id="%1$s" class="magnis-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Two Widget Area', 'magnis' ),
		'id'            => 'footer-area-2',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'magnis' ),
		'before_widget' => '<div id="%1$s" class="magnis-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Three Widget Area', 'magnis' ),
		'id'            => 'footer-area-3',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'magnis' ),
		'before_widget' => '<div id="%1$s" class="magnis-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Fourth Widget Area', 'magnis' ),
		'id'            => 'footer-area-4',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'magnis' ),
		'before_widget' => '<div id="%1$s" class="magnis-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );              
}
add_action( 'widgets_init', 'magnis_widgets_init' );


//add Exception for pages
add_action( 'init', 'magnis_add_excerpts_to_pages' );
function magnis_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
function magnis_breadcrumbs() {
       /* === OPTIONS === */
    $text['home']     = __('Home', 'magnis'); // text for the 'Home' link
    $text['category'] = '%s'; // text for a category page
    $text['tax']      = '%s'; // text for a taxonomy page
    $text['search']   = '%s'; // text for a search results page
    $text['tag']      = '%s'; // text for a tag page
    $text['author']   = '%s'; // text for an author page
    $text['404']      = '404'; // text for the 404 page
 
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = '<li class="active">'; // tag before the current crumb
    $after       = '</li>'; // tag after the current crumb
    /* === END OF OPTIONS === */
 
    global $post;
    $homeLink = home_url() . '/';
    $linkBefore = '<li>';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
 
    if (is_home() || is_front_page()) {
 
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
 
    } else {
 
        echo '<ul class="breadcrumb">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
 
        
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }
            echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }
            echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
        
        }elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
 
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                if ( get_post_type() == 'portfolio' ) {
                	printf($link, $homeLink . '' . $slug['slug'] . '/', 'Portfolio'); //Translate breadcrumb.
            	}else{
            		printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
            	}
                if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
 
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo $delimiter;
            }
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</ul>';
 
    }
}   

// Excerp Number use: echo magnis_excerpt(25);
function magnis_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
	  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
      return $excerpt;
}
// Create a query for the custom taxonomy
function related_posts_by_taxonomy( $post_id, $taxonomy, $args=array() ) {
    $query = new WP_Query();
    $terms = wp_get_object_terms( $post_id, $taxonomy );

    // Make sure we have terms from the current post
    if ( count( $terms ) ) {
        $post_ids = get_objects_in_term( $terms[0]->term_id, $taxonomy );
        $post = get_post( $post_id );
        $post_type = get_post_type( $post );

        $type = 'portfolio';
        
        $args = wp_parse_args( $args, array(
                'post_type' => $type,
                'post__in' => $post_ids,
                'taxonomy' => $taxonomy,
                'term' => $terms[0]->slug,
            ) );
        $query = new WP_Query( $args );
    }

    // Return our results in query form
    return $query;
}

// Add field profile user
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <table class="form-table">
        <tr>
            <th><label for="address"><?php _e('Role', 'magnis'); ?></label></th>
            <td>
                <input type="text" name="role" id="role" value="<?php echo esc_attr( get_the_author_meta( 'role', $user->ID ) ); ?>" class="regular-text" />
                <span class="description"><?php _e('Please enter your role.', 'magnis'); ?></span>
            </td>
        </tr>
    </table>
    
<?php }
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

    update_user_meta( $user_id, 'role', $_POST['role'] );
}

// WooCommerce
if (class_exists('Woocommerce')) {

    // Display 12 products per page. Goes in functions.php
    add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

    /**
    * woo_custom_product_searchform
    */
    add_filter( 'get_product_search_form' , 'magnis_woo_custom_product_searchform' );
    function magnis_woo_custom_product_searchform( $form ) {
    $form = '<form role="search" method="get" class="sidebar-search search" action="' . esc_url( home_url( '/' ) ) . '">
    			<i class="fa fa-search"></i>
                <input class="form-control" type="text" value="' . get_search_query() . '" name="s" placeholder="' . __( 'type to search...', 'woocommerce' ) . '" />
    			<input type="submit" id="searchsubmit" class="search_btn" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
    			<input type="hidden" name="post_type" value="product" />
    		</form>';
    return $form;
    }

    // breadcrumb woocommerce
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action('breadcrumb_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    // related products woocommerce
    function woocommerce_output_related_products() {
    	woocommerce_related_products(3,4); // Display 4 products in rows of 2
    }
    // Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
    add_filter('add_to_cart_fragments', 'magnis_header_add_to_cart_fragment');
    function magnis_header_add_to_cart_fragment( $fragments ) {
    	global $woocommerce;
    	ob_start();
    	?>
    		<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><i class="fa fa-shopping-cart"></i> <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    	<?php
    	$fragments['a.cart-contents'] = ob_get_clean();
    	return $fragments;
    }
}


//Code Visual Compurso.
require_once dirname( __FILE__ ) . '/vc_shortcode.php';
//if(class_exists('WPBakeryVisualComposerSetup')){
function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
        $class_string = preg_replace('/vc_col-xs-(\d{1,2})/', 'col-xs-$1', $class_string);
        $class_string = preg_replace('/vc_col-sm-(\d{1,2})/', 'col-sm-$1', $class_string);
        $class_string = preg_replace('/vc_col-md-(\d{1,2})/', 'col-md-$1', $class_string);
        $class_string = preg_replace('/vc_col-lg-(\d{1,2})/', 'col-lg-$1', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2); 
// Add new Param in Row
if(function_exists('vc_add_param')){
vc_add_param('vc_row',array(
                              "type" => "textfield",
                              "heading" => __('Section Title', 'wpb'),
                              "param_name" => "ses_title",
                              "value" => "",
                              "description" => __("Title of Section ", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => __('Title Text Align', 'wpb'),
                              "param_name" => "align_title",
                              "value" => array(   
                                                __('Left', 'wpb') => 'left',  
                                                __('Center', 'wpb') => 'center',    
                                                __('Right', 'wpb') => 'right',                                                                             
                                              ),
                              "description" => __("", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "textarea_html",
                              "heading" => __('Section sub Title', 'wpb'),
                              "param_name" => "ses_sub_title",
                              "value" => "",
                              "description" => __("Section sub Title", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "textfield",
                              "heading" => __('Container Class', 'wpb'),
                              "param_name" => "wrap_class",
                              "value" => "",
                              "description" => __("Container Class", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => __('Fullwidth', 'wpb'),
                              "param_name" => "fullwidth",
                              "value" => array(   
                                                __('No', 'wpb') => 'no',  
                                                __('Yes', 'wpb') => 'yes',                                                                                
                                              ),
                              "description" => __("Select Fullwidth or not", "wpb"),      
                            ) 
    );
    
// Add effect param in vc_column_inner 
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Container Class', 'wpb'),
                              "param_name" => "wap_class",
                              "value" => "",
                              "description" => __("Container Class", "wpb"),      
                            ) 
    );
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Container id', 'wpb'),
                              "param_name" => "wap_id",
                              "value" => "",
                              "description" => __("Container ID", "wpb"),      
                            ) 
    );  
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Column Title', 'wpb'),
                              "param_name" => "title",
                              "value" => "",
                              "description" => __("Title of column", "wpb"),      
                            ) 
    );

    vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "el_id" );
    vc_remove_param( "vc_row", "parallax_image" );
    vc_remove_param( "vc_row", "parallax" );
    vc_remove_param( "vc_row", "full_height" );
    vc_remove_param( "vc_row", "video_bg" );
    vc_remove_param( "vc_row", "video_bg_url" );
	vc_remove_param( "vc_row", "content_placement" );
    vc_remove_param( "vc_row", "video_bg_parallax" );
	
}
if(function_exists('vc_remove_element')){
    vc_remove_element('vc_custom_heading'); 
    vc_remove_element('vc_button'); 
    vc_remove_element('vc_button2'); 
    vc_remove_element('vc_cta_button'); 
    vc_remove_element('vc_cta_button2');
    vc_remove_element('vc_accordion');
}
//}

//Active Plugin: 
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.0-alpha
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'magnis_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function magnis_register_required_plugins() {

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Plugin Include in Folder Theme
        array(            
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name'               => 'LayerSlider WP', // The plugin name.
            'slug'               => 'LayerSlider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/LayerSlider.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(            
            'name'               => 'OT Portfolio', // The plugin name.
            'slug'               => 'ot_portfolio', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot_portfolio.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(            
            'name'               => 'OT Team', // The plugin name.
            'slug'               => 'ot_team', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot_team.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(            
            'name'               => 'OT Testimonial', // The plugin name.
            'slug'               => 'ot_testimonial', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot_testimonial.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(            
            'name'               => 'OT FAQs', // The plugin name.
            'slug'               => 'ot_faqs', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot_faqs.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(
            'name'                     => 'Woocommerce', // The plugin name
            'slug'                     => 'woocommerce', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                     => 'Contact Form 7', // The plugin name
            'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),      
        array(
            'name'                     => 'Newsletter', // The plugin name
            'slug'                     => 'newsletter', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are wrapped in a sprintf(), so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'archi' ),
            'menu_title'                      => __( 'Install Plugins', 'archi' ),
            'installing'                      => __( 'Installing Plugin: %s', 'archi' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'archi' ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'archi'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'archi'
            ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %s plugin.',
                'Sorry, but you do not have the correct permissions to install the %s plugins.',
                'archi'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'archi'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'archi'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %s plugins.',
                'archi'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'archi'
            ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %s plugin.',
                'Sorry, but you do not have the correct permissions to update the %s plugins.',
                'archi'
            ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'archi'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'archi'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'archi' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'archi' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'archi' ), // %s = dashboard link.
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}