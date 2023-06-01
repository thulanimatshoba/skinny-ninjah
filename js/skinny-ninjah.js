// eslint-disable-next-line no-unused-vars

// eslint-disable-next-line no-undef
jQuery( document ).ready( function( $ ) {
	/** Pre Loader Jizz */
	$( document ).ready( function() {
		setTimeout( function() {
			$( 'body' ).addClass( 'loaded' );
		} );
	} );

	//Adds that cool shit on the menu when you hover
	$( document ).ready( function() {
		$( '.main-navigation .damn' ).each( function() {
			$( this ).attr( 'data-hover', $( this ).text() );
		} );
	} );
} );
