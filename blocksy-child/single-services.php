<?php
/**
 * The template for displaying Single Services
 *
 * Template Name: Страница услуги
 * Template Post Type: services
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
$arg_services = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 50,
    'post_type' => 'services',
    'post_status' => 'publish',
    'post__not_in' => array($id), // Исключим текущий пост
);

$query_services = new WP_Query($arg_services);

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
                <div class="content-sidebar__form">
                    <h3 class="cta-short__title">Заказать услугу</h3>

                    <?php echo do_shortcode('[contact-form-7 id="1e8a464" title="Заказ услуги"]'); ?>
                </div>

                <h3 class="single-wrap__title">
                    Другие наши услуги
                </h3>

                <ul class="services__list">
                    <?php
                    if ($query_services->have_posts()) {
                        while ($query_services->have_posts()) {
                            $query_services->the_post();
                            $index_route = $x++;

                            get_template_part('template-parts/service', 'item');
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
get_template_part('template-parts/block', 'advantages');

get_template_part('template-parts/block', 'service-price');

get_template_part('template-parts/cta');

have_posts();
wp_reset_query();

get_footer();