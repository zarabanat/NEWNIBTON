<?php
/**
 * NEWNIBTON Theme Functions
 *
 * @package NEWNIBTON
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('NEWNIBTON_VERSION', '1.0.0');
define('NEWNIBTON_TEXTDOMAIN', 'minimal-woo');

// Theme Setup
function newnibton_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Add support for WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register Navigation Menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'minimal-woo'),
        'footer' => __('Footer Menu', 'minimal-woo'),
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 350,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'newnibton_setup');

// Include required files
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/header-functions.php';

// Enqueue Scripts and Styles
function newnibton_scripts() {
    // Theme stylesheet
    wp_enqueue_style('newnibton-style', get_stylesheet_uri(), array(), NEWNIBTON_VERSION);

    // Header styles
    wp_enqueue_style('newnibton-header', get_template_directory_uri() . '/assets/css/header.css', array(), NEWNIBTON_VERSION);

    // WooCommerce styles
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('newnibton-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), NEWNIBTON_VERSION);
    }

    // Header JavaScript
    wp_enqueue_script('newnibton-header', get_template_directory_uri() . '/assets/js/header.js', array('jquery'), NEWNIBTON_VERSION, true);

    // Localize script for AJAX
    wp_localize_script('newnibton-header', 'newnibton_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('newnibton_header_nonce'),
        'cart_url' => class_exists('WooCommerce') ? wc_get_cart_url() : '',
        'account_url' => class_exists('WooCommerce') ? get_permalink(get_option('woocommerce_myaccount_page_id')) : '',
    ));

    // Main JavaScript file (if needed)
    wp_enqueue_script('newnibton-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), NEWNIBTON_VERSION, true);

    // Threaded comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'newnibton_scripts');

// Register Widget Areas
function newnibton_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'minimal-woo'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'minimal-woo'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'minimal-woo'),
        'id'            => 'footer-1',
        'description'   => __('Add footer widgets here.', 'minimal-woo'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'newnibton_widgets_init');

// WooCommerce Specific Functions
if (class_exists('WooCommerce')) {

    // Change number of products per row
    add_filter('loop_shop_columns', 'newnibton_shop_columns');
    function newnibton_shop_columns() {
        return 4;
    }

    // Change number of products displayed per page
    add_filter('loop_shop_per_page', 'newnibton_products_per_page');
    function newnibton_products_per_page() {
        return 12;
    }

    // Remove default WooCommerce wrapper
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    // Add custom wrapper
    add_action('woocommerce_before_main_content', 'newnibton_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'newnibton_wrapper_end', 10);

    function newnibton_wrapper_start() {
        echo '<main id="main" class="site-main">';
        echo '<div class="container">';
    }

    function newnibton_wrapper_end() {
        echo '</div>';
        echo '</main>';
    }
}

// Custom excerpt length
function newnibton_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'newnibton_excerpt_length', 999);

// Custom excerpt more
function newnibton_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'newnibton_excerpt_more');