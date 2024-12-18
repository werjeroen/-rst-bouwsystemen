<?php
    $content_remove_spacing = get_sub_field('blok_ruimte_verwijderen') ? 'spacing--none' : '';
    $content_background = get_sub_field('blok_omdraaien') ? 'block--background' : ''; 
    $content_style = get_sub_field('blok_omdraaien') ? 'block--flipped' : ''; 
    $content_width = get_sub_field('content_breedte');
?>

<section class="block block--content-image block--spacer <?= $content_background; ?> <?= $content_style; ?> <?=  $content_remove_spacing; ?>">
    <div class="<?= $content_width; ?>">
        <div class="content--splitted">
            <div class="content__image" data-aos="slide-right">
                <?php if ($image = get_sub_field('blok_foto')) : ?>
                    <?= wp_get_attachment_image($image['id'], 'full', false, ['class' => 'image--cover']); ?>
                <?php else : ?>
                    <img class='image--cover' src='<?php bloginfo('template_directory'); ?>/images/fallback/fallback.png' alt='<?php the_title(); ?>' />
                <?php endif; ?>
            </div>
            <div class="content__text">
                <?php if ($title = get_sub_field('blok_titel')) : ?>
                    <h2 class="title--offset"><?= $title; ?></h2>
                <?php endif; ?>

                <?php if ($content = get_sub_field('blok_tekst')) : ?>
                    <?= $content; ?>
                <?php endif; ?>

                <?php get_template_part('template-parts/components/button'); ?>
            </div>
        </div>
    </div>
</section>