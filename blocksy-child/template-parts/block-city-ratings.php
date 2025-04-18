<?php
/**
 * Template part for Block City-Hero-ratings / блок с кнопкой выбора города и карточками рейтинга
 */
// Rating_images
$rating_images = get_field('rating_images', 'options');
?>

<div class="hero-pages box d-flex mb-4 d-md-none align-items-start gap-2 justify-content-between">
    <?php if (is_front_page()) { ?>
        <div class="hero-pages__buttons">
            <button class="button city-choose-btn" data-popup-open="city-popup">
                <span>Выбрать город отправки</span>
            </button>

            <button class="button header__btn d-flex d-xl-none" data-popup-open="zakaz-popup">
                Заказать звонок
            </button>
        </div>

    <?php } else { ?>
        <button class="button city-choose-btn" data-popup-open="city-popup">
            <span>Выбрать город отправки</span>
        </button>
    <?php } ?>

    <?php
    if ($rating_images['one'] || $rating_images['two'] || $rating_images['three']) { ?>
        <ul class="d-flex flex-wrap justify-content-end gap-2">
            <?php if ($rating_images['one']) {
                if ($rating_images['one_link']) {
                    echo '<a class="rating-list__item" href=" ' . $rating_images['one_link'] . '">';
                    echo '<img src=" ' . $rating_images['one']['url'] . '" alt=" ' . $rating_images['one']['alt'] . ' ">';
                    echo '</a>';
                } else {
                    echo '<figure class="rating-list__item">';
                    echo '<img src=" ' . $rating_images['one']['url'] . '" alt=" ' . $rating_images['one']['alt'] . ' ">';
                    echo '</figure>';
                }
            }
            if ($rating_images['two']) {
                if ($rating_images['two_link']) {
                    echo '<a class="rating-list__item" href=" ' . $rating_images['two_link'] . '">';
                    echo '<img src=" ' . $rating_images['two']['url'] . '" alt=" ' . $rating_images['two']['alt'] . ' ">';
                    echo '</a>';
                } else {
                    echo '<figure class="rating-list__item">';
                    echo '<img src=" ' . $rating_images['two']['url'] . '" alt=" ' . $rating_images['two']['alt'] . ' ">';
                    echo '</figure>';
                }
            }
            if ($rating_images['three']) {
                if ($rating_images['three_link']) {
                    echo '<a class="rating-list__item" href=" ' . $rating_images['three_link'] . '">';
                    echo '<img src=" ' . $rating_images['three']['url'] . '" alt=" ' . $rating_images['three']['alt'] . ' ">';
                    echo '</a>';
                } else {
                    echo '<figure class="rating-list__item">';
                    echo '<img src=" ' . $rating_images['three']['url'] . '" alt=" ' . $rating_images['three']['alt'] . ' ">';
                    echo '</figure>';
                }
            }
            ?>
        </ul>
    <?php } ?>
</div>