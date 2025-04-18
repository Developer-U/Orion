<?php
/*
Template Name: Simple Page
*/

get_header();
?>

<section class="hero-pages simple-page">
    <div class="container">
        <h1 class="hero-pages__title">
            <?php echo the_title(); ?>
        </h1>

        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                (yoast_breadcrumb('<div class="breadcrumbs__list">', '</div>'));
            }
            ?>
        </div>
        <!-- breadcrumbs end -->
    </div>

    <div class="container simple-page__wrapper post">
        <?php the_content(); ?>

        <a href="/" class="button mt-4">На главную</a>
    </div>
</section>

<?php get_footer(); ?>