<?php 

function add_the_table_button( $buttons ) {
   array_push( $buttons, 'separator', 'table' );
   return $buttons;
}
add_filter( 'mce_buttons', 'add_the_table_button' );

function add_the_table_plugin( $plugins ) {
    $plugins['table'] = get_template_directory_uri().'/resources/javascript/tinymce/tinymce_table.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_the_table_plugin' );