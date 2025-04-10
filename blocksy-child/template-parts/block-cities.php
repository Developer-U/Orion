<?php
/**
 * Template part for Block Cities / блок Города отправки
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$cities_title = get_field('cities_title', 'options');
$cities_image = get_field('cities_image', 'options');
$arg_cities_block = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 999,
    'post_type' => 'cities',
    'post_status' => 'publish',
);

$query_cities_block = new WP_Query($arg_cities_block);
?>

<section class="cities position-relative overlay"
    style="background-image: url(<?php echo $cities_image['url']; ?>); background-repeat: no-repeat">
    <div class="container">
        <h2>
            <?php if ($cities_title) {
                echo $cities_title;
            } else {
                echo 'Города отправки груза ТК «Орион»';
            } ?>
        </h2>

        <ul class="cities__cont d-grid align-items-start gap-2 gap-md-3 gap-xl-4">
            <?php
            if ($query_cities_block->have_posts()) {
                while ($query_cities_block->have_posts()) {
                    $query_cities_block->the_post();
                    ?>

                    <li class="cities-list__item city-item col-auto">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php }
                ;
                wp_reset_postdata() ?>
            <?php } ?>
        </ul>
    </div>
</section>