<?php
/**
 * Template part for CTA Short / Короткая форма ОС
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$cta_short_title = get_field('cta_short_title');
?>

<section class="cta-short">
    <div class="container">
        <div class="cta-wrapper cta-short__wrapper white-agree">
            <h3 class="cta-short__title">
                <?php
                echo $cta_short_title ? $cta_short_title : 'Узнайте стоимость перевозки вашего груза в&nbsp;пару&nbsp;кликов';
                ?>
            </h3>

            <?php
            echo do_shortcode('[contact-form-7 id="3075a89" title="Основная контактная форма"]'); ?>
        </div>
    </div>
</section>