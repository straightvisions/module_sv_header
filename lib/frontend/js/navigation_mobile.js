jQuery( document ).ready( function() {
    // Opens Navigation
    jQuery( document ).on( 'click', '.sv100_sv_navigation_mobile_menu_toggle', function() {
        jQuery( this ).toggleClass( 'open' );
        jQuery( '.sv100_sv_header' ).toggleClass( 'open' );
    });
});