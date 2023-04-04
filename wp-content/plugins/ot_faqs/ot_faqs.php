<?php
/*
Plugin Name: OT FAQs
Plugin URI: http://oceanthemes.net/
Description: Declares a plugin that will create a custom post type displaying portfolio.
Version: 1.0
Author: OceanThemes Team
Author URI: http://oceanthemes.net/
License: GPLv2
*/

add_action( 'init', 'register_ot_faqs_FAQ' );
function register_ot_faqs_FAQ() {
    
    $labels = array( 
        'name' => __( 'FAQ', 'ot_faqs' ),
        'singular_name' => __( 'FAQ', 'ot_faqs' ),
        'add_new' => __( 'Add New FAQ', 'ot_faqs' ),
        'add_new_item' => __( 'Add New FAQ', 'ot_faqs' ),
        'edit_item' => __( 'Edit FAQ', 'ot_faqs' ),
        'new_item' => __( 'New FAQ', 'ot_faqs' ),
        'all_items' => __('All FAQs','ot_faqs'),
        'view_item' => __( 'View FAQ', 'ot_faqs' ),
        'search_items' => __( 'Search FAQs', 'ot_faqs' ),
        'not_found' => __( 'No FAQs found', 'ot_faqs' ),
        'not_found_in_trash' => __( 'No FAQs found in Trash', 'ot_faqs' ),
        'parent_item_colon' => __( 'Parent FAQ:', 'ot_faqs' ),
        'menu_name' => __( 'FAQs', 'ot_faqs' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List FAQ',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats', 'excerpt' ),
        'taxonomies' => array( 'faq_category','categories2' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => null,
		'menu_icon' => 'dashicons-feedback',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'faq', $args );
}
add_action( 'init', 'FAQ_Categories_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function FAQ_Categories_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'FAQ Category', 'ot_faqs' ),
    'singular_name' => __( 'FAQ Category', 'ot_faqs' ),
    'search_items' =>  __( 'Search Category','ot_faqs' ),
    'all_items' => __( 'All Category','ot_faqs' ),
    'parent_item' => __( 'Parent Category','ot_faqs' ),
    'parent_item_colon' => __( 'Parent Category:','ot_faqs' ),
    'edit_item' => __( 'Edit Category','ot_faqs' ), 
    'update_item' => __( 'Update Category','ot_faqs' ),
    'add_new_item' => __( 'Add New Category','ot_faqs' ),
    'new_item_name' => __( 'New Category Name','ot_faqs' ),
    'menu_name' => __( 'Categories','ot_faqs' ),
  );     

// Now register the taxonomy

  register_taxonomy('categories2',array('FAQ'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories2' ),
  ));

}

?>