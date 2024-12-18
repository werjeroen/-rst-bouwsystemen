<?php
    /*
    *   The header
    *   This is the template that displays all of the <head> section and everything up until main.
    */

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php wp_head(); ?>
</head>
<body <?php body_class('preload'); ?> >
    <?php if ( !is_authentication_page() ) : ?>
        <?php
            TemplateHelper::get_templates([
                'template-parts/header/header', 
                'template-parts/banner/banner', 
            ]); 
        ?>
    <?php endif; ?>
        
    <main class="main">