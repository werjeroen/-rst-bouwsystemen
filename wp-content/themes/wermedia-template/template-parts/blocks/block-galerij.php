<?php 
    $title = get_sub_field('blok_titel');
    $content = get_sub_field( 'blok_tekst');

    $columns = get_sub_field('blok_sectie_kolommen');
    $grid_columns = 'grid--' . min(max(1, intval($columns)), 4);
?>
<section class="block block--gallery block--spacer">
    <div class="wrapper--default">
        <?php if ( $title && $content ) : ?>
            <div class="block__intro">
                <div class="block__content">
                    <h2><?= $title; ?></h2>

                    <?= $content; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( $images = get_sub_field( 'blok_galerij' ) ) : ?>
            <div class="<?= esc_attr($grid_columns); ?>">
                <?php foreach( $images as $image ): ?>
                    <div class="gallery__image">
                        <div class="image--fancybox" href="<?= wp_get_attachment_image_url( $image['id'], 'full' ); ?>" data-fancybox="gallery">
                            <?= wp_get_attachment_image( $image['id'], 'full', false, [ 'class' => 'image--cover image--transform' ] ); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>