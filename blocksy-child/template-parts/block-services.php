<?php
/**
 * Template part for Block Services / блок Услуги и тарифы
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$fields_prefix = (is_archive() || is_singular('post')) ? 'options' : $page_id;
$post_type = get_post_type();
if ($post_type) {
    $post_type_data = get_post_type_object($post_type);
    $post_type_slug = $post_type_data->rewrite['slug'];
}
$top_block_title = is_singular('blog') ? get_field('services_title_' . $post_type_slug, 'options') : get_field('services_title', $fields_prefix);
$top_block_text = is_singular('blog') ? get_field('services_text_' . $post_type_slug, 'options') : get_field('services_text', $fields_prefix);

$arg_services = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 50,
    'post_type' => 'services',
    'post_status' => 'publish',
);

$query_services = new WP_Query($arg_services);

if ($query_services->have_posts()) {
    ?>

    <section class="services">
        <div class="container">
            <?php
            if ($top_block_title) {
                ?>
                <div
                    class="block-top <?php if ($top_block_text) { ?>d-grid align-items-start<?php } else { ?>d-block<?php } ?>">
                    <h2>
                        <?php echo $top_block_title; ?>
                    </h2>

                    <?php
                    if ($top_block_text) {
                        echo '<div class="block-top__text">' . $top_block_text . '</div>';
                    } ?>
                </div>
            <?php } ?>

            <ul class="services__list services-list d-grid grid-three">
                <?php
                if ($query_services->have_posts()) {
                    while ($query_services->have_posts()) {
                        $query_services->the_post();

                        get_template_part('template-parts/service', 'item');
                    }
                    ;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <a href="/tarrifes" class="button">Смотреть все тарифы</a>
        </div>
    </section>

<?php } ?>