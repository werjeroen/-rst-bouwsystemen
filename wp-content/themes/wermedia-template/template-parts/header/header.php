<?php 
    $headerClass = ( is_front_page() ) ? 'header--home' :'header--default'; 
?>
<header class="header <?= $headerClass; ?>">
    <div class="header__wrapper">
        <div class="header__main">
            <div class="header__brand">
                <a class="brand__link" href="<?= site_url(); ?>">
                    <?= wer_custom_logo(); ?>
                </a>
            </div>
        </div>
        <div class="header__actions">
            <nav class="header__navigation navigation--row">
                <?php 
                    wp_nav_menu([
                        'container'  => '',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'primary-menu',
                        'sort_column' => 'menu_order',
                        'fallback_cb' => false,
                        'walker' => new Wer_Nav_Walker,
                    ]);
                ?>
            </nav>

            <span class="header__toggle">
                <div class="navigation__toggle">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </span>
        </div>
    </div>

    <?php 
        TemplateHelper::get_templates([
            'template-parts/header/header-slideout'
        ]); 
    ?>
    
</header>