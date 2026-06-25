<?php
/**
 * Comparatore Theme - child theme di Blocksy
 */

defined( 'ABSPATH' ) || exit;

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
} );
