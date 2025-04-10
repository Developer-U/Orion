<?php
/**
 * The template for displaying Single Cities
 *
 * Template Name: Страница города
 * Template Post Type: cities
 */

get_header();

if (have_posts()) {
    the_post();
}

if (
    function_exists('blc_get_content_block_that_matches')
    &&
    blc_get_content_block_that_matches([
        'template_type' => 'single',
        'template_subtype' => 'canvas'
    ])
) {
    echo blc_render_content_block(
        blc_get_content_block_that_matches([
            'template_type' => 'single',
            'template_subtype' => 'canvas'
        ])
    );
    have_posts();
    wp_reset_query();
    return;
}


have_posts();
wp_reset_query();

get_template_part('template-parts/hero', 'single');
?>

<section class="single grey post">
    <div class="container">
        <?php echo get_the_content(); ?>
    </div>
</section>

<section>
    <div class="container">
        <?php echo get_template_part('template-parts/block', 'tariffes-cities'); ?>
    </div>
</section>

<?php
get_template_part('template-parts/block', 'includes');

get_template_part('template-parts/block', 'advantages');

get_template_part('template-parts/block', 'autopark');

get_template_part('template-parts/cta');

get_footer();