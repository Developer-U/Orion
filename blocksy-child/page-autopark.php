<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 *  Page Autopark
 */

get_header();

get_template_part('template-parts/hero', 'pages');

get_template_part('template-parts/block', 'autopark');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/cta');

get_footer();
?>