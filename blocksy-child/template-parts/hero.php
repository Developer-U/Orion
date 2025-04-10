<?php
/**
 * Template part for displaying Hero block / Первый экран 
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$hero_title = get_field('hero_title');
$hero_image = get_field('hero_image');
$hero_top_layer_image = get_field('hero_top_layer_image');
?>

<section class="hero position-relative"
    style="background-image: url(<?php echo $hero_image['url']; ?>); background-repeat: no-repeat; background-size: cover">
    <?php
    if ($hero_top_layer_image) {
        echo '<div class="hero__toplayer position-absolute" style="background-image: url(' . $hero_top_layer_image['url'] . ')"></div>';
    }
    ?>

    <!-- Основной контент -->
    <div
        class="container-fluid hero__wrapper position-relative position-relative d-flex flex-column justify-content-between">
        <div class="container">
            <button class="button city-choose-btn d-flex d-md-none" data-popup-open="city-popup">
                <span>Выбрать город отправки</span>
            </button>

            <button class="button header__btn d-flex d-xl-none" data-popup-open="zakaz-popup">
                Заказать звонок
            </button>

            <h1 class="hero__title">
                <?php echo $hero_title ? $hero_title : 'Грузоперевозки по России'; ?>
            </h1>
        </div>

        <?php
        echo '<div class="hero__social">';
        get_template_part('template-parts/social');
        echo '</div>'; ?>
    </div>
</section>