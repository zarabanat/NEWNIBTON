<?php
/**
 * Template part for displaying the cart dropdown
 *
 * @package NEWNIBTON
 */

// Hide on cart page to avoid duplication
if (function_exists('is_cart') && is_cart()) {
    return;
}
?>

<div class="newnibton-cart-dropdown">
    <button class="cart-btn"
            aria-haspopup="true"
            aria-expanded="false"
            aria-label="<?php esc_attr_e('Shopping cart', 'minimal-woo'); ?>"
            type="button">
        <?php echo newnibton_get_svg_icon('cart', 'cart-icon'); ?>
        <span class="cart-count" aria-label="<?php printf(esc_attr__('%s items in cart', 'minimal-woo'), newnibton_get_cart_count()); ?>">
            <?php echo newnibton_get_cart_count(); ?>
        </span>
    </button>
    <div class="cart-card woocommerce-mini-cart-dropdown" role="menu" aria-hidden="true">
        <div class="newnibton-cart-dropdown-content">
            <?php if (class_exists('WooCommerce')) : ?>
                <?php woocommerce_mini_cart(); ?>
            <?php else : ?>
                <div class="cart-summary">
                    <div class="cart-items-count">
                        <?php echo esc_html__('Cart not available', 'minimal-woo'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>