cf7tg = {
	
	init : function(){
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
					var result = JSON.parse( response );
					if ( true == result.result ) {
						var panel = jQuery( '.cf7tel_notice[data-chat="' + result.chat + '"]' );
						panel.attr( 'status', result.new_status );
					}
				});
			} );
		} );
	}
	
}

jQuery( document ).ready( function(){
	cf7tg.init();
});