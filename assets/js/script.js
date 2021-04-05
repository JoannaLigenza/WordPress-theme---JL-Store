jQuery(document).ready(function($) {

    function jlstore_change_searchform_size() {
        const logo_container = $('.logo-container');
        logo_container.on("focus", 'form[role="search"]', function() {
            $(this).css({ 'max-width': '450px' });
        });

        logo_container.on("blur", 'form[role="search"]', function() {
            $(this).css({ 'max-width': '' });
        });
    }
    jlstore_change_searchform_size();

});

