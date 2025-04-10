<?php
/**
 * Template part for Block Tariffes Cities / блок Тарифы по городам
 */
$tariffes_third_title = get_field('tariffes_third_title', 'options');
?>

<div class="tariffes__item third">
    <div class="tariffes__top d-flex align-items-start justify-content-between gap-4">
        <?php if ($tariffes_third_title) { ?>
            <h2 class="tariffes__title">
                <?php echo $tariffes_third_title; ?>
            </h2>
        <?php } ?>

        <img class="col-auto d-xl-none mt-2 mt-md-3"
            src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/table_arrows.svg"
            alt="Листайте таблицу влево-вправо">
    </div>

    <div class="tarif-table__wrap">
        <table class="tariffes__table tarif-table third">
            <thead>
                <tr>
                    <th class="tarif-table thead">Направление</th>
                    <th class="tarif-table thead">Расстояние, км</th>
                    <th class="tarif-table thead">Цена, руб/км</th>
                    <th class="tarif-table thead">Цена перевозки, руб</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (have_rows('add_tariff_table_third_row', 'options')) { ?>
                    <?php while (have_rows('add_tariff_table_third_row', 'options')) {
                        the_row();
                        $third_table_row = get_sub_field('third_table_row', 'options');
                        ?>
                        <tr>
                            <td class="tarif-table__cell"><?php echo $third_table_row['one']; ?></td>
                            <td class="tarif-table__cell text-center"><?php echo $third_table_row['two']; ?></td>
                            <td class="tarif-table__cell text-center">
                                <?php echo 'от&nbsp;' . $third_table_row['three']; ?>
                            </td>
                            <td class="tarif-table__cell text-center">
                                <?php echo 'от&nbsp;' . number_format($third_table_row['two'] * $third_table_row['three'], 0, '', ' '); ?>&nbsp;₽
                            </td>
                        </tr>
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>