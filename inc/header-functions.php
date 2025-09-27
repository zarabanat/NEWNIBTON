<?php
/**
 * Header Functions for NEWNIBTON Theme
 *
 * @package NEWNIBTON
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get cart count safely
 */
function newnibton_get_cart_count() {
    if (class_exists('WooCommerce') && WC()->cart) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

/**
 * Get cart total safely
 */
function newnibton_get_cart_total() {
    if (class_exists('WooCommerce') && WC()->cart) {
        return WC()->cart->get_cart_total();
    }
    return wc_price(0);
}

/**
 * SVG Icons Library
 */
function newnibton_get_svg_icon($icon_name, $class = '') {
    $icons = array(
        'cart' => '<svg class="' . esc_attr($class) . '" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>',

        'user' => '<svg class="' . esc_attr($class) . '" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>',

        'mobile' => '<svg class="' . esc_attr($class) . '" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 1H8C6.34 1 5 2.34 5 4v16c0 1.66 1.34 3 3 3h8c1.66 0 3-1.34 3-3V4c0-1.66-1.34-3-3-3zm-2 20h-4v-1h4v1zm3.25-3H6.75V4h10.5v14z"/></svg>',

        'search' => '<svg class="' . esc_attr($class) . '" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>',

        'help' => '<svg class="' . esc_attr($class) . '" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/></svg>',

        'whatsapp' => '<svg class="' . esc_attr($class) . '" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.051 3.488"/></svg>',

        'dropdown' => '<svg class="' . esc_attr($class) . '" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>',

        'hamburger' => '<svg class="' . esc_attr($class) . '" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>',

        'home' => '<svg class="' . esc_attr($class) . '" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>'
    );

    return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
}

/**
 * Country data with SVG flags
 */
function newnibton_get_countries() {
    return array(
        'US' => array(
            'name' => get_theme_mod('country_display_name', 'USA'),
            'flag_svg' => '<svg width="20" height="15" viewBox="0 0 20 15" aria-hidden="true"><rect width="20" height="15" fill="#B22234"/><rect y="1" width="20" height="1" fill="white"/><rect y="3" width="20" height="1" fill="white"/><rect y="5" width="20" height="1" fill="white"/><rect y="7" width="20" height="1" fill="white"/><rect y="9" width="20" height="1" fill="white"/><rect y="11" width="20" height="1" fill="white"/><rect y="13" width="20" height="1" fill="white"/><rect width="8" height="8" fill="#3C3B6E"/></svg>',
            'available' => true,
            'message' => get_theme_mod('country_message', 'We currently serve only the United States. Free shipping on orders over $49.')
        )
    );
}

/**
 * Main navigation menu items
 */
function newnibton_get_main_menu_items() {
    $menu_items = array(
        'dog' => array(
            'title' => get_theme_mod('menu_dog_title', 'Dog'),
            'url' => get_theme_mod('menu_dog_url', '/shop/dog/'),
            'has_dropdown' => true,
            'submenu' => array(
                'food' => array('title' => __('Dog Food', 'minimal-woo'), 'url' => '/shop/dog/food/'),
                'toys' => array('title' => __('Dog Toys', 'minimal-woo'), 'url' => '/shop/dog/toys/'),
                'accessories' => array('title' => __('Accessories', 'minimal-woo'), 'url' => '/shop/dog/accessories/')
            )
        ),
        'cat' => array(
            'title' => get_theme_mod('menu_cat_title', 'Cat'),
            'url' => get_theme_mod('menu_cat_url', '/shop/cat/'),
            'has_dropdown' => true,
            'submenu' => array(
                'food' => array('title' => __('Cat Food', 'minimal-woo'), 'url' => '/shop/cat/food/'),
                'toys' => array('title' => __('Cat Toys', 'minimal-woo'), 'url' => '/shop/cat/toys/'),
                'litter' => array('title' => __('Cat Litter', 'minimal-woo'), 'url' => '/shop/cat/litter/')
            )
        ),
        'other-animals' => array(
            'title' => get_theme_mod('menu_other_title', 'Other Animals'),
            'url' => get_theme_mod('menu_other_url', '/shop/other-animals/'),
            'has_dropdown' => true,
            'submenu' => array(
                'birds' => array('title' => __('Birds', 'minimal-woo'), 'url' => '/shop/birds/'),
                'fish' => array('title' => __('Fish', 'minimal-woo'), 'url' => '/shop/fish/'),
                'small-pets' => array('title' => __('Small Pets', 'minimal-woo'), 'url' => '/shop/small-pets/')
            )
        ),
        'pharmacy' => array(
            'title' => get_theme_mod('menu_pharmacy_title', 'Pharmacy'),
            'url' => get_theme_mod('menu_pharmacy_url', '/pharmacy/'),
            'has_dropdown' => true,
            'submenu' => array(
                'medications' => array('title' => __('Medications', 'minimal-woo'), 'url' => '/pharmacy/medications/'),
                'supplements' => array('title' => __('Supplements', 'minimal-woo'), 'url' => '/pharmacy/supplements/')
            )
        ),
        'services' => array(
            'title' => get_theme_mod('menu_services_title', 'Services'),
            'url' => get_theme_mod('menu_services_url', '/services/'),
            'has_dropdown' => true,
            'submenu' => array(
                'grooming' => array('title' => __('Grooming', 'minimal-woo'), 'url' => '/services/grooming/'),
                'training' => array('title' => __('Training', 'minimal-woo'), 'url' => '/services/training/')
            )
        ),
        'learn' => array(
            'title' => get_theme_mod('menu_learn_title', 'Learn'),
            'url' => get_theme_mod('menu_learn_url', '/learn/'),
            'has_dropdown' => true,
            'submenu' => array(
                'articles' => array('title' => __('Articles', 'minimal-woo'), 'url' => '/learn/articles/'),
                'videos' => array('title' => __('Videos', 'minimal-woo'), 'url' => '/learn/videos/')
            )
        ),
        'todays-deals' => array(
            'title' => get_theme_mod('menu_deals_title', 'Today\'s Deals'),
            'url' => get_theme_mod('menu_deals_url', '/deals/'),
            'has_dropdown' => false
        )
    );

    return apply_filters('newnibton_main_menu_items', $menu_items);
}

/**
 * AJAX: Update cart count
 */
function newnibton_ajax_update_cart_count() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'newnibton_header_nonce')) {
        wp_send_json_error(array('message' => 'Security verification failed'), 403);
    }

    $count = newnibton_get_cart_count();
    wp_send_json_success(array('count' => $count));
}
add_action('wp_ajax_newnibton_update_cart_count', 'newnibton_ajax_update_cart_count');
add_action('wp_ajax_nopriv_newnibton_update_cart_count', 'newnibton_ajax_update_cart_count');

