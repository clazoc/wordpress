<?php
/**
 * Social links — shared between homepage header and footer.
 * Edit $ab_socials to add/remove/change network URLs.
 */
defined( 'ABSPATH' ) || exit;

$ab_socials = [
	[
		'name' => 'Facebook',
		'url'  => 'https://www.facebook.com/altrabolletta',
		'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>',
	],
	[
		'name' => 'Instagram',
		'url'  => 'https://www.instagram.com/altrabolletta',
		'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
	],
	[
		'name' => 'LinkedIn',
		'url'  => 'https://www.linkedin.com/company/altrabolletta.it',
		'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
	],
	[
		'name' => 'X (Twitter)',
		'url'  => 'https://x.com/altrabolletta',
		'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
	],
];
?>
<div class="ab-social-links">
	<?php foreach ( $ab_socials as $s ) : ?>
		<a href="<?php echo esc_url( $s['url'] ); ?>" class="ab-social-link" aria-label="<?php echo esc_attr( $s['name'] ); ?>" rel="noopener noreferrer" target="_blank">
			<?php echo $s['icon']; // phpcs:ignore WordPress.Security.EscapeOutput -- SVG authored here, no user input ?>
		</a>
	<?php endforeach; ?>
</div>
