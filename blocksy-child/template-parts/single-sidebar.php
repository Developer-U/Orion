<?php
/**
 * Displaying Single Sidebar
 * Отображает Сайдбар "Другие статьи"
 */
?>

<li class="post-item d-grid">
    <?php
    if (has_post_thumbnail()) {
        echo '<a class="post-item__image" href="' . get_the_permalink() . '">';
        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
        echo '</a>';
    }
    ?>

    <div class="post-item__wrap post-item-wrap d-flex flex-column gap-3">
        <a class="post-item-wrap__title col" href="<?php the_permalink(); ?>">
            <h3>
                <?php the_title(); ?>
            </h3>
        </a>

        <div class="post-item-wrap__params post-params d-flex col-auto">
            <p><?php echo get_the_date('d.m.y'); ?></p>

            <a class="post-params__link col-auto link-more" href="<?php the_permalink(); ?>">
                Перейти
            </a>
        </div>
    </div>
</li>