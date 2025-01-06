<?php
    $hide_subpages = get_field('subpaginas_verbergen') ?? false;
    $args = [
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => get_the_ID(),
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => 2,
    ];
    
    $children = new WP_Query($args);
?>
<?php if ( !$hide_subpages && $children->have_posts()) : ?>
    <section class="content content--links">
        <div class="wrapper--default">
            <div class="grid--two">
                <?php while ($children->have_posts()) : $children->the_post(); ?>
                    <?php get_template_part('template-parts/cards/card', 'link'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>