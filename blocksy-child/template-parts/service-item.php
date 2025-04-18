<?php
/**
 * Displaying Service block item
 * Отображает карточку услуги в листинге
 */
$services_price = get_field('services_price');
?>

<li class="services-list__item service-item d-flex flex-column gap-3 justify-content-between position-relative js-item overlay"
    style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>'); background-size: cover; background-repeat: no-repeat">

    <a class="col-auto" href="<?php the_permalink(); ?>">
        <h3 class="service-item__title">
            <?php the_title(); ?>
        </h3>

        <span class="service-item__arrow"></span>
    </a>

    <div class="service-item__wrap white-agree col-auto">
        <?php
        if ($services_price) { ?>
            <p class="service-item__price">
                <?php echo $services_price; ?>&nbsp;₽
            </p>
        <?php }
        if (!is_singular('services')) {
            ?>
            <div class="service-item__buttons service-btns d-flex gap-2">
                <div class="service-btns__wrap">
                    <button type="button" class="button transparent js-item-open"
                        data-name-route="<?php the_title(); ?>">Заказать</button>

                    <div class="service-item__form mt-2 js-item-content">
                        <?php echo do_shortcode('[contact-form-7 id="b670957" title="Быстрый заказ услуги"]'); ?>
                    </div>
                </div>

                <a href="<?php the_permalink(); ?>" class="button action-more">Узнать больше</a>
            </div>
        <?php } ?>
    </div>
</li>

<script>
    jQuery(document).ready(function ($) {
        let sections = $('.service-item'); // Все секции услуг
        sections.each(function () { // Итерируем и далее код в цикле            
            let button = $(this).find('.js-item-open'); // добираемся до кнопки   
            let route_title = button.attr('data-name-route'); // Вычисляем название поста из дата-атрибута 
            $(this).find('.hide-title').val(route_title); // Вкладываем название в скрытое поле CF7
            // console.log(route_title);
        });

    });
</script>