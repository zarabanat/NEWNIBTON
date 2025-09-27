<?php
/**
 * Template part for displaying the promo bar
 *
 * @package NEWNIBTON
 */

if (!get_theme_mod('show_top_bar', true)) {
    return;
}
?>

<div class="newnibton-promo-bar">
    <div class="container">
        <a href="<?php echo esc_url(get_theme_mod('promo_link_url', '/promo-details')); ?>"
           class="promo-link"
           aria-label="<?php esc_attr_e('View promo details', 'minimal-woo'); ?>">
            <?php echo esc_html(get_theme_mod('top_bar_promo_text', '$20 eGift card with $49+ on 1st order* use WELCOME')); ?>
        </a>
    </div>
</div>