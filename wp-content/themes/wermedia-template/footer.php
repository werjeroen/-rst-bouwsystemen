        <?php if( !get_field('footer_cta_verbergen') ) : ?>
            <?php get_template_part('template-parts/footer/footer', 'cta'); ?>
        <?php endif; ?>
    </main>

    <?php if ( !is_authentication_page() ) : ?>
        <?php get_template_part('template-parts/footer/footer'); ?>
    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>