/**
 * AJAX: Get cart contents (mini-cart)
 */
function newnibton_get_cart_contents() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'newnibton_header_nonce')) {
        wp_send_json_error(array('message' => 'Security verification failed'), 403);
    }

    if (!class_exists('WooCommerce') || !WC()->cart) {
        $empty = '<p class="woocommerce-mini-cart__empty-message">' . esc_html__('No products in the cart.', 'woocommerce') . '</p>';
        wp_send_json_success(array('cart_html' => $empty));
    }

    ob_start();
    woocommerce_mini_cart();
    $html = ob_get_clean();

    wp_send_json_success(array('cart_html' => $html));
}
add_action('wp_ajax_newnibton_get_cart_contents', 'newnibton_get_cart_contents');
add_action('wp_ajax_nopriv_newnibton_get_cart_contents', 'newnibton_get_cart_contents');

/**
 * AJAX: Search suggestions
 */
function newnibton_search_suggestions() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'newnibton_header_nonce')) {
        wp_send_json_error(array('message' => 'Security verification failed'), 403);
    }

    $query = isset($_POST['query']) ? sanitize_text_field(wp_unslash($_POST['query'])) : '';
    $suggestions = array();

    if ($query) {
        // 1) Try products first
        $product_q = new WP_Query(array(
            'post_type'      => array('product'),
            's'              => $query,
            'posts_per_page' => 5,
            'post_status'    => 'publish',
            'no_found_rows'  => true,
            'ignore_sticky_posts' => true,
        ));

        if ($product_q->have_posts()) {
            foreach ($product_q->posts as $p) {
                $suggestions[] = array(
                    'title' => get_the_title($p),
                    'url'   => get_permalink($p),
                );
            }
        }

        // 2) If less than 5, top up with regular posts
        $remaining = max(0, 5 - count($suggestions));
        if ($remaining > 0) {
            $post_q = new WP_Query(array(
                'post_type'      => array('post'),
                's'              => $query,
                'posts_per_page' => $remaining,
                'post_status'    => 'publish',
                'no_found_rows'  => true,
                'ignore_sticky_posts' => true,
            ));

            if ($post_q->have_posts()) {
                foreach ($post_q->posts as $p) {
                    $suggestions[] = array(
                        'title' => get_the_title($p),
                        'url'   => get_permalink($p),
                    );
                }
            }
        }
    }

    wp_send_json_success(array('suggestions' => $suggestions));
}
add_action('wp_ajax_newnibton_search_suggestions', 'newnibton_search_suggestions');
add_action('wp_ajax_nopriv_newnibton_search_suggestions', 'newnibton_search_suggestions');

/**
 * Update cart fragments for AJAX cart operations
 */
function newnibton_update_cart_fragments($fragments) {
    $cart_count = newnibton_get_cart_count();

    ob_start();
    ?>
    <span class="cart-count" aria-label="<?php printf(esc_attr__('%s items in cart', 'minimal-woo'), $cart_count); ?>">
        <?php echo esc_html($cart_count); ?>
    </span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();

    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'newnibton_update_cart_fragments');