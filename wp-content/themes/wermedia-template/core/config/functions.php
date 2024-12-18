<?php

/**
 * Generic helper to modify the markup for a given path to an SVG
 *
 * @param  string $path  Absolute path to the SVG file
 * @param  array  $args  Args to modify attributes of the SVG
 * @return string        Inline SVG markup
 */
function convert_svg($path = '', $args = [])
{
    if (!$path) {
        return;
    }

    $fileExists = isResourceAvailable($path);
    
    if (!empty($args)) {
        $css_class = "image--cover " . implode('', $args);
    } else {
        $css_class = 'image--cover';
    }

    if ($fileExists) {
        $arrContextOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];

        $svg = file_get_contents($path, false, stream_context_create($arrContextOptions));
        $svg = preg_replace('/(width|height)="[\d\.]+"/i', '', $svg);
        $svg = str_replace('<svg ', '<svg class="' . esc_attr($css_class) . '"', $svg);

        echo $svg;
    }
}

/**
 * check if resource is available
 *
 * @param [type] $url
 * @return boolean
 */
function isResourceAvailable($url)
{
    if (empty($url)) {
        return false;
    }

    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    return get_headers($url, 1, $context) ? true : false;
}

/**
 *  Helper function for generating a placegolder image url.
 */  
function wer_placeholder_url() {
    return ''.get_template_directory_uri().'/resources/images/fallback/fallback.png';
}

/**
 *  Helper function for generating a placegolder image.
 */  
function wer_placeholder_image() {
    return '<img class="image--cover" src="'.wer_placeholder_url().'">';
}
  
/**
 * Custom function for getting the post image. If the image is not found, display a placeholder image.
 */
function wer_custom_image($size = 'large', $id = '', $placeholder = true, $class = 'image--cover') {
    if (empty($id)) {
        $id = get_the_id();
    }

    $out = '';

    if (has_post_thumbnail($id)) {
        $attributes = $class ? ['class' => $class] : [];
        $out .= get_the_post_thumbnail($id, $size, $attributes);
    } else {
        if ($placeholder === true) {
            $out .= wer_placeholder_image();
        }
    }

    return $out;
}
  
/**
 * Custom helper function for getting contact page, usefull in cases with multiple contact buttons 
*/  
function contactpage($output = 'url') {
    switch ($output) :
        case 'id';
            return get_option('contactpagina');
            break;

        case 'url';
        default;
            return get_the_permalink(get_option('contactpagina'));

    endswitch;
}

/**
 * Custom helper function for Social Media URLs present in theme options.
 *
 * @param string $prefix Tekst die wordt weergegeven voor de sociale media-icoontjes (optioneel).
 * @return string HTML-output van sociale media-icoontjes.
 */
function wer_social_media($prefix = '') {
    $output = '<div class="footer__socials socials--list">';
    
    if (!empty($prefix)) {
        $output .= '<span class="socials__title">' . esc_html(__($prefix, 'your-textdomain')) . '</span>';
    }

    if (have_rows('accounts', 'option')) {
        while (have_rows('accounts', 'option')) {
            the_row();

            $link = get_sub_field('social_link');
            $logo = get_sub_field('social_logo');

            if ($link && $logo) {
                $output .= sprintf(
                    '<a class="social__link" href="%s" target="_blank" rel="noopener noreferrer">
                        <span class="social__icon">
                            <img class="image--contain" src="%s" alt="">
                        </span>
                    </a>',
                    esc_url($link),
                    esc_url($logo)
                );
            }
        }

        wp_reset_postdata();
    }

    // Sluit de wrapper af
    $output .= '</div>';

    return $output;
}

  
/**
 * Custom helper function for getting option field from options for client info 
*/  
function get_wer_option_field($value = null) {
    $field = get_option($value);

    switch ($value) :
        case 'telefoonnummer';
            $prefix = 'Tel. ';
            break;
        case 'emailadres';
            $prefix = 'E-mail ';
            break;
        default;
            $prefix = '';
    endswitch;

    if (!empty($field)) :
      $out = '<div class="contact__item item__'.strtolower($value).'">'.$prefix.$field.'</div>';  
      return $out;
    endif;
}

/**
 * Quick formated client details inserted in theme options
 */  
function wer_client_info() {
    $out = '';
    $out .= get_wer_option_field('adres');
    if (!empty(get_option('postcode'))) : $postcode = get_option('postcode').' '; else : $postcode = ''; endif;
    if (!empty(get_option('woonplaats'))) : $plaatsnaam = get_option('woonplaats'); else : $plaatsnaam = ''; endif;
    if ($postcode || $plaatsnaam) :
      $out .= '<div class="contact__item item__postcodeplaats">'.$postcode.$plaatsnaam.'</div>';
    endif;
    $out .= get_wer_option_field('telefoonnummer');
    $out .= get_wer_option_field('emailadres');
    return $out;
}

/**
 * Custom logo function if has support for custom logo
 */
function wer_custom_logo() {
    if (has_custom_logo()) :
        $out = the_custom_logo();
    else :
        $out = convert_svg( get_template_directory_uri().'/resources/images/login/logo-wermedia.svg' );
    endif;
    
    return $out;
}

// Functie om te controleren of de pagina een nieuwsdetailpagina is
function is_news_detail_page() {
    global $post;

    if (is_single() && !empty($post)) {
        if ($post->post_type === 'post') {
            return true;
        }
    }

    return false;
}
