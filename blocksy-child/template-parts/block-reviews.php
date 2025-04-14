<?php
/**
 * Template part for Block Reviews / блок Отзывы
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$top_block_title = get_field('reviews_title');
$top_block_text = get_field('reviews_text');
$reviews_count = is_archive('reviews') ? '99' : '4';

$arg_reviews = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $reviews_count,
    'post_type' => 'reviews',
    'post_status' => 'publish',
);

$query_reviews = new WP_Query($arg_reviews);

if ($query_reviews->have_posts()) {
    ?>

    <section class="reviews dark">
        <div class="container">
            <div
                class="block-top <?php if ($top_block_text) { ?>d-grid align-items-start<?php } else { ?>d-block<?php } ?>">
                <h2>
                    <?php if ($top_block_title) {
                        echo $top_block_title;
                    } else {
                        echo 'Отзывы<br>наших клиентов';
                    } ?>
                </h2>

                <?php
                if ($top_block_text) {
                    echo '<div class="block-top__text">' . $top_block_text . '</div>';
                } ?>
            </div>

            <ul class="reviews__list reviews-list d-grid align-items-start grid-four">
                <?php if ($query_reviews->have_posts()) {
                    while ($query_reviews->have_posts()):
                        $query_reviews->the_post();
                        $star_rating = get_field('rating');
                        ?>

                        <li class="reviews-list__item reviews-item position-relative js-reviews">
                            <div class="reviews-item__person person-block d-flex align-items-center">
                                <figure class="person-block__image" style="background: #ddd;">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    } else { ?>
                                        <img class="no-image"
                                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/no-image.jpg" alt="фото">
                                    <?php }
                                    ?>
                                </figure>

                                <div class="person-block__info col">
                                    <h4>
                                        <?php the_title(); ?>
                                    </h4>

                                    <?php
                                    echo $star_rating;
                                    ?>
                                </div>
                            </div>

                            <span class="red-line"></span>

                            <div class="reviews-item__bottom reviews-bottom d-grid gap-2">
                                <div class="reviews-item__content">
                                    <div class="reviews-item__text">
                                        <div>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="reviews-bottom__btn main-reviews__item-more"><span>Читать
                                        полностью</span></button>

                                <button type="button"
                                    class="reviews-bottom__btn main-reviews__item-less"><span>Скрыть</span></button>
                            </div>
                        </li>

                        <?php
                    endwhile;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <?php if (!is_archive('reviews')) {
                echo '<a href="/reviews" class="reviews__link button">Смотреть все отзывы</a>';
            } ?>
        </div>
    </section>

<?php }