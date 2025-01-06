<div class="card card--content">
    <?php if ( $title = get_sub_field('sectie_titel') ) : ?>
        <h3 class="card__title"><?= $title; ?></h3>
    <?php endif; ?>
    <?php if ( $content = get_sub_field('sectie_tekst') ) : ?>
        <div class="card__content">
            <?= $content; ?>
        </div>
    <?php endif; ?>
</div>