<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Page Tariffes
 */

get_header();

get_template_part('template-parts/hero', 'pages');

get_template_part('template-parts/block', 'tariffes');

get_template_part('template-parts/block', 'autopark');

get_template_part('template-parts/block', 'cities');

get_template_part('template-parts/block', 'gallery');

get_template_part('template-parts/block', 'faq');

get_template_part('template-parts/block', 'reviews');

get_footer();