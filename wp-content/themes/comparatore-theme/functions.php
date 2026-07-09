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
		'comparatore-theme-nav',
		get_stylesheet_directory_uri() . '/assets/css/nav.css',
		[ 'comparatore-theme-tokens' ],
		ab_asset_ver( 'assets/css/nav.css' )
	);

	wp_enqueue_style(
		'comparatore-theme-footer',
		get_stylesheet_directory_uri() . '/assets/css/ab-footer.css',
		[ 'comparatore-theme-tokens' ],
		ab_asset_ver( 'assets/css/ab-footer.css' )
	);

	wp_enqueue_script(
		'comparatore-theme-nav',
		get_stylesheet_directory_uri() . '/assets/js/front-page.js',
		[],
		ab_asset_ver( 'assets/js/front-page.js' ),
		true
	);

	if ( is_404() ) {
		wp_enqueue_style(
			'comparatore-theme-404',
			get_stylesheet_directory_uri() . '/assets/css/404.css',
			[ 'comparatore-theme-tokens' ],
			ab_asset_ver( 'assets/css/404.css' )
		);
	}

	if ( is_singular( 'post' ) ) {
		wp_enqueue_style(
			'comparatore-theme-content',
			get_stylesheet_directory_uri() . '/assets/css/content.css',
			[ 'comparatore-theme-tokens' ],
			ab_asset_ver( 'assets/css/content.css' )
		);
	}

	if ( is_page() ) {
		wp_enqueue_style(
			'comparatore-theme-page',
			get_stylesheet_directory_uri() . '/assets/css/page.css',
			[ 'comparatore-theme-tokens' ],
			ab_asset_ver( 'assets/css/page.css' )
		);
		wp_enqueue_style(
			'comparatore-theme-content',
			get_stylesheet_directory_uri() . '/assets/css/content.css',
			[ 'comparatore-theme-tokens' ],
			ab_asset_ver( 'assets/css/content.css' )
		);
	}

	if ( is_home() || is_category() || is_tag() || is_author() || is_archive() ) {
		wp_enqueue_style(
			'comparatore-theme-archive',
			get_stylesheet_directory_uri() . '/assets/css/archive.css',
			[ 'comparatore-theme-tokens' ],
			ab_asset_ver( 'assets/css/archive.css' )
		);
	}

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
