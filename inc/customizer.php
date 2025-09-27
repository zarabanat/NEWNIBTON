<?php
/**
 * Theme Customizer Configuration
 *
 * @package NEWNIBTON
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer options
 */
function newnibton_customize_register($wp_customize) {

    // Header Section
    $wp_customize->add_section('newnibton_header_settings', array(
        'title'    => __('Header Settings', 'minimal-woo'),
        'priority' => 30,
    ));

    // Top Bar Settings
    $wp_customize->add_setting('show_top_bar', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_top_bar', array(
        'label'   => __('Show Top Promo Bar', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('top_bar_promo_text', array(
        'default'           => '$20 eGift card with $49+ on 1st order* use WELCOME',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('top_bar_promo_text', array(
        'label'   => __('Promo Bar Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('promo_link_url', array(
        'default'           => '/promo-details',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('promo_link_url', array(
        'label'   => __('Promo Link URL', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'url',
    ));

    // Search Settings
    $wp_customize->add_setting('search_placeholder', array(
        'default'           => 'Search for pet supplies, brands, and more...',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('search_placeholder', array(
        'label'   => __('Search Placeholder Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    // Country Selector
    $wp_customize->add_setting('show_country_switcher', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_country_switcher', array(
        'label'   => __('Show Country Selector', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('country_display_name', array(
        'default'           => 'USA',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('country_display_name', array(
        'label'   => __('Country Display Name', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('country_message', array(
        'default'           => 'We currently serve only the United States',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('country_message', array(
        'label'   => __('Country Tooltip Message', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    // App Button
    $wp_customize->add_setting('show_use_app_button', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_use_app_button', array(
        'label'   => __('Show Use App Button', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('app_button_text', array(
        'default'           => 'Use App',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('app_button_text', array(
        'label'   => __('App Button Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('app_store_link', array(
        'default'           => 'https://play.google.com/store',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('app_store_link', array(
        'label'   => __('App Store Link', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'url',
    ));

    // Help Section
    $wp_customize->add_setting('show_help_dropdown', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_help_dropdown', array(
        'label'   => __('Show Help Dropdown', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('help_button_text', array(
        'default'           => '24/7 Help',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('help_button_text', array(
        'label'   => __('Help Button Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('contact_page_url', array(
        'default'           => '/contact/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('contact_page_url', array(
        'label'   => __('Contact Page URL', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('help_title', array(
        'default'           => 'WhatsApp Support',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('help_title', array(
        'label'   => __('Help Card Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('whatsapp_number', array(
        'default'           => '777677777',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('whatsapp_number', array(
        'label'   => __('WhatsApp Number', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('chat_button_text', array(
        'default'           => 'Chat Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('chat_button_text', array(
        'label'   => __('Chat Button Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    // User Authentication Text
    $wp_customize->add_setting('signin_button_text', array(
        'default'           => 'Sign In',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('signin_button_text', array(
        'label'   => __('Sign In Button Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('account_text', array(
        'default'           => 'My Account',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('account_text', array(
        'label'   => __('Account Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('login_text', array(
        'default'           => 'Log In',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('login_text', array(
        'label'   => __('Login Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('register_text', array(
        'default'           => 'Create Account',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('register_text', array(
        'label'   => __('Register Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('logout_text', array(
        'default'           => 'Logout',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('logout_text', array(
        'label'   => __('Logout Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    // Global Colors Section
    $wp_customize->add_section('newnibton_global_colors', array(
        'title'    => __('Global Colors', 'minimal-woo'),
        'priority' => 25,
    ));

    // Primary Colors
    $wp_customize->add_setting('global_primary_color', array(
        'default'           => '#007cba',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_primary_color', array(
        'label'   => __('Primary Blue Color', 'minimal-woo'),
        'section' => 'newnibton_global_colors',
    )));

    $wp_customize->add_setting('global_accent_color', array(
        'default'           => '#ffd700',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_accent_color', array(
        'label'   => __('Accent Yellow Color', 'minimal-woo'),
        'section' => 'newnibton_global_colors',
    )));

    // Text Colors
    $wp_customize->add_setting('global_text_dark', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_text_dark', array(
        'label'   => __('Dark Text Color', 'minimal-woo'),
        'section' => 'newnibton_global_colors',
    )));

    $wp_customize->add_setting('global_text_light', array(
        'default'           => '#666666',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_text_light', array(
        'label'   => __('Light Text Color', 'minimal-woo'),
        'section' => 'newnibton_global_colors',
    )));

    // Menu Settings
    $wp_customize->add_setting('menu_dog_title', array(
        'default'           => 'Dog',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('menu_dog_title', array(
        'label'   => __('Dog Menu Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('menu_cat_title', array(
        'default'           => 'Cat',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('menu_cat_title', array(
        'label'   => __('Cat Menu Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('menu_other_title', array(
        'default'           => 'Other Animals',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('menu_other_title', array(
        'label'   => __('Other Animals Menu Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('menu_pharmacy_title', array(
        'default'           => 'Pharmacy',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('menu_pharmacy_title', array(
        'label'   => __('Pharmacy Menu Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('menu_services_title', array(
        'default'           => 'Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('menu_services_title', array(
        'label'   => __('Services Menu Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('menu_learn_title', array(
        'default'           => 'Learn',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('menu_learn_title', array(
        'label'   => __('Learn Menu Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('menu_deals_title', array(
        'default'           => 'Today\'s Deals',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('menu_deals_title', array(
        'label'   => __('Deals Menu Title', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));

    // Mobile Menu Settings
    $wp_customize->add_setting('mobile_menu_message_show', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('mobile_menu_message_show', array(
        'label'   => __('Show Mobile Menu Message', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('mobile_menu_message_text', array(
        'default'           => 'Welcome to our store!',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('mobile_menu_message_text', array(
        'label'   => __('Mobile Menu Message Text', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('bottom_promo_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('bottom_promo_text', array(
        'label'   => __('Bottom Promo Text (Optional)', 'minimal-woo'),
        'section' => 'newnibton_header_settings',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'newnibton_customize_register');

/**
 * Output global color CSS variables
 */
function newnibton_global_colors_css() {
    $primary_color = get_theme_mod('global_primary_color', '#007cba');
    $accent_color = get_theme_mod('global_accent_color', '#ffd700');
    $text_dark = get_theme_mod('global_text_dark', '#333333');
    $text_light = get_theme_mod('global_text_light', '#666666');

    echo '<style type="text/css">';
    echo ':root {';
    echo '--newnibton-primary: ' . esc_attr($primary_color) . ';';
    echo '--newnibton-accent: ' . esc_attr($accent_color) . ';';
    echo '--newnibton-text-dark: ' . esc_attr($text_dark) . ';';
    echo '--newnibton-text-light: ' . esc_attr($text_light) . ';';
    echo '--newnibton-white: #ffffff;';
    echo '--newnibton-border-light: #e0e0e0;';
    echo '--newnibton-shadow-subtle: 0 2px 6px rgba(0,0,0,0.08);';
    echo '--newnibton-shadow-medium: 0 4px 12px rgba(0,0,0,0.15);';
    echo '--newnibton-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);';
    echo '--newnibton-border-radius: 8px;';
    echo '}';
    echo '</style>';
}
add_action('wp_head', 'newnibton_global_colors_css');