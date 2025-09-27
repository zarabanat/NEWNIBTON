/**
 * NEWNIBTON Header JavaScript
 * Professional header functionality with WooCommerce integration
 *
 * @package NEWNIBTON
 */

(function($) {
    'use strict';

    class NEWNIBTONHeader {
        constructor() {
            this.init();
        }

        init() {
            this.setupMobileNavigation();
            this.setupDropdowns();
            this.setupSearchFunctionality();
            this.setupCartUpdates();
            this.setupAccessibility();
        }

        /**
         * Mobile Navigation Setup
         */
        setupMobileNavigation() {
            const $hamburger = $('#mobile-hamburger-trigger');
            const $panel = $('#mobile-nav-panel');
            const $overlay = $('#mobile-nav-overlay');
            const $closeBtn = $('#mobile-nav-close');
            const $body = $('body');

            // Open mobile menu
            $hamburger.on('click', () => {
                $panel.addClass('active').attr('aria-hidden', 'false');
                $overlay.addClass('active').attr('aria-hidden', 'false');
                $hamburger.attr('aria-expanded', 'true');
                $body.addClass('mobile-nav-open');

                // Focus management
                setTimeout(() => {
                    $closeBtn.focus();
                }, 300);
            });

            // Close mobile menu
            const closeMobileNav = () => {
                $panel.removeClass('active').attr('aria-hidden', 'true');
                $overlay.removeClass('active').attr('aria-hidden', 'true');
                $hamburger.attr('aria-expanded', 'false');
                $body.removeClass('mobile-nav-open');

                // Return focus to hamburger
                $hamburger.focus();
            };

            $closeBtn.on('click', closeMobileNav);
            $overlay.on('click', closeMobileNav);

            // Close on Escape key
            $(document).on('keydown', (e) => {
                if (e.key === 'Escape' && $panel.hasClass('active')) {
                    closeMobileNav();
                }
            });

            // Handle dropdown toggles in mobile
            $('.newnibton-navigation .has-dropdown > .nav-link').on('click', function(e) {
                e.preventDefault();
                const $parent = $(this).parent();
                const $submenu = $parent.find('.dropdown-menu');

                $parent.toggleClass('active');

                if ($parent.hasClass('active')) {
                    $(this).attr('aria-expanded', 'true');
                    $submenu.attr('aria-hidden', 'false');
                } else {
                    $(this).attr('aria-expanded', 'false');
                    $submenu.attr('aria-hidden', 'true');
                }
            });
        }

        /**
         * Desktop Dropdown Setup
         */
        setupDropdowns() {
            const $dropdowns = $('.newnibton-help-dropdown, .newnibton-signin-dropdown, .newnibton-cart-dropdown');

            $dropdowns.each(function() {
                const $dropdown = $(this);
                const $trigger = $dropdown.find('> a, > button');
                const $menu = $dropdown.find('.help-card, .signin-card, .cart-card');

                let hoverTimeout;

                $dropdown.on('mouseenter', () => {
                    clearTimeout(hoverTimeout);
                    $trigger.attr('aria-expanded', 'true');
                    $menu.attr('aria-hidden', 'false');
                });

                $dropdown.on('mouseleave', () => {
                    hoverTimeout = setTimeout(() => {
                        $trigger.attr('aria-expanded', 'false');
                        $menu.attr('aria-hidden', 'true');
                    }, 300);
                });

                // Keyboard navigation
                $trigger.on('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        const isExpanded = $trigger.attr('aria-expanded') === 'true';
                        $trigger.attr('aria-expanded', !isExpanded);
                        $menu.attr('aria-hidden', isExpanded);

                        if (!isExpanded) {
                            $menu.find('a').first().focus();
                        }
                    }
                });
            });

            // Close dropdowns when clicking outside
            $(document).on('click', (e) => {
                if (!$(e.target).closest('.newnibton-help-dropdown, .newnibton-signin-dropdown, .newnibton-cart-dropdown').length) {
                    $dropdowns.find('> a, > button').attr('aria-expanded', 'false');
                    $dropdowns.find('.help-card, .signin-card, .cart-card').attr('aria-hidden', 'true');
                }
            });
        }

        /**
         * Search Functionality
         */
        setupSearchFunctionality() {
            const $searchForm = $('.newnibton-search-box .search-form');
            const $searchField = $searchForm.find('.search-field');
            let searchTimeout;

            // Search suggestions (if needed)
            $searchField.on('input', function() {
                const query = $(this).val().trim();

                clearTimeout(searchTimeout);

                if (query.length >= 2) {
                    searchTimeout = setTimeout(() => {
                        // Implement search suggestions here if needed
                        // this.getSearchSuggestions(query);
                    }, 300);
                }
            });

            // Enhanced search form submission
            $searchForm.on('submit', function(e) {
                const query = $searchField.val().trim();

                if (!query) {
                    e.preventDefault();
                    $searchField.focus();
                    return false;
                }

                // Add analytics tracking if needed
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'search', {
                        'search_term': query
                    });
                }
            });
        }

        /**
         * Cart Updates via AJAX
         */
        setupCartUpdates() {
            // Update cart count when items are added/removed
            $(document.body).on('wc_fragments_refreshed wc_fragments_loaded', () => {
                this.updateCartCount();
            });

            // Cart dropdown loading
            $('.newnibton-cart-dropdown .cart-btn').on('click', function(e) {
                if ($(window).width() <= 768) {
                    // On mobile, redirect to cart page
                    if (newnibton_ajax.cart_url) {
                        window.location.href = newnibton_ajax.cart_url;
                    }
                    return;
                }

                e.preventDefault();

                const $cartCard = $(this).siblings('.cart-card');
                const $content = $cartCard.find('.newnibton-cart-dropdown-content');

                if (!$content.hasClass('loaded')) {
                    $content.html('<div class="loading">Loading...</div>');

                    $.ajax({
                        url: newnibton_ajax.ajax_url,
                        type: 'POST',
                        data: {
                            action: 'newnibton_get_cart_contents',
                            nonce: newnibton_ajax.nonce
                        },
                        success: function(response) {
                            if (response.success) {
                                $content.html(response.data.cart_html).addClass('loaded');
                            }
                        },
                        error: function() {
                            $content.html('<div class="error">Failed to load cart contents.</div>');
                        }
                    });
                }
            });
        }

        /**
         * Update cart count display
         */
        updateCartCount() {
            $.ajax({
                url: newnibton_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'newnibton_update_cart_count',
                    nonce: newnibton_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('.cart-count').text(response.data.count)
                                       .attr('aria-label', response.data.count + ' items in cart');
                    }
                }
            });
        }

        /**
         * Accessibility Enhancements
         */
        setupAccessibility() {
            // Skip link functionality
            $('.skip-link').on('click', function(e) {
                const target = $(this).attr('href');
                if (target && $(target).length) {
                    $(target).attr('tabindex', '-1').focus();
                }
            });

            // Keyboard navigation for dropdowns
            $('.newnibton-navigation-desktop .has-dropdown').each(function() {
                const $item = $(this);
                const $link = $item.find('> .nav-link');
                const $submenu = $item.find('.dropdown-menu');

                $link.on('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        $submenu.find('a').first().focus();
                    }
                });

                $submenu.find('a').on('keydown', (e) => {
                    if (e.key === 'Escape') {
                        $link.focus();
                    }
                });
            });

            // Focus management for mobile menu
            $('#mobile-nav-panel').on('keydown', (e) => {
                if (e.key === 'Tab') {
                    const $focusableElements = $('#mobile-nav-panel').find('button, a, input, select, textarea, [tabindex]:not([tabindex="-1"])');
                    const $firstElement = $focusableElements.first();
                    const $lastElement = $focusableElements.last();

                    if (e.shiftKey && $(e.target).is($firstElement)) {
                        e.preventDefault();
                        $lastElement.focus();
                    } else if (!e.shiftKey && $(e.target).is($lastElement)) {
                        e.preventDefault();
                        $firstElement.focus();
                    }
                }
            });
        }

        /**
         * Get search suggestions via AJAX
         */
        getSearchSuggestions(query) {
            $.ajax({
                url: newnibton_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'newnibton_search_suggestions',
                    query: query,
                    nonce: newnibton_ajax.nonce
                },
                success: function(response) {
                    if (response.success && response.data.suggestions.length > 0) {
                        // Implement suggestions display here if needed
                        console.log('Suggestions:', response.data.suggestions);
                    }
                }
            });
        }
    }

    // Initialize when document is ready
    $(document).ready(function() {
        new NEWNIBTONHeader();
    });

    // Handle scroll effects (optional)
    let lastScrollTop = 0;
    $(window).on('scroll', function() {
        const scrollTop = $(this).scrollTop();
        const $header = $('.newnibton-header');

        if (scrollTop > 100) {
            $header.addClass('scrolled');
        } else {
            $header.removeClass('scrolled');
        }

        lastScrollTop = scrollTop;
    });

    // Handle window resize
    $(window).on('resize', function() {
        const $panel = $('#mobile-nav-panel');
        const $overlay = $('#mobile-nav-overlay');

        if ($(window).width() > 768 && $panel.hasClass('active')) {
            $panel.removeClass('active').attr('aria-hidden', 'true');
            $overlay.removeClass('active').attr('aria-hidden', 'true');
            $('#mobile-hamburger-trigger').attr('aria-expanded', 'false');
            $('body').removeClass('mobile-nav-open');
        }
    });

})(jQuery);