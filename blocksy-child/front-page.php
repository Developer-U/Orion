<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Main Page
 */

get_header();

get_template_part('template-parts/hero');

get_template_part('template-parts/cta', 'short');

get_template_part('template-parts/block', 'text-image');

get_template_part('template-parts/block', 'advantages');

get_template_part('template-parts/company', 'digits');

get_template_part('template-parts/block', 'levels');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/cta');

get_template_part('template-parts/block', 'reviews');

get_template_part('template-parts/block', 'news');

get_footer();
?>