<?php
/**
 * Template part for displaying the help dropdown
 *
 * @package NEWNIBTON
 */

if (!get_theme_mod('show_help_dropdown', true)) {
    return;
}
?>

<div class="newnibton-help-dropdown">
    <a href="<?php echo esc_url(get_theme_mod('contact_page_url', '/contact/')); ?>"
       class="help-btn"
       aria-label="<?php esc_attr_e('Get help and support', 'minimal-woo'); ?>">
        <?php echo newnibton_get_svg_icon('help', 'help-icon'); ?>
        <span><?php echo esc_html(get_theme_mod('help_button_text', '24/7 Help')); ?></span>
    </a>
    <div class="help-card" role="menu" aria-hidden="true">
        <div class="help-content">
            <h3 class="help-title"><?php echo esc_html(get_theme_mod('help_title', 'WhatsApp Support')); ?></h3>
            <p class="whatsapp-number">
                <?php echo newnibton_get_svg_icon('whatsapp', 'whatsapp-icon'); ?>
                <?php echo esc_html(get_theme_mod('whatsapp_number', '777677777')); ?>
            </p>
            <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('whatsapp_number', '777677777')); ?>"
               target="_blank"
               class="chat-btn"
               rel="noopener noreferrer"
               aria-label="<?php esc_attr_e('Start WhatsApp chat', 'minimal-woo'); ?>">
                <?php echo esc_html(get_theme_mod('chat_button_text', 'Chat Now')); ?>
            </a>
        </div>
    </div>
</div>