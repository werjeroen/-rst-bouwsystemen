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
                <div class="footer__column">
                    <span class="footer__title"><?= __('Footer 1', 'wermedia-template'); ?></span>
                    <nav class="navigation--column">
                        <?php
                            wp_nav_menu([
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'footer-menu-1',
                                'sort_column' => 'menu_order',
                                'fallback_cb' => false,
                                'walker' => new Wer_Nav_Walker,
                            ]);
                        ?>
                    </nav>
                </div>
                <div class="footer__column">
                    <span class="footer__title"><?= __('Footer 2', 'wermedia-template'); ?></span>
                    <nav class="navigation--column">
                        <?php
                            wp_nav_menu([
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'footer-menu-2',
                                'sort_column' => 'menu_order',
                                'fallback_cb' => false,
                                'walker' => new Wer_Nav_Walker,
                            ]);
                        ?>
                    </nav>
                </div>
                <div class="footer__column">
                    <span class="footer__title"><?= __('Footer 3', 'wermedia-template'); ?></span>
                    <nav class="navigation--column">
                        <?php
                            wp_nav_menu([
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'footer-menu-3',
                                'sort_column' => 'menu_order',
                                'fallback_cb' => false,
                                'walker' => new Wer_Nav_Walker,
                            ]);
                        ?>
                    </nav>
                </div>
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