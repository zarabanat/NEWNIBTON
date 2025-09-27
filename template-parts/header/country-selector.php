<?php
/**
 * Template part for displaying the country selector
 *
 * @package NEWNIBTON
 */

if (!get_theme_mod('show_country_switcher', true)) {
    return;
}

$countries = newnibton_get_countries();
$current_country = $countries['US'];
?>

<div class="newnibton-country-selector">
    <button class="country-btn"
            aria-haspopup="true"
            aria-expanded="false"
            aria-label="<?php esc_attr_e('Country and currency selector', 'minimal-woo'); ?>"
            type="button">
        <?php echo $current_country['flag_svg'] . ' ' . esc_html($current_country['name']); ?>
    </button>
    <div class="country-tooltip" role="tooltip" aria-hidden="true">
        <p><?php echo esc_html(get_theme_mod('country_message', 'We currently serve only the United States')); ?></p>
    </div>
</div>