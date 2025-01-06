<?php

/**
 * Remove all widgets from the dashboard. Uncomment or remove to show widgets.
 *
 * @return void
 */
function remove_dashboard_widgets()
{
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );

    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

/**
 * Remove menu items for wer_customer role
 */
function remove_menus() {
  $user = wp_get_current_user();
  if ( in_array( 'wer_customer', (array) $user->roles ) ) {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'profile.php' );
    add_action('wp_dashboard_setup', 'wer_remove_dashboard_widgets' );
    update_user_meta($user->ID, 'admin_color', 'wer_media');
  }
}
add_action( 'admin_menu', 'remove_menus' );
