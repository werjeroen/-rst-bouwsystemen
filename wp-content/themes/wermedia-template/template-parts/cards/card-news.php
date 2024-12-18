<div class="card card--news">
    <a class="card__link" href="<?= get_permalink(); ?>">
        <div class="card__image">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail($post->ID, [ 'class' => 'image--cover image--transform' ]); ?>
            <?php else : ?>
                <img class='image--cover image--transform' src='<?php bloginfo('template_directory'); ?>/images/fallback/fallback.png' alt='<?php the_title(); ?>' />
            <?php endif; ?>
        </div>
        <div class="card__content">
            <h4><?php the_title(); ?></h4>

            <?php if ( $excerpt = get_the_excerpt() ) : ?>
                <?= $excerpt; ?>
            <?php endif; ?>

            <div class="button__box button__box--spacer">
                <span class="button__textual">Lees meer</span>
            </div>
        </div>
    </a>
</div>