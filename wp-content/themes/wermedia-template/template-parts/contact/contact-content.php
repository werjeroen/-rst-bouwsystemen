<section class="section content--even content--contact">
    <div class="wrapper--default content--splitted content--gap">
        <div class="contact__details content--third">
            <div class="contact__information">
                <?php if ( $adres = get_field('adres', 'option') ) : ?>
                    <div class="information__item">
                        <div class="item__icon">
                            <?php convert_svg( get_template_directory_uri() . '/resources/images/svg/house.svg' ); ?>
                        </div>
                        <div class="item__tekst">
                            <strong>Adres</strong>
                            <?= $adres; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( $phone = get_field('telefoonnummer', 'option') ) : ?>
                    <div class="information__item">
                        <div class="item__icon">
                            <?php convert_svg( get_template_directory_uri() . '/resources/images/svg/phone.svg' ); ?>
                        </div>
                        <div class="item__tekst">
                             <strong>Telefoonnummer</strong>
                            <span><?= $phone; ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( $email = get_field('emailadres', 'option') ) : ?>
                    <div class="information__item">
                        <div class="item__icon">
                            <?php convert_svg( get_template_directory_uri() . '/resources/images/svg/email.svg' ); ?>
                        </div>
                        <div class="item__tekst">
                             <strong>E-mailadres</strong>
                            <span><?= $email; ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="contact__content content--full">
            <?php if( $title = get_the_title() ) : ?>
                <h3><?= $title; ?></h3>
            <?php endif; ?>
            <?php if( $text = get_the_content() ) : ?>
                <?= $text; ?>
            <?php endif; ?>

            <?php if( $shortcode = get_field('formulier_shortcode')) : ?>
                <div class="content__form">
                    <?= do_shortcode( $shortcode ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>