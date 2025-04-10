<?php
/**
 * Displaying Block FAQ
 * Блок Вопрос-ответ
 * Сквозной по сайту. Заполнять в "Иднетичные блоки"
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*ACF fields*/
$faq_title = get_field('faq_title', 'options');
$faq_sidebar_title = get_field('faq_sidebar_title', 'options');
?>

<section class="faq section-content-sidebar">
    <div class="container">
        <div class="faq__wrap faq-wrap content-sidebar d-grid">
            <div class="content-sidebar__left faq-wrap__left">
                <?php
                if ($faq_title) { ?>
                    <h2 data-aos="fade-right" data-aos-offset="200" data-aos-delay="0" data-aos-duration="900"
                        data-aos-easing="linear" data-aos-once="true" data-aos-anchor-placement="top-left"
                        class="faq__title">
                        <?php echo $faq_title; ?>
                    </h2>

                    <ul class="block-accordion__list block-accord-list my-accordion accordionjs d-grid">
                        <?php
                        if (have_rows('new_accordion_item', 'options')) { ?>
                            <?php while (have_rows('new_accordion_item', 'options')) {
                                the_row();
                                $new_accordion__item_title = get_sub_field('new_accordion_item_title', 'options');
                                $new_accordion__item_text = get_sub_field('new_accordion_item_text', 'options');
                                ?>

                                <li class="block-accord-list__item accord-list-item post">
                                    <div>
                                        <?php echo $new_accordion__item_title; ?>
                                        <span></span>
                                    </div>

                                    <div>
                                        <?php echo $new_accordion__item_text; ?>
                                    </div>
                                </li>
                            <?php }
                            ;
                        } ?>
                    </ul>
                <?php }
                ?>
            </div>

            <div class="faq__sidebar content-sidebar__sidebar faq-sidebar">
                <h3 class="faq-sidebar__title">
                    <?php if ($faq_sidebar_title) {
                        echo $faq_sidebar_title;
                    } else {
                        echo 'Узнайте стоимость перевозки вашего груза в&nbsp;пару&nbsp;кликов';
                    } ?>
                </h3>
                <?php
                echo do_shortcode('[contact-form-7 id="3075a89" title="Основная контактная форма"]'); ?>
            </div>
        </div>
    </div>
</section>