<?php
/**
 * Template part for displaying Hero for Hero single / Первый экран некоторых страниц (Конечная города и архивная пубикаций)
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$top_block_title = is_home() ? get_field('archive_blog_title', 'options') : get_the_title();

$post_type = get_post_type();
if ($post_type) {
    $post_type_data = get_post_type_object($post_type);
    $post_type_slug = $post_type_data->rewrite['slug'];
}

// Переопределяем картинку для страницы, если это архивная страница или конечная страница поста
if (is_single()) {
    $hero_single_image = wp_get_attachment_url(get_post_thumbnail_id()); // Если это страница или Single типа постов - берём миниатюру страницы / поста
} elseif (is_archive()) {
    $hero_single_image = get_field('archive_image_' . $post_type_slug, 'options'); // Архивная страница 
} elseif (is_home()) {
    $hero_single_image = get_field('archive_image_blog', 'options'); // Архивная страница блога
}
?>

<section class="hero-single position-relative overlay"
    style="background-image: url(<?php echo is_archive() || is_home() ? $hero_single_image['url'] : $hero_single_image; ?>); background-repeat: no-repeat; background-size: cover">
    <!-- Основной контент -->
    <div class="container-fluid hero-single__wrap d-flex flex-column justify-content-between">
        <div class="container col d-flex flex-column justify-content-between">
            <button class="button city-choose-btn d-flex d-md-none col-auto" data-popup-open="city-popup">
                <span>Выбрать город отправки</span>
            </button>

            <div class="hero-single__inner hero-pages-inner d-flex flex-column justify-content-center col">
                <h1 class="hero-single__title">
                    <?php
                    echo $top_block_title; ?>
                </h1>

                <!-- breadcrumbs -->
                <div class="breadcrumbs">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        (yoast_breadcrumb('<div class="breadcrumbs__list">', '</div>'));
                    }
                    ?>
                </div>
                <!-- breadcrumbs end -->
            </div>
        </div>

        <?php
        echo '<div class="hero-single__social col-auto">';
        get_template_part('template-parts/social');
        echo '</div>'; ?>
    </div>
</section>