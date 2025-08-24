<?php

function portfolio_scripts()
{
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
    wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/css/lightbox.min.css');
    wp_enqueue_style('jessica-main-style', get_template_directory_uri() . '/css/style.css', array('bootstrap-css'));
    wp_enqueue_style('jessica-theme-style', get_stylesheet_uri());

    // Enqueue Scripts
    wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array(), false, true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js', array('popper-js'), false, true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script('plugins-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), false, true);
    wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), false, true);
    wp_enqueue_script('isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array(), false, true);

    // Corrected dependency array below
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', array('jquery', 'isotope-js', 'swiper-js'), false, true);
}

add_action('wp_enqueue_scripts', 'portfolio_scripts');

// --- Add this block to your functions.php ---

// 1. Add support for an ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// 2. Register a navigation menu
function register_my_menu()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
            'footer-menu'  => __('Footer Menu') // <-- ADD THIS LINE

        )
    );
}
add_action('init', 'register_my_menu');
// --- Add this block to functions.php to style the WP Nav Menu ---

/**
 * Adds the 'nav-item' class to the <li> elements in the primary menu.
 */
function add_li_class($classes, $item, $args, $depth)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_li_class', 10, 4);

/**
 * Adds the 'nav-link' and other classes to the <a> elements in the primary menu.
 */
function add_link_attributes($atts, $item, $args, $depth)
{
    if (isset($args->add_link_class)) {
        $atts['class'] = $args->add_link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_link_attributes', 10, 4);
