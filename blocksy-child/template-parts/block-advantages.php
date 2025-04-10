<?php
/**
 * Template part for Block Advantages / блок Преимущзества с плитками
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$fields_prefix = is_single('services') ? $page_id : 'options';
$post_type = get_post_type();
if ($post_type) {
    $post_type_data = get_post_type_object($post_type);
    $post_type_slug = $post_type_data->rewrite['slug'];
}
$top_block_title = is_singular('cities') ? get_field('advantages_title_' . $post_type_slug, 'options') : get_field('advantages_title');
$top_block_text = is_singular('cities') ? get_field('advantages_text_' . $post_type_slug, 'options') : get_field('advantages_text');
?>

<section class="advantages dark">
    <div class="container">
        <?php
        if ($top_block_title) {
            ?>
            <div
                class="block-top <?php if ($top_block_text) { ?>d-grid align-items-start<?php } else { ?>d-block<?php } ?>">
                <h2>
                    <?php echo $top_block_title; ?>
                </h2>

                <?php
                if ($top_block_text) {
                    echo '<div class="block-top__text">' . $top_block_text . '</div>';
                } ?>
            </div>
        <?php } ?>

        <ul class="advantages__list advantages-list d-grid grid-three">
            <?php if (have_rows('new_advantage', $fields_prefix)) {
                $i = 0; ?>
                <?php while (have_rows('new_advantage', $fields_prefix)) {
                    the_row();
                    $advantage_title = get_sub_field('advantage_title', $fields_prefix);
                    $advantage_text = get_sub_field('advantage_text', $fields_prefix);
                    $advantage_icon = get_sub_field('advantage_icon', $fields_prefix);
                    $advantage_image = get_sub_field('advantage_image', $fields_prefix);
                    $index = $i++;
                    ?>

                    <li data-aos="fade-left" data-aos-offset="200" data-aos-delay="<?php echo 100 * ($index * 2.5); ?>"
                        data-aos-duration="900" data-aos-easing="ease-in-out" data-aos-once="true"
                        data-aos-anchor-placement="top-left"
                        class="advantages-list__item advantage-item position-relative overlay"
                        style="background-image: url(<?php echo $advantage_image['url']; ?>); background-repeat: no-repeat; background-size: cover">

                        <figure class="advantage-item__icon position-relative">
                            <?php
                            if ($advantage_icon) {
                                echo '<img src="' . $advantage_icon['url'] . '" alt="' . $advantage_icon['alt'] . '">';
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/adv-no-icon.svg' . '" alt="ТК Орион. Наши преимущества">';
                            } ?>
                        </figure>

                        <h3 class="advantage-item__title position-relative">
                            <?php echo $advantage_title; ?>
                        </h3>

                        <?php
                        if ($advantage_text) {
                            echo '<div class="advantage-item__text position-relative">' . $advantage_text . '</div>';
                        } ?>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
</section>