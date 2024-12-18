<?php

function wer_theme_register_required_plugins()
{
    $plugins = [
        [
            'name' => 'Advanced Custom Fields Pro',
            'slug' => 'advanced-custom-fields-pro',
            'source' => get_template_directory() . '/assets/plugins/advanced-custom-fields-pro.zip',
            'required' => true,
            'version' => '',
            'force_activation' => true,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => '',
        ],
        [
            'name' => 'WeR Media Google Maps plugin',
            'slug' => 'wer-google-maps',
            'source' => get_template_directory() . '/assets/plugins/wer-google-maps.zip',
            'required' => false,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => '',
        ],
        [
            'name' => 'Formidable Forms',
            'slug' => 'formidable',
            'required' => false,
        ],
        [
            'name' => 'Activity Log',
            'slug' => 'aryo-activity-log',
            'required' => false,
        ],
        [
            'name' => 'EWWW Image Optimizer',
            'slug' => 'ewww-image-optimizer',
            'required' => false,
        ],
    ];
    $config = [
        'id' => 'wermedia-template',
        'default_path' => '',
        'menu' => 'wer-install-plugins',
        'parent_slug' => 'themes.php',
        'capability' => 'edit_theme_options',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
    ];

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'wer_theme_register_required_plugins');
