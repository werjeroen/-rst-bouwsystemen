<?php 
    $banner_type =  ( is_front_page() ) ? 'banner--home' : 'banner--default';
?>
<section class="banner <?= $banner_type; ?>">
    <div class="banner__image banner--clipped"> 
        <?= wer_custom_image(); ?>
    </div>

    <div class="banner__wrapper">
        <div class="banner__content">
            <?php if ( $banner_titel = get_field( 'banner_titel') ) : ?>
                <h1 class="color--white margin--none text--shadow"><?= $banner_titel; ?></h1>
            <?php elseif ( is_404() ) : ?>
                <h1 class="color--white margin--none text--shadow"><?= __( 'Pagina niet gevonden', 'wermedia-template' ); ?></h1>
            <?php else : ?>
                <h1 class="color--white margin--none text--shadow"><?php the_title(); ?></h1>
            <?php endif; ?>
        </div>
    </div>
</section>
