jQuery(document).ready(function($) {

    /***********
    *   Header
    *************/

    function jlstore_change_searchform_size() {
        const logo_container = $('.logo-container');
        logo_container.on("focus", '.search-form', function() {
            $(this).addClass('extend-searchform');
        });

        logo_container.on("blur", '.search-form', function() {
            $(this).removeClass('extend-searchform');
        });
    }
    jlstore_change_searchform_size();

    function jlstore_show_searchform() {
        const searchform = $('.header-search-form');
        const searchIcon = $('.mobile-search-icon');
        if (searchform.length > 0 && searchIcon.length > 0) {
            searchIcon.on("click", function() {
                searchform.addClass('header-search-form--is-opened');
            });
            $('.js-hide-searchform').on("click", function() {
                searchform.removeClass('header-search-form--is-opened');
            });
        }
    }
    jlstore_show_searchform();

    function jlstoreOpenSubmenuOnMobile() {
        const openButton = $('.menu-item-plus');
        if (openButton.length > 0) {
            openButton.on('click', function() {
                const text = $(this).text();
                $(this).next().animate({ height: "toggle" }, 200);
                $(this).closest('.menu-item').toggleClass('menu-item-opened');
                if (text === '+') {
                    $(this).text('-');
                    $(this).css({ right: '7px' });
                } else {
                    $(this).text('+');
                    $(this).css({ right: '' });
                }
            });
        }
    }
    jlstoreOpenSubmenuOnMobile();

    function jlstoreOpenMobileMenu() {
        const hamburgerMenu = $('.hamburger-menu');
        if (hamburgerMenu.length > 0) {
            const menuContainer = $('.menu-wrapper');
            hamburgerMenu.on('click', function() {
                menuContainer.addClass('menu-wrapper--opened');
            });
        }
    }
    jlstoreOpenMobileMenu();

    function jlstoreCloseMobileMenu() {
        const closeButton = $('.mobile-close-button');
        if (closeButton.length > 0) {
            const menuContainer = $('.menu-wrapper');
            closeButton.on('click', function() {
                menuContainer.removeClass('menu-wrapper--opened');
            });
        }
    }
    jlstoreCloseMobileMenu();

});

