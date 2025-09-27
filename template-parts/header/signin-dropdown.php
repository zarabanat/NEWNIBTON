<?php
/**
 * Template part for displaying the signin dropdown
 *
 * @package NEWNIBTON
 */
?>

<div class="newnibton-signin-dropdown">
    <?php if (is_user_logged_in()) : ?>
        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
           class="signin-btn"
           aria-label="<?php esc_attr_e('Go to my account', 'minimal-woo'); ?>">
            <?php echo newnibton_get_svg_icon('user', 'user-icon'); ?>
            <span><?php echo esc_html(get_theme_mod('account_text', 'My Account')); ?></span>
        </a>
    <?php else : ?>
        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
           class="signin-btn"
           aria-label="<?php esc_attr_e('Sign in to your account', 'minimal-woo'); ?>">
            <?php echo newnibton_get_svg_icon('user', 'user-icon'); ?>
            <span><?php echo esc_html(get_theme_mod('signin_button_text', 'Sign In')); ?></span>
        </a>
    <?php endif; ?>

    <div class="signin-card" role="menu" aria-hidden="true">
        <?php if (is_user_logged_in()) : ?>
            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
               role="menuitem">
                <?php echo esc_html(get_theme_mod('account_text', 'My Account')); ?>
            </a>
            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>"
               role="menuitem">
                <?php echo esc_html(get_theme_mod('logout_text', 'Logout')); ?>
            </a>
        <?php else : ?>
            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
               role="menuitem">
                <?php echo esc_html(get_theme_mod('login_text', 'Log In')); ?>
            </a>
            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')) . '#register'); ?>"
               role="menuitem">
                <?php echo esc_html(get_theme_mod('register_text', 'Create Account')); ?>
            </a>
        <?php endif; ?>
    </div>
</div>