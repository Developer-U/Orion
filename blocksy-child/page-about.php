<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Page About
 */

get_header();

get_template_part('template-parts/hero', 'pages');

get_template_part('template-parts/block', 'text-image');

get_template_part('template-parts/block', 'mission');

get_template_part('template-parts/block', 'autopark');

get_template_part('template-parts/block', 'faq');

get_footer();