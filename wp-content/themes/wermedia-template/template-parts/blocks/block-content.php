<?php
    $background_status = get_sub_field('blok_achtergrond_toevoegen') ? 'block--background' : '';
    
    $content_width = get_sub_field('content_breedte') ?? 'wrapper--default';

    $columns = get_sub_field('blok_sectie_kolommen');
    $grid_columns = 'grid--' . min(max(1, intval($columns)), 4);
?>
<section class="block block--content block--spacer <?= $background_status; ?>">
    <div class="<?= $content_width; ?>">
        <?php if ($title = get_sub_field('blok_titel')) : ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <?php if (have_rows('blok_sectie')) : ?>
            <div class="<?= esc_attr($grid_columns); ?>">
                <?php while (have_rows('blok_sectie')) : the_row(); ?>
                    <?php get_template_part('template-parts/cards/card', 'content'); ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php
            get_template_part('template-parts/components/button', [
                'center' => true
            ]);
        ?>
    </div>
</section>