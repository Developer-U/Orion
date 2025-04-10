<?php
/**
 * Template part for Block Gallery / блок Галерея
 * Сквозной
 **/


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$top_block_title = get_field('gallery_title', 'options');
$top_block_text = get_field('gallery_text', 'options');
?>

<section class="media dark">
    <div class="container-fluid">
        <div
            class="block-top <?php if ($top_block_text) { ?>d-grid align-items-start<?php } else { ?>d-block<?php } ?>">
            <h2>
                <?php
                if ($top_block_title) {
                    echo $top_block_title;
                } else {
                    echo 'Наша фотогалерея';
                } ?>
            </h2>

            <?php
            if ($top_block_text) {
                echo '<div class="block-top__text">' . $top_block_text . '</div>';
            } ?>
        </div>

        <div class="swiper media__slider photo-gallery-slider">
            <div class="slider-arrows-wrap d-flex gap-3">
                <div class="swiper-button-prev slider-arrow-prev"></div>
                <div class="swiper-button-next slider-arrow-next"></div>
            </div>

            <div class="swiper-wrapper">
                <?php if (have_rows('new_photo_gallery_image', 'options')): ?>
                    <?php while (have_rows('new_photo_gallery_image', 'options')):
                        the_row();
                        $photo_gallery_image = get_sub_field('photo_gallery_image', 'options');
                        ?>

                        <a href="<?php echo $photo_gallery_image['url']; ?>" class="swiper-slide photo-gallery-slider__slide"
                            data-fancybox="photo_block_gallery">
                            <img src="<?php echo $photo_gallery_image['url']; ?>"
                                alt="<?php echo $photo_gallery_image['alt']; ?>">
                        </a>

                        <?php
                    endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>