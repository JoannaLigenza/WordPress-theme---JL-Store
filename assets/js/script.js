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

});

