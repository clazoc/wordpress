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

	// Compatibilità WooCommerce: usa i nostri template invece di quelli di default
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
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

	if ( function_exists( 'is_woocommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
		wp_enqueue_style(
			'comparatore-theme-woo',
			get_stylesheet_directory_uri() . '/assets/css/woocommerce.css',
			[ 'comparatore-theme-tokens' ],
			ab_asset_ver( 'assets/css/woocommerce.css' )
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

// ---- Campi fatturazione extra (Codice Fiscale, P.IVA, SDI) ----
add_filter( 'woocommerce_checkout_fields', function ( $fields ) {
	$fields['billing']['billing_codice_fiscale'] = [
		'label'    => 'Codice fiscale',
		'required' => true,
		'class'    => [ 'form-row-wide' ],
		'priority' => 25,
	];
	$fields['billing']['billing_piva'] = [
		'label'    => 'Partita IVA',
		'required' => false,
		'class'    => [ 'form-row-wide' ],
		'priority' => 26,
	];
	$fields['billing']['billing_sdi'] = [
		'label'    => 'Codice SDI / PEC',
		'required' => false,
		'class'    => [ 'form-row-wide' ],
		'priority' => 27,
	];
	return $fields;
} );

// Salva i campi extra sull'ordine
add_action( 'woocommerce_checkout_update_order_meta', function ( $order_id ) {
	$extra_fields = [ 'billing_codice_fiscale', 'billing_piva', 'billing_sdi' ];
	foreach ( $extra_fields as $field ) {
		if ( ! empty( $_POST[ $field ] ) ) {
			update_post_meta( $order_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
} );

// Mostra i campi extra nel dettaglio ordine in admin
add_action( 'woocommerce_admin_order_data_after_billing_address', function ( $order ) {
	$cf  = get_post_meta( $order->get_id(), '_billing_codice_fiscale', true );
	$pi  = get_post_meta( $order->get_id(), '_billing_piva',           true );
	$sdi = get_post_meta( $order->get_id(), '_billing_sdi',            true );
	if ( $cf )  echo '<p><strong>Codice fiscale:</strong> ' . esc_html( $cf )  . '</p>';
	if ( $pi )  echo '<p><strong>Partita IVA:</strong> '   . esc_html( $pi )  . '</p>';
	if ( $sdi ) echo '<p><strong>Codice SDI/PEC:</strong> '. esc_html( $sdi ) . '</p>';
} );
