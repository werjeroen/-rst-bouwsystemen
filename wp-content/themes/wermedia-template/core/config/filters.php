<?php

// Disable core update emails
add_filter( 'auto_core_update_send_email', '__return_false' );

// Disable plugin update emails
add_filter( 'auto_plugin_update_send_email', '__return_false' );

// Disable theme update emails
add_filter( 'auto_theme_update_send_email', '__return_false' );

// Remove auto p tags from contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Disable all gutenberg blocks
add_filter('allowed_block_types_all', 'disable_all_gutenberg_blocks', 10, 2);
function disable_all_gutenberg_blocks($allowed_block_types, $block_editor_context) {
    return [];
}

/**
 * SVG support
 *
 * @param [type] $mimes
 * @return void
 */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Remove the classes from navigation
 *
 * @param [type] $classes
 * @param [type] $item
 * @param [type] $args
 * @return void
 */
function clear_nav_menu_item_class($classes, $item, $args)
{
    $existing_classes = $classes;

    $classes = [];
    if (in_array('current-menu-item', $existing_classes)) {
        $classes[] = 'navigation__link navigation__link--current';
    } else {
        $classes[] = 'navigation__link';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);

/**
 * Filter for excerpt length
 */
add_filter( 'excerpt_length', function(){
	return 35;
} );

/**
 * Change excerpt end output
 */
function wer_excerpt_more( $more ) {
	return ' ... ';
}
add_filter( 'excerpt_more', 'wer_excerpt_more' );

/**
 * Check if current page is a login page
 *
 * @return boolean
 */
function is_authentication_page() {
    if ( is_page( 'login' ) || is_page( 'register' ) || is_page( 'password-reset' ) ) {
        return true;
    }
    return false;
}

/**
 * Reset all classes and add auth class on auth pages.
 *
 * @return void
 */
function wer_body_classes() {
    $classes = [];

    if ( is_authentication_page() ) 
        $classes[] = 'auth';
        return array_merge( $classes, [ 'preload' ] );

    return $classes;
}
add_filter( 'body_class', 'wer_body_classes' );

/**
 * Add logged-in classes from wordpress
 */
function return_logged_in_classes($classes) {
    if (is_user_logged_in()) :
        $classes [] = 'logged-in admin-bar';
    endif;
    
    return $classes;
}
add_filter( 'body_class', 'return_logged_in_classes' );