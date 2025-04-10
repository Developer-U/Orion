<?php
/**
 * Block Tariffes / блок Тарифы
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$tariffes_first_title = get_field('tariffes_first_title', 'options');
$tariffes_second_title = get_field('tariffes_second_title', 'options');
?>

<section class="tariffes grey">
    <div class="container">
        <!-- Таблица 1 -->
        <div class="tariffes__item first">
            <div class="tariffes__top d-flex align-items-start justify-content-between gap-4">
                <?php if ($tariffes_first_title) { ?>
                    <h2 class="tariffes__title col">
                        <?php echo $tariffes_first_title; ?>
                    </h2>
                <?php } ?>

                <img class="col-auto d-xl-none mt-2 mt-md-3"
                    src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/table_arrows.svg"
                    alt="Листайте таблицу влево-вправо">
            </div>

            <div class="tariffes-wrap">
                <div class="tariffes-inner">
                    <table class="tariffes__table tarif-table first">
                        <thead>
                            <tr>
                                <th class="tarif-table thead">Наименование</th>
                                <th class="tarif-table thead">Длина, м</th>
                                <th class="tarif-table thead">Ширина, м</th>
                                <th class="tarif-table thead">Высота, м</th>
                                <th class="tarif-table thead">Объём</th>
                                <th class="tarif-table thead">Грузоподъёмность, т</th>
                                <th class="tarif-table thead">Цена, руб/км</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (have_rows('add_tariff_table_first_row', 'options')) { ?>
                                <?php while (have_rows('add_tariff_table_first_row', 'options')) {
                                    the_row();
                                    $first_table_row = get_sub_field('first_table_row', 'options');
                                    ?>
                                    <tr>
                                        <td class="tarif-table__cell"><?php echo $first_table_row['one']; ?></td>
                                        <td class="tarif-table__cell text-center"><?php echo $first_table_row['two']; ?></td>
                                        <td class="tarif-table__cell text-center"><?php echo $first_table_row['three']; ?></td>
                                        <td class="tarif-table__cell text-center"><?php echo $first_table_row['four']; ?></td>
                                        <td class="tarif-table__cell text-center"><?php echo $first_table_row['five']; ?></td>
                                        <td class="tarif-table__cell text-center"><?php echo $first_table_row['six']; ?></td>
                                        <td class="tarif-table__cell text-center"><?php echo $first_table_row['seven']; ?></td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Таблица 2 -->
        <div class="tariffes__item second">
            <?php if ($tariffes_second_title) { ?>
                <h2 class="tariffes__title">
                    <?php echo $tariffes_second_title; ?>
                </h2>
            <?php } ?>

            <table class="tariffes__table tarif-table second">
                <thead>
                    <tr>
                        <th class="tarif-table thead cell_1">Объём</th>
                        <th class="tarif-table thead cell_2">Цена, руб/км</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (have_rows('add_tariff_table_second_row', 'options')) { ?>
                        <?php while (have_rows('add_tariff_table_second_row', 'options')) {
                            the_row();
                            $second_table_row = get_sub_field('second_table_row', 'options');
                            ?>
                            <tr>
                                <td class="tarif-table__cell cell_1"><?php echo $second_table_row['one']; ?></td>
                                <td class="tarif-table__cell cell_2 text-center"><?php echo $second_table_row['two']; ?></td>
                            </tr>
                        <?php }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Таблица 3 -->
        <?php echo get_template_part('template-parts/block', 'tariffes-cities'); ?>
    </div>
</section>