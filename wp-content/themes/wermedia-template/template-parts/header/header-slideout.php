<div class="header__slideout">
    <nav class="sidebar__menu">
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
</div>