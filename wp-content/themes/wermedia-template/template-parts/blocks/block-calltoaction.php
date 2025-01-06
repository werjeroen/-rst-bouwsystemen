<?php    
    $show_background = get_sub_field('content_achtergrond');
    $content_background = $show_background ? 'content--background' : '';
?>

<section class="block block--cta <?= $content_background; ?>">
    <div class="wrapper--default">
        <div class="block__content">
            <?php if( $title = get_sub_field('blok_titel') ) : ?>
                <h2 class="color--white"><?= $title; ?></h2>
            <?php endif; ?>

            <?php if( $text = get_sub_field('blok_tekst') ) : ?>
                <?= $text; ?>
            <?php endif; ?>

            <?php get_template_part('template-parts/components/button'); ?>
        </div>
    </div> 

    <?php if ( $imageData = get_sub_field('blok_achtergrond') ) : ?>
        <div class="block__background">
            <?php echo wp_get_attachment_image( $imageData['id'], 'full', false, [ 'class' => 'image--cover' ] ); ?>
        </div>
    <?php endif; ?>
</section>