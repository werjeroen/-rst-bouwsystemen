<?php 
    // Get menu locations
    $menu_locations = get_nav_menu_locations(); 
?>

<footer class="footer">
    <div class="footer__top">
        <div class="footer__wrapper">
            <div class="footer__row">
                <div class="footer__column column--big">
                    <span class="footer__title"><?= __('Contactgegevens', 'wermedia-template'); ?></span>
                    <?php if ( $adres = get_field('adres', 'option') ) : ?>
                        <div class="client__info">
                           <?= $adres; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (function_exists('wer_social_media')) : ?>
                        <div class="client__socials">
                            <?= wer_social_media(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <?php if (has_nav_menu('footer-menu-1')) : ?>
                    <div class="footer__column">
                        <?php if (isset($menu_locations['footer-menu-1'])) : ?>
                            <?php if ( $menu_1 = wp_get_nav_menu_object($menu_locations['footer-menu-1']) ) : ?>
                                <span class="footer__title"><?= esc_html($menu_1->name); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php 
                            wp_nav_menu([
                                'container' => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'footer-menu-1',
                                'sort_column' => 'menu_order',
                                'fallback_cb' => false,
                                'walker' => new Wer_Nav_Walker,
                            ]);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (has_nav_menu('footer-menu-2')) : ?>
                    <div class="footer__column">
                        <?php if (isset($menu_locations['footer-menu-2'])) : ?>
                            <?php if ($menu_2 = wp_get_nav_menu_object($menu_locations['footer-menu-2']) ) : ?>
                                <span class="footer__title"><?= esc_html($menu_2->name); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php 
                            wp_nav_menu([
                                'container' => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'footer-menu-2',
                                'sort_column' => 'menu_order',
                                'fallback_cb' => false,
                                'walker' => new Wer_Nav_Walker,
                            ]);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (has_nav_menu('footer-menu-3')) : ?>
                    <div class="footer__column">
                        <?php if (isset($menu_locations['footer-menu-3'])) : ?>
                            <?php if ( $menu_3 = wp_get_nav_menu_object($menu_locations['footer-menu-3']) ) : ?>
                                <span class="footer__title"><?= esc_html($menu_3->name); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php 
                            wp_nav_menu([
                                'container' => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'footer-menu-3',
                                'sort_column' => 'menu_order',
                                'fallback_cb' => false,
                                'walker' => new Wer_Nav_Walker,
                            ]);
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="footer__wrapper">
            <div class="footer__row--between">
                <div class="footer__navigation">
                    <nav class="navigation--row">
                        <?php
                            wp_nav_menu([
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'footer-menu-legal',
                                'sort_column' => 'menu_order',
                                'fallback_cb' => false,
                                'walker' => new Wer_Nav_Walker,
                            ]);
                        ?>
                    </nav>
                </div>

                <?= TemplateHelper::wer_build_author(); ?>
            </div>
        </div>
    </div>
</footer>