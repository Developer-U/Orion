<?php
/**
 * Template part for Block Service Price / блок Стоимость услуги
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$top_block_text = get_field('service_price_text', $page_id);
$service_price_image = get_field('levels_image', 'options');
$services_price = get_field('services_price');
?>

<section class="service-price position-relative overlay dark"
    style="background-image: url(<?php echo $service_price_image['url']; ?>); background-repeat: no-repeat; background-size: cover">
    <div class="container">
        <div
            class="block-top <?php if ($top_block_text) { ?>d-grid align-items-start<?php } else { ?>d-block<?php } ?>">
            <h2>
                Стоимость услуги
            </h2>

            <?php
            if ($top_block_text) {
                echo '<div class="block-top__text">' . $top_block_text . '</div>';
            } ?>
        </div>

        <div class="block-top service-price__bottom price-wrap d-grid">
            <h2>Стоимость услуги: <?php echo get_the_title(); ?></h2>

            <h3 class="price-wrap__price"><?php echo $services_price; ?>&nbsp;₽</h3>
        </div>
    </div>
</section>