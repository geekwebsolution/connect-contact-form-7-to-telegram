/**
 * After document load initialize events
 */
jQuery( document ).ready( function(){
	cf7tel_init();
});

/**
 * Function to approve / delete subscriber from list
 */
function cf7tel_init(){
	jQuery( '.cf7tel_notice' ).each( function( index, notice ){ 
		var panel = jQuery( notice );
		panel.on( 'click', '.buttons a', { chat : panel.data( 'chat' ) }, function( e ){
			var btn = jQuery( this );
			if ( ! confirm( wpData.l10n['confirm_' + btn.data('action') ] ) ) return;
			var postdata = {
				action		: 'cf7tel_telegram',
				_wpnonce	: wpData.nonce,
				do_action	: btn.data( 'action' ),
				chat		: e.data.chat
			}
			
			jQuery.post( wpData.ajax, postdata, function( response ) {
				if ( true == response.result ) {
					var panel = jQuery( '.cf7tel_notice[data-chat="' + response.chat + '"]' );
					panel.attr( 'data-status', response.new_status );
				}
			});
		} );
	} );
}