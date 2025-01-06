<?php
/**
 * Add ACF options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme acf Settings',
        'menu_title'    => 'Custom Fields',
        'parent_slug'   => 'wer-thema-opties-page',
    ));
}

/**
 * Add theme support
 */
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_post_type_support( 'page', 'excerpt' );
//add_theme_support( 'custom-logo' );

$custom_header = array(
	'width'                  => 1400,
	'height'                 => 800,
	'flex-height'            => true,
	'flex-width'             => true,
	'uploads'                => true,
);
//add_theme_support( 'custom-header', $custom_header );