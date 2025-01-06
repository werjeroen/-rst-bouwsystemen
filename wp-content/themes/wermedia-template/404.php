<?php get_header(); ?>

<section class="content content--text">
    <div class="wrapper--small">
        <p><?= __('Sorry, the page you were looking for does not exist. It may have been moved or deleted.', 'wermedia-template'); ?></p>

        <div class="button__box button__box--spacer">
            <a class="button button__solid--primary" href="<?php site_url(); ?>">
                <?= __('Terug naar home'); ?>
            </a>
            <a class="button button__open--black" href="<?php echo get_page_link( get_page_by_path( 'contact' ) ); ?>">        
                <?= __('Contact opnemen'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>