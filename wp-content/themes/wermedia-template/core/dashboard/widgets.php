<?php 

function wer_dashboard_info_widget() {
    wp_add_dashboard_widget('wer_info_widget', 'We\'r Media contactgegevens', 'wer_info_widget');
}
add_action('wp_dashboard_setup', 'wer_dashboard_info_widget');
  
 
function wer_info_widget() {
    $logoPath = get_template_directory_uri() . '/resources/images/login/logo-wermedia.svg';

    $widgetData = "<div class='wer__widget'>";
    $widgetData .= "<div class='wer__widget'>";
    $widgetData .= "<div class='widget__logo' style='margin: 30px 0 20px 0;'> <img src='{$logoPath}' style='width: auto; height: 30px;' /> </div>";
    $widgetData .= "<strong style='font-size: 16px;'>Heb je vragen of zijn er problemen met je website?<strong>";
    $widgetData .= "<div style='margin-top: 20px; font-size: 18px; display: flex; flex-direction: column'>";
    $widgetData .= "<p style='margin: 0 0 5px; font-size: 14px;'>Bel ons op <a href='tel: +31591-208103'>0591 - 20 81 03</a></p>";
    $widgetData .= "<p style='margin: 0 0 5px; font-size: 14px;'>Stuur een e-mail naar <a href='mailto: info@wermedia.nl'>info@wermedia.nl</a></p>";
    $widgetData .= "</div>";
    $widgetData .= "</div>";

    echo $widgetData;
}
