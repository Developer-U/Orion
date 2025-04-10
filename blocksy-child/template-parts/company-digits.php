<?php
/**
 * Template part for Block Company Digits / блок Компания в цифрах
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$digits_title = get_field('digits_title', 'options');


if (have_rows('new_company_digit', 'options')) {
    ?>

    <section class="digit">
        <div class="container">
            <h2 class="digits__title">
                <?php if ($digits_title) {
                    echo $digits_title;
                } else {
                    echo 'Компания в цифрах';
                } ?>
            </h2>

            <ul class="digits__list digits-list d-grid grid-four">
                <?php if (have_rows('new_company_digit', 'options')) {
                    $i = 0; ?>
                    <?php while (have_rows('new_company_digit', 'options')) {
                        the_row();
                        $digit_title = get_sub_field('digit_title', 'options');
                        $digit_text = get_sub_field('digit_text', 'options');
                        $index = $i++;
                        ?>

                        <li data-aos="fade-right" data-aos-offset="200" data-aos-delay="<?php echo 100 * ($index * 2.8); ?>"
                            data-aos-duration="900" data-aos-easing="ease-in-out" data-aos-once="true"
                            data-aos-anchor-placement="top-left" class="digits-list__item digit-item">

                            <p class="digit-item__digit position-relative">
                                <?php echo $digit_title; ?>

                                <span class="digit-item__decor position-absolute"></span>
                            </p>

                            <?php
                            if ($digit_text) {
                                echo '<p class="digit-item__text">' . $digit_text . '</p>';
                            } ?>
                        </li>

                    <?php }
                } ?>
            </ul>
        </div>
    </section>

<?php }