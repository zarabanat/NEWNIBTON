<?php
/**
 * Template part for displaying the mobile navigation
 *
 * @package NEWNIBTON
 */
?>

<!-- Mobile Navigation Overlay -->
<div id="mobile-nav-overlay"
     aria-hidden="true"
     role="presentation"></div>

<!-- Mobile Navigation Panel -->
<div id="mobile-nav-panel"
     role="dialog"
     aria-modal="true"
     aria-labelledby="mobile-nav-title"
     aria-hidden="true"
     tabindex="-1">
    <div class="panel-header">
        <h2 id="mobile-nav-title" class="panel-title"><?php echo esc_html(get_bloginfo('name')); ?></h2>
        <button id="mobile-nav-close"
                aria-label="<?php esc_attr_e('Close navigation menu', 'minimal-woo'); ?>"
                type="button">&times;</button>
    </div>

    <nav class="newnibton-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'minimal-woo'); ?>">
        <ul class="nav-menu" role="menubar">
            <?php foreach (newnibton_get_main_menu_items() as $key => $item) : ?>
                <li class="nav-item <?php echo $item['has_dropdown'] ? 'has-dropdown' : ''; ?>" role="none">
                    <a href="<?php echo esc_url($item['url']); ?>"
                       class="nav-link"
                       role="menuitem"
                       <?php echo $item['has_dropdown'] ? 'aria-haspopup="true" aria-expanded="false"' : ''; ?>>
                        <?php echo esc_html($item['title']); ?>
                        <?php if ($item['has_dropdown']) : ?>
                            <?php echo newnibton_get_svg_icon('dropdown', 'dropdown-arrow'); ?>
                        <?php endif; ?>
                    </a>
                    <?php if ($item['has_dropdown'] && isset($item['submenu'])) : ?>
                        <ul class="dropdown-menu" role="menu" aria-hidden="true">
                            <?php foreach ($item['submenu'] as $subitem) : ?>
                                <li role="none">
                                    <a href="<?php echo esc_url($subitem['url']); ?>" role="menuitem">
                                        <?php echo esc_html($subitem['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if (get_theme_mod('bottom_promo_text', '')) : ?>
            <div class="promo-text">
                <?php echo esc_html(get_theme_mod('bottom_promo_text', 'Free delivery on first-time orders over $35')); ?>
            </div>
        <?php endif; ?>
    </nav>

    <!-- Mobile Menu User Actions -->
    <div class="mobile-menu-custom-content">
        <?php if (get_theme_mod('mobile_menu_message_show', false)) : ?>
            <div class="mobile-menu-message">
                <?php echo wp_kses_post(get_theme_mod('mobile_menu_message_text', 'Welcome to our store!')); ?>
            </div>
        <?php endif; ?>

        <!-- User Actions Section -->
        <div class="mobile-menu-user-actions">
            <?php if (is_user_logged_in()) : ?>
                <!-- Logged In User Actions -->
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                   class="mobile-menu-btn"
                   aria-label="<?php esc_attr_e('Go to my account dashboard', 'minimal-woo'); ?>">
                    <?php echo esc_html(get_theme_mod('account_text', 'My Account')); ?>
                </a>
                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>"
                   class="mobile-menu-btn mobile-menu-btn-secondary"
                   aria-label="<?php esc_attr_e('Sign out of your account', 'minimal-woo'); ?>">
                    <?php echo esc_html(get_theme_mod('logout_text', 'Logout')); ?>
                </a>
            <?php else : ?>
                <!-- Guest User Actions -->
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                   class="mobile-menu-btn"
                   aria-label="<?php esc_attr_e('Sign in to your account', 'minimal-woo'); ?>">
                    <?php echo esc_html(get_theme_mod('login_text', 'Sign In')); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                   class="mobile-menu-btn mobile-menu-btn-secondary"
                   aria-label="<?php esc_attr_e('Create a new account', 'minimal-woo'); ?>">
                    <?php echo esc_html(get_theme_mod('register_text', 'Create Account')); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>