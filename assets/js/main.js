/**
 * NEWNIBTON Theme - Main JavaScript
 * Complementary to header.js, handles general theme functionality
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // Note: Mobile menu is now handled in header.js
        // This file handles general theme functionality

        // Smooth scroll for anchor links
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800);
                    return false;
                }
            }
        });

        // WooCommerce quantity buttons
        $(document).on('click', '.quantity .plus', function() {
            var $input = $(this).prev('input.qty');
            var val = parseInt($input.val());
            $input.val(val + 1).change();
        });

        $(document).on('click', '.quantity .minus', function() {
            var $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 1) {
                $input.val(val - 1).change();
            }
        });

        // Add plus and minus buttons to quantity fields
        $('.quantity').each(function() {
            var $this = $(this);
            if (!$this.find('.minus').length) {
                $this.prepend('<button type="button" class="minus">-</button>');
                $this.append('<button type="button" class="plus">+</button>');
            }
        });

        // Product gallery lightbox enhancement (if needed)
        if (typeof $.fn.magnificPopup !== 'undefined') {
            $('.woocommerce-product-gallery__image a').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }

        // Sticky header on scroll (optional)
        var $header = $('.newnibton-header');
        var headerHeight = $header.outerHeight();
        var scrollThreshold = 100;

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > scrollThreshold) {
                $header.addClass('sticky');
            } else {
                $header.removeClass('sticky');
            }
        });

        // AJAX cart update notification
        $(document.body).on('added_to_cart', function() {
            // Simple notification
            var $notification = $('<div class="cart-notification">Product added to cart!</div>');
            $('body').append($notification);

            setTimeout(function() {
                $notification.addClass('show');
            }, 10);

            setTimeout(function() {
                $notification.removeClass('show');
                setTimeout(function() {
                    $notification.remove();
                }, 300);
            }, 3000);
        });

        // Initialize any WooCommerce scripts that might need re-initialization
        if (typeof wc_add_to_cart_params !== 'undefined') {
            // Cart fragments update
            $(document.body).on('wc_fragments_refreshed', function() {
                console.log('Cart fragments updated');
            });
        }

    });

    // Window load events
    $(window).on('load', function() {
        // Remove any loading classes
        $('body').removeClass('loading');
    });

})(jQuery);

// Add CSS for notifications and quantity controls
if (!document.getElementById('theme-dynamic-styles')) {
    var style = document.createElement('style');
    style.id = 'theme-dynamic-styles';
    style.innerHTML = `
        .newnibton-header.sticky {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .cart-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #77a464;
            color: white;
            padding: 15px 20px;
            border-radius: 3px;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s ease;
            z-index: 10000;
        }

        .cart-notification.show {
            opacity: 1;
            transform: translateY(0);
        }

        .quantity {
            display: inline-flex;
            align-items: center;
        }

        .quantity .minus,
        .quantity .plus {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: #f8f8f8;
            cursor: pointer;
            font-size: 16px;
        }

        .quantity input.qty {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-left: none;
            border-right: none;
            height: 30px;
        }
    `;
    document.head.appendChild(style);
}