<?php
/**
 * The template for displaying Single
 *
 * Template Name: Страница публикации
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
$arg_posts = array(
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 6,
    'post_type' => 'post',
    'post_status' => 'publish',
    'post__not_in' => array($id), // Исключим текущий пост
);

$query_posts = new WP_Query($arg_posts);

// Block Top
get_template_part('template-parts/hero', 'pages');
?>

<section class="single section-content-sidebar grey">
    <div class="container">
        <div class="single__wrap single-wrap content-sidebar d-grid">
            <div class="content-sidebar__left single-wrap__left post">
                <?php
                the_content();
                ?>
            </div>

            <div class="single-wrap__sidebar content-sidebar__sidebar">
                <h3 class="single-wrap__title">
                    Другие статьи
                </h3>

                <ul class="services__list blog-sidebar-list">
                    <?php
                    if ($query_posts->have_posts()) {
                        while ($query_posts->have_posts()) {
                            $query_posts->the_post();

                            get_template_part('template-parts/single', 'sidebar');
                        }
                        ;
                        wp_reset_postdata() ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_template_part('template-parts/block', 'services');

get_template_part('template-parts/cta');

have_posts();
wp_reset_query();

get_footer();