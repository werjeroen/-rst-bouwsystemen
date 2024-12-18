<?php if( $content = get_the_content() ) : ?>
    <div class="content content--even">
        <div class="wrapper--small">
            <?= $content; ?>
        </div>
    </div>
<?php endif; ?>
 
<?php if ( have_rows( 'blokken' ) ) : ?>
    <div class="blocks">
        <?php while ( have_rows( 'blokken' ) ) : the_row(); ?>
            <?php get_template_part('template-parts/blocks/block', get_row_layout()); ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php endif; ?>