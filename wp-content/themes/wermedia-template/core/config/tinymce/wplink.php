<?php 

/**
 * Enqueue custom JavaScript for the TinyMCE link editor.
 *
 * This function enqueues the custom JavaScript file for enhancing the TinyMCE link editor
 * with a "Show as button" checkbox.
 */
function wer_custom_wplink_editor() {
    wp_enqueue_script('custom-link-editor-script', get_template_directory_uri() . '/resources/javascript/tinymce/tinymce_wplink.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'wer_custom_wplink_editor');
