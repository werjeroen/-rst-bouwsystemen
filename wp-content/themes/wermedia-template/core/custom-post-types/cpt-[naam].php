<?php
function custom_pt() {
    $posttype = 'diensten';
    
    $labels = array(
        'name' => _x('Diensten', 'Post Type General Name', $posttype),
        'singular_name' => _x('Diensten', 'Post Type Singular Name', $posttype),
        'menu_name' => __('Diensten', $posttype),
        'name_admin_bar' => __('Diensten', $posttype),
        'archives' => __('Item Archives', $posttype),
        'attributes' => __('Item Attributes', $posttype),
        'parent_item_colon' => __('Parent Item:', $posttype),
        'all_items' => __('Alle items', $posttype),
        'add_new_item' => __('Nieuwe item', $posttype),
        'add_new' => __('Nieuwe toevoegen', $posttype),
        'new_item' => __('Nieuwe item', $posttype),
        'edit_item' => __('Item aanpassen', $posttype),
        'update_item' => __('Update Item', $posttype),
        'view_item' => __('Item bekijken', $posttype),
        'view_items' => __('Bekijk items', $posttype),
        'search_items' => __('Zoek item', $posttype),
        'not_found' => __('Geen item gevonden', $posttype),
        'not_found_in_trash' => __('Not found in Trash', $posttype),
        'featured_image' => __('Uitgelichte afbeelding', $posttype),
        'set_featured_image' => __('Uitgelichte afbeelding toevoegen', $posttype),
        'remove_featured_image' => __('Uitgelichte afbeelding verwijder', $posttype),
        'use_featured_image' => __('Afbeelding instellen', $posttype),
        'insert_into_item' => __('Insert into item', $posttype),
        'uploaded_to_this_item' => __('Uploaded to this item', $posttype),
        'items_list' => __('Items list', $posttype),
        'items_list_navigation' => __('Items list navigation', $posttype),
        'filter_items_list' => __('Filter items list', $posttype),
    );
    $cpt = array(
        'label' => __('Post Type', $posttype),
        'description' => __('Post Type Description', $posttype),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-status',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    );
    register_post_type($posttype, $cpt);
}
add_action('init', 'custom_pt', 0);
