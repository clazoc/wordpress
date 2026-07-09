document.addEventListener( 'DOMContentLoaded', function () {
	var toggle = document.querySelector( '.ab-menu-toggle' );
	var menu   = document.getElementById( 'ab-mobile-menu' );

	if ( ! toggle || ! menu ) {
		return;
	}

	// Hamburger open/close
	toggle.addEventListener( 'click', function () {
		var isOpen = menu.classList.toggle( 'is-open' );
		toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		menu.hidden = ! isOpen;
	} );

	// Inject accordion toggle buttons for each parent item in the mobile menu
	menu.querySelectorAll( '.ab-menu > li > .sub-menu' ).forEach( function ( sub ) {
		var li  = sub.parentElement;
		var btn = document.createElement( 'button' );
		btn.type = 'button';
		btn.className = 'ab-submenu-toggle';
		btn.setAttribute( 'aria-expanded', 'false' );
		btn.innerHTML = '▾<span class="screen-reader-text">Espandi sottomenu</span>';

		btn.addEventListener( 'click', function () {
			var open = sub.classList.toggle( 'is-open' );
			btn.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		} );

		li.appendChild( btn );
	} );
} );
