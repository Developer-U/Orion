<?php
/**
 * Template part for CTA  / Основная форма ОС
 * Сквозной, но заголовок кастомный по страницам
 */
$page_id = get_the_ID();

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$cta_title = get_field('cta_title', $page_id);
$cta_image = get_field('cta_image', 'options');
?>

<section id="cta_<?php echo $page_id; ?>" class="cta cta-wrapper">
    <div class="container position-relative">
        <div class="cta__form white-agree">
            <h3 class="cta-short__title">
                <?php
                echo $cta_title ? $cta_title : 'Узнайте стоимость перевозки вашего груза в&nbsp;пару&nbsp;кликов';
                ?>
            </h3>

            <?php
            echo do_shortcode('[contact-form-7 id="3075a89" title="Основная контактная форма"]'); ?>
        </div>

        <?php
        if ($cta_image) {
            echo '<div class="cta__toplayer position-absolute d-none d-lg-block" style="background-image: url(' . $cta_image['url'] . ')"></div>';
        }
        ?>
    </div>
</section>