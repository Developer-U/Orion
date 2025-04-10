<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method()
{
	wp_register_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap_css');
	wp_register_style('fancybox_css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css');
	wp_enqueue_style('fancybox_css');
	wp_register_style('simplebar_css', 'https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.3.0/simplebar.min.css');
	wp_enqueue_style('simplebar_css');
	wp_register_style('aos_css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
	wp_enqueue_style('aos_css');
	wp_enqueue_style('global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), null, 'all');
	wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), null, 'all');
	wp_enqueue_style('popup', get_stylesheet_directory_uri() . '/assets/css/popup.css', array(), null, 'all');
	wp_enqueue_style('estore-swiper', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null, 'all');
	wp_enqueue_style('text-open_css', get_stylesheet_directory_uri() . '/assets/css/text-open.css', array(), null, 'all');
	wp_enqueue_style('slider-css', get_stylesheet_directory_uri() . '/assets/css/slider.css', array(), null, 'all');
	wp_enqueue_style('contact_form', get_stylesheet_directory_uri() . '/assets/css/contact-form.css', array(), null, 'all');
	wp_enqueue_style('menu', get_stylesheet_directory_uri() . '/assets/css/menu.css', array(), null, 'all');
	wp_enqueue_style('social', get_stylesheet_directory_uri() . '/assets/css/social.css', array(), null, 'all');
	wp_enqueue_style( 'reviews_css', get_stylesheet_directory_uri() . '/assets/css/reviews.css', array(), null, 'all');
	wp_enqueue_style( 'star_rating_css', get_stylesheet_directory_uri() . '/assets/css/star-rating.css', array(), null, 'all');
	wp_enqueue_style('accorion-css', get_stylesheet_directory_uri() . '/assets/css/accordion.css', array(), null, 'all');
	wp_enqueue_style('accord-css', get_stylesheet_directory_uri() . '/assets/css/accord.css', array(), null, 'all');	
	wp_enqueue_style( 'breadcrumbs', get_stylesheet_directory_uri() . '/assets/css/breadcrumbs.css', array(), null, 'all');
	// wp_enqueue_style( 'tabs_css', get_stylesheet_directory_uri() . '/assets/css/tabs.css', array(), null, 'all');	


	wp_register_script('bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', null, null, true);
	wp_enqueue_script('bootstrap_js');
	wp_register_script('fancybox_js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', null, null, true);
	wp_enqueue_script('fancybox_js');
	wp_register_script('simplebar_js', 'https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js', null, null, true);
	wp_enqueue_script('simplebar_js');
	wp_register_script('aos_js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', null, null, true);
	wp_enqueue_script('aos_js');
	wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), null, null, true);
	wp_enqueue_script('reviews-js', get_stylesheet_directory_uri() . '/assets/js/reviews.js', array(), null, true);		
	// wp_enqueue_script( 'tabs_js', get_stylesheet_directory_uri() . '/assets/js/tabs.js', array(), null, true );
	wp_enqueue_script('popup-js', get_stylesheet_directory_uri() . '/assets/js/popups.js', array('jquery'), null, true);
	wp_enqueue_script('swiper-bundle-js', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('slider-js', get_stylesheet_directory_uri() . '/assets/js/slider.js', array('jquery'), null, true);
	wp_enqueue_script('text-open-js', get_stylesheet_directory_uri() . '/assets/js/text_open.js', array('jquery'), null, true);
	wp_enqueue_script('accordion-js', get_stylesheet_directory_uri() . '/assets/js/accordion.min.js', array('jquery'), null, true);
	wp_enqueue_script('accord-js', get_stylesheet_directory_uri() . '/assets/js/accord.js', array('jquery'), null, true);
	// wp_enqueue_script('scroll_top-js', get_stylesheet_directory_uri() . '/assets/js/scroll-top.js', array('jquery'), null, true);
	wp_enqueue_script('menu-submenu1-js', get_stylesheet_directory_uri() . '/assets/js/menu-submenu1.js', array(), null, true);	
	wp_enqueue_script('inputmask-js', get_stylesheet_directory_uri() . '/assets/js/inputmask.js', array('jquery'), null, true);

}