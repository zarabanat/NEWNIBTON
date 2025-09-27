<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'minimal-woo'); ?></a>

    <?php
    // Add conditional classes for consistent styling across all pages
    $header_class = 'site-header newnibton-header';
    if (is_shop() || is_product_category() || is_product() || is_cart() || is_checkout()) {
        $header_class .= ' woocommerce-header';
    }
    ?>
    <header id="masthead" class="<?php echo esc_attr($header_class); ?>" role="banner">
        <?php
        /**
         * NEWNIBTON Custom Header - Modular Template Structure
         *
         * This ensures consistent header structure across all page types.
         * The header includes all necessary WooCommerce integration,
         * mobile menu functionality, and proper ARIA accessibility.
         */
        get_template_part('template-parts/header/promo-bar');
        get_template_part('template-parts/header/main-header');
        get_template_part('template-parts/header/mobile-navigation');
        get_template_part('template-parts/header/desktop-navigation');
        ?>
    </header>

    <div id="content" class="site-content"><?php if (function_exists('woocommerce_breadcrumb') && !is_front_page()) : ?>
            <div class="container">
                <?php woocommerce_breadcrumb(); ?>
            </div>
        <?php endif; ?>