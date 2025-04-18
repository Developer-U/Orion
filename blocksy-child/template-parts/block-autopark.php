<?php
/**
 * Block Autopark / блок Автопарк
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$autopark_title = get_field('autopark_title', 'options');
$autopark_image = get_field('autopark_image', 'options');

if (have_rows('new_truck', 'options')) {
    if (!is_page('autopark')) { ?>
        <section id="autopark-<?php echo $page_id; ?>" class="autopark position-relative overlay"
            style="background-image: url(<?php echo $autopark_image['url']; ?>); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <h2 class="autopark__title big-title">
                    <?php if ($autopark_title) {
                        echo $autopark_title;
                    } else {
                        echo 'Наш автопарк';
                    } ?>
                </h2>
            <?php } else { ?>
                <section class="grey">
                    <div class="container">
                    <?php }

    ?>
                    <ul class="autopark__list autopark-list d-grid grid-four">
                        <?php if (have_rows('new_truck', 'options')) {
                            $t = 0; ?>
                            <?php while (have_rows('new_truck', 'options')) {
                                the_row();
                                $new_truck_title = get_sub_field('new_truck_title', 'options');
                                $new_truck_image = get_sub_field('new_truck_image', 'options');
                                $new_truck_description = get_sub_field('new_truck_description', 'options');
                                $indext = $t++;
                                ?>

                                <li class="autopark-list__item autopark-item position-relative <?php if ($indext > 3 && !is_page('autopark')) { ?>d-none<?php } ?>"
                                    data-aos="fade-up" data-aos-offset="200" data-aos-delay="<?php echo 100 * ($indext * 2); ?>"
                                    data-aos-duration="900" data-aos-easing="ease-in-out" data-aos-once="true"
                                    data-aos-anchor-placement="bottom" class="digits-list__item digit-item">

                                    <h3 class="autopark-item__title"><?php echo $new_truck_title; ?></h3>
                                    <span class="title-line"></span>

                                    <?php if ($new_truck_description) {
                                        echo '<span class="autopark-item__description">' . $new_truck_description . '</span>';
                                    } ?>

                                    <figure class="autopark-item__image">
                                        <img src="<?php echo $new_truck_image['url']; ?>"
                                            alt="<?php echo $new_truck_image['alt']; ?>">
                                    </figure>
                                </li>

                            <?php }
                        } ?>
                    </ul>

                    <?php if (!is_page('autopark')) {
                        echo '<a href="/autopark" class="reviews__link button">Весь автопарк</a>';
                    } ?>
                </div>
            </section>

        <?php }