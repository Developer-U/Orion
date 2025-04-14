<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Page Tariffes
 */

$phone_num = get_field('tel', 'options');
$email = get_field('email', 'options');

get_header();

get_template_part('template-parts/hero', 'pages');
?>

<script src="https://api-maps.yandex.ru/2.1/?apikey=68f9a0ea-6fba-4a6e-9f0a-5a716b0b30d5&lang=ru_RU"
    type="text/javascript">
    </script>

<section class="contacts grey">
    <div class="container">
        <div class="contacts__wrap contacts-wrap d-flex align-items-start justify-content-lg-between">
            <ul class="contacts-wrap__block left col-auto">
                <?php
                if ($phone_num) { ?>
                    <li>
                        <a class="contacts__item tel" href="tel:+7<?php echo $phone_num; ?>">
                            <?php echo $phone_num; ?>
                        </a>
                    </li>
                <?php }

                if (have_rows('footer_phones', 'options')) { ?>
                    <ul class="footer-links__tel footer-links-tel">
                        <?php if (have_rows('footer_phones', 'options')) { ?>
                            <?php while (have_rows('footer_phones', 'options')) {
                                the_row();
                                $footer_phone_num = get_sub_field('footer_phone_num', 'options');
                                ?>
                                <li>
                                    <a class="contacts__item tel"
                                        href="tel:<?php echo $footer_phone_num; ?>"><?php echo $footer_phone_num; ?></a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                <?php } ?>
            </ul>

            <div class="div contacts-wrap__block center">
                <?php
                if ($email) { ?>
                    <li>
                        <a class="contacts__item email" href="mailto:<?php echo $email; ?>">
                            <?php echo $email; ?>
                        </a>
                    </li>
                <?php } ?>
            </div>

            <?php
            echo '<div class="hero-pages__social">';
            get_template_part('template-parts/social');
            echo '</div>'; ?>
        </div>
    </div>
</section>

<main class="departments">
    <?php if (have_rows('new_department', 'options')) {
        $i = 0; ?>
        <?php while (have_rows('new_department', 'options')) {
            the_row();
            $department_title = get_sub_field('department_title', 'options');
            $department_address = get_sub_field('department_address', 'options');
            $department_mail = get_sub_field('department_mail', 'options');
            $department_phones = get_sub_field('department_phones', 'options');
            /*Map*/
            $markImg = get_sub_field('mark_img', 'options');
            $markCoords = get_sub_field('mark_coords', 'options');
            $department_work_time = get_sub_field('department_work_time', 'options');
            $department_mark_zoom = get_sub_field('department_mark_zoom', 'options') ? get_sub_field('department_mark_zoom', 'options') : 14;
            $index = $i++;
            ?>

            <section
                class="departments__item department <?php if ($index == 0 || ($index % 2) == 0) { ?>''<?php } else { ?>grey<?php } ?>">
                <div class="container">
                    <div class="department__wrap dep-wrap d-grid">
                        <div class="dep-wrap__left">
                            <h2 class="dep-wrap__title">
                                <?php echo $department_title; ?>
                            </h2>
                            <span class="red-line"></span>

                            <ul class="dep-wrap__contacts department-contacts">
                                <?php
                                if ($department_address) { ?>
                                    <li>
                                        <p class="department-contacts__item address">
                                            <?php echo $department_address; ?>
                                        </p>
                                    </li>
                                <?php }
                                if ($department_phones['one']) { ?>
                                    <li class="d-flex gap-3 gap-md-4 align-items-center">
                                        <a class="department-contacts__item tel col-auto"
                                            href="tel:<?php echo $department_phones['one']; ?>">
                                            <?php echo $department_phones['one']; ?>
                                        </a>

                                        <span><?php echo $department_phones['one-descr']; ?></span>
                                    </li>
                                <?php }
                                if ($department_phones['two']) { ?>
                                    <li class="d-flex gap-3 gap-md-4 align-items-center">
                                        <a class="department-contacts__item tel col-auto"
                                            href="tel:<?php echo $department_phones['two']; ?>">
                                            <?php echo $department_phones['two']; ?>
                                        </a>

                                        <span><?php echo $department_phones['two-descr']; ?></span>
                                    </li>
                                <?php }
                                if ($department_phones['three']) { ?>
                                    <li class="d-flex gap-3 gap-md-4 align-items-center">
                                        <a class="department-contacts__item tel col-auto"
                                            href="tel:<?php echo $department_phones['three']; ?>">
                                            <?php echo $department_phones['three']; ?>
                                        </a>

                                        <span><?php echo $department_phones['three-descr']; ?></span>
                                    </li>
                                <?php }
                                if ($department_mail) { ?>
                                    <li>
                                        <a class="department-contacts__item email" href="mailto:<?php echo $department_mail; ?>">
                                            <?php echo $department_mail; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <span class="image-border dep-wrap-border position-relative">
                            <div id="map_<?php echo $index; ?>" class="text-image__image map position-absolute"
                                style="background-color: grey">
                            </div>
                        </span>

                        <script type="text/javascript">
                            ymaps.ready(init);

                            function init() {
                                var myMap = new ymaps.Map('map_<?php echo $index; ?>', {
                                    center: [<?php echo $markCoords; ?>],
                                    zoom: <?php echo $department_mark_zoom; ?>,
                                    controls: ['zoomControl']
                                }, {
                                    searchControlProvider: 'yandex#search'
                                });

                                // Создаем геообъект с типом геометрии "Точка".
                                myGeoObject = new ymaps.GeoObject({
                                    // Описание геометрии.
                                    geometry: {
                                        type: "Point",
                                        coordinates: [<?php echo $markCoords; ?>]
                                    },
                                    // Свойства.
                                    properties: {
                                        balloonContentHeader: '<figure class="map__image"><img src="<?php echo esc_url($markImg['url']); ?>"></figure>',
                                        balloonContentBody: `                
                                        <div class="baloon__box">                    
                                            <p class="baloon__text"><?php echo $department_address; ?></p>                
                                            <p class="baloon__text"><?php echo $department_work_time; ?></p>               
                                        </div>`,
                                    }
                                }, {
                                    // Опции.           
                                    preset: 'islands#redGlyphIcon'
                                }
                                );

                                myMap.geoObjects
                                    .add(myGeoObject);

                                myMap.behaviors.disable('scrollZoom');

                            }
                        </script>
                    </div>
                </div>
            </section>

        <?php }
    } ?>
</main>

<?php
get_template_part('template-parts/cta');

get_footer();