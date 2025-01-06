<?php 
    $remove_section = !get_field('footer_cta_verbergen');
?>
<?php if( $remove_section ): ?>
    <div class="footer__cta">
        <div class="wrapper--default">
            <div class="cta__tekst">
                <?php if ($cta_titel = get_field('footer_cta_titel') ?: get_field('footer_cta_titel', 'option')) : ?>
                    <h3><?= esc_html($cta_titel); ?></h3>
                <?php endif; ?>
                <?php if ($cta_tekst = get_field('footer_cta_tekst') ?: get_field('footer_cta_tekst', 'option')) : ?>
                    <?= wp_kses_post($cta_tekst); ?>
                <?php endif; ?>
                
                <?php if ($cta_link = get_field('footer_cta_button') ?: get_field('footer_cta_button', 'option')): ?>
                  <?php $link_url = $cta_link['url']; ?>
                  <?php $link_title = $cta_link['title']; ?>
                  <?php $link_target = $cta_link['target'] ? $cta_link['target'] : '_self'; ?>
                  <div class="button__box button__box--spacer">
                    <a class="button button__open--black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
