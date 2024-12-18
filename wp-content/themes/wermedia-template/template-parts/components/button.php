<?php 
    $button_link = get_sub_field('button_link'); 
    $button_kleur = get_sub_field('button_kleur');

    $args = wp_parse_args($args, [
        'center' => false,
        'show_box' => true,
        'show_box_spacer' => true
    ]);
    extract($args);
    
    $center_class = $center ? 'button__box--center' : '';
    $spacer_class = $show_box_spacer ? 'button__box--spacer' : '';
?>

<?php if ($button_link && $button_kleur) : ?>
    <?php if ($show_box) : ?>
        <div class="button__box <?= $center_class; ?> <?= $spacer_class; ?>">
    <?php endif; ?>
    <?php
        $url = $button_link['url'] ?? '#'; 
        $title = $button_link['title'];
        $target = $button_link['target'] ?? '_self'; 
    ?>
    <a href="<?= esc_url($url); ?>" 
        class="button <?= esc_attr($button_kleur); ?>" 
        target="<?= esc_attr($target); ?>"
        data-hover
    >
        <p class="button__text"><?= esc_html($title); ?></p>
    </a>
    <?php if ($show_box) : ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
