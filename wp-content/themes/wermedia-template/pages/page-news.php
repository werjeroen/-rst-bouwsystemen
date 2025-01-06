<?php

/**
 *  Template Name: Nieuws overzicht
 */

get_header();

TemplateHelper::get_templates([
    'template-parts/content/content-blocks'
]);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_status' => 'publish',
    'post_type' => 'post',
    'posts_per_page' => 9,
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'paged' => $paged
);
$result = new WP_Query($args);
?>
<div class="content content--links">
    <div class="wrapper--default">
        <?php if ($result->have_posts()) : ?>
            <div class="grid grid--two">
                <?php while ($result->have_posts()) : $result->the_post(); ?>
                    <?php get_template_part('template-parts/cards/card', 'news'); ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
            <?php TemplateHelper::wer_pagination($result->max_num_pages); ?>
        <?php else : ?>
            <p><?= __('Er zijn geen berichten toegevoegd.', ''); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
