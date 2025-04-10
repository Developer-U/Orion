<?php
/**
 * Template part for Block Leveks / блок Этапы работы
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$levels_title = get_field('levels_title', 'options');
$levels_image = get_field('levels_image', 'options');


if (have_rows('new_work_level', 'options')) {
    ?>

    <section class="levels position-relative overlay"
        style="background-image: url(<?php echo $levels_image['url']; ?>); background-repeat: no-repeat; background-size: cover">
        <div class="container">
            <h2 class="levels__title">
                <?php if ($levels_title) {
                    echo $levels_title;
                } else {
                    echo 'Как мы оформляем заказ';
                } ?>
            </h2>

            <ul class="levels__list levels-list d-grid">
                <?php if (have_rows('new_work_level', 'options')) {
                    $i = 1; ?>
                    <?php while (have_rows('new_work_level', 'options')) {
                        the_row();
                        $work_level_text = get_sub_field('work_level_text', 'options');
                        $index = $i++;
                        ?>

                        <li class="levels-list__item level-item item-<?php echo $index; ?> position-relative">
                            <span class="level-item__num position-absolute"><?php echo '0' . $index; ?></span>

                            <p class="level-item__text">
                                <?php echo $work_level_text; ?>
                            </p>
                        </li>

                    <?php }
                } ?>
            </ul>
        </div>
    </section>

<?php }