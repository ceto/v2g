jQuery(document).on( 'click', '.searchtoggler', function(e) {
    e.preventDefault();
    jQuery('.thesearchpanel').toggleClass('is-open');
    jQuery('.search-field').focus();
});
jQuery(document).on( 'focusout', '.search-field', function(e) {
    jQuery('.thesearchpanel').removeClass('is-open');
});