<?php
/**
 * Template part for displaying Block includes / Блок "В стоимость включено"
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$includes_image = get_field('includes_image', 'options');
?>

<section class="includes position-relative overlay"
    style="background-image: url(<?php echo $includes_image['url']; ?>); background-repeat: no-repeat; background-size: cover">
    <div class="container">
        <ul class="includes__wrap includes-wrap d-grid align-items-start">
            <?php if (have_rows('includes_item', 'options')) { ?>
                <li class="includes-wrap__item includes-item">
                    <h2 class="includes-item__title">В стоимость включено:</h2>

                    <ul class="includes-item__list includes-list">
                        <?php if (have_rows('includes_item', 'options')) { ?>
                            <?php while (have_rows('includes_item', 'options')) {
                                the_row();
                                $includes_item_title = get_sub_field('includes_item_title', 'options');
                                ?>
                                <li class="includes-list__item includes">
                                    <?php echo $includes_item_title; ?>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </li>
            <?php }
            if (have_rows('excludes_item', 'options')) { ?>
                <li class="includes-wrap__item includes-item">
                    <h2 class="includes-item__title">В стоимость не включено:</h2>

                    <ul class="includes-item__list includes-list">
                        <?php if (have_rows('excludes_item', 'options')) { ?>
                            <?php while (have_rows('excludes_item', 'options')) {
                                the_row();
                                $excludes_item_title = get_sub_field('excludes_item_title', 'options');
                                ?>
                                <li class="includes-list__item excludes">
                                    <?php echo $excludes_item_title; ?>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>