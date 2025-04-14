<?php
/**
 * Template part for displaying Hero for other pages / Первый экран страниц, кроме главной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$page_id = get_the_ID();
$hero_pages_image = get_field('hero_pages_image', $page_id); // Изначально картинка - это поле для страниц
$top_block_title = is_archive() ? get_the_archive_title('') : get_the_title();
$post_type = get_post_type();
if ($post_type) {
    $post_type_data = get_post_type_object($post_type);
    $post_type_slug = $post_type_data->rewrite['slug'];
}

// Переопределяем картинку для страницы, если это архивная страница или конечная страница поста
if (is_single()) {
    $hero_pages_image = wp_get_attachment_url(get_post_thumbnail_id()); // Если это страница или Single типа постов - берём миниатюру страницы / поста
} elseif (is_archive()) {
    $hero_pages_image = get_field('archive_image_' . $post_type_slug, 'options'); // Архивная страница 
}
?>

<section class="hero-pages <?php if (is_page('contacts')) { ?>contacts<?php } ?>">
    <!-- Основной контент -->
    <div class="container">
        <div
            class="hero-pages__wrap hero-pages-wrap <?php if ($hero_pages_image) { ?>d-grid flex-column flex-lg-row justify-content-between<?php } ?>">
            <button class="button city-choose-btn d-flex d-md-none" data-popup-open="city-popup">
                <span>Выбрать город отправки</span>
            </button>

            <div class="hero-pages-wrap__left">
                <h1 class="hero-pages__title">
                    <?php echo $top_block_title; ?>
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

                <?php if (get_the_excerpt() && !is_archive()) {
                    echo '<p class="hero-pages-wrap__text">' . get_the_excerpt() . '</p>';
                } ?>
            </div>

            <?php
            if ($hero_pages_image) {
                // Записываем в переменную изображение, так как в страницах оно отображается с [...], а в архивах или single - без скобок
                $image_url = (is_single()) ? $hero_pages_image : $hero_pages_image['url'];
                ?>
                <div
                    class="hero-pages__image position-relative <?php if (is_page('tariffes') || is_archive() || is_page('contacts')) { ?>d-none d-lg-block<?php } ?>">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_url; ?>">
                </div>
            <?php } ?>
        </div>

        <?php
        if (!is_page('contacts')) {
            echo '<div class="hero-pages__social">';
            get_template_part('template-parts/social');
            echo '</div>';
        } ?>
    </div>
</section>