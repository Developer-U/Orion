<?php
/**
 * Template part for Block Mission / блок Миссия и ценности
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (have_rows('add_mission', 'options')) {
    ?>
    <section class="mission">
        <div class="container">
            <ul class="mission__list mission-list">
                <?php if (have_rows('add_mission', 'options')) {
                    $i = 0; ?>
                    <?php while (have_rows('add_mission', 'options')) {
                        the_row();
                        $mission_title = get_sub_field('mission_title', 'options');
                        $mission_text = get_sub_field('mission_text', 'options');
                        $index = $i++;
                        ?>
                        <li
                            class="mission-list__item mission-item <?php if ($index == 0 || ($index % 2) == 0) { ?>right<?php } else { ?>left<?php } ?>">
                            <div class="mission-item__top d-flex align-items-end gap-4">
                                <h2 class="mission-item__title col-auto"><?php echo $mission_title; ?></h2>
                                <span class="mission-item__line col"
                                    data-aos="<?php if ($index == 0 || ($index % 2) == 0) { ?>fade-left<?php } else { ?>fade-right<?php } ?>"
                                    data-aos-offset="200" data-aos-delay="<?php echo 100 * ($index * 1.3); ?>"
                                    data-aos-duration="1100" data-aos-easing="ease-in-out" data-aos-once="true"
                                    data-aos-anchor-placement="top-left"></span>
                            </div>
                            <div class="mission-item__text">
                                <?php echo $mission_text; ?>
                            </div>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </section>
<?php }