<?php
/**
 * Template part for displaying the main header
 *
 * @package NEWNIBTON
 */
?>

<div class="newnibton-main-header">
    <div class="container">
        <div class="header-content">
            <!-- Mobile Menu Trigger -->
            <button id="mobile-hamburger-trigger"
                    class="mobile-hamburger-menu"
                    aria-label="<?php esc_attr_e('Open navigation menu', 'minimal-woo'); ?>"
                    aria-controls="mobile-nav-panel"
                    aria-expanded="false"
                    type="button">
                <?php echo newnibton_get_svg_icon('hamburger', 'hamburger-icon'); ?>
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'minimal-woo'); ?></span>
            </button>

            <!-- Logo Section -->
            <div class="newnibton-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       class="site-title"
                       aria-label="<?php echo esc_attr(get_bloginfo('name') . ' - ' . __('Go to homepage', 'minimal-woo')); ?>">
                        <?php echo esc_html(get_bloginfo('name')); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Search Box -->
            <div class="newnibton-search-box" role="search" aria-label="<?php esc_attr_e('Product search', 'minimal-woo'); ?>">
                <form role="search"
                      method="get"
                      class="search-form woocommerce-product-search"
                      action="<?php echo esc_url(home_url('/')); ?>"
                      aria-label="<?php esc_attr_e('Search products', 'minimal-woo'); ?>">
                    <label for="search-field-header" class="screen-reader-text">
                        <?php esc_html_e('Search for products', 'minimal-woo'); ?>
                    </label>
                    <input type="search"
                           id="search-field-header"
                           class="search-field"
                           placeholder="<?php echo esc_attr(get_theme_mod('search_placeholder', 'Search for pet supplies, brands, and more...')); ?>"
                           value="<?php echo esc_attr(get_search_query()); ?>"
                           name="s"
                           autocomplete="off"
                           aria-describedby="search-description"
                           aria-expanded="false" />
                    <?php if (class_exists('WooCommerce')) : ?>
                    <input type="hidden" name="post_type" value="product" />
                    <?php endif; ?>
                    <button type="submit"
                            class="search-submit"
                            aria-label="<?php esc_attr_e('Submit search query', 'minimal-woo'); ?>">
                        <span class="screen-reader-text"><?php esc_html_e('Search', 'minimal-woo'); ?></span>
                        <?php echo newnibton_get_svg_icon('search', 'search-icon'); ?>
                    </button>
                </form>
                <div id="search-description" class="screen-reader-text">
                    <?php esc_html_e('Press Enter to search or use the search button', 'minimal-woo'); ?>
                </div>
            </div>

            <!-- Desktop Actions -->
            <div class="desktop-actions">
                <?php get_template_part('template-parts/header/country-selector'); ?>
                <?php get_template_part('template-parts/header/app-button'); ?>
            </div>

            <!-- Header Actions -->
            <div class="header-actions-wrapper">
                <?php get_template_part('template-parts/header/help-dropdown'); ?>
                <?php get_template_part('template-parts/header/signin-dropdown'); ?>
                <?php get_template_part('template-parts/header/cart-dropdown'); ?>
            </div>
        </div>
    </div>
</div>