document.addEventListener( 'DOMContentLoaded', function () {
	var toggle = document.querySelector( '.ab-menu-toggle' );
	var menu = document.getElementById( 'ab-mobile-menu' );

	if ( ! toggle || ! menu ) {
		return;
	}

	toggle.addEventListener( 'click', function () {
		var isOpen = menu.classList.toggle( 'is-open' );
		toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		menu.hidden = ! isOpen;
	} );
} );
