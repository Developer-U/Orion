<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

register_nav_menus(array(
    'primary' => 'Основное',
    'services' => 'Меню услуг',
    'short_menu' => 'Сокращённое меню',
));

function estore_primary_menu()
{
    wp_nav_menu([
        'theme_location' => 'primary',
        'menu_id' => 'primary-menu'
    ]);
}

function estore_services_menu()
{
    wp_nav_menu([
        'theme_location' => 'services',
        'menu_id' => 'services-menu',
    ]);
}

function estore_short_menu()
{
    wp_nav_menu([
        'theme_location' => 'short_menu',
        'menu_id' => 'services-menu',
    ]);
}

// Делаем активным пункт меню на текущей странице
add_filter('nav_menu_css_class', 'custom_nav_class', 10, 2);
function custom_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}