<?php
/**
 * Template part for Block Text image / блок с ткстом и картинкой
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_color = get_field('block_color', $page_id);
$text_image_title = get_field('text_image_title', $page_id);
$text_image_image = get_field('text_image_image', $page_id);
$text_image_text = get_field('text_image_text', $page_id);
$text_image_button = get_field('text_image_button', $page_id);
$need_btns = get_field('need_btns', $page_id);

if ($text_image_text) {
    ?>

    <section class="text-image
    <?php if ($block_color == 'серый') { ?>grey<?php } ?>">
        <div class="container">
            <div
                class="text-image__wrapper <?php if ($text_image_image) { ?>d-grid align-items-start justify-content-between<?php } ?>">
                <div class="text-image__texts">
                    <?php
                    if ($text_image_title) {
                        echo '<h2 class="text-image__title">' . $text_image_title . '</h2>';
                    }
                    ?>

                    <div class="text-image__text post">
                        <?php echo $text_image_text; ?>
                    </div>
                </div>

                <?php if ($text_image_image) { ?>
                    <span class="image-border position-relative d-none d-lg-block">
                        <figure class="text-image__image position-absolute">
                            <img src="<?php echo $text_image_image['url']; ?>" alt="<?php echo $text_image_image['alt']; ?>">
                        </figure>
                    </span>
                <?php } ?>
            </div>

            <?php
            if (($need_btns=="да") && ($text_image_button['link'] && $text_image_button['title'])) {
                echo '<a class="button text-image__btn" href=" ' . $text_image_button['link'] . ' ">' . $text_image_button['title'] . '</a>';
            } ?>
        </div>
    </section>

<?php }