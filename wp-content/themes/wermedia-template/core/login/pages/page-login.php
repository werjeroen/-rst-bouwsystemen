<?php

/**
 *  Template Name: Login
 */

get_header();
?>

<div class="login">
    <style>
        :root {
            --primary-color: #e8314f;
        }
        h4 {
            color: white;
            margin: 0 0 20px;
        }
    </style>
    <div class="login__wrapper">
        <div class="login--left">
            <div class="login__image">
                <img class="image--cover" src="<?php echo get_template_directory_uri() . '/resources/images/login/wer-team.png'; ?>" alt="">
            </div>
            <div class="login__contact">
                <span class="login__author">
                    <a class="link" href="https://wermedia.nl">
                        <span class="author__icon">
                            <?php convert_svg( get_template_directory_uri() . "/resources/images/login/logo-wermedia.svg" ); ?>
                        </span>
                    </a>
                </span>
                
                <h4>Heb je vragen of zijn er problemen met je website?</h4>
                <p>
                    Bel ons op <a href="tel: +31591 - 20 81 03" class="tel"></a>0591 - 20 81 03</a><br />
                    Stuur een e-mail naar <a href="tel: +31591 - 20 81 03" class="tel"></a>info@wermedia.nl</a>
                </p>
            </div>
        </div>
        <div class="login--right">
            <div class="login__form">

                <?php if( display_error_message() ) : ?>
                    <div class="form__message">
                        <?php echo display_error_message(); ?>
                    </div>
                <?php endif; ?>

                <?php if (!is_user_logged_in()) : ?>
                    <h3>Inloggen</h3>

                    <?php
                        $args = [
                            'redirect' => admin_url(),
                            'form_id' => 'wer__loginform',
                            'label_username' => __('Gebruikersnaam:', 'wermedia-template'),
                            'label_password' => __('Wachtwoord:', 'wermedia-template'),
                            'label_remember' => __('Gegevens onthouden', 'wermedia-template'),
                            'label_log_in' => __('Inloggen'),
                            'remember' => true
                        ];
                    wp_login_form($args);
                    ?>
                <?php else : ?>
                    <h3>Welkom, <?php echo $current_user->display_name; ?>!</h3>
                    <p>
                        Je bent succesvol ingelogd. <br /> 
                        klik op onderstaande knop om direct naar het dashboard te gaan.
                    </p>
                    <div class="button__box button__box--spacer">
                        <a href="<?php echo get_admin_url(); ?>" class="button button__solid--primary">Ga naar dashboard</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
wp_footer();
