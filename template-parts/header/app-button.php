<?php
/**
 * Template part for displaying the app button
 *
 * @package NEWNIBTON
 */

if (!get_theme_mod('show_use_app_button', true)) {
    return;
}
?>

<div class="newnibton-app-button">
    <a href="<?php echo esc_url(get_theme_mod('app_store_link', 'https://play.google.com/store')); ?>"
       target="_blank"
       class="app-btn"
       rel="noopener noreferrer"
       aria-label="<?php esc_attr_e('Download our mobile app', 'minimal-woo'); ?>">
        <?php echo newnibton_get_svg_icon('mobile', 'app-icon'); ?>
        <span><?php echo esc_html(get_theme_mod('app_button_text', 'Use App')); ?></span>
    </a>
</div>