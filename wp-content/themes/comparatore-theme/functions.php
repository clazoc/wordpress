<?php
/**
 * Comparatore Theme - child theme di Blocksy
 */

defined( 'ABSPATH' ) || exit;

/**
 * Restituisce il timestamp di modifica di un asset come stringa di versione.
 * Ogni volta che il file cambia su disco, l'URL del CSS/JS cambia e il browser
 * scarica la versione aggiornata ignorando la cache.
 */
function ab_asset_ver( string $rel_path ): string {
	$abs = get_stylesheet_directory() . '/' . $rel_path;
	return file_exists( $abs ) ? (string) filemtime( $abs ) : wp_get_theme()->get( 'Version' );
}

add_action( 'after_setup_theme', function () {
	register_nav_menus( [
		'primary' => __( 'Menu principale', 'comparatore-theme' ),
	] );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'comparatore-theme-parent',
		get_template_directory_uri() . '/style.css'
	);

	wp_enqueue_style(
		'comparatore-theme',
		get_stylesheet_directory_uri() . '/style.css',
		[ 'comparatore-theme-parent' ],
		ab_asset_ver( 'style.css' )
	);

	wp_enqueue_style(
		'comparatore-theme-tokens',
		get_stylesheet_directory_uri() . '/assets/css/tokens.css',
		[ 'comparatore-theme' ],
		ab_asset_ver( 'assets/css/tokens.css' )
	);

	wp_enqueue_style(
		'comparatore-theme-footer',
		get_stylesheet_directory_uri() . '/assets/css/ab-footer.css',
		[ 'comparatore-theme-tokens' ],
		ab_asset_ver( 'assets/css/ab-footer.css' )
	);

	$services_templates = [
		'templates/page-servizi.php',
		'templates/page-servizi-privati.php',
		'templates/page-servizi-imprese.php',
		'templates/page-servizi-societa.php',
	];
	if ( is_page() && in_array( get_page_template_slug(), $services_templates, true ) ) {
		wp_enqueue_style(
			'comparatore-theme-services',
			get_stylesheet_directory_uri() . '/assets/css/services.css',
			[ 'comparatore-theme-tokens' ],
			ab_asset_ver( 'assets/css/services.css' )
		);
	}

} );
