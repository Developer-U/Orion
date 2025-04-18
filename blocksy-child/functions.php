<?php
if (!defined('WP_DEBUG')) {
	die('Direct access forbidden.');
}


// Добавим Страницу опций на ACF PRO options_theme

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Основные настройки',
		'menu_title' => 'Основная информация',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

	acf_add_options_page(array(
		'page_title' => 'Сквозные блоки',
		'menu_title' => 'Сквозные блоки',
		'icon_url' => 'dashicons-table-col-after',
		'menu_slug' => 'theme-general-blocks',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}

/*
 * Скрипты и стили
 */
require get_stylesheet_directory() . '/includes/enqueue-scripts.php';

/*
 * Файл навигации (меню на сайте)
 */
require get_stylesheet_directory() . '/includes/navigations.php';

/*
 * Подключение настроек темы
 */
require get_stylesheet_directory() . '/includes/duplicate-types.php';

/*
 * Добавим произвольные типы записей
 */
require get_stylesheet_directory() . '/includes/post-types.php';

/*
 * Добавим фунц2ию открытия статей через /blog/
 */
require get_stylesheet_directory() . '/includes/blog-prefix.php';
