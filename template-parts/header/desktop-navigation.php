<?php
/**
 * Template part for displaying the desktop navigation
 *
 * @package NEWNIBTON
 */
?>

<nav class="newnibton-navigation-desktop" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'minimal-woo'); ?>">
    <div class="container">
        <div class="nav-wrapper">
            <ul class="nav-menu" role="menubar">
                <!-- Home Button -->
                <li class="nav-item home-button" role="none">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       class="nav-link"
                       role="menuitem"
                       aria-label="<?php esc_attr_e('Go to homepage', 'minimal-woo'); ?>">
                        <?php echo newnibton_get_svg_icon('home', 'home-icon'); ?>
                        <?php echo esc_html__('Home', 'minimal-woo'); ?>
                    </a>
                </li>

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
        </div>
    </div>
</nav>