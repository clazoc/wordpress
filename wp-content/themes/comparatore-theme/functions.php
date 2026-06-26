<?php
/**
 * Comparatore Theme - child theme di Blocksy
 */

defined( 'ABSPATH' ) || exit;

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
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'comparatore-theme-tokens',
		get_stylesheet_directory_uri() . '/assets/css/tokens.css',
		[ 'comparatore-theme' ],
		wp_get_theme()->get( 'Version' )
	);

	if ( is_front_page() && ! is_home() ) {
		wp_enqueue_style(
			'comparatore-theme-front-page',
			get_stylesheet_directory_uri() . '/assets/css/front-page.css',
			[ 'comparatore-theme-tokens' ],
			wp_get_theme()->get( 'Version' )
		);
	}
} );
