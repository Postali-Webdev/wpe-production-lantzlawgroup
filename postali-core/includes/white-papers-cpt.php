<?php
/**
 * Custom White Papers Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_white_papers() {

// set up labels
    $labels = array(
        'name' => 'White Papers',
        'singular_name' => 'White Paper',
        'add_new' => 'Add New White Paper',
        'add_new_item' => 'Add New White Paper',
        'edit_item' => 'Edit White Paper',
        'new_item' => 'New White Paper',
        'all_items' => 'All White Papers',
        'view_item' => 'View White Paper',
        'search_items' => 'Search White Papers',
        'not_found' =>  'No White Papers Found',
        'not_found_in_trash' => 'No White Papers found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'White Papers',

    );
    //register post type
    register_post_type( 'White Papers', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-media-text',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'white-papers', 'with_front' => false ), // Allows for /white-papers/ to be the preface to non pages, but custom posts to have own root
        )
    );

}

add_action( 'init', 'create_custom_post_type_white_papers' );