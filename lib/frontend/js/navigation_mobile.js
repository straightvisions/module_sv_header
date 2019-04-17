jQuery( document ).ready( function() {
    // Opens Navigation
    jQuery( document ).on( 'click', '.sv_100_sv_navigation_mobile_menu_toggle', function() {
        jQuery( this ).toggleClass( 'open' );
        jQuery( '.sv_100_sv_header' ).toggleClass( 'open' );
    });
});