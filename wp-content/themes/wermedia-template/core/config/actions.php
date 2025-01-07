<?php

/**
 * Remove Gutenberg Block Library CSS from loading on the frontend
 */
function wer_remove_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
}
add_action('wp_enqueue_scripts', 'wer_remove_block_library_css', 100);

/**
 * Add category to the page
 */
function wer_add_page_category() {  
    register_taxonomy_for_object_type('category', 'page');  
}
add_action( 'init', 'wer_add_page_category' );

/**
 * Setup styles and scripts
 * 
 * @return void
 */
function wer_custom_styles()
{
    wp_enqueue_style(
        'custom-styles',
        get_template_directory_uri() . '/dist/css/main.css'
    );

    wp_enqueue_style(
        'font-awesome',
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        [],
        '6.4.0'
    );

    wp_enqueue_script(
        'custom-script',
        get_template_directory_uri() . '/dist/js/bundle.js',
        null,
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'wer_custom_styles');

/**
 * Custom Menu's
 *
 * @return void
 */
function custom_wer_menu()
{
    register_nav_menus([
        'primary-menu' => __('Hoofdmenu', 'wermedia-template'),
        'footer-menu-1' => __('Footer 1', 'wermedia-template'),
        'footer-menu-2' => __('Footer 2', 'wermedia-template'),
        'footer-menu-3' => __('Footer 3', 'wermedia-template'),
        'footer-menu-legal' => __('Footer legal', 'wermedia-template'),
    ]);
}
add_action('init', 'custom_wer_menu');