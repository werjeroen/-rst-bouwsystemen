<?php

/**
 * Add login page automatically
 *
 * @param string $page_title
 * @param string $page_content
 * @return void
 */
function wer_create_theme_page($page_title, $page_content)
{
    if (get_page_by_path('login')) {
        return;
    }

    $page_args = [
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => ucwords($page_title),
        'post_name' => 'login',
        'post_content' => $page_content,
        'post_author' => 1
    ];
    $page_id = wp_insert_post($page_args);
    
    update_post_meta($page_id, "_wp_page_template", "pages/page-login.php");

    flush_rewrite_rules();
}

/**
 * Call the wer_create_theme_page function to setup the correct pages
 *
 * @return void
 */
function wer_create_theme_page_on_theme_activation()
{
    $pages_array = [
        'Login' => '<h3>We\'r Media Login pagina aangemaakt</h3>'
    ];

    foreach ($pages_array as $page_title => $page_content) {
        wer_create_theme_page($page_title, $page_content);
    }
}
add_action('init', 'wer_create_theme_page_on_theme_activation');
