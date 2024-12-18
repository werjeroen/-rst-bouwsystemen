<?php

$LOGIN_PAGE = home_url('/login');
$LOGIN_TEMPLATE_FILE = get_template_directory() . '/core/config/login/pages/page-login.php';
$LOGIN_PAGE_EXISTS = get_page_by_path('login');

if (!empty($LOGIN_PAGE_EXISTS) && file_exists($LOGIN_TEMPLATE_FILE)) {
    
    /**
     * Redirect user from default wp-login.php or wp-admin to the custom page
     *
     * @return void
     */
    function redirect_login_page()
    {
        global $LOGIN_PAGE;
        global $pagenow;

        // Redirect alleen als de gebruiker naar wp-login.php of wp-admin gaat
        if (($pagenow == "wp-login.php" || $pagenow == "wp-admin.php") && $_SERVER['REQUEST_METHOD'] == 'GET') {
            wp_redirect($LOGIN_PAGE);
            exit;
        }
    }
    add_action('init', 'redirect_login_page');

    /**
     * Handle failed login attempts
     */
    function login_failed()
    {
        global $LOGIN_PAGE;

        wp_redirect($LOGIN_PAGE . '?login=failed');
        exit;
    }
    add_action('wp_login_failed', 'login_failed');

    /**
     * Logout user
     *
     * @return void
     */
    function logout_page()
    {
        global $LOGIN_PAGE;

        wp_redirect($LOGIN_PAGE . "?login=false");
        exit;
    }
    add_action('wp_logout', 'logout_page');

    /**
     * Authenticate user
     *
     * @param [type] $user
     * @param [type] $username
     * @param [type] $password
     * @return void
     */
    function verify_username_password($user, $username, $password)
    {
        global $LOGIN_PAGE;

        if (empty($username) || empty($password)) {
            wp_redirect($LOGIN_PAGE . "?login=empty");
            exit;
        }
    }
    add_filter('wp_login_failed', 'verify_username_password', 10, 3);

    /**
     * Display error messages to the form
     *
     * @param [type] $err_code
     * @return void
     */
    function display_error_message()
    {
        $login = (isset($_GET['login'])) ? $_GET['login'] : false;

        if ($login) :
            if ($login === "failed") {
                $message = '<p class="message message--bad">Ongeldige gebruikersnaam en/of wachtwoord.</p>';
            }
            if ($login === "empty") {
                $message = '<p class="message message--bad">Gebruikersnaam en/of wachtwoord is leeg.</p>';
            }
            if ($login === "false") {
                $message = '<p class="message message--ok">Je bent succesvol uitgelogd.</p>';
            }

            return $message;
        endif;

        return false;
    }

    /**
     * Gebruik de 'template_include' filter om het juiste template te laden
     */
    function wer_load_login_template($template) {
        global $LOGIN_TEMPLATE_FILE;
        global $post;

        // Controleer of we op de 'login' pagina zijn
        if ($post && $post->post_name === 'login') {
            // Laad het login template vanuit de aangepaste locatie
            return $LOGIN_TEMPLATE_FILE;
        }

        // Standaard template laden als het geen login pagina is
        return $template;
    }
    add_filter('template_include', 'wer_load_login_template');

} else {
    error_log('Login page or template does not exist.');
}
