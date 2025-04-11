<?php
/**
 * Template part for Block News / блок Публикации
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$top_block_title = get_field('news_title', 'options');
$top_block_text = get_field('news_text', 'options');
$news_image = get_field('news_image', 'options');
$news_count = is_home() ? '6' : '4';
$current_page = !empty($_GET['num']) ? $_GET['num'] : 1;

$arg_news = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $news_count,
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $current_page,
);

$query_news = new WP_Query($arg_news);

if ($query_news->have_posts()) {
    if (!is_home()) {
        ?>
        <section class="news dark position-relative overlay"
            style="background-image: url(<?php echo $news_image['url']; ?>); background-repeat: no-repeat; background-size: cover">
            <div class="container">
                <div
                    class="block-top <?php if ($top_block_text) { ?>d-grid align-items-start<?php } else { ?>d-block<?php } ?>">
                    <h2>
                        <?php if ($top_block_title) {
                            echo $top_block_title;
                        } else {
                            echo 'Последние публикации';
                        } ?>
                    </h2>

                    <?php
                    if ($top_block_text) {
                        echo '<div class="block-top__text">' . $top_block_text . '</div>';
                    } ?>
                </div>
            <?php } else { ?>
                <section class="news">
                    <div class="container">
                    <?php } ?>
                    <ul class="reviews__list reviews-list d-grid grid-four">
                        <?php if ($query_news->have_posts()) {
                            while ($query_news->have_posts()):
                                $query_news->the_post();
                                ?>

                                <li
                                    class="news-list__item reviews-item news-item position-relative d-flex flex-column justify-content-between gap-3">
                                    <div class="news-item__wrap col">
                                        <h4 class="news-item__title">
                                            <?php the_title(); ?>
                                        </h4>

                                        <div class="news-item__datebox d-flex align-items-end justify-content-between gap-2">
                                            <span class="red-line"></span>

                                            <p class="news-item__date">
                                                <?php echo get_the_date('j F, Y'); ?>
                                            </p>
                                        </div>

                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo '<figure class="news-item__image" style="background: #ddd;">';
                                            the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                            echo '</figure>';
                                        }
                                        ?>
                                        <div class="news-item__text">
                                            <?php
                                            $crop_content = get_the_content();
                                            echo wp_trim_words($crop_content, 14);
                                            ?>
                                        </div>
                                    </div>

                                    <a class="reviews-bottom__btn link-more" href="<?php the_permalink(); ?>">
                                        <span>Читать полностью</span>
                                    </a>
                                </li>

                                <?php
                            endwhile;

                            wp_reset_postdata();


                        } ?>
                    </ul>

                    <?php if (!is_home()) {
                        echo '<a href="/blog" class="button">Смотреть все публикации</a>';
                    } else {
                        echo paginate_links(array(
                            'prev_next' => true,
                            'prev_text' => __('🠔'),
                            'next_text' => __('🠖'),
                            'end_size' => 2,
                            'mid_size' => 2,
                            'type' => 'list',
                            'base' => site_url() . '/blog/%_%',
                            'format' => '?num=%#%',
                            'total' => $query_news->max_num_pages,
                            'current' => $current_page,
                        ));
                    }
                    ?>
                </div>
            </section>

        <?php